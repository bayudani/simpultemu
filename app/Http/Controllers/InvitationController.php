<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\InvitationGuest;
use App\Models\Music;
use App\Models\Theme;
use App\Services\ImageCompressionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InvitationController extends Controller
{
    public function __construct(public ImageCompressionService $imageCompressor) {}
    public function index(Request $request)
    {
        $invitations = $request->user()->invitations()->with('theme')->latest()->get();

        return view('dashboard.invitations.index', compact('invitations'));
    }

    public function create(Request $request)
    {
        $themes = Theme::where('is_active', true)->get();
        $music = Music::where('is_active', true)->orderBy('order', 'asc')->get();
        $selectedThemeId = $request->query('theme_id');

        return view('dashboard.invitations.create', compact('themes', 'music', 'selectedThemeId'));
    }

    public function saveDraft(Request $request)
    {
        $userId = $request->user()->id;
        $invitationId = $request->input('invitation_id') ?: $request->input('id');

        $invitation = null;
        if ($invitationId) {
            $invitation = Invitation::where('user_id', $userId)->find($invitationId);
        }

        if (! $invitation) {
            $invitation = new Invitation;
            $invitation->user_id = $userId;
            $invitation->status = 'draft';
        }

        $invitation->theme_id = $request->input('theme_id') ?: ($invitation->theme_id ?: 1);
        $invitation->title = $request->input('title', $invitation->title ?: 'Pernikahan');

        $slug = $request->input('slug');
        if (empty($slug)) {
            $title = $request->input('title');
            $groomNickname = $request->input('groom_nickname');
            $brideNickname = $request->input('bride_nickname');
            if (! empty($title)) {
                $slug = Str::slug($title);
            } elseif (! empty($groomNickname) && ! empty($brideNickname)) {
                $slug = Str::slug($groomNickname.'-'.$brideNickname);
            }
            if (empty($slug)) {
                $slug = $invitation->slug ?: ('undangan-'.Str::random(8));
            }
        } else {
            $slug = Str::slug($slug);
        }

        $baseSlug = $slug ?: ('undangan-'.Str::random(8));
        $finalSlug = $baseSlug;
        $counter = 1;
        while (Invitation::where('slug', $finalSlug)->when($invitation->exists, fn ($q) => $q->where('id', '!=', $invitation->id))->exists()) {
            $finalSlug = $baseSlug.'-'.$counter++;
        }
        $invitation->slug = $finalSlug;

        $invitation->groom_name = $request->input('groom_name', $invitation->groom_name ?: 'Mempelai Pria');
        $invitation->groom_nickname = $request->input('groom_nickname', $invitation->groom_nickname ?: 'Rian');
        $invitation->groom_parents = $request->input('groom_parents', $invitation->groom_parents);
        $invitation->groom_instagram = $request->input('groom_instagram', $invitation->groom_instagram);

        $invitation->bride_name = $request->input('bride_name', $invitation->bride_name ?: 'Mempelai Wanita');
        $invitation->bride_nickname = $request->input('bride_nickname', $invitation->bride_nickname ?: 'Maya');
        $invitation->bride_parents = $request->input('bride_parents', $invitation->bride_parents);
        $invitation->bride_instagram = $request->input('bride_instagram', $invitation->bride_instagram);

        $invitation->event_date = $request->input('event_date') ?: ($invitation->event_date ?: now()->addMonths(1)->format('Y-m-d'));
        $invitation->event_time = $request->input('event_time', $invitation->event_time ?: '09:00');
        $invitation->event_end_time = $request->input('event_end_time', $invitation->event_end_time);
        $invitation->venue = $request->input('venue', $invitation->venue ?: 'Gedung Pertemuan');
        $invitation->address = $request->input('address', $invitation->address);
        $invitation->maps_url = $request->input('maps_url', $invitation->maps_url);

        $invitation->akad_date = $request->input('akad_date', $invitation->akad_date);
        $invitation->akad_time = $request->input('akad_time', $invitation->akad_time);
        $invitation->akad_end_time = $request->input('akad_end_time', $invitation->akad_end_time);
        $invitation->akad_venue = $request->input('akad_venue', $invitation->akad_venue);
        $invitation->akad_address = $request->input('akad_address', $invitation->akad_address);
        $invitation->akad_maps_url = $request->input('akad_maps_url', $invitation->akad_maps_url);

        $invitation->show_quote = $request->has('show_quote');
        $invitation->quran_text = $request->input('quran_text', $invitation->quran_text);
        $invitation->quran_translation = $request->input('quran_translation', $invitation->quran_translation);
        $invitation->quote_source = $request->input('quote_source', $invitation->quote_source);

        $invitation->show_love_story = $request->has('show_love_story');
        if ($request->has('love_stories')) {
            $invitation->love_stories = array_values(array_filter($request->input('love_stories', []), fn ($item) => ! empty($item['year']) || ! empty($item['title'])));
        }

        if ($request->filled('music_id')) {
            $invitation->music_id = $request->input('music_id');
        }

        $invitation->gift_bank_name = $request->input('gift_bank_name', $invitation->gift_bank_name);
        $invitation->gift_account_number = $request->input('gift_account_number', $invitation->gift_account_number);
        $invitation->gift_account_holder = $request->input('gift_account_holder', $invitation->gift_account_holder);
        $invitation->gift_address = $request->input('gift_address', $invitation->gift_address);
        $invitation->gift_recipient_name = $request->input('gift_recipient_name', $invitation->gift_recipient_name);
        $invitation->gift_phone = $request->input('gift_phone', $invitation->gift_phone);
        $invitation->gift_maps_url = $request->input('gift_maps_url', $invitation->gift_maps_url);

        $invitation->closing_title = $request->input('closing_title', $invitation->closing_title);
        $invitation->closing_message = $request->input('closing_message', $invitation->closing_message);
        $invitation->closing_signature = $request->input('closing_signature', $invitation->closing_signature);
        $invitation->whatsapp_template = $request->input('whatsapp_template', $invitation->whatsapp_template);

        $groomPath = $this->handlePhotoUpload($request, 'groom_photo', $invitation->groom_photo);
        if ($groomPath) {
            $invitation->groom_photo = $groomPath;
        }

        $bridePath = $this->handlePhotoUpload($request, 'bride_photo', $invitation->bride_photo);
        if ($bridePath) {
            $invitation->bride_photo = $bridePath;
        }

        $bgPath = $this->handlePhotoUpload($request, 'background_photo', $invitation->background_photo);
        if ($bgPath) {
            $invitation->background_photo = $bgPath;
        }

        $cpPath = $this->handlePhotoUpload($request, 'countdown_photo', $invitation->countdown_photo);
        if ($cpPath) {
            $invitation->countdown_photo = $cpPath;
        }

        $sp1Path = $this->handlePhotoUpload($request, 'story_photo_1', $invitation->story_photo_1);
        if ($sp1Path) {
            $invitation->story_photo_1 = $sp1Path;
        }

        $sp2Path = $this->handlePhotoUpload($request, 'story_photo_2', $invitation->story_photo_2);
        if ($sp2Path) {
            $invitation->story_photo_2 = $sp2Path;
        }

        $sp3Path = $this->handlePhotoUpload($request, 'story_photo_3', $invitation->story_photo_3);
        if ($sp3Path) {
            $invitation->story_photo_3 = $sp3Path;
        }

        $sp4Path = $this->handlePhotoUpload($request, 'story_photo_4', $invitation->story_photo_4);
        if ($sp4Path) {
            $invitation->story_photo_4 = $sp4Path;
        }

        $cohPath = $this->handlePhotoUpload($request, 'custom_ornament_header', $invitation->custom_ornament_header);
        if ($cohPath) {
            $invitation->custom_ornament_header = $cohPath;
        }

        $cosPath = $this->handlePhotoUpload($request, 'custom_ornament_side', $invitation->custom_ornament_side);
        if ($cosPath) {
            $invitation->custom_ornament_side = $cosPath;
        }

        if ($request->hasFile('custom_music') && $request->file('custom_music')->isValid()) {
            $invitation->custom_music_path = $request->file('custom_music')->store('invitations/music', 'public');
        }

        $invitation->status = 'draft';
        $invitation->save();

        $this->handleGalleryPhotosUpload($request, $invitation);

        if ($request->has('guests_json')) {
            $this->syncGuestsFromJson($invitation, $request->input('guests_json'), $request->user());
        }

        if (! empty($invitation->gift_bank_name) && ! empty($invitation->gift_account_number)) {
            $invitation->giftAccounts()->updateOrCreate(
                ['bank_name' => $invitation->gift_bank_name],
                [
                    'account_number' => $invitation->gift_account_number,
                    'account_holder' => $invitation->gift_account_holder ?? ($invitation->groom_nickname.' & '.$invitation->bride_nickname),
                ]
            );
        }

        return response()->json([
            'success' => true,
            'id' => $invitation->id,
            'slug' => $invitation->slug,
            'preview_url' => url('/undangan/preview/'.$invitation->id),
            'groom_photo' => $invitation->groom_photo,
            'bride_photo' => $invitation->bride_photo,
            'groom_photo_url' => $invitation->groom_photo_url,
            'bride_photo_url' => $invitation->bride_photo_url,
            'background_photo_url' => $invitation->background_photo_url,
            'countdown_photo_url' => $invitation->countdown_photo_url,
            'story_photo_1_url' => $invitation->story_photo_1_url,
            'story_photo_2_url' => $invitation->story_photo_2_url,
            'story_photo_3_url' => $invitation->story_photo_3_url,
            'story_photo_4_url' => $invitation->story_photo_4_url,
            'custom_ornament_header_url' => $invitation->custom_ornament_header_url,
            'custom_ornament_side_url' => $invitation->custom_ornament_side_url,
            'message' => 'Draf berhasil disimpan.',
        ]);
    }

    public function store(Request $request)
    {
        if ($request->input('action') === 'draft' || $request->input('action') === 'preview' || $request->ajax()) {
            $defaults = [
                'theme_id' => $request->input('theme_id') ?: 1,
                'groom_name' => $request->input('groom_name') ?: 'Mempelai Pria',
                'groom_nickname' => $request->input('groom_nickname') ?: 'Rian',
                'bride_name' => $request->input('bride_name') ?: 'Mempelai Wanita',
                'bride_nickname' => $request->input('bride_nickname') ?: 'Maya',
                'event_date' => $request->input('event_date') ?: now()->addMonths(1)->format('Y-m-d'),
                'event_time' => $request->input('event_time') ?: '09:00',
                'venue' => $request->input('venue') ?: 'Gedung Pertemuan',
            ];
            $request->merge(array_filter($defaults, fn ($val, $key) => empty($request->input($key)), ARRAY_FILTER_USE_BOTH));
        }

        foreach (['groom_photo', 'bride_photo', 'background_photo', 'countdown_photo', 'story_photo_1', 'story_photo_2', 'story_photo_3', 'story_photo_4', 'custom_ornament_header', 'custom_ornament_side', 'custom_music'] as $fileKey) {
            if (! $request->hasFile($fileKey)) {
                $request->files->remove($fileKey);
                $request->request->remove($fileKey);
            }
        }

        $rules = [
            'theme_id' => 'required|exists:themes,id',
            'title' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'groom_name' => 'required|string|max:255',
            'groom_nickname' => 'required|string|max:255',
            'groom_parents' => 'nullable|string|max:255',
            'groom_instagram' => 'nullable|string|max:255',
            'bride_name' => 'required|string|max:255',
            'bride_nickname' => 'required|string|max:255',
            'bride_parents' => 'nullable|string|max:255',
            'bride_instagram' => 'nullable|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'event_end_time' => 'nullable',
            'venue' => 'required|string',
            'address' => 'nullable|string',
            'maps_url' => 'nullable|url',
            'quran_text' => 'nullable|string',
            'quran_translation' => 'nullable|string',
            'quote_source' => 'nullable|string',
            'show_quote' => 'nullable',
            'show_love_story' => 'nullable',
            'love_stories' => 'nullable|array',
            'akad_date' => 'nullable|date',
            'akad_time' => 'nullable',
            'akad_end_time' => 'nullable',
            'akad_venue' => 'nullable|string',
            'akad_address' => 'nullable|string',
            'akad_maps_url' => 'nullable|url',
            'music_id' => 'nullable|exists:music,id',
            'gift_bank_name' => 'nullable|string|max:255',
            'gift_account_number' => 'nullable|string|max:255',
            'gift_account_holder' => 'nullable|string|max:255',
            'gift_address' => 'nullable|string',
            'gift_recipient_name' => 'nullable|string|max:255',
            'gift_phone' => 'nullable|string|max:50',
            'gift_maps_url' => 'nullable|url',
            'closing_title' => 'nullable|string|max:255',
            'closing_message' => 'nullable|string',
            'closing_signature' => 'nullable|string|max:255',
            'whatsapp_template' => 'nullable|string',
            'guests_json' => 'nullable|string',
            'gallery_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:25600',
            'status' => 'nullable|in:draft,published',
        ];

        if ($request->hasFile('groom_photo')) {
            $rules['groom_photo'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('bride_photo')) {
            $rules['bride_photo'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('background_photo')) {
            $rules['background_photo'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('countdown_photo')) {
            $rules['countdown_photo'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('story_photo_1')) {
            $rules['story_photo_1'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('story_photo_2')) {
            $rules['story_photo_2'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('story_photo_3')) {
            $rules['story_photo_3'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('story_photo_4')) {
            $rules['story_photo_4'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('custom_ornament_header')) {
            $rules['custom_ornament_header'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('custom_ornament_side')) {
            $rules['custom_ornament_side'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('custom_music')) {
            $rules['custom_music'] = 'file|mimes:mp3,wav,ogg,m4a|max:25600';
        }

        $validated = $request->validate($rules, [
            'groom_photo.image' => 'File foto mempelai pria harus berupa gambar.',
            'groom_photo.mimes' => 'Format foto mempelai pria harus jpeg, png, jpg, atau webp.',
            'groom_photo.max' => 'Ukuran foto mempelai pria maksimal 25MB.',
            'bride_photo.image' => 'File foto mempelai wanita harus berupa gambar.',
            'bride_photo.mimes' => 'Format foto mempelai wanita harus jpeg, png, jpg, atau webp.',
            'bride_photo.max' => 'Ukuran foto mempelai wanita maksimal 25MB.',
        ]);

        $invitation = null;
        if ($request->filled('invitation_id')) {
            $invitation = Invitation::where('user_id', $request->user()->id)->find($request->input('invitation_id'));
        }

        $theme = Theme::findOrFail($validated['theme_id']);
        $hasPremiumAccess = $request->user()->hasLifetimePremium() || ($invitation && $invitation->is_premium);
        $needsPremiumUpgrade = $theme->isPremium() && ! $hasPremiumAccess;

        // Penanganan Foto Mempelai Pria (Groom)
        $groomPath = $this->handlePhotoUpload($request, 'groom_photo', $invitation?->groom_photo);
        if ($groomPath) {
            $validated['groom_photo'] = $groomPath;
        } elseif ($invitation && $invitation->groom_photo) {
            $validated['groom_photo'] = $invitation->groom_photo;
        } else {
            unset($validated['groom_photo']);
        }

        // Penanganan Foto Mempelai Wanita (Bride)
        $bridePath = $this->handlePhotoUpload($request, 'bride_photo', $invitation?->bride_photo);
        if ($bridePath) {
            $validated['bride_photo'] = $bridePath;
        } elseif ($invitation && $invitation->bride_photo) {
            $validated['bride_photo'] = $invitation->bride_photo;
        } else {
            unset($validated['bride_photo']);
        }

        // Penanganan Foto Latar Belakang (Background / Cover)
        $bgPath = $this->handlePhotoUpload($request, 'background_photo', $invitation?->background_photo);
        if ($bgPath) {
            $validated['background_photo'] = $bgPath;
        } elseif ($invitation && $invitation->background_photo) {
            $validated['background_photo'] = $invitation->background_photo;
        } else {
            unset($validated['background_photo']);
        }

        // Penanganan Foto Countdown & Ayat
        $cpPath = $this->handlePhotoUpload($request, 'countdown_photo', $invitation?->countdown_photo);
        if ($cpPath) {
            $validated['countdown_photo'] = $cpPath;
        } elseif ($invitation && $invitation->countdown_photo) {
            $validated['countdown_photo'] = $invitation->countdown_photo;
        } else {
            unset($validated['countdown_photo']);
        }

        // Penanganan Foto Love Story 1 & 2
        $sp1Path = $this->handlePhotoUpload($request, 'story_photo_1', $invitation?->story_photo_1);
        if ($sp1Path) {
            $validated['story_photo_1'] = $sp1Path;
        } elseif ($invitation && $invitation->story_photo_1) {
            $validated['story_photo_1'] = $invitation->story_photo_1;
        } else {
            unset($validated['story_photo_1']);
        }

        $sp2Path = $this->handlePhotoUpload($request, 'story_photo_2', $invitation?->story_photo_2);
        if ($sp2Path) {
            $validated['story_photo_2'] = $sp2Path;
        } elseif ($invitation && $invitation->story_photo_2) {
            $validated['story_photo_2'] = $invitation->story_photo_2;
        } else {
            unset($validated['story_photo_2']);
        }

        $sp3Path = $this->handlePhotoUpload($request, 'story_photo_3', $invitation?->story_photo_3);
        if ($sp3Path) {
            $validated['story_photo_3'] = $sp3Path;
        } elseif ($invitation && $invitation->story_photo_3) {
            $validated['story_photo_3'] = $invitation->story_photo_3;
        } else {
            unset($validated['story_photo_3']);
        }

        $sp4Path = $this->handlePhotoUpload($request, 'story_photo_4', $invitation?->story_photo_4);
        if ($sp4Path) {
            $validated['story_photo_4'] = $sp4Path;
        } elseif ($invitation && $invitation->story_photo_4) {
            $validated['story_photo_4'] = $invitation->story_photo_4;
        } else {
            unset($validated['story_photo_4']);
        }

        $cohPath = $this->handlePhotoUpload($request, 'custom_ornament_header', $invitation?->custom_ornament_header);
        if ($cohPath) {
            $validated['custom_ornament_header'] = $cohPath;
        } elseif ($invitation && $invitation->custom_ornament_header) {
            $validated['custom_ornament_header'] = $invitation->custom_ornament_header;
        } else {
            unset($validated['custom_ornament_header']);
        }

        $cosPath = $this->handlePhotoUpload($request, 'custom_ornament_side', $invitation?->custom_ornament_side);
        if ($cosPath) {
            $validated['custom_ornament_side'] = $cosPath;
        } elseif ($invitation && $invitation->custom_ornament_side) {
            $validated['custom_ornament_side'] = $invitation->custom_ornament_side;
        } else {
            unset($validated['custom_ornament_side']);
        }

        if ($request->hasFile('custom_music')) {
            $file = $request->file('custom_music');
            if ($file->isValid()) {
                $validated['custom_music_path'] = $file->store('invitations/music', 'public');
            }
        }

        $validated['show_quote'] = $request->has('show_quote');
        $validated['show_love_story'] = $request->has('show_love_story');
        if ($request->has('love_stories')) {
            $validated['love_stories'] = array_values(array_filter($request->input('love_stories', []), fn ($item) => ! empty($item['year']) || ! empty($item['title'])));
        }
        $validated['show_love_story'] = $request->has('show_love_story');
        if ($request->has('love_stories')) {
            $validated['love_stories'] = array_values(array_filter($request->input('love_stories', []), fn ($item) => ! empty($item['year']) || ! empty($item['title'])));
        }
        $validated['user_id'] = $request->user()->id;

        $slug = $request->input('slug');
        if (empty($slug)) {
            $title = $request->input('title');
            $groomNickname = $request->input('groom_nickname');
            $brideNickname = $request->input('bride_nickname');
            if (! empty($title)) {
                $slug = Str::slug($title);
            } elseif (! empty($groomNickname) && ! empty($brideNickname)) {
                $slug = Str::slug($groomNickname.'-'.$brideNickname);
            }
            if (empty($slug)) {
                $slug = 'undangan-'.Str::random(8);
            }
        } else {
            $slug = Str::slug($slug);
        }

        $originalSlug = $slug ?: ('undangan-'.Str::random(8));
        $finalSlug = $originalSlug;
        $counter = 1;
        while (Invitation::where('slug', $finalSlug)->exists()) {
            $finalSlug = $originalSlug.'-'.$counter++;
        }
        $validated['slug'] = $finalSlug;

        if ($theme->isPremium()) {
            if ($hasPremiumAccess) {
                $validated['is_premium'] = true;
                $validated['package_tier'] = 'premium';
            } else {
                $validated['is_premium'] = false;
                $validated['package_tier'] = 'basic';
            }
        } else {
            if ($invitation && $invitation->is_premium) {
                $validated['is_premium'] = true;
                $validated['package_tier'] = 'premium';
            } else {
                $validated['is_premium'] = false;
                $userTier = $request->user()->getPackageTier();
                $validated['package_tier'] = ($userTier !== 'premium') ? $userTier : 'basic';
            }
        }

        // Action check (publish or draft)
        if (($request->input('action') === 'publish' || $request->input('status') === 'published') && ! $needsPremiumUpgrade) {
            $validated['status'] = 'published';
            $validated['published_at'] = now();
        } else {
            $validated['status'] = 'draft';
        }

        if (! $invitation && $request->filled('invitation_id')) {
            $invitation = Invitation::where('user_id', $request->user()->id)->find($request->input('invitation_id'));
        }

        if ($invitation) {
            $invitation->update($validated);
        } else {
            $invitation = Invitation::create($validated);
        }

        if (! empty($validated['gift_bank_name']) && ! empty($validated['gift_account_number'])) {
            $invitation->giftAccounts()->create([
                'bank_name' => $validated['gift_bank_name'],
                'account_number' => $validated['gift_account_number'],
                'account_holder' => $validated['gift_account_holder'] ?? ($invitation->groom_nickname.' & '.$invitation->bride_nickname),
            ]);
        }

        $this->handleGalleryPhotosUpload($request, $invitation);

        if ($request->filled('guests_json')) {
            $guestsData = json_decode($request->input('guests_json'), true);
            if (is_array($guestsData)) {
                $guestLimit = $invitation->getGuestLimit() ?? ($request->user()?->hasLifetimePremium() ? null : 5);
                $currentCount = $invitation->guests()->count();
                foreach ($guestsData as $g) {
                    if ($guestLimit !== null && $currentCount >= $guestLimit) {
                        break;
                    }
                    $gName = is_array($g) ? trim($g['name'] ?? '') : trim($g);
                    $gPhone = is_array($g) ? trim($g['phone'] ?? '') : null;
                    if (! empty($gName)) {
                        $token = strtoupper(Str::random(8));
                        $invitationUrl = route('invitation.show', $invitation->slug).'?to='.urlencode($gName);
                        $invitation->guests()->create([
                            'name' => $gName,
                            'phone' => $gPhone,
                            'unique_token' => $token,
                            'invitation_url' => $invitationUrl,
                        ]);
                        $currentCount++;
                    }
                }
            }
        }

        $msg = $invitation->isPublished() ? 'Undangan berhasil dipublikasikan!' : 'Draf undangan berhasil disimpan.';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'id' => $invitation->id,
                'slug' => $invitation->slug,
                'preview_url' => url('/undangan/preview/'.$invitation->id),
                'edit_url' => route('dashboard.invitations.edit', $invitation),
                'groom_photo' => $invitation->groom_photo,
                'bride_photo' => $invitation->bride_photo,
                'groom_photo_url' => $invitation->groom_photo_url,
                'bride_photo_url' => $invitation->bride_photo_url,
                'background_photo_url' => $invitation->background_photo_url,
                'countdown_photo_url' => $invitation->countdown_photo_url,
                'story_photo_1_url' => $invitation->story_photo_1_url,
                'story_photo_2_url' => $invitation->story_photo_2_url,
                'story_photo_3_url' => $invitation->story_photo_3_url,
                'story_photo_4_url' => $invitation->story_photo_4_url,
                'message' => 'Draf pratinjau berhasil disimpan.',
            ]);
        }

        if ($request->input('action') === 'preview') {
            return redirect()->route('dashboard.invitations.preview', $invitation);
        }

        if ($needsPremiumUpgrade) {
            return redirect()
                ->route('dashboard.invitations.edit', $invitation)
                ->with('show_upgrade_modal', true)
                ->with('upgrade_invitation_id', $invitation->id)
                ->with('info', 'Undangan bertema Premium berhasil disimpan sebagai draf! Silakan selesaikan pembayaran Duitku (Rp 59.000) untuk mempublikasikannya.');
        }

        $redirect = redirect()->route('dashboard.invitations.edit', $invitation)->with('success', $msg);
        if ($invitation->isPublished()) {
            $redirect->with('published_url', route('invitation.show', $invitation->slug));
        }

        return $redirect;
    }

    public function edit(Request $request, Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        $themes = Theme::where('is_active', true)->get();
        $music = Music::where('is_active', true)->orderBy('order', 'asc')->get();
        $invitation->load(['photos', 'theme', 'music', 'guests', 'giftAccounts']);
        $selectedThemeId = $request->query('theme_id') ?: $invitation->theme_id;

        return view('dashboard.invitations.create', compact('invitation', 'themes', 'music', 'selectedThemeId'));
    }

    public function update(Request $request, Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        if ($request->input('action') === 'draft' || $request->input('action') === 'preview' || $request->ajax()) {
            $defaults = [
                'theme_id' => $request->input('theme_id') ?: ($invitation->theme_id ?: 1),
                'groom_name' => $request->input('groom_name') ?: ($invitation->groom_name ?: 'Mempelai Pria'),
                'groom_nickname' => $request->input('groom_nickname') ?: ($invitation->groom_nickname ?: 'Rian'),
                'bride_name' => $request->input('bride_name') ?: ($invitation->bride_name ?: 'Mempelai Wanita'),
                'bride_nickname' => $request->input('bride_nickname') ?: ($invitation->bride_nickname ?: 'Maya'),
                'event_date' => $request->input('event_date') ?: ($invitation->event_date ? $invitation->event_date->format('Y-m-d') : now()->addMonths(1)->format('Y-m-d')),
                'event_time' => $request->input('event_time') ?: ($invitation->event_time ?: '09:00'),
                'venue' => $request->input('venue') ?: ($invitation->venue ?: 'Gedung Pertemuan'),
            ];
            $request->merge(array_filter($defaults, fn ($val, $key) => empty($request->input($key)), ARRAY_FILTER_USE_BOTH));
        }

        foreach (['groom_photo', 'bride_photo', 'background_photo', 'countdown_photo', 'story_photo_1', 'story_photo_2', 'story_photo_3', 'story_photo_4', 'custom_ornament_header', 'custom_ornament_side', 'custom_music'] as $fileKey) {
            if (! $request->hasFile($fileKey)) {
                $request->files->remove($fileKey);
                $request->request->remove($fileKey);
            }
        }

        $rules = [
            'theme_id' => 'required|exists:themes,id',
            'title' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
            'groom_name' => 'required|string|max:255',
            'groom_nickname' => 'required|string|max:255',
            'groom_parents' => 'nullable|string|max:255',
            'groom_instagram' => 'nullable|string|max:255',
            'bride_name' => 'required|string|max:255',
            'bride_nickname' => 'required|string|max:255',
            'bride_parents' => 'nullable|string|max:255',
            'bride_instagram' => 'nullable|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'event_end_time' => 'nullable',
            'venue' => 'required|string',
            'address' => 'nullable|string',
            'maps_url' => 'nullable|url',
            'quran_text' => 'nullable|string',
            'quran_translation' => 'nullable|string',
            'quote_source' => 'nullable|string',
            'show_quote' => 'nullable',
            'show_love_story' => 'nullable',
            'love_stories' => 'nullable|array',
            'akad_date' => 'nullable|date',
            'akad_time' => 'nullable',
            'akad_end_time' => 'nullable',
            'akad_venue' => 'nullable|string',
            'akad_address' => 'nullable|string',
            'akad_maps_url' => 'nullable|url',
            'music_id' => 'nullable|exists:music,id',
            'gift_bank_name' => 'nullable|string|max:255',
            'gift_account_number' => 'nullable|string|max:255',
            'gift_account_holder' => 'nullable|string|max:255',
            'gift_address' => 'nullable|string',
            'gift_recipient_name' => 'nullable|string|max:255',
            'gift_phone' => 'nullable|string|max:50',
            'gift_maps_url' => 'nullable|url',
            'closing_title' => 'nullable|string|max:255',
            'closing_message' => 'nullable|string',
            'closing_signature' => 'nullable|string|max:255',
            'whatsapp_template' => 'nullable|string',
            'guests_json' => 'nullable|string',
            'gallery_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:25600',
            'status' => 'nullable|in:draft,published',
        ];

        if ($request->hasFile('groom_photo')) {
            $rules['groom_photo'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('bride_photo')) {
            $rules['bride_photo'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('background_photo')) {
            $rules['background_photo'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('countdown_photo')) {
            $rules['countdown_photo'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('story_photo_1')) {
            $rules['story_photo_1'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('story_photo_2')) {
            $rules['story_photo_2'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('story_photo_3')) {
            $rules['story_photo_3'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('story_photo_4')) {
            $rules['story_photo_4'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('custom_ornament_header')) {
            $rules['custom_ornament_header'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('custom_ornament_side')) {
            $rules['custom_ornament_side'] = 'image|mimes:jpeg,png,jpg,webp|max:25600';
        }
        if ($request->hasFile('custom_music')) {
            $rules['custom_music'] = 'file|mimes:mp3,wav,ogg,m4a|max:25600';
        }

        $validated = $request->validate($rules, [
            'groom_photo.image' => 'File foto mempelai pria harus berupa gambar.',
            'groom_photo.mimes' => 'Format foto mempelai pria harus jpeg, png, jpg, atau webp.',
            'groom_photo.max' => 'Ukuran foto mempelai pria maksimal 25MB.',
            'bride_photo.image' => 'File foto mempelai wanita harus berupa gambar.',
            'bride_photo.mimes' => 'Format foto mempelai wanita harus jpeg, png, jpg, atau webp.',
            'bride_photo.max' => 'Ukuran foto mempelai wanita maksimal 25MB.',
        ]);

        // Penanganan Foto Mempelai Pria (Groom)
        $groomPath = $this->handlePhotoUpload($request, 'groom_photo', $invitation->groom_photo);
        if ($groomPath) {
            $invitation->groom_photo = $groomPath;
            $validated['groom_photo'] = $groomPath;
        }

        // Penanganan Foto Mempelai Wanita (Bride)
        $bridePath = $this->handlePhotoUpload($request, 'bride_photo', $invitation->bride_photo);
        if ($bridePath) {
            $invitation->bride_photo = $bridePath;
            $validated['bride_photo'] = $bridePath;
        }

        // Penanganan Foto Latar Belakang (Background / Cover)
        $bgPath = $this->handlePhotoUpload($request, 'background_photo', $invitation->background_photo);
        if ($bgPath) {
            $invitation->background_photo = $bgPath;
            $validated['background_photo'] = $bgPath;
        }

        // Penanganan Foto Countdown & Ayat
        $cpPath = $this->handlePhotoUpload($request, 'countdown_photo', $invitation->countdown_photo);
        if ($cpPath) {
            $invitation->countdown_photo = $cpPath;
            $validated['countdown_photo'] = $cpPath;
        }

        // Penanganan Foto Love Story 1 & 2
        $sp1Path = $this->handlePhotoUpload($request, 'story_photo_1', $invitation->story_photo_1);
        if ($sp1Path) {
            $invitation->story_photo_1 = $sp1Path;
            $validated['story_photo_1'] = $sp1Path;
        }

        $sp2Path = $this->handlePhotoUpload($request, 'story_photo_2', $invitation->story_photo_2);
        if ($sp2Path) {
            $invitation->story_photo_2 = $sp2Path;
            $validated['story_photo_2'] = $sp2Path;
        }

        $sp3Path = $this->handlePhotoUpload($request, 'story_photo_3', $invitation->story_photo_3);
        if ($sp3Path) {
            $invitation->story_photo_3 = $sp3Path;
            $validated['story_photo_3'] = $sp3Path;
        }

        $sp4Path = $this->handlePhotoUpload($request, 'story_photo_4', $invitation->story_photo_4);
        if ($sp4Path) {
            $invitation->story_photo_4 = $sp4Path;
            $validated['story_photo_4'] = $sp4Path;
        }

        $cohPath = $this->handlePhotoUpload($request, 'custom_ornament_header', $invitation->custom_ornament_header);
        if ($cohPath) {
            $invitation->custom_ornament_header = $cohPath;
            $validated['custom_ornament_header'] = $cohPath;
        }

        $cosPath = $this->handlePhotoUpload($request, 'custom_ornament_side', $invitation->custom_ornament_side);
        if ($cosPath) {
            $invitation->custom_ornament_side = $cosPath;
            $validated['custom_ornament_side'] = $cosPath;
        }
        $invitation->save();

        if ($request->hasFile('custom_music')) {
            $file = $request->file('custom_music');
            if ($file->isValid()) {
                $validated['custom_music_path'] = $file->store('invitations/music', 'public');
            }
        }

        $validated['show_quote'] = $request->has('show_quote');
        $validated['show_love_story'] = $request->has('show_love_story');
        if ($request->has('love_stories')) {
            $validated['love_stories'] = array_values(array_filter($request->input('love_stories', []), fn ($item) => ! empty($item['year']) || ! empty($item['title'])));
        }

        $slug = $request->input('slug');
        if (empty($slug)) {
            // Pertahankan slug lama jika sudah ada, atau buat slug unik baru
            $slug = $invitation->slug ?: ('undangan-'.Str::random(8));
        } else {
            $targetSlug = Str::slug($slug);
            if ($targetSlug !== $invitation->slug) {
                $counter = 1;
                $finalSlug = $targetSlug;
                while (Invitation::where('slug', $finalSlug)->where('id', '!=', $invitation->id)->exists()) {
                    $finalSlug = $targetSlug.'-'.$counter++;
                }
                $slug = $finalSlug;
            } else {
                $slug = $invitation->slug;
            }
        }
        $invitation->slug = $slug;
        $validated['slug'] = $slug;

        $targetThemeId = $validated['theme_id'] ?? $invitation->theme_id;
        $theme = Theme::find($targetThemeId);
        $hasPremiumAccess = $request->user()->hasLifetimePremium() || $invitation->is_premium;
        $needsPremiumUpgrade = $theme && $theme->isPremium() && ! $hasPremiumAccess;

        if ($theme && $theme->isPremium()) {
            if ($hasPremiumAccess) {
                $validated['is_premium'] = true;
                $validated['package_tier'] = 'premium';
            } else {
                $validated['is_premium'] = false;
                $validated['package_tier'] = 'basic';
            }
        }

        // Action check
        if ($request->input('action') === 'publish') {
            if ($needsPremiumUpgrade) {
                $validated['status'] = 'draft';
            } else {
                $validated['status'] = 'published';
                if (! $invitation->published_at) {
                    $validated['published_at'] = now();
                }
            }
        } elseif ($request->input('action') === 'draft') {
            if (! $invitation->isPublished()) {
                $validated['status'] = 'draft';
            }
        } elseif ($request->input('action') === 'preview') {
            // Preserve existing status for preview
        }

        $invitation->update($validated);

        if (! empty($validated['gift_bank_name']) && ! empty($validated['gift_account_number'])) {
            $invitation->giftAccounts()->updateOrCreate(
                ['bank_name' => $validated['gift_bank_name']],
                [
                    'account_number' => $validated['gift_account_number'],
                    'account_holder' => $validated['gift_account_holder'] ?? ($invitation->groom_nickname.' & '.$invitation->bride_nickname),
                ]
            );
        }

        $this->handleGalleryPhotosUpload($request, $invitation);

        if ($request->has('guests_json')) {
            $this->syncGuestsFromJson($invitation, $request->input('guests_json'), $request->user());
        }

        $msg = ($invitation->status === 'published')
            ? ($request->input('action') === 'publish' ? 'Undangan berhasil dipublikasikan! Undangan Anda kini aktif dan dapat diakses publik.' : 'Perubahan undangan berhasil disimpan.')
            : 'Perubahan draf undangan berhasil disimpan.';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'id' => $invitation->id,
                'slug' => $invitation->slug,
                'preview_url' => url('/undangan/preview/'.$invitation->id),
                'groom_photo' => $invitation->groom_photo,
                'bride_photo' => $invitation->bride_photo,
                'groom_photo_url' => $invitation->groom_photo_url,
                'bride_photo_url' => $invitation->bride_photo_url,
                'background_photo_url' => $invitation->background_photo_url,
                'countdown_photo_url' => $invitation->countdown_photo_url,
                'story_photo_1_url' => $invitation->story_photo_1_url,
                'story_photo_2_url' => $invitation->story_photo_2_url,
                'story_photo_3_url' => $invitation->story_photo_3_url,
                'story_photo_4_url' => $invitation->story_photo_4_url,
                'message' => $msg,
            ]);
        }

        if ($request->input('action') === 'preview') {
            return redirect()->route('dashboard.invitations.preview', $invitation);
        }

        if ($needsPremiumUpgrade && $request->input('action') === 'publish') {
            return redirect()
                ->route('dashboard.invitations.edit', $invitation)
                ->with('show_upgrade_modal', true)
                ->with('upgrade_invitation_id', $invitation->id)
                ->with('info', 'Undangan bertema Premium berhasil disimpan sebagai draf! Silakan selesaikan pembayaran Duitku (Rp 59.000) untuk mempublikasikannya.');
        }

        $redirect = back()->with('success', $msg);
        if ($invitation->isPublished()) {
            $redirect->with('published_url', route('invitation.show', $invitation->slug));
        }

        return $redirect;
    }

    public function destroy(Request $request, $id)
    {
        $invitation = Invitation::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Hapus file foto terkait dari storage jika ada
        if ($invitation->groom_photo) {
            Storage::disk('public')->delete($invitation->groom_photo);
        }
        if ($invitation->bride_photo) {
            Storage::disk('public')->delete($invitation->bride_photo);
        }
        if ($invitation->background_photo) {
            Storage::disk('public')->delete($invitation->background_photo);
        }
        if ($invitation->countdown_photo) {
            Storage::disk('public')->delete($invitation->countdown_photo);
        }
        if ($invitation->story_photo_1) {
            Storage::disk('public')->delete($invitation->story_photo_1);
        }
        if ($invitation->story_photo_2) {
            Storage::disk('public')->delete($invitation->story_photo_2);
        }
        if ($invitation->story_photo_3) {
            Storage::disk('public')->delete($invitation->story_photo_3);
        }
        if ($invitation->story_photo_4) {
            Storage::disk('public')->delete($invitation->story_photo_4);
        }
        if ($invitation->custom_ornament_header) {
            Storage::disk('public')->delete($invitation->custom_ornament_header);
        }
        if ($invitation->custom_ornament_side) {
            Storage::disk('public')->delete($invitation->custom_ornament_side);
        }
        if ($invitation->custom_music_path) {
            Storage::disk('public')->delete($invitation->custom_music_path);
        }

        // Hapus file foto gallery jika ada
        if ($invitation->photos()->exists()) {
            foreach ($invitation->photos as $photo) {
                if ($photo->path) {
                    Storage::disk('public')->delete($photo->path);
                }
            }
            $invitation->photos()->delete();
        }

        // Hapus data relasi terkait (guests, rsvp, ucapan/wishes, giftAccounts)
        $invitation->guests()->delete();
        $invitation->rsvps()->delete();
        $invitation->comments()->delete();
        $invitation->giftAccounts()->delete();

        // Hapus undangan
        $invitation->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Undangan berhasil dihapus',
            ]);
        }

        return redirect()->route('dashboard.invitations.index')->with('success', 'Undangan berhasil dihapus');
    }

    public function preview($invitation)
    {
        if (! $invitation instanceof Invitation) {
            $invitation = is_numeric($invitation)
                ? Invitation::findOrFail($invitation)
                : Invitation::where('slug', $invitation)->firstOrFail();
        }

        if (auth()->check()) {
            $this->authorize('view', $invitation);
        } elseif (! $invitation->isPublished()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk melihat pratinjau draf undangan.');
        }

        $invitation->load(['theme', 'photos', 'music', 'giftAccounts', 'comments' => function ($q) {
            $q->where('status', 'approved')->latest();
        }]);

        $guest = (object) [
            'name' => request('to', 'Bapak / Ibu / Saudara / i'),
            'unique_token' => 'preview-token',
        ];

        return view('invitations.show', compact('invitation', 'guest'));
    }

    public function publish(Invitation $invitation)
    {
        $this->authorize('update', $invitation);

        $invitation->update([
            'status' => 'published',
            'published_at' => now(),
        ]);

        if (request()->wantsJson() || request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Undangan berhasil dipublikasikan! Tautan kini dapat diakses oleh semua tamu.',
                'status' => 'published',
            ]);
        }

        return back()->with('success', 'Undangan berhasil dipublikasikan.');
    }

    public function show(Invitation $invitation)
    {
        if (! $invitation->isPublished()) {
            if (auth()->check() && (auth()->id() === $invitation->user_id || auth()->user()->isAdmin())) {
                // Allow authorized draft preview by owner/admin
            } else {
                abort(404);
            }
        }

        $invitation->load(['theme', 'photos', 'music', 'giftAccounts', 'comments' => function ($q) {
            $q->where('status', 'approved')->latest();
        }]);

        $themeSlug = $invitation->theme?->slug ?? '';

        if (($themeSlug && view()->exists('invitations.themes.'.$themeSlug)) || view()->exists('invitations.show')) {
            return view('invitations.show', compact('invitation'));
        }

        if ($themeSlug && view()->exists('themes.'.$themeSlug.'.invitation')) {
            return view('themes.'.$themeSlug.'.invitation', compact('invitation'));
        }

        abort(500, 'Theme template not found');
    }

    public function showPersonalized(Invitation $invitation, $token)
    {
        if (! $invitation->isPublished()) {
            if (auth()->check() && (auth()->id() === $invitation->user_id || auth()->user()->isAdmin())) {
                // Allow authorized draft test by owner/admin
            } else {
                abort(404);
            }
        }

        $guest = InvitationGuest::where('invitation_id', $invitation->id)
            ->where('unique_token', $token)
            ->firstOrFail();

        $guest->markAsOpened();

        $invitation->load(['theme', 'photos', 'music', 'giftAccounts', 'comments' => function ($q) {
            $q->where('status', 'approved')->latest();
        }]);

        $guestName = $guest->name;
        $themeSlug = $invitation->theme?->slug ?? '';

        if (($themeSlug && view()->exists('invitations.themes.'.$themeSlug)) || view()->exists('invitations.show')) {
            return view('invitations.show', compact('invitation', 'guest', 'guestName'));
        }

        if ($themeSlug && view()->exists('themes.'.$themeSlug.'.invitation')) {
            return view('themes.'.$themeSlug.'.invitation', compact('invitation', 'guest', 'guestName'));
        }

        abort(500, 'Theme template not found');
    }

    private function syncGuestsFromJson(Invitation $invitation, ?string $guestsJson, ?object $user = null): void
    {
        $guestsData = json_decode((string) $guestsJson, true);
        if (! is_array($guestsData)) {
            return;
        }

        $guestLimit = $invitation->getGuestLimit() ?? ($user?->hasLifetimePremium() ? null : 5);
        $keptIds = [];
        $count = 0;

        foreach ($guestsData as $g) {
            if ($guestLimit !== null && $count >= $guestLimit) {
                break;
            }
            $gId = is_array($g) ? ($g['id'] ?? null) : null;
            $gName = is_array($g) ? trim($g['name'] ?? '') : trim($g);
            $gPhone = is_array($g) ? trim($g['phone'] ?? '') : null;

            if (! empty($gName)) {
                $token = is_array($g) && ! empty($g['token']) ? $g['token'] : strtoupper(Str::random(8));
                $invitationUrl = route('invitation.show', $invitation->slug).'?to='.urlencode($gName);

                if ($gId && $existing = $invitation->guests()->find($gId)) {
                    $existing->update([
                        'name' => $gName,
                        'phone' => $gPhone,
                        'invitation_url' => $invitationUrl,
                    ]);
                    $keptIds[] = $existing->id;
                    $count++;
                } else {
                    $newGuest = $invitation->guests()->create([
                        'name' => $gName,
                        'phone' => $gPhone,
                        'unique_token' => $token,
                        'invitation_url' => $invitationUrl,
                    ]);
                    $keptIds[] = $newGuest->id;
                    $count++;
                }
            }
        }

        if (count($keptIds) > 0) {
            $invitation->guests()->whereNotIn('id', $keptIds)->delete();
        } elseif (count($guestsData) === 0) {
            $invitation->guests()->delete();
        }
    }

    private function handleGalleryPhotosUpload(Request $request, Invitation $invitation): void
    {
        if (! $request->hasFile('gallery_photos')) {
            return;
        }

        $baseSortOrder = $invitation->photos()->count();
        foreach ($request->file('gallery_photos') as $idx => $photoFile) {
            if ($photoFile && $photoFile->isValid()) {
                $path = $this->imageCompressor->compressAndStoreUploadedFile(
                    $photoFile,
                    'invitations/'.$invitation->id.'/photos',
                    'public',
                    1600,
                    80,
                );
                $invitation->photos()->create([
                    'path' => $path,
                    'sort_order' => $baseSortOrder + $idx,
                ]);
            }
        }
    }

    private function handlePhotoUpload(Request $request, string $fileKey, ?string $existingPath = null): ?string
    {
        $maxDimension = match ($fileKey) {
            'groom_photo', 'bride_photo' => 900,
            'custom_ornament_header', 'custom_ornament_side' => 1200,
            default => 1600,
        };
        $preserveAlpha = str_starts_with($fileKey, 'custom_ornament_');

        if ($request->hasFile($fileKey) && $request->file($fileKey)->isValid()) {
            return $this->imageCompressor->compressAndStoreUploadedFile(
                $request->file($fileKey),
                'invitations/photos',
                'public',
                $maxDimension,
                80,
                $preserveAlpha,
            );
        }

        $base64Key = $fileKey.'_base64';
        if ($request->filled($base64Key) && Str::startsWith($request->input($base64Key), 'data:image/')) {
            $compressedPath = $this->imageCompressor->compressAndStoreBase64(
                $request->input($base64Key),
                'invitations/photos',
                'public',
                $maxDimension,
                80,
                $preserveAlpha,
            );
            if ($compressedPath !== null) {
                return $compressedPath;
            }
        }

        return $existingPath;
    }
}
