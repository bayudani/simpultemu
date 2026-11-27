<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\InvitationPhoto;
use App\Services\ImageCompressionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function __construct(public ImageCompressionService $imageCompressor) {}

    public function store(Request $request, Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,jpg,png,webp|max:25600',
            'slot' => 'nullable|string',
        ]);

        $path = $this->imageCompressor->compressAndStoreUploadedFile(
            $request->file('photo'),
            'invitations/'.$invitation->id.'/photos',
            'public',
            1600,
            80,
        );

        $photo = $invitation->photos()->create([
            'path' => $path,
            'slot' => $request->slot,
            'sort_order' => $invitation->photos()->count(),
        ]);

        return response()->json([
            'success' => true,
            'photo' => [
                'id' => $photo->id,
                'url' => asset('storage/'.ltrim($photo->path, '/')),
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
