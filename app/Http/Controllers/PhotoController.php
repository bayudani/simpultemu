<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\InvitationPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function store(Request $request, Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,jpg,png,webp|max:25600',
            'slot' => 'nullable|string',
        ]);

        $path = $request->file('photo')->store('invitations/'.$invitation->id.'/photos', 'public');

        $photo = $invitation->photos()->create([
            'path' => $path,
            'slot' => $request->slot,
            'sort_order' => $invitation->photos()->count(),
        ]);

        return response()->json([
            'success' => true,
            'photo' => [
                'id' => $photo->id,
                'url' => Storage::url($photo->path),
                'slot' => $photo->slot,
            ],
        ]);
    }

    public function destroy(Invitation $invitation, InvitationPhoto $photo)
    {
        $this->authorize('update', $invitation);

        Storage::disk('public')->delete($photo->path);
        $photo->delete();

        return response()->json(['success' => true]);
    }

    public function reorder(Request $request, Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        $request->validate([
            'photos' => 'required|array',
            'photos.*.id' => 'required|exists:invitation_photos,id',
            'photos.*.sort_order' => 'required|integer',
        ]);

        foreach ($request->photos as $photoData) {
            InvitationPhoto::where('id', $photoData['id'])
                ->where('invitation_id', $invitation->id)
                ->update(['sort_order' => $photoData['sort_order']]);
        }

        return response()->json(['success' => true]);
    }
}
