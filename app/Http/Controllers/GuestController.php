<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\InvitationGuest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function index(Request $request, Invitation $invitation)
    {
        $this->authorize('view', $invitation);

        $guests = $invitation->guests()->latest()->get();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'guests' => $guests,
                'total' => $guests->count(),
                'invitation' => [
                    'id' => $invitation->id,
                    'slug' => $invitation->slug,
                    'groom_nickname' => $invitation->groom_nickname,
                    'bride_nickname' => $invitation->bride_nickname,
                    'is_premium' => (bool) $invitation->is_premium,
                    'package_tier' => $invitation->getPackageTier(),
                    'package_label' => $invitation->getPackageLabel(),
                    'guest_limit' => $invitation->getGuestLimit(),
                    'song_limit' => $invitation->getSongLimit(),
                    'whatsapp_template' => $invitation->whatsapp_template,
                    'url' => url('/undangan/'.$invitation->slug),
                ],
            ]);
        }

        $stats = [
            'total' => $guests->count(),
            'sent' => $guests->whereNotNull('sent_at')->count(),
            'opened' => $guests->whereNotNull('opened_at')->count(),
            'rsvp' => $guests->where('rsvp_status', '!=', 'pending')->count(),
        ];

        return view('dashboard.guests.index', compact('invitation', 'guests', 'stats'));
    }

    public function store(Request $request, Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        // Batasan paket tamu: Basic (5), Add-On 1 (12), Add-On 2 (17), Premium (Unlimited)
        $guestLimit = $invitation->getGuestLimit();
        $currentCount = $invitation->guests()->count();

        if ($guestLimit !== null && $currentCount >= $guestLimit) {
            $packageLabel = $invitation->getPackageLabel();
            $message = "Batas maksimal {$guestLimit} nama tamu untuk {$packageLabel} telah tercapai. Upgrade paket untuk menambah kuota tamu Anda!";

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'requires_upgrade' => true,
                    'invitation_id' => $invitation->id,
                    'guest_limit' => $guestLimit,
                    'current_count' => $currentCount,
                    'package_tier' => $invitation->getPackageTier(),
                    'message' => $message,
                ], 422);
            }

            return back()
                ->with('error', $message)
                ->with('requires_upgrade', true)
                ->with('upgrade_invitation_id', $invitation->id);
        }

        // Support batch adding via "names" textarea / array
        if ($request->filled('names')) {
            $rawNames = is_array($request->input('names'))
                ? $request->input('names')
                : preg_split('/[\r\n,]+/', (string) $request->input('names'), -1, PREG_SPLIT_NO_EMPTY);

            $addedGuests = [];
            foreach ($rawNames as $rawName) {
                if ($guestLimit !== null && $invitation->guests()->count() >= $guestLimit) {
                    break;
                }

                $name = trim($rawName);
                if (empty($name)) {
                    continue;
                }

                $token = strtoupper(Str::random(8));
                $url = route('invitation.personalized', [$invitation->slug, $token]);

                $guest = $invitation->guests()->create([
                    'name' => $name,
                    'unique_token' => $token,
                    'invitation_url' => $url,
                ]);

                $guest->whatsapp_message = $this->generateWhatsAppMessage($invitation, $guest);
                $guest->save();
                $addedGuests[] = $guest;
            }

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => count($addedGuests).' tamu berhasil ditambahkan.',
                    'guests' => $invitation->guests()->latest()->get(),
                ]);
            }

            return back()->with('success', count($addedGuests).' tamu berhasil ditambahkan.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'category' => 'nullable|string',
        ]);

        $token = strtoupper(Str::random(8));
        $guest = $invitation->guests()->create([
            'name' => $validated['name'],
            'phone' => $validated['phone'] ?? null,
            'category' => $validated['category'] ?? null,
            'unique_token' => $token,
            'invitation_url' => route('invitation.personalized', [$invitation->slug, $token]),
        ]);

        $guest->whatsapp_message = $this->generateWhatsAppMessage($invitation, $guest);
        $guest->save();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Tamu berhasil ditambahkan.',
                'guest' => $guest,
                'guests' => $invitation->guests()->latest()->get(),
            ]);
        }

        return back()->with('success', 'Tamu berhasil ditambahkan.');
    }

    public function update(Request $request, Invitation $invitation, InvitationGuest $guest)
    {
        $this->authorize('update', $invitation);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'category' => 'nullable|string',
        ]);

        $validated['invitation_url'] = route('invitation.personalized', [$invitation->slug, $guest->unique_token]);
        $guest->update($validated);

        $guest->whatsapp_message = $this->generateWhatsAppMessage($invitation, $guest);
        $guest->save();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Tamu berhasil diperbarui.',
                'guest' => $guest,
                'guests' => $invitation->guests()->latest()->get(),
            ]);
        }

        return back()->with('success', 'Tamu berhasil diperbarui.');
    }

    public function destroy(Request $request, Invitation $invitation, InvitationGuest $guest)
    {
        $this->authorize('update', $invitation);
        $guest->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Tamu berhasil dihapus.',
                'guests' => $invitation->guests()->latest()->get(),
            ]);
        }

        return back()->with('success', 'Tamu berhasil dihapus.');
    }

    public function share(Invitation $invitation)
    {
        $this->authorize('view', $invitation);

        $guests = $invitation->guests()->latest()->get();

        return view('dashboard.guests.share', compact('invitation', 'guests'));
    }

    public function import(Request $request, Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        $guestLimit = $invitation->getGuestLimit();
        if ($guestLimit !== null && $invitation->guests()->count() >= $guestLimit) {
            $packageLabel = $invitation->getPackageLabel();

            return back()
                ->with('error', "Batas maksimal {$guestLimit} tamu untuk {$packageLabel} telah tercapai. Upgrade paket untuk menambah kuota tamu!")
                ->with('requires_upgrade', true)
                ->with('upgrade_invitation_id', $invitation->id);
        }

        $request->validate([
            'file' => 'required|file|mimes:csv,txt',
        ]);

        $path = $request->file('file')->store('temp');
        $file = Storage::path($path);

        $imported = 0;
        if (($handle = fopen($file, 'r')) !== false) {
            $header = fgetcsv($handle);

            while (($data = fgetcsv($handle)) !== false) {
                if ($guestLimit !== null && $invitation->guests()->count() >= $guestLimit) {
                    break;
                }
                if (count($data) >= 1 && ! empty($data[0])) {
                    $guest = $invitation->guests()->create([
                        'name' => $data[0],
                        'phone' => $data[1] ?? null,
                        'category' => $data[2] ?? null,
                    ]);

                    $guest->invitation_url = route('invitation.personalized', [
                        'invitation' => $invitation->slug,
                        'token' => $guest->unique_token,
                    ]);

                    $guest->whatsapp_message = $this->generateWhatsAppMessage($invitation, $guest);
                    $guest->save();

                    $imported++;
                }
            }
            fclose($handle);
        }

        Storage::delete($path);

        return back()->with('success', "$imported tamu berhasil diimpor.");
    }

    private function generateWhatsAppMessage(Invitation $invitation, InvitationGuest $guest): string
    {
        if (! empty($invitation->whatsapp_template)) {
            $msg = $invitation->whatsapp_template;
            $msg = str_replace('{nama_tamu}', $guest->name, $msg);
            $msg = str_replace('{link_undangan}', $guest->invitation_url, $msg);

            return $msg;
        }

        return "Assalamu'alaikum Warahmatullahi Wabarakatuh / Salam Sejahtera\n\n".
            "Kepada Yth. Bapak/Ibu/Saudara/i\n".
            "*{$guest->name}*\n\n".
            "Tanpa mengurangi rasa hormat, perkenankan kami mengundang Anda untuk hadir dan memberikan doa restu pada momen bahagia pernikahan kami:\n\n".
            "*{$invitation->groom_nickname} & {$invitation->bride_nickname}*\n\n".
            "Untuk informasi jadwal lengkap acara & konfirmasi kehadiran, silakan kunjungi tautan undangan digital kami berikut:\n".
            "{$guest->invitation_url}\n\n".
            "Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir.\n\n".
            "Terima kasih atas doa dan perhatiannya.\n\n".
            "Wassalamu'alaikum Warahmatullahi Wabarakatuh\n\n".
            "Kami yang berbahagia,\n".
            "{$invitation->groom_nickname} & {$invitation->bride_nickname}";
    }
}
