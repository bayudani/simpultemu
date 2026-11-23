<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Rsvp;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $recentInvitations = $user->invitations()->with('theme')->latest()->limit(5)->get();
        $invitationIds = $user->invitations()->pluck('id');

        $stats = [
            'total_invitations' => $user->invitations()->count(),
            'published' => $user->invitations()->where('status', 'published')->count(),
            'total_rsvps' => Rsvp::whereIn('invitation_id', $invitationIds)->count(),
            'total_comments' => Comment::whereIn('invitation_id', $invitationIds)->count(),
            'total_guests' => 0,
        ];

        return view('dashboard.index', compact('recentInvitations', 'stats'));
    }

    public function messages(Request $request)
    {
        $user = $request->user();
        $invitationIds = $user->invitations()->pluck('id');

        $rsvps = Rsvp::whereIn('invitation_id', $invitationIds)
            ->with('invitation')
            ->latest()
            ->paginate(15, ['*'], 'rsvps_page');

        $comments = Comment::whereIn('invitation_id', $invitationIds)
            ->with('invitation')
            ->latest()
            ->paginate(15, ['*'], 'comments_page');

        return view('dashboard.messages', compact('rsvps', 'comments'));
    }
}
