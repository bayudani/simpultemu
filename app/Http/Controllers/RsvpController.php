<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function store(Request $request, $invitation)
    {
        $isDemo = ($invitation === '999999' || (is_numeric($invitation) && (int) $invitation === 999999) || $request->input('is_demo') || $request->header('X-Is-Demo'));

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'attendance' => 'required|in:hadir,tidak_hadir,masih_ragu,ragu',
            'guest_count' => 'required|integer|min:1',
            'message' => 'nullable|string',
            'guest_token' => 'nullable|string',
        ]);

        $attendance = ($validated['attendance'] === 'ragu') ? 'masih_ragu' : $validated['attendance'];

        if ($isDemo) {
            $commentData = ! empty($validated['message']) ? [
                'id' => rand(10000, 99999),
                'name' => $validated['name'],
                'message' => $validated['message'],
                'attendance' => $attendance,
                'time_ago' => 'Baru saja',
                'created_at' => now()->toIso8601String(),
            ] : null;

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'is_demo' => true,
                    'message' => 'Terima kasih atas konfirmasi kehadiran dan doa restu Anda (Mode Demo).',
                    'comment' => $commentData,
                ]);
            }

            return back()->with('success', 'Terima kasih atas konfirmasi kehadiran Anda.');
        }

        if (! $invitation instanceof Invitation) {
            $invitation = is_numeric($invitation)
                ? Invitation::findOrFail($invitation)
                : Invitation::where('slug', $invitation)->firstOrFail();
        }

        $guestId = null;
        if ($request->guest_token) {
            $guest = $invitation->guests()->where('unique_token', $request->guest_token)->first();
            if ($guest) {
                $guestId = $guest->id;
                $guest->update(['rsvp_status' => 'confirmed']);
            }
        }

        $invitation->rsvps()->create([
            'invitation_guest_id' => $guestId,
            'name' => $validated['name'],
            'attendance' => $attendance,
            'guest_count' => $validated['guest_count'],
            'message' => $validated['message'],
        ]);

        $createdComment = null;
        if (! empty($validated['message'])) {
            $createdComment = $invitation->comments()->create([
                'name' => $validated['name'],
                'message' => $validated['message'],
                'status' => 'approved',
            ]);
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'is_demo' => false,
                'message' => 'Terima kasih atas konfirmasi kehadiran dan doa restu Anda.',
                'comment' => $createdComment ? [
                    'id' => $createdComment->id,
                    'name' => $createdComment->name,
                    'message' => $createdComment->message,
                    'attendance' => $attendance,
                    'time_ago' => 'Baru saja',
                    'created_at' => $createdComment->created_at->toIso8601String(),
                ] : null,
            ]);
        }

        return back()->with('success', 'Terima kasih atas konfirmasi kehadiran Anda.');
    }
}
