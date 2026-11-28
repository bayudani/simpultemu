<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DuitkuController extends Controller
{
    /**
     * Resolusi konfigurasi paket dan harga resmi.
     *
     * @return array{tier: string, amount: int, name: string, is_slot: bool}
     */
    private function resolvePackageConfig(string $packageTier): array
    {
        return match ($packageTier) {
            'basic_slot' => [
                'tier' => 'basic_slot',
                'amount' => 10000,
                'name' => 'Pembuatan 1 Undangan Basic Baru (5 Tamu & 5 Lagu)',
                'is_slot' => true,
            ],
            'premium_slot' => [
                'tier' => 'premium_slot',
                'amount' => 59000,
                'name' => 'Pembuatan 1 Undangan Premium Baru (Tamu & Lagu Tak Terbatas)',
                'is_slot' => true,
            ],
            'basic_addon_1' => [
                'tier' => 'basic_addon_1',
                'amount' => 17000,
                'name' => 'Add-On Paket Basic 1 (12 Tamu & 10 Lagu)',
                'is_slot' => false,
            ],
            'basic_addon_2' => [
                'tier' => 'basic_addon_2',
                'amount' => 25000,
                'name' => 'Add-On Paket Basic 2 (17 Tamu & 20 Lagu)',
                'is_slot' => false,
            ],
            default => [
                'tier' => 'premium',
                'amount' => 59000,
                'name' => 'Paket Premium (Tamu & Lagu Tak Terbatas)',
                'is_slot' => false,
            ],
        };
    }

    /**
     * Create a Duitku payment transaction for creating a new invitation slot or upgrading an invitation.
     */
    public function createInvoice(Request $request, ?Invitation $invitation = null): JsonResponse
    {
        $user = $request->user();
        $packageTier = (string) $request->input('package_tier', 'premium');
        $packageConfig = $this->resolvePackageConfig($packageTier);

        if ($invitation && $invitation->exists) {
            if ($invitation->user_id !== $user->id) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak memiliki hak akses untuk undangan ini.',
                ], 403);
            }
        } else {
            $invitationId = $request->input('invitation_id');
            if ($invitationId) {
                $invitation = Invitation::where('user_id', $user->id)->find($invitationId);
            } elseif (! $packageConfig['is_slot']) {
                // Fallback kompatibilitas rute tanpa parameter {invitation} untuk Add-On/Premium undangan terbaru
                $invitation = $user->invitations()->latest()->first();
            }
        }

        if (! $packageConfig['is_slot'] && in_array($packageConfig['tier'], ['basic_addon_1', 'basic_addon_2'], true) && ! $invitation) {
            return response()->json([
                'success' => false,
                'message' => 'Pilih undangan yang ingin di-upgrade terlebih dahulu.',
            ], 422);
        }

        if ($invitation) {
            $currentInvTier = $invitation->getPackageTier();
            if ($packageConfig['tier'] === 'basic_addon_1' && in_array($currentInvTier, ['basic_addon_2', 'premium'], true)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Undangan ini sudah menggunakan paket yang setara atau lebih tinggi dari Add-On Basic 1.',
                ], 422);
            }
            if ($packageConfig['tier'] === 'basic_addon_2' && $currentInvTier === 'premium') {
                return response()->json([
                    'success' => false,
                    'message' => 'Undangan ini sudah berstatus Paket Premium.',
                ], 422);
            }
            if ($packageConfig['tier'] === 'basic_slot' && $invitation->getPaymentStatusKey() !== 'unpaid') {
                return response()->json([
                    'success' => false,
                    'message' => 'Undangan ini sudah aktif atau dibayar.',
                ], 422);
            }
        }

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
        $invTitle = $invitation ? ($invitation->title ?: $invitation->groom_nickname.' & '.$invitation->bride_nickname) : 'Slot Undangan Baru';
        $productDetails = $packageConfig['name'].' - '.$invTitle;

        $returnUrl = $invitation
            ? route('dashboard.invitations.edit', $invitation)
            : route('dashboard.invitations.create');

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
            ])->timeout(25)
                ->connectTimeout(20)
                ->retry(2, 400, fn (\Throwable $e): bool => $e instanceof \Illuminate\Http\Client\ConnectionException, throw: false)
                ->withHeaders([
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
     * Terapkan paket/slot secara idempoten (satu kali) pada transaksi sukses.
     */
    private function applyTransactionEntitlement(Transaction $transaction, array $extraPayload = [], ?string $paymentMethod = null, ?string $reference = null): void
    {
        DB::transaction(function () use ($transaction, $extraPayload, $paymentMethod, $reference): void {
            $lockedTx = Transaction::lockForUpdate()->find($transaction->id);
            if (! $lockedTx) {
                return;
            }

            $alreadyCredited = ($lockedTx->credited_at !== null);
            $packageTier = $lockedTx->package_tier ?: 'premium';

            $lockedTx->update([
                'status' => 'success',
                'paid_at' => $lockedTx->paid_at ?? now(),
                'credited_at' => $lockedTx->credited_at ?? now(),
                'payment_method' => $paymentMethod ?? $lockedTx->payment_method,
                'reference' => $reference ?: $lockedTx->reference,
                'response_payload' => array_merge((array) $lockedTx->response_payload, $extraPayload),
            ]);

            if ($alreadyCredited) {
                return;
            }

            $this->applyEntitlementDirectly($lockedTx->user_id, $lockedTx->invitation, $packageTier);
        });
    }

    /**
     * Terapkan hak paket ke undangan spesifik atau kredit slot undangan baru akun.
     */
    private function applyEntitlementDirectly(int $userId, ?Invitation $invitation, string $packageTier): void
    {
        $config = $this->resolvePackageConfig($packageTier);

        if ($invitation) {
            $lockedInv = Invitation::lockForUpdate()->find($invitation->id);
            if (! $lockedInv) {
                return;
            }

            $tierPriority = [
                'basic' => 1,
                'basic_slot' => 1,
                'basic_addon_1' => 2,
                'basic_addon_2' => 3,
                'premium' => 4,
                'premium_slot' => 4,
            ];

            $currentTier = $lockedInv->is_premium ? 'premium' : ($lockedInv->package_tier ?: 'basic');
            $targetInvTier = match ($config['tier']) {
                'basic_slot' => 'basic',
                'premium_slot' => 'premium',
                default => $config['tier'],
            };

            $nextTier = (($tierPriority[$targetInvTier] ?? 1) >= ($tierPriority[$currentTier] ?? 1))
                ? $targetInvTier
                : $currentTier;

            $isPremium = ($nextTier === 'premium');
            $newPaidAmount = max((int) $lockedInv->paid_amount, $config['amount']);
            if ($lockedInv->payment_status === 'paid' && in_array($config['tier'], ['basic_addon_1', 'basic_addon_2', 'premium'], true) && $lockedInv->paid_amount > 0 && $lockedInv->paid_amount < 59000) {
                $newPaidAmount = ($nextTier === 'premium')
                    ? max(59000, (int) $lockedInv->paid_amount)
                    : ((int) $lockedInv->paid_amount + $config['amount']);
            }

            $lockedInv->update([
                'package_tier' => $nextTier,
                'is_premium' => $isPremium,
                'payment_status' => 'paid',
                'paid_amount' => $newPaidAmount,
                'paid_at' => $lockedInv->paid_at ?? now(),
            ]);

            return;
        }

        // Tanpa invitation_id: pembelian slot undangan baru untuk akun ini
        $lockedUser = User::lockForUpdate()->find($userId);
        if (! $lockedUser) {
            return;
        }

        if (in_array($config['tier'], ['premium_slot', 'premium'], true)) {
            $lockedUser->increment('premium_invitation_credits');
        } else {
            $lockedUser->increment('basic_invitation_credits');
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

        $transaction = Transaction::where('merchant_order_id', $merchantOrderId)->first();

        if ($resultCode === '00') {
            if ($transaction) {
                $this->applyTransactionEntitlement(
                    $transaction,
                    ['callback' => $request->all()],
                    $request->input('paymentCode', $transaction->payment_method),
                    $reference ?: null
                );
            } else {
                if (preg_match('/^INV-(\d+)-/', $merchantOrderId, $matches)) {
                    $invitationId = (int) $matches[1];
                    $invitation = Invitation::find($invitationId);
                    if ($invitation) {
                        DB::transaction(function () use ($invitation): void {
                            $this->applyEntitlementDirectly($invitation->user_id, $invitation, 'premium');
                        });
                    }
                }
            }

            Log::info("Duitku payment SUCCESS for order: {$merchantOrderId} (Package: ".($transaction?->package_tier ?? 'premium').')');

            return response('OK', 200);
        }

        if ($transaction && $transaction->status !== 'success') {
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
            'payment_status' => $invitation->getPaymentStatusKey(),
            'payment_status_label' => $invitation->getPaymentStatusLabel(),
            'guest_limit' => $invitation->getGuestLimit(),
            'song_limit' => $invitation->getSongLimit(),
            'guests_count' => $invitation->guests()->count(),
        ]);
    }

    /**
     * Confirm a successful payment transaction (from Duitku pop-up or sandbox simulation).
     */
    public function confirmPayment(Request $request, ?Invitation $invitation = null): JsonResponse
    {
        $user = $request->user();
        $packageTier = (string) $request->input('package_tier', 'premium');
        $config = $this->resolvePackageConfig($packageTier);

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

        $merchantOrderId = $request->input('merchant_order_id');
        $reference = $request->input('reference');

        $transaction = null;
        if ($merchantOrderId) {
            $transaction = Transaction::where('merchant_order_id', $merchantOrderId)->where('user_id', $user->id)->first();
        }
        if (! $transaction && $reference) {
            $transaction = Transaction::where('reference', $reference)->where('user_id', $user->id)->first();
        }
        if (! $transaction && $invitation && ! $config['is_slot']) {
            $transaction = Transaction::where('invitation_id', $invitation->id)
                ->where('user_id', $user->id)
                ->where('package_tier', $config['tier'])
                ->latest()
                ->first();
        }

        $isSandbox = str_contains((string) config('services.duitku.base_url', ''), 'sandbox')
            || (bool) env('DUITKU_SANDBOX_MODE', true)
            || app()->environment(['local', 'testing']);

        if (! $transaction && ! $isSandbox) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi pembayaran tidak ditemukan.',
            ], 422);
        }

        if ($transaction) {
            $this->applyTransactionEntitlement($transaction, [
                'confirmed_via_client' => true,
                'confirmed_at' => now()->toIso8601String(),
            ]);
        } else {
            // Sandbox / Testing direct simulation
            DB::transaction(function () use ($user, $invitation, $config, $merchantOrderId, $reference): void {
                $tx = null;
                if ($merchantOrderId) {
                    $tx = Transaction::firstOrCreate(
                        ['merchant_order_id' => $merchantOrderId],
                        [
                            'user_id' => $user->id,
                            'invitation_id' => $invitation?->id,
                            'amount' => $config['amount'],
                            'package_tier' => $config['tier'],
                            'status' => 'pending',
                            'reference' => $reference ?: 'SIM-'.time(),
                        ]
                    );
                }

                if ($tx) {
                    $lockedTx = Transaction::lockForUpdate()->find($tx->id);
                    if ($lockedTx && $lockedTx->credited_at === null) {
                        $lockedTx->update([
                            'status' => 'success',
                            'paid_at' => now(),
                            'credited_at' => now(),
                        ]);
                        $this->applyEntitlementDirectly($user->id, $invitation, $config['tier']);
                    }
                } else {
                    $this->applyEntitlementDirectly($user->id, $invitation, $config['tier']);
                }
            });
        }

        $freshUser = $user->fresh();
        $freshInvitation = $invitation?->fresh();
        $isPremium = $freshInvitation ? (bool) $freshInvitation->is_premium : in_array($config['tier'], ['premium', 'premium_slot'], true);

        $message = match ($config['tier']) {
            'basic_slot' => 'Pembayaran Rp 10.000 berhasil! Anda mendapatkan 1 slot undangan Basic baru.',
            'premium_slot' => 'Pembayaran Rp 59.000 berhasil! Anda mendapatkan 1 slot undangan Premium baru.',
            'basic_addon_1' => 'Add-On Paket Basic 1 berhasil aktif untuk undangan ini (Total 12 Tamu & 10 Lagu)!',
            'basic_addon_2' => 'Add-On Paket Basic 2 berhasil aktif untuk undangan ini (Total 17 Tamu & 20 Lagu)!',
            default => 'Pembayaran berhasil dikonfirmasi. Fitur Premium untuk undangan ini telah aktif!',
        };

        return response()->json([
            'success' => true,
            'message' => $message,
            'is_premium' => $isPremium,
            'package_tier' => $freshInvitation ? $freshInvitation->getPackageTier() : $config['tier'],
            'payment_status' => $freshInvitation ? $freshInvitation->getPaymentStatusKey() : 'paid',
            'invitation_id' => $freshInvitation?->id,
            'basic_invitation_credits' => (int) $freshUser->basic_invitation_credits,
            'premium_invitation_credits' => (int) $freshUser->premium_invitation_credits,
        ]);
    }
}
