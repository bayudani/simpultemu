<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Invitation;
use App\Models\Music;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Dashboard ringkasan metrik admin.
     */
    public function index(): View
    {
        $totalUsers = User::count();
        $totalInvitations = Invitation::count();
        $activeThemes = Theme::where('is_active', true)->count();
        $totalComments = Comment::count();
        $totalMusic = Music::count();

        $recentUsers = User::latest()->take(5)->get();
        $recentInvitations = Invitation::with(['user', 'theme'])->latest()->take(5)->get();
        $recentComments = Comment::with('invitation')->latest()->take(5)->get();

        return view('admin.index', compact(
            'totalUsers',
            'totalInvitations',
            'activeThemes',
            'totalComments',
            'totalMusic',
            'recentUsers',
            'recentInvitations',
            'recentComments'
        ));
    }

    /**
     * Manajemen seluruh pengguna.
     */
    public function users(Request $request): View
    {
        $query = User::withCount('invitations');

        if ($request->filled('q')) {
            $q = trim($request->input('q'));
            $query->where(function ($sub) use ($q): void {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            });
        }

        if ($request->filled('role')) {
            $query->where('role', $request->input('role'));
        }

        if ($request->filled('tier')) {
            $filterTier = $request->input('tier');
            if ($filterTier === 'premium') {
                $query->where(function ($q) {
                    $q->where('package_tier', 'premium')->orWhere('is_premium', true);
                });
            } elseif ($filterTier === 'basic') {
                $query->where(function ($q) {
                    $q->where(function ($sub) {
                        $sub->where('package_tier', '!=', 'premium')
                            ->orWhereNull('package_tier');
                    })->where('is_premium', false);
                });
            }
        }

        $users = $query->latest()->paginate(15)->withQueryString();

        return view('admin.users', compact('users'));
    }

    /**
     * Toggle role user antara admin dan user biasa.
     */
    public function toggleUserRole(User $user): RedirectResponse
    {
        if ($user->id === auth()->id()) {
            return back()->withErrors(['Anda tidak dapat mengubah role akun admin Anda sendiri.']);
        }

        $user->role = $user->role === 'admin' ? 'user' : 'admin';
        $user->save();

        $label = $user->role === 'admin' ? 'Admin' : 'Pengguna Biasa';

        return back()->with('success', "Role {$user->name} berhasil diubah menjadi {$label}.");
    }

    /**
     * Toggle status paket akun user antara Basic dan Premium Selamanya.
     */
    public function toggleUserPremium(User $user): RedirectResponse
    {
        $user->is_premium = ! $user->is_premium;
        $user->package_tier = $user->is_premium ? 'premium' : 'basic';
        $user->save();

        if ($user->is_premium) {
            $user->invitations()->update([
                'package_tier' => 'premium',
                'is_premium' => true,
            ]);
            $status = 'Premium Selamanya (Bebas Buat Undangan)';
        } else {
            $status = 'Basic (Bayar Per Undangan)';
        }

        return back()->with('success', "Status paket {$user->name} berhasil diubah menjadi {$status}.");
    }

    /**
     * Update status akun user antara Reguler (Bayar Per Undangan) dan Premium Selamanya.
     */
    public function updateUserPackage(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'package_tier' => 'required|in:basic,premium',
        ]);

        $tier = $validated['package_tier'];
        $user->package_tier = $tier;
        $user->is_premium = ($tier === 'premium');
        $user->save();

        if ($tier === 'premium') {
            $user->invitations()->update([
                'package_tier' => 'premium',
                'is_premium' => true,
            ]);
        } else {
            foreach ($user->invitations as $invitation) {
                $hasPaid = $invitation->transactions()
                    ->where('status', 'success')
                    ->where('package_tier', 'premium')
                    ->exists();

                if (! $hasPaid && $invitation->theme && $invitation->theme->isPremium()) {
                    $invitation->update([
                        'is_premium' => false,
                        'package_tier' => 'basic',
                        'status' => 'draft',
                    ]);
                }
            }
        }

        $label = $user->getPackageLabel();

        return back()->with('success', "Status akun pengguna {$user->name} berhasil diubah menjadi '{$label}'.");
    }

    /**
     * Hapus akun pengguna.
     */
    public function destroyUser(User $user): RedirectResponse
    {
        if ($user->id === auth()->id()) {
            return back()->withErrors(['Anda tidak dapat menghapus akun admin Anda sendiri.']);
        }

        $userName = $user->name;
        $user->delete();

        return back()->with('success', "Akun pengguna {$userName} berhasil dihapus.");
    }

    /**
     * Manajemen katalog tema.
     */
    public function themes(Request $request): View
    {
        $query = Theme::withCount('invitations');

        if ($request->filled('q')) {
            $q = trim($request->input('q'));
            $query->where(function ($sub) use ($q): void {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('slug', 'like', "%{$q}%");
            });
        }

        if ($request->filled('tier')) {
            $query->where('tier', $request->input('tier'));
        }

        if ($request->filled('status')) {
            if ($request->input('status') === 'active') {
                $query->where('is_active', true);
            } elseif ($request->input('status') === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $themes = $query->orderBy('id')->get();
        $musicList = Music::where('is_active', true)->orderBy('order', 'asc')->get();

        return view('admin.themes', compact('themes', 'musicList'));
    }

    /**
     * Toggle aktif / nonaktif tema di katalog.
     */
    public function toggleThemeActive(Theme $theme): RedirectResponse
    {
        $theme->is_active = ! $theme->is_active;
        $theme->save();

        $status = $theme->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return back()->with('success', "Tema '{$theme->name}' berhasil {$status}.");
    }

    /**
     * Update detail konfigurasi dan harga tema.
     */
    public function updateTheme(Request $request, Theme $theme): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tier' => 'required|in:basic,premium',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'default_music_id' => 'nullable|exists:music,id',
        ]);

        $themeConfig = is_array($theme->theme_config)
            ? $theme->theme_config
            : (json_decode($theme->theme_config, true) ?? []);

        if ($request->has('default_music_id')) {
            $musicId = $request->input('default_music_id');
            if ($musicId) {
                $music = Music::find($musicId);
                $themeConfig['default_music_id'] = (int) $musicId;
                if ($music) {
                    $themeConfig['default_music'] = $music->title.($music->artist ? ' – '.$music->artist : '');
                }
            } else {
                unset($themeConfig['default_music_id']);
                unset($themeConfig['default_music']);
            }
            $theme->theme_config = $themeConfig;
        }

        $theme->name = $validated['name'];
        $theme->tier = $validated['tier'];
        $theme->price = $validated['price'];
        $theme->description = $validated['description'];
        $theme->save();

        return back()->with('success', "Pengaturan tema '{$theme->name}' berhasil diperbarui.");
    }

    /**
     * Update khusus template lagu preset tema.
     */
    public function updateThemeMusic(Request $request, Theme $theme): RedirectResponse
    {
        $request->validate([
            'default_music_id' => 'nullable|exists:music,id',
        ]);

        $themeConfig = is_array($theme->theme_config)
            ? $theme->theme_config
            : (json_decode($theme->theme_config, true) ?? []);

        $musicId = $request->input('default_music_id');
        if ($musicId) {
            $music = Music::find($musicId);
            $themeConfig['default_music_id'] = (int) $musicId;
            if ($music) {
                $themeConfig['default_music'] = $music->title.($music->artist ? ' – '.$music->artist : '');
            }
            $label = $music ? " ke '{$music->title}'" : '';
        } else {
            unset($themeConfig['default_music_id']);
            unset($themeConfig['default_music']);
            $label = ' ke default sistem';
        }

        $theme->theme_config = $themeConfig;
        $theme->save();

        return back()->with('success', "Template lagu tema '{$theme->name}' berhasil diperbarui{$label}.");
    }

    /**
     * Update massal template lagu preset untuk seluruh tema.
     */
    public function updateBatchThemeMusic(Request $request): RedirectResponse
    {
        $request->validate([
            'theme_music' => 'required|array',
            'theme_music.*' => 'nullable|exists:music,id',
        ]);

        $allMusic = Music::all()->keyBy('id');
        $count = 0;

        foreach ($request->input('theme_music') as $themeId => $musicId) {
            $theme = Theme::find($themeId);
            if (! $theme) {
                continue;
            }

            $themeConfig = is_array($theme->theme_config)
                ? $theme->theme_config
                : (json_decode($theme->theme_config, true) ?? []);

            if ($musicId && isset($allMusic[$musicId])) {
                $music = $allMusic[$musicId];
                $themeConfig['default_music_id'] = (int) $musicId;
                $themeConfig['default_music'] = $music->title.($music->artist ? ' – '.$music->artist : '');
            } else {
                unset($themeConfig['default_music_id']);
                unset($themeConfig['default_music']);
            }

            $theme->theme_config = $themeConfig;
            $theme->save();
            $count++;
        }

        return back()->with('success', "Template lagu untuk {$count} tema berhasil diperbarui.");
    }

    /**
     * Moderasi ucapan dan komentar tamu.
     */
    public function comments(Request $request): View
    {
        $query = Comment::with('invitation');

        if ($request->filled('q')) {
            $q = trim($request->input('q'));
            $query->where(function ($sub) use ($q): void {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('message', 'like', "%{$q}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $comments = $query->latest()->paginate(15)->withQueryString();

        return view('admin.comments', compact('comments'));
    }

    /**
     * Ubah status moderasi komentar (approved, pending, rejected).
     */
    public function toggleCommentStatus(Request $request, Comment $comment): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,pending,rejected',
        ]);

        $comment->status = $validated['status'];
        $comment->save();

        $statusLabel = [
            'approved' => 'Disetujui',
            'pending' => 'Menunggu Moderasi',
            'rejected' => 'Ditolak / Disembunyikan',
        ][$comment->status] ?? $comment->status;

        return back()->with('success', "Status ucapan dari {$comment->name} berhasil diubah menjadi '{$statusLabel}'.");
    }

    /**
     * Hapus ucapan/komentar tamu.
     */
    public function destroyComment(Comment $comment): RedirectResponse
    {
        $senderName = $comment->name;
        $comment->delete();

        return back()->with('success', "Ucapan dari {$senderName} berhasil dihapus.");
    }

    /**
     * Manajemen seluruh undangan yang dibuat di sistem.
     */
    public function invitations(Request $request): View
    {
        $query = Invitation::with(['user', 'theme'])->withCount('comments');

        if ($request->filled('q')) {
            $q = trim($request->input('q'));
            $query->where(function ($sub) use ($q): void {
                $sub->where('title', 'like', "%{$q}%")
                    ->orWhere('groom_name', 'like', "%{$q}%")
                    ->orWhere('bride_name', 'like', "%{$q}%")
                    ->orWhere('slug', 'like', "%{$q}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $invitations = $query->latest()->paginate(15)->withQueryString();

        return view('admin.invitations', compact('invitations'));
    }

    /**
     * Hapus undangan dari sistem.
     */
    public function destroyInvitation(Invitation $invitation): RedirectResponse
    {
        $title = $invitation->title ?? 'Undangan';
        $invitation->delete();

        return back()->with('success', "Undangan '{$title}' berhasil dihapus.");
    }

    /**
     * Manajemen pustaka musik latar.
     */
    public function music(Request $request): View
    {
        $query = Music::withCount('invitations');

        if ($request->filled('q')) {
            $q = trim($request->input('q'));
            $query->where(function ($sub) use ($q): void {
                $sub->where('title', 'like', "%{$q}%")
                    ->orWhere('artist', 'like', "%{$q}%");
            });
        }

        if ($request->filled('status')) {
            $status = $request->input('status') === 'active';
            $query->where('is_active', $status);
        }

        // Filter paket akses secara kumulatif:
        // Basic: 5 lagu
        // Add-On 1: Basic (5) + Add-On 1 (5) = 10 lagu
        // Add-On 2: Basic (5) + Add-On 1 (5) + Add-On 2 (10) = 20 lagu
        // Premium: Semua lagu (35 lagu)
        $selectedTier = $request->input('tier');
        if ($selectedTier) {
            $accessibleTiers = match ($selectedTier) {
                'basic' => ['basic'],
                'basic_addon_1' => ['basic', 'basic_addon_1'],
                'basic_addon_2' => ['basic', 'basic_addon_1', 'basic_addon_2'],
                'premium' => ['basic', 'basic_addon_1', 'basic_addon_2', 'premium'],
                default => [$selectedTier],
            };
            $query->whereIn('tier', $accessibleTiers);
        }

        $musicList = $query->orderBy('order', 'asc')->paginate(50)->withQueryString();
        $totalActive = Music::where('is_active', true)->count();
        $totalTracks = Music::count();

        // Hitung urutan posisi kumulatif dalam paket (Basic #1-#5, Add-On 1 #6-#10, Add-On 2 #11-#20, Premium #21-#35)
        $basicTracks = Music::where('tier', 'basic')->orderBy('order')->orderBy('id')->get(['id']);
        $addon1Tracks = Music::where('tier', 'basic_addon_1')->orderBy('order')->orderBy('id')->get(['id']);
        $addon2Tracks = Music::where('tier', 'basic_addon_2')->orderBy('order')->orderBy('id')->get(['id']);
        $premiumTracks = Music::where('tier', 'premium')->orderBy('order')->orderBy('id')->get(['id']);

        $tierOrders = [];
        $seq = 0;
        foreach ($basicTracks as $t) {
            $tierOrders[$t->id] = ++$seq;
        }
        foreach ($addon1Tracks as $t) {
            $tierOrders[$t->id] = ++$seq;
        }
        foreach ($addon2Tracks as $t) {
            $tierOrders[$t->id] = ++$seq;
        }
        foreach ($premiumTracks as $t) {
            $tierOrders[$t->id] = ++$seq;
        }

        foreach ($musicList as $item) {
            $item->tier_order = $tierOrders[$item->id] ?? $item->order;
        }

        $tierCounts = [
            'all' => $totalTracks,
            'basic' => $basicTracks->count(),
            'basic_addon_1' => $basicTracks->count() + $addon1Tracks->count(),
            'basic_addon_2' => $basicTracks->count() + $addon1Tracks->count() + $addon2Tracks->count(),
            'premium' => $totalTracks,
        ];

        return view('admin.music', compact('musicList', 'totalActive', 'totalTracks', 'tierOrders', 'tierCounts'));
    }

    /**
     * Simpan lagu baru ke pustaka musik.
     */
    public function storeMusic(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'tier' => 'nullable|in:basic,basic_addon_1,basic_addon_2,premium',
            'order' => 'nullable|integer|min:1',
            'source_type' => 'required|in:file,url',
            'audio_file' => 'required_if:source_type,file|nullable|file|mimes:mp3,wav,ogg,m4a,aac|max:25600',
            'audio_url' => 'required_if:source_type,url|nullable|url|max:500',
            'duration' => 'nullable|string|max:20',
            'is_active' => 'nullable|boolean',
        ], [
            'title.required' => 'Judul lagu wajib diisi.',
            'artist.required' => 'Nama artis/penyanyi wajib diisi.',
            'audio_file.required_if' => 'File musik harus diunggah jika memilih tipe upload file.',
            'audio_file.mimes' => 'Format file musik harus berupa MP3, WAV, OGG, atau M4A.',
            'audio_file.max' => 'Ukuran file audio maksimal 25MB.',
            'audio_url.required_if' => 'URL audio online wajib diisi jika memilih tipe tautan URL.',
            'audio_url.url' => 'Format URL audio tidak valid.',
        ]);

        $filePath = '';
        if ($request->input('source_type') === 'file' && $request->hasFile('audio_file')) {
            $file = $request->file('audio_file');
            $fileName = time().'_'.preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $filePath = $file->storeAs('music', $fileName, 'public');
        } else {
            $filePath = $request->input('audio_url');
        }

        // Tentukan posisi nomor urut
        $totalTracks = Music::count();
        $desiredOrder = $request->input('order');
        if ($desiredOrder && is_numeric($desiredOrder)) {
            $desiredOrder = max(1, min((int) $desiredOrder, $totalTracks + 1));
            Music::where('order', '>=', $desiredOrder)->increment('order');
        } else {
            $desiredOrder = (Music::max('order') ?? $totalTracks) + 1;
        }

        $durationSeconds = Music::parseDurationToSeconds($request->input('duration'));

        $music = Music::create([
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'tier' => $request->input('tier', 'basic'),
            'file_path' => $filePath,
            'duration' => $durationSeconds,
            'is_active' => $request->boolean('is_active', true),
            'order' => $desiredOrder,
        ]);

        Music::reindexOrders();

        return back()->with('success', "Lagu '{$music->title}' berhasil ditambahkan ke pustaka musik di nomor urut #{$music->fresh()->order}.");
    }

    /**
     * Update data lagu (judul, artis, tier, durasi, status aktif, dan file audio opsional).
     */
    public function updateMusic(Request $request, Music $music): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'tier' => 'required|in:basic,basic_addon_1,basic_addon_2,premium',
            'duration' => 'nullable|string|max:20',
            'is_active' => 'nullable|boolean',
            'source_type' => 'nullable|in:keep,file,url',
            'audio_file' => 'nullable|file|mimes:mp3,wav,ogg,m4a,aac|max:25600',
            'audio_url' => 'nullable|url|max:500',
        ], [
            'title.required' => 'Judul lagu wajib diisi.',
            'artist.required' => 'Nama artis/penyanyi wajib diisi.',
            'tier.required' => 'Paket akses lagu wajib dipilih.',
            'audio_file.mimes' => 'Format file musik harus berupa MP3, WAV, OGG, atau M4A.',
            'audio_file.max' => 'Ukuran file audio maksimal 25MB.',
            'audio_url.url' => 'Format URL audio tidak valid.',
        ]);

        $music->title = $validated['title'];
        $music->artist = $validated['artist'];
        $music->tier = $validated['tier'];
        $music->is_active = $request->boolean('is_active', true);

        if ($request->filled('duration')) {
            $music->duration = $request->input('duration');
        }

        // Penanganan penggantian sumber audio jika admin memilih untuk mengubahnya
        $sourceType = $request->input('source_type');
        if ($sourceType === 'file' && $request->hasFile('audio_file')) {
            // Hapus file lama jika disimpan di disk lokal public
            if (! str_starts_with($music->file_path, 'http://') && ! str_starts_with($music->file_path, 'https://')) {
                $oldPath = ltrim($music->file_path, '/');
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            $file = $request->file('audio_file');
            $fileName = time().'_'.preg_replace('/[^a-zA-Z0-9._-]/', '', $file->getClientOriginalName());
            $music->file_path = $file->storeAs('music', $fileName, 'public');
        } elseif ($sourceType === 'url' && $request->filled('audio_url')) {
            if (! str_starts_with($music->file_path, 'http://') && ! str_starts_with($music->file_path, 'https://')) {
                $oldPath = ltrim($music->file_path, '/');
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            $music->file_path = $request->input('audio_url');
        }

        $music->save();

        return back()->with('success', "Lagu '{$music->title}' berhasil diperbarui.");
    }

    /**
     * Pindahkan urutan nomor lagu (naik, turun, atau lompat ke target_order).
     */
    public function moveMusic(Request $request, Music $music): RedirectResponse|JsonResponse
    {
        $request->validate([
            'direction' => 'nullable|in:up,down',
            'target_order' => 'nullable|integer|min:1',
        ]);

        $oldOrder = $music->order;

        if ($request->filled('target_order')) {
            $targetOrder = (int) $request->input('target_order');
            $music->moveToOrder($targetOrder);
            $message = "Lagu '{$music->title}' berhasil dipindahkan dari nomor #{$oldOrder} ke nomor #{$music->fresh()->order}.";
        } elseif ($request->input('direction') === 'up') {
            $moved = $music->moveUp();
            $message = $moved
                ? "Lagu '{$music->title}' berhasil dinaikkan ke nomor #{$music->fresh()->order}."
                : "Lagu '{$music->title}' sudah berada di urutan nomor teratas.";
        } elseif ($request->input('direction') === 'down') {
            $moved = $music->moveDown();
            $message = $moved
                ? "Lagu '{$music->title}' berhasil diturunkan ke nomor #{$music->fresh()->order}."
                : "Lagu '{$music->title}' sudah berada di urutan nomor terbawah.";
        } else {
            $message = 'Tidak ada perubahan urutan lagu.';
        }

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'order' => $music->fresh()->order,
            ]);
        }

        return back()->with('success', $message);
    }

    /**
     * Update tier/kategori paket musik (basic, basic_addon_1, basic_addon_2, premium).
     */
    public function updateMusicTier(Request $request, Music $music): RedirectResponse
    {
        $validated = $request->validate([
            'tier' => 'required|in:basic,basic_addon_1,basic_addon_2,premium',
        ]);

        $music->tier = $validated['tier'];
        $music->save();

        $tierLabel = $music->tier_label;

        return back()->with('success', "Akses paket untuk lagu '{$music->title}' berhasil diatur menjadi '{$tierLabel}'.");
    }

    /**
     * Toggle status aktif/non-aktif lagu.
     */
    public function toggleMusicActive(Music $music): RedirectResponse
    {
        $music->is_active = ! $music->is_active;
        $music->save();

        $statusText = $music->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return back()->with('success', "Lagu '{$music->title}' berhasil {$statusText}.");
    }

    /**
     * Hapus lagu dari sistem.
     */
    public function destroyMusic(Music $music): RedirectResponse
    {
        $title = $music->title;
        $deletedOrder = $music->order;

        if (! str_starts_with($music->file_path, 'http://') && ! str_starts_with($music->file_path, 'https://')) {
            $cleanPath = ltrim($music->file_path, '/');
            if (Storage::disk('public')->exists($cleanPath)) {
                Storage::disk('public')->delete($cleanPath);
            }
        }

        $music->delete();

        // Otomatis susun ulang urutan lagu di bawahnya agar nomornya rapat mengisi yang kosong
        Music::reindexOrders();

        return back()->with('success', "Lagu '{$title}' (sebelumnya nomor #{$deletedOrder}) berhasil dihapus. Nomor urut lagu lainnya otomatis dinaikkan.");
    }
}
