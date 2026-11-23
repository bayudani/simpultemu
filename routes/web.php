<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DuitkuController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\ThemeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tema', [ThemeController::class, 'index'])->name('themes.index');
Route::get('/themes', [ThemeController::class, 'index']); // Alias /themes
Route::get('/tema/{theme}/demo', [ThemeController::class, 'demo'])->name('themes.demo');
Route::get('/themes/{theme}/demo', [ThemeController::class, 'demo']);
Route::get('/undangan/preview', function (Request $request) {
    $theme = $request->query('theme') ?? $request->query('id') ?? 1;

    return redirect()->route('themes.demo', ['theme' => $theme]);
});
Route::get('/tema/{theme}', [ThemeController::class, 'show'])->name('themes.show');
Route::get('/themes/{theme}', [ThemeController::class, 'show']); // Alias /themes/{theme}
Route::get('/harga', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/pricing', [HomeController::class, 'pricing']); // Alias /pricing
Route::get('/cara-kerja', [HomeController::class, 'howItWorks'])->name('how-it-works');
Route::get('/how-it-works', [HomeController::class, 'howItWorks']); // Alias /how-it-works
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/about', [HomeController::class, 'about']); // Alias /about

// CSRF & Session Keepalive Refresh endpoint
Route::get('/refresh-csrf', function () {
    return response()->json([
        'token' => csrf_token(),
        'authenticated' => auth()->check(),
    ]);
})->name('csrf.refresh');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// Public invitation view
Route::get('/undangan/{invitation:slug}', [InvitationController::class, 'show'])->name('invitation.show');
Route::get('/undangan/{invitation:slug}/t/{token}', [InvitationController::class, 'showPersonalized'])->name('invitation.personalized');
Route::post('/undangan/{invitation}/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');
Route::post('/undangan/{invitation}/comment', [CommentController::class, 'store'])->name('comment.store');

// Duitku payment callback (Webhook)
Route::post('/api/duitku/callback', [DuitkuController::class, 'callback'])->name('api.duitku.callback');

// User dashboard routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/pesan', [DashboardController::class, 'messages'])->name('dashboard.messages');

    // Invitation management
    Route::get('/dashboard/undangan', [InvitationController::class, 'index'])->name('dashboard.invitations.index');
    Route::get('/dashboard/undangan/create', [InvitationController::class, 'create'])->name('dashboard.invitations.create');
    Route::get('/dashboard/editor', [InvitationController::class, 'create'])->name('dashboard.editor');
    Route::get('/buat-undangan', [InvitationController::class, 'create'])->name('buat-undangan');
    Route::post('/dashboard/undangan/save-draft', [InvitationController::class, 'saveDraft'])->name('dashboard.invitations.saveDraft');
    Route::post('/dashboard/undangan', [InvitationController::class, 'store'])->name('dashboard.invitations.store');
    Route::get('/dashboard/undangan/{invitation}/edit', [InvitationController::class, 'edit'])->name('dashboard.invitations.edit');
    Route::put('/dashboard/undangan/{invitation}', [InvitationController::class, 'update'])->name('dashboard.invitations.update');
    Route::delete('/dashboard/undangan/{id}', [InvitationController::class, 'destroy'])->name('dashboard.undangan.destroy');
    Route::get('/dashboard/undangan/{invitation}/preview', [InvitationController::class, 'preview'])->name('dashboard.invitations.preview');
    Route::get('/undangan/preview/{id}', [InvitationController::class, 'preview'])->name('invitation.preview');
    Route::post('/dashboard/undangan/{invitation}/publish', [InvitationController::class, 'publish'])->name('dashboard.invitations.publish');

    // Guest management
    Route::get('/dashboard/undangan/{invitation}/tamu', [GuestController::class, 'index'])->name('dashboard.guests.index');
    Route::post('/dashboard/undangan/{invitation}/tamu', [GuestController::class, 'store'])->name('dashboard.guests.store');
    Route::put('/dashboard/undangan/{invitation}/tamu/{guest}', [GuestController::class, 'update'])->name('dashboard.guests.update');
    Route::delete('/dashboard/undangan/{invitation}/tamu/{guest}', [GuestController::class, 'destroy'])->name('dashboard.guests.destroy');
    Route::post('/dashboard/undangan/{invitation}/tamu/import', [GuestController::class, 'import'])->name('dashboard.guests.import');

    // Share management
    Route::get('/dashboard/undangan/{invitation}/sebar', [GuestController::class, 'share'])->name('dashboard.guests.share');

    // Duitku upgrade payment
    Route::post('/dashboard/undangan/{invitation}/upgrade', [DuitkuController::class, 'createInvoice'])->name('dashboard.invitations.upgrade');
    Route::post('/dashboard/upgrade-package', [DuitkuController::class, 'createInvoice'])->name('dashboard.upgrade.package');
    Route::get('/dashboard/undangan/{invitation}/upgrade/status', [DuitkuController::class, 'checkStatus'])->name('dashboard.invitations.upgrade.status');
    Route::post('/dashboard/undangan/{invitation}/upgrade/confirm', [DuitkuController::class, 'confirmPayment'])->name('dashboard.invitations.upgrade.confirm');
    Route::post('/dashboard/upgrade-package/confirm', [DuitkuController::class, 'confirmPayment'])->name('dashboard.upgrade.confirm');
    Route::post('/dashboard/upgrade/confirm', [DuitkuController::class, 'confirmPayment'])->name('dashboard.upgrade.confirm.legacy');

    // Photo management
    Route::post('/dashboard/undangan/{invitation}/photos', [PhotoController::class, 'store'])->name('dashboard.photos.store');
    Route::delete('/dashboard/undangan/{invitation}/photos/{photo}', [PhotoController::class, 'destroy'])->name('dashboard.photos.destroy');
    Route::post('/dashboard/undangan/{invitation}/photos/reorder', [PhotoController::class, 'reorder'])->name('dashboard.photos.reorder');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    // Users Management
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::post('/users/{user}/toggle-role', [AdminController::class, 'toggleUserRole'])->name('users.toggleRole');
    Route::post('/users/{user}/toggle-premium', [AdminController::class, 'toggleUserPremium'])->name('users.togglePremium');
    Route::post('/users/{user}/package', [AdminController::class, 'updateUserPackage'])->name('users.updatePackage');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');

    // Themes Management
    Route::get('/themes', [AdminController::class, 'themes'])->name('themes.index');
    Route::post('/themes/{theme}/toggle-active', [AdminController::class, 'toggleThemeActive'])->name('themes.toggleActive');
    Route::put('/themes/{theme}', [AdminController::class, 'updateTheme'])->name('themes.update');
    Route::patch('/themes/{theme}/music', [AdminController::class, 'updateThemeMusic'])->name('themes.updateMusic');
    Route::post('/themes/batch-music', [AdminController::class, 'updateBatchThemeMusic'])->name('themes.batchMusic');

    // Comments & Wishes Moderation
    Route::get('/comments', [AdminController::class, 'comments'])->name('comments.index');
    Route::post('/comments/{comment}/toggle-status', [AdminController::class, 'toggleCommentStatus'])->name('comments.toggleStatus');
    Route::delete('/comments/{comment}', [AdminController::class, 'destroyComment'])->name('comments.destroy');

    // Invitations Management
    Route::get('/invitations', [AdminController::class, 'invitations'])->name('invitations.index');
    Route::delete('/invitations/{invitation}', [AdminController::class, 'destroyInvitation'])->name('invitations.destroy');

    // Music Management
    Route::get('/music', [AdminController::class, 'music'])->name('music.index');
    Route::post('/music', [AdminController::class, 'storeMusic'])->name('music.store');
    Route::put('/music/{music}', [AdminController::class, 'updateMusic'])->name('music.update');
    Route::post('/music/{music}/toggle-active', [AdminController::class, 'toggleMusicActive'])->name('music.toggleActive');
    Route::post('/music/{music}/tier', [AdminController::class, 'updateMusicTier'])->name('music.updateTier');
    Route::post('/music/{music}/move', [AdminController::class, 'moveMusic'])->name('music.move');
    Route::delete('/music/{music}', [AdminController::class, 'destroyMusic'])->name('music.destroy');
});
