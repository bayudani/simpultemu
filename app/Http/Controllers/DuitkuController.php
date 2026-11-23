<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DuitkuController extends Controller
{
    /**
     * Create a Duitku payment transaction for upgrading an invitation or user package.
     */
    public function createInvoice(Request $request, ?Invitation $invitation = null): JsonResponse
    {
        $user = $request->user();

        // If invitation route binding passed, ensure user owns it
        if ($invitation && $invitation->exists) {
            if ($invitation->user_id !== $user->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak memiliki hak akses untuk undangan ini.',
                ], 403);
            }
        } else {
            // Find user's latest invitation or invitation_id from query/body
            $invitationId = $request->input('invitation_id');
            if ($invitationId) {
                $invitation = Invitation::where('user_id', $user->id)->find($invitationId);
            } else {
                $invitation = $user->invitations()->latest()->first();
            }
        }

        $packageTier = $request->input('package_tier', 'premium');
        $packageConfig = match ($packageTier) {
            'basic_addon_1' => [
                'tier' => 'basic_addon_1',
                'amount' => 17000,
                'name' => 'Add-On Paket Basic 1 (12 Tamu & 10 Lagu)',
            ],
            'basic_addon_2' => [
                'tier' => 'basic_addon_2',
                'amount' => 25000,
                'name' => 'Add-On Paket Basic 2 (17 Tamu & 20 Lagu)',
            ],
            default => [
                'tier' => 'premium',
                'amount' => 59000,
                'name' => 'Paket Premium (Tamu & Lagu Tak Terbatas)',
            ],
        };

        $merchantCode = (string) config('services.duitku.merchant_code', env('DUITKU_MERCHANT_CODE', 'DS37951'));
        $apiKey = (string) config('services.duitku.api_key', env('DUITKU_API_KEY', '2a7fe83924b88000f9c79675a3ceed86'));
        $baseUrl = (string) config('services.duitku.base_url', env('DUITKU_BASE_URL', 'https://api-sandbox.duitku.com/api/merchant/createInvoice'));

        $amount = $packageConfig['amount'];
        $actualTier = $packageConfig['tier'];
        $invIdPrefix = $invitation ? $invitation->id : 'USR-'.$user->id;
        $merchantOrderId = 'INV-'.$invIdPrefix.'-'.time().'-'.rand(100, 999);
        $timestamp = (string) round(microtime(true) * 1000);
        $signature = hash('sha256', $merchantCode.$timestamp.$apiKey);

        $userEmail = $user->email ?? 'customer@simpultemu.test';
        $userName = $user->name ?? 'Pelanggan SimpulTemu';
        $invTitle = $invitation ? ($invitation->title ?: $invitation->groom_nickname.' & '.$invitation->bride_nickname) : 'Akun Pengguna';
        $productDetails = $packageConfig['name'].' - '.$invTitle;

        $returnUrl = $invitation
            ? route('dashboard.guests.index', $invitation)
            : route('dashboard.index');

        $payload = [
            'paymentAmount' => $amount,
            'merchantOrderId' => $merchantOrderId,
            'productDetails' => $productDetails,
            'email' => $userEmail,
            'phoneNumber' => '081234567890',
            'additionalParam' => (string) ($invitation ? $invitation->id : ''),
            'merchantUserInfo' => $userName,
            'customerVaName' => $userName,
            'callbackUrl' => url('/api/duitku/callback'),
            'returnUrl' => $returnUrl,
            'expiryPeriod' => 1440,
        ];

        try {
            $response = Http::withOptions([
                'force_ip_resolve' => 'v4',
            ])->timeout(25)->connectTimeout(10)->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'x-duitku-signature' => $signature,
                'x-duitku-timestamp' => $timestamp,
                'x-duitku-merchantcode' => $merchantCode,
            ])->post($baseUrl, $payload);

            $result = $response->json();

            if ($response->successful() && isset($result['statusCode']) && $result['statusCode'] === '00') {
                $reference = $result['reference'] ?? null;
                $paymentUrl = $result['paymentUrl'] ?? null;

                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'invitation_id' => $invitation?->id,
                    'merchant_order_id' => $merchantOrderId,
                    'amount' => $amount,
                    'package_tier' => $actualTier,
                    'status' => 'pending',
                    'reference' => $reference,
                    'payment_url' => $paymentUrl,
                    'response_payload' => $result,
                ]);

                return response()->json([
                    'success' => true,
                    'reference' => $reference,
                    'payment_url' => $paymentUrl,
                    'merchant_order_id' => $merchantOrderId,
                    'amount' => $amount,
                    'package_tier' => $actualTier,
                    'transaction_id' => $transaction->id,
                    'message' => 'Invoice pembayaran Duitku berhasil dibuat.',
                ]);
            }

            Log::error('Duitku createInvoice failed: ', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return response()->json([
                'success' => false,
                'message' => $result['statusMessage'] ?? 'Gagal membuat tagihan pembayaran ke Duitku.',
                'error' => $result,
            ], 400);

        } catch (\Throwable $e) {
            Log::error('Duitku exception: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem saat menghubungi gateway pembayaran: '.$e->getMessage(),
            ], 500);
        }
    }

    /**
     * Webhook callback from Duitku.
     */
    public function callback(Request $request): Response|JsonResponse
    {
        $merchantCode = (string) ($request->input('merchantCode') ?? config('services.duitku.merchant_code', env('DUITKU_MERCHANT_CODE', 'DS37951')));
        $amount = (string) $request->input('amount');
        $merchantOrderId = (string) $request->input('merchantOrderId');
        $signature = (string) $request->input('signature');
        $resultCode = (string) $request->input('resultCode');
        $reference = (string) $request->input('reference');
        $apiKey = (string) config('services.duitku.api_key', env('DUITKU_API_KEY', '2a7fe83924b88000f9c79675a3ceed86'));

        // MD5 signature validation: MD5(merchantCode + amount + merchantOrderId + apiKey)
        $expectedSignature = md5($merchantCode.$amount.$merchantOrderId.$apiKey);

        if (strtolower($expectedSignature) !== strtolower($signature)) {
            Log::warning('Duitku callback invalid signature', [
                'received_signature' => $signature,
                'expected_signature' => $expectedSignature,
                'data' => $request->all(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Invalid signature.',
            ], 400);
        }

        // Find transaction
        $transaction = Transaction::where('merchant_order_id', $merchantOrderId)->first();

        if ($resultCode === '00') {
            if ($transaction) {
                $packageTier = $transaction->package_tier ?: 'premium';
                $isPremium = ($packageTier === 'premium');

                $transaction->update([
                    'status' => 'success',
                    'paid_at' => now(),
                    'payment_method' => $request->input('paymentCode', $transaction->payment_method),
                    'reference' => $reference ?: $transaction->reference,
                    'response_payload' => array_merge((array) $transaction->response_payload, [
                        'callback' => $request->all(),
                    ]),
                ]);

                if ($transaction->invitation) {
                    $transaction->invitation->update([
                        'package_tier' => $packageTier,
                        'is_premium' => $isPremium,
                        'status' => 'published',
                    ]);
                }
            } else {
                // If transaction not found by merchant_order_id, try to extract invitation ID
                if (preg_match('/^INV-(\d+)-/', $merchantOrderId, $matches)) {
                    $invitationId = (int) $matches[1];
                    $invitation = Invitation::find($invitationId);
                    if ($invitation) {
                        $invitation->update([
                            'package_tier' => 'premium',
                            'is_premium' => true,
                            'status' => 'published',
                        ]);
                    }
                }
            }

            Log::info("Duitku payment SUCCESS for order: {$merchantOrderId} (Package: ".($transaction?->package_tier ?? 'premium').')');

            return response('OK', 200);
        }

        // If payment failed or expired
        if ($transaction) {
            $transaction->update([
                'status' => 'failed',
                'response_payload' => array_merge((array) $transaction->response_payload, [
                    'callback' => $request->all(),
                ]),
            ]);
        }

        Log::info("Duitku payment NOT 00 ({$resultCode}) for order: {$merchantOrderId}");

        return response('OK', 200);
    }

    /**
     * Check transaction status.
     */
    public function checkStatus(Invitation $invitation): JsonResponse
    {
        if ($invitation->user_id !== Auth::id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        return response()->json([
            'success' => true,
            'is_premium' => (bool) $invitation->is_premium,
            'package_tier' => $invitation->getPackageTier(),
            'package_label' => $invitation->getPackageLabel(),
            'guest_limit' => $invitation->getGuestLimit(),
            'guests_count' => $invitation->guests()->count(),
        ]);
    }

    /**
     * Confirm a successful payment transaction (from Duitku pop-up or sandbox confirmation).
     */
    public function confirmPayment(Request $request, ?Invitation $invitation = null): JsonResponse
    {
        $user = $request->user();

        if ($invitation && $invitation->exists) {
            if ($invitation->user_id !== $user->id) {
                return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
            }
        } else {
            $invitationId = $request->input('invitation_id');
            if ($invitationId) {
                $invitation = Invitation::where('user_id', $user->id)->find($invitationId);
            }
        }

        $packageTier = $request->input('package_tier', 'premium');
        $merchantOrderId = $request->input('merchant_order_id');
        $reference = $request->input('reference');

        // Find transaction if available
        $transaction = null;
        if ($merchantOrderId) {
            $transaction = Transaction::where('merchant_order_id', $merchantOrderId)->where('user_id', $user->id)->first();
        }
        if (! $transaction && $reference) {
            $transaction = Transaction::where('reference', $reference)->where('user_id', $user->id)->first();
        }
        if (! $transaction && $invitation) {
            $transaction = Transaction::where('invitation_id', $invitation->id)->where('user_id', $user->id)->latest()->first();
        }

        $isPremium = ($packageTier === 'premium');

        if ($transaction) {
            $transaction->update([
                'status' => 'success',
                'paid_at' => now(),
                'package_tier' => $packageTier,
                'response_payload' => array_merge((array) $transaction->response_payload, [
                    'confirmed_via_client' => true,
                    'confirmed_at' => now()->toIso8601String(),
                ]),
            ]);
        }

        if ($invitation) {
            $invitation->update([
                'package_tier' => $packageTier,
                'is_premium' => $isPremium,
                'status' => 'published',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Pembayaran berhasil dikonfirmasi. Fitur Premium untuk undangan ini telah aktif!',
            'is_premium' => true,
            'package_tier' => $packageTier,
            'invitation_id' => $invitation?->id,
        ]);
    }
}
