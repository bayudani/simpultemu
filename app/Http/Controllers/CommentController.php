<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $invitation)
    {
        $isDemo = ($invitation === '999999' || (is_numeric($invitation) && (int) $invitation === 999999) || $request->input('is_demo') || $request->header('X-Is-Demo'));

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($isDemo) {
            $commentData = [
                'id' => rand(10000, 99999),
                'name' => $validated['name'],
                'message' => $validated['message'],
                'time_ago' => 'Baru saja',
                'created_at' => now()->toIso8601String(),
            ];

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'is_demo' => true,
                    'message' => 'Ucapan Anda telah dikirim (Mode Demo).',
                    'comment' => $commentData,
                ]);
            }

            return back()->with('success', 'Ucapan Anda telah dikirim.');
        }

        if (! $invitation instanceof Invitation) {
            $invitation = is_numeric($invitation)
                ? Invitation::findOrFail($invitation)
                : Invitation::where('slug', $invitation)->firstOrFail();
        }

        $comment = $invitation->comments()->create([
            'name' => $validated['name'],
            'message' => $validated['message'],
            'status' => 'approved', // Auto-approve
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'is_demo' => false,
                'message' => 'Ucapan Anda telah dikirim.',
                'comment' => [
                    'id' => $comment->id,
                    'name' => $comment->name,
                    'message' => $comment->message,
                    'time_ago' => 'Baru saja',
                    'created_at' => $comment->created_at->toIso8601String(),
                ],
            ]);
        }

        return back()->with('success', 'Ucapan Anda telah dikirim.');
    }
}
