<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Invitation;
use App\Models\Music;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    private User $regularUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            'name' => 'Admin SimpulTemu',
            'email' => 'admin@simpultemu.com',
            'role' => 'admin',
        ]);

        $this->regularUser = User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'role' => 'user',
            'is_premium' => false,
        ]);
    }

    public function test_guests_cannot_access_admin_routes(): void
    {
        $this->get('/admin')->assertRedirect('/login');
        $this->get('/admin/users')->assertRedirect('/login');
        $this->get('/admin/themes')->assertRedirect('/login');
        $this->get('/admin/comments')->assertRedirect('/login');
        $this->get('/admin/invitations')->assertRedirect('/login');
    }

    public function test_regular_users_are_forbidden_from_admin_routes(): void
    {
        $this->actingAs($this->regularUser)->get('/admin')->assertStatus(403);
        $this->actingAs($this->regularUser)->get('/admin/users')->assertStatus(403);
        $this->actingAs($this->regularUser)->get('/admin/themes')->assertStatus(403);
        $this->actingAs($this->regularUser)->get('/admin/comments')->assertStatus(403);
        $this->actingAs($this->regularUser)->get('/admin/invitations')->assertStatus(403);
    }

    public function test_admin_can_view_dashboard_overview(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Admin Dashboard');
        $response->assertSee('Manage Users');
        $response->assertSee('Manage Themes');
        $response->assertSee('Moderate Comments');
        $response->assertSee('Manage Invitations');
        $response->assertSee('Total Pengguna');
    }

    public function test_admin_can_view_users_list_and_search(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/users');

        $response->assertStatus(200);
        $response->assertSee('Manajemen Pengguna');
        $response->assertSee('admin@simpultemu.com');
        $response->assertSee('user@example.com');
    }

    public function test_admin_can_toggle_user_role_and_premium(): void
    {
        // Toggle user role to admin
        $resRole = $this->actingAs($this->admin)->post("/admin/users/{$this->regularUser->id}/toggle-role");
        $resRole->assertRedirect();
        $this->assertEquals('admin', $this->regularUser->fresh()->role);

        // Toggle user premium status
        $resPrem = $this->actingAs($this->admin)->post("/admin/users/{$this->regularUser->id}/toggle-premium");
        $resPrem->assertRedirect();
        $this->assertTrue($this->regularUser->fresh()->is_premium);
        $this->assertTrue($this->regularUser->fresh()->hasLifetimePremium());
    }

    public function test_admin_can_grant_and_revoke_lifetime_premium_to_user(): void
    {
        $user = User::factory()->create([
            'is_premium' => false,
            'package_tier' => 'basic',
        ]);

        $this->assertFalse($user->hasLifetimePremium());

        // 1. Admin grants Lifetime Premium
        $res = $this->actingAs($this->admin)->post(route('admin.users.updatePackage', $user), [
            'package_tier' => 'premium',
        ]);
        $res->assertRedirect();
        $this->assertTrue($user->fresh()->hasLifetimePremium());
        $this->assertEquals('premium', $user->fresh()->package_tier);
        $this->assertTrue((bool) $user->fresh()->is_premium);

        // 2. Admin revokes Lifetime Premium back to basic
        $res2 = $this->actingAs($this->admin)->post(route('admin.users.updatePackage', $user), [
            'package_tier' => 'basic',
        ]);
        $res2->assertRedirect();
        $this->assertFalse($user->fresh()->hasLifetimePremium());
        $this->assertEquals('basic', $user->fresh()->package_tier);
        $this->assertFalse((bool) $user->fresh()->is_premium);
    }

    public function test_sidebar_and_admin_user_badges_and_options_render_properly(): void
    {
        $regularUser = User::factory()->create([
            'name' => 'Cahya Regular',
            'is_premium' => false,
            'package_tier' => 'basic',
        ]);

        $vipUser = User::factory()->create([
            'name' => 'Sultan VIP',
            'is_premium' => true,
            'package_tier' => 'premium',
        ]);

        // 1. Regular user sees 'Member' badge in sidebar
        $dashRegular = $this->actingAs($regularUser)->get(route('dashboard'));
        $dashRegular->assertStatus(200);
        $dashRegular->assertSee('Member');
        $dashRegular->assertDontSee('Premium Selamanya');

        // 2. VIP user sees 'Premium Selamanya' in sidebar
        $dashVip = $this->actingAs($vipUser)->get(route('dashboard'));
        $dashVip->assertStatus(200);
        $dashVip->assertSee('Premium Selamanya');

        // 3. Admin user sees 'Admin' badge in sidebar
        $dashAdmin = $this->actingAs($this->admin)->get(route('dashboard'));
        $dashAdmin->assertStatus(200);
        $dashAdmin->assertSee('Admin');

        // 4. Admin users management page renders the dropdown with correct status labels
        $adminUsers = $this->actingAs($this->admin)->get(route('admin.users.index'));
        $adminUsers->assertStatus(200);
        $adminUsers->assertSee('Reguler (Bayar Per Undangan)');
        $adminUsers->assertSee('Premium Selamanya (Bebas Buat Undangan)');
        $adminUsers->assertDontSee('Add-On 1 (12 Tamu, 10 Lagu)');
        $adminUsers->assertDontSee('Add-On 2 (17 Tamu, 20 Lagu)');
    }

    public function test_admin_cannot_demote_or_delete_self(): void
    {
        // Try to demote self
        $resRole = $this->actingAs($this->admin)->post("/admin/users/{$this->admin->id}/toggle-role");
        $resRole->assertSessionHasErrors();
        $this->assertEquals('admin', $this->admin->fresh()->role);

        // Try to delete self
        $resDel = $this->actingAs($this->admin)->delete("/admin/users/{$this->admin->id}");
        $resDel->assertSessionHasErrors();
        $this->assertDatabaseHas('users', ['id' => $this->admin->id]);
    }

    public function test_admin_can_delete_regular_user(): void
    {
        $targetUser = User::factory()->create();

        $response = $this->actingAs($this->admin)->delete("/admin/users/{$targetUser->id}");
        $response->assertRedirect();
        $this->assertDatabaseMissing('users', ['id' => $targetUser->id]);
    }

    public function test_admin_can_view_and_toggle_themes(): void
    {
        $theme = Theme::create([
            'name' => 'Test Admin Theme',
            'slug' => 'test-admin-theme',
            'tier' => 'basic',
            'price' => 0,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->get('/admin/themes');
        $response->assertStatus(200);
        $response->assertSee('Test Admin Theme');

        // Toggle active status
        $toggleRes = $this->actingAs($this->admin)->post("/admin/themes/{$theme->id}/toggle-active");
        $toggleRes->assertRedirect();
        $this->assertFalse($theme->fresh()->is_active);

        // Update theme settings
        $updateRes = $this->actingAs($this->admin)->put("/admin/themes/{$theme->id}", [
            'name' => 'Updated Admin Theme',
            'tier' => 'premium',
            'price' => 150000,
            'description' => 'Tema deskripsi baru',
        ]);
        $updateRes->assertRedirect();
        $this->assertEquals('Updated Admin Theme', $theme->fresh()->name);
        $this->assertEquals('premium', $theme->fresh()->tier);
        $this->assertEquals(150000, $theme->fresh()->price);
    }

    public function test_admin_can_moderate_comments(): void
    {
        $theme = Theme::create([
            'name' => 'Theme For Comments',
            'slug' => 'theme-for-comments',
            'tier' => 'basic',
            'price' => 0,
            'is_active' => true,
        ]);

        $invitation = Invitation::create([
            'user_id' => $this->regularUser->id,
            'theme_id' => $theme->id,
            'slug' => 'undangan-komentar-test',
            'groom_name' => 'Romeo',
            'bride_name' => 'Juliet',
            'event_date' => now()->addDays(20),
            'event_time' => '10:00',
            'venue' => 'Gedung Kesenian',
            'status' => 'published',
        ]);

        $comment = Comment::create([
            'invitation_id' => $invitation->id,
            'name' => 'Tamu Komentator',
            'message' => 'Selamat berbahagia selalu!',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->admin)->get('/admin/comments');
        $response->assertStatus(200);
        $response->assertSee('Tamu Komentator');
        $response->assertSee('Selamat berbahagia selalu!');

        // Approve comment
        $approveRes = $this->actingAs($this->admin)->post("/admin/comments/{$comment->id}/toggle-status", [
            'status' => 'approved',
        ]);
        $approveRes->assertRedirect();
        $this->assertEquals('approved', $comment->fresh()->status);

        // Delete comment
        $deleteRes = $this->actingAs($this->admin)->delete("/admin/comments/{$comment->id}");
        $deleteRes->assertRedirect();
        $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
    }

    public function test_admin_can_view_and_delete_invitations(): void
    {
        $theme = Theme::create([
            'name' => 'Theme For Inv',
            'slug' => 'theme-for-inv',
            'tier' => 'basic',
            'price' => 0,
            'is_active' => true,
        ]);

        $invitation = Invitation::create([
            'user_id' => $this->regularUser->id,
            'theme_id' => $theme->id,
            'slug' => 'undangan-admin-test',
            'groom_name' => 'Ali',
            'bride_name' => 'Fatimah',
            'event_date' => now()->addDays(20),
            'event_time' => '10:00',
            'venue' => 'Masjid Raya',
            'status' => 'published',
        ]);

        $response = $this->actingAs($this->admin)->get('/admin/invitations');
        $response->assertStatus(200);
        $response->assertSee('undangan-admin-test');

        // Delete invitation
        $deleteRes = $this->actingAs($this->admin)->delete("/admin/invitations/{$invitation->id}");
        $deleteRes->assertRedirect();
        $this->assertDatabaseMissing('invitations', ['id' => $invitation->id]);
    }

    public function test_guests_and_regular_users_cannot_access_admin_music(): void
    {
        $this->get('/admin/music')->assertRedirect('/login');
        $this->actingAs($this->regularUser)->get('/admin/music')->assertStatus(403);
    }

    public function test_admin_can_view_music_list(): void
    {
        $music = Music::create([
            'title' => 'Romantic Symphony',
            'artist' => 'Mozart Orchestra',
            'file_path' => 'https://example.com/audio/mozart.mp3',
            'duration' => '04:15',
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->get('/admin/music');
        $response->assertStatus(200);
        $response->assertSee('Pustaka Musik Undangan');
        $response->assertSee('Urutan No.');
        $response->assertSee('No. Paket');
        $response->assertSee('Romantic Symphony');
        $response->assertSee('Mozart Orchestra');
    }

    public function test_music_list_displays_package_order_separated_by_tier(): void
    {
        $basic1 = Music::create(['title' => 'Basic Song 1', 'artist' => 'A1', 'tier' => 'basic', 'order' => 1, 'file_path' => 'https://example.com/1.mp3']);
        $basic2 = Music::create(['title' => 'Basic Song 2', 'artist' => 'A2', 'tier' => 'basic', 'order' => 2, 'file_path' => 'https://example.com/2.mp3']);
        $addon1 = Music::create(['title' => 'Addon Song 1', 'artist' => 'A3', 'tier' => 'basic_addon_1', 'order' => 3, 'file_path' => 'https://example.com/3.mp3']);
        $addon2 = Music::create(['title' => 'Addon Song 2', 'artist' => 'A4', 'tier' => 'basic_addon_1', 'order' => 4, 'file_path' => 'https://example.com/4.mp3']);

        $response = $this->actingAs($this->admin)->get('/admin/music');
        $response->assertStatus(200);
        $response->assertSee('No. Paket');
        $response->assertSee('Urutan No.');
        $response->assertSee('Basic Song 1');
        $response->assertSee('Addon Song 1');

        $viewData = $response->viewData('tierOrders');
        $this->assertEquals(1, $viewData[$basic1->id]);
        $this->assertEquals(2, $viewData[$basic2->id]);
        $this->assertEquals(3, $viewData[$addon1->id]);
        $this->assertEquals(4, $viewData[$addon2->id]);

        $response->assertSeeInOrder(['Basic Song 1', '#1', 'Basic Song 2', '#2', 'Addon Song 1', '#3', 'Addon Song 2', '#4']);
    }

    public function test_music_filter_by_tier_is_cumulative(): void
    {
        $basic = Music::create(['title' => 'Track B1', 'artist' => 'Artist', 'tier' => 'basic', 'order' => 1, 'file_path' => 'https://example.com/b.mp3']);
        $addon1 = Music::create(['title' => 'Track A1', 'artist' => 'Artist', 'tier' => 'basic_addon_1', 'order' => 2, 'file_path' => 'https://example.com/a1.mp3']);
        $addon2 = Music::create(['title' => 'Track A2', 'artist' => 'Artist', 'tier' => 'basic_addon_2', 'order' => 3, 'file_path' => 'https://example.com/a2.mp3']);
        $premium = Music::create(['title' => 'Track P1', 'artist' => 'Artist', 'tier' => 'premium', 'order' => 4, 'file_path' => 'https://example.com/p.mp3']);

        // Filter Basic: hanya melihat basic
        $respBasic = $this->actingAs($this->admin)->get('/admin/music?tier=basic');
        $respBasic->assertSee('Track B1')->assertDontSee('Track A1')->assertDontSee('Track A2')->assertDontSee('Track P1');

        // Filter Add-On 1: melihat Basic + Add-On 1
        $respAddon1 = $this->actingAs($this->admin)->get('/admin/music?tier=basic_addon_1');
        $respAddon1->assertSee('Track B1')->assertSee('Track A1')->assertDontSee('Track A2')->assertDontSee('Track P1');

        // Filter Add-On 2: melihat Basic + Add-On 1 + Add-On 2
        $respAddon2 = $this->actingAs($this->admin)->get('/admin/music?tier=basic_addon_2');
        $respAddon2->assertSee('Track B1')->assertSee('Track A1')->assertSee('Track A2')->assertDontSee('Track P1');

        // Filter Premium: melihat semua
        $respPrem = $this->actingAs($this->admin)->get('/admin/music?tier=premium');
        $respPrem->assertSee('Track B1')->assertSee('Track A1')->assertSee('Track A2')->assertSee('Track P1');
    }

    public function test_admin_can_store_music_with_url(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/music', [
            'title' => 'Can’t Help Falling in Love',
            'artist' => 'Kina Grannis',
            'source_type' => 'url',
            'audio_url' => 'https://example.com/audio/kina.mp3',
            'duration' => '03:20',
            'is_active' => 1,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('music', [
            'title' => 'Can’t Help Falling in Love',
            'artist' => 'Kina Grannis',
            'file_path' => 'https://example.com/audio/kina.mp3',
            'is_active' => true,
        ]);
    }

    public function test_admin_can_store_music_with_file_upload(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('custom_wedding_song.mp3', 1024, 'audio/mpeg');

        $response = $this->actingAs($this->admin)->post('/admin/music', [
            'title' => 'Marry Your Daughter',
            'artist' => 'Brian McKnight Jr.',
            'tier' => 'premium',
            'source_type' => 'file',
            'audio_file' => $file,
            'duration' => '03:40',
            'is_active' => 1,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $music = Music::where('title', 'Marry Your Daughter')->first();
        $this->assertNotNull($music);
        $this->assertEquals('Brian McKnight Jr.', $music->artist);
        $this->assertEquals('premium', $music->tier);
        Storage::disk('public')->assertExists($music->file_path);
    }

    public function test_admin_can_update_music_details(): void
    {
        $music = Music::create([
            'title' => 'Ed Sheeran - Perfect [no copyright]',
            'artist' => 'ed sheeran',
            'tier' => 'basic',
            'file_path' => 'https://example.com/audio/perfect.mp3',
            'duration' => 180,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->put("/admin/music/{$music->id}", [
            'title' => 'Perfect',
            'artist' => 'Ed Sheeran',
            'tier' => 'premium',
            'duration' => '04:23',
            'is_active' => 1,
            'source_type' => 'keep',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $updated = $music->fresh();
        $this->assertEquals('Perfect', $updated->title);
        $this->assertEquals('Ed Sheeran', $updated->artist);
        $this->assertEquals('premium', $updated->tier);
        $this->assertEquals(263, $updated->duration); // 4*60 + 23 = 263
        $this->assertEquals('04:23', $updated->formatted_duration);
    }

    public function test_admin_can_update_music_tier(): void
    {
        $music = Music::create([
            'title' => 'Tier Test Song',
            'artist' => 'Artist Test',
            'tier' => 'basic',
            'file_path' => 'https://example.com/audio/tier.mp3',
            'duration' => '03:00',
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->post("/admin/music/{$music->id}/tier", [
            'tier' => 'basic_addon_2',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertEquals('basic_addon_2', $music->fresh()->tier);
    }

    public function test_admin_can_toggle_music_active(): void
    {
        $music = Music::create([
            'title' => 'Toggle Song',
            'artist' => 'Artist Test',
            'file_path' => 'https://example.com/audio/toggle.mp3',
            'duration' => '03:00',
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->post("/admin/music/{$music->id}/toggle-active");
        $response->assertRedirect();
        $this->assertFalse($music->fresh()->is_active);

        $response2 = $this->actingAs($this->admin)->post("/admin/music/{$music->id}/toggle-active");
        $response2->assertRedirect();
        $this->assertTrue($music->fresh()->is_active);
    }

    public function test_admin_can_delete_music(): void
    {
        Storage::fake('public');

        $fakePath = 'music/test_delete.mp3';
        Storage::disk('public')->put($fakePath, 'dummy-audio-content');

        $music = Music::create([
            'title' => 'Song To Delete',
            'artist' => 'Delete Artist',
            'file_path' => $fakePath,
            'duration' => '02:50',
            'is_active' => true,
        ]);

        $this->assertTrue(Storage::disk('public')->exists($fakePath));

        $response = $this->actingAs($this->admin)->delete("/admin/music/{$music->id}");
        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('music', ['id' => $music->id]);
        $this->assertFalse(Storage::disk('public')->exists($fakePath));
    }

    public function test_admin_can_reorder_music_up_down_and_target_order(): void
    {
        $songA = Music::create(['title' => 'Song A', 'artist' => 'Artist A', 'file_path' => 'https://example.com/a.mp3', 'order' => 1]);
        $songB = Music::create(['title' => 'Song B', 'artist' => 'Artist B', 'file_path' => 'https://example.com/b.mp3', 'order' => 2]);
        $songC = Music::create(['title' => 'Song C', 'artist' => 'Artist C', 'file_path' => 'https://example.com/c.mp3', 'order' => 3]);

        // Move Song C UP -> Song C should become #2, Song B becomes #3
        $response = $this->actingAs($this->admin)->post("/admin/music/{$songC->id}/move", ['direction' => 'up']);
        $response->assertRedirect();
        $this->assertEquals(2, $songC->fresh()->order);
        $this->assertEquals(3, $songB->fresh()->order);
        $this->assertEquals(1, $songA->fresh()->order);

        // Move Song A DOWN -> Song A should become #2, Song C becomes #1
        $response = $this->actingAs($this->admin)->post("/admin/music/{$songA->id}/move", ['direction' => 'down']);
        $response->assertRedirect();
        $this->assertEquals(1, $songC->fresh()->order);
        $this->assertEquals(2, $songA->fresh()->order);
        $this->assertEquals(3, $songB->fresh()->order);

        // Jump Song B directly to target_order 1
        $response = $this->actingAs($this->admin)->post("/admin/music/{$songB->id}/move", ['target_order' => 1]);
        $response->assertRedirect();
        $this->assertEquals(1, $songB->fresh()->order);
        $this->assertEquals(2, $songC->fresh()->order);
        $this->assertEquals(3, $songA->fresh()->order);
    }

    public function test_deleting_music_automatically_reindexes_subsequent_order_numbers(): void
    {
        $song1 = Music::create(['title' => 'Song 1', 'artist' => 'Artist 1', 'file_path' => 'https://example.com/1.mp3', 'order' => 1]);
        $song2 = Music::create(['title' => 'Song 2', 'artist' => 'Artist 2', 'file_path' => 'https://example.com/2.mp3', 'order' => 2]);
        $song3 = Music::create(['title' => 'Song 3', 'artist' => 'Artist 3', 'file_path' => 'https://example.com/3.mp3', 'order' => 3]);

        // Hapus lagu nomor 2
        $response = $this->actingAs($this->admin)->delete("/admin/music/{$song2->id}");
        $response->assertRedirect();

        // Lagu nomor 3 harus otomatis bergeser naik menjadi nomor 2 (tidak ada celah bolong)
        $this->assertEquals(1, $song1->fresh()->order);
        $this->assertEquals(2, $song3->fresh()->order);
    }

    public function test_admin_can_update_theme_preset_music(): void
    {
        $theme = Theme::create([
            'name' => 'Test Theme',
            'slug' => 'test-theme',
            'tier' => 'basic',
            'price' => 0,
            'is_active' => true,
        ]);

        $music = Music::create([
            'title' => 'Preset Song',
            'artist' => 'Preset Artist',
            'tier' => 'basic',
            'file_path' => 'https://example.com/audio/preset.mp3',
            'duration' => '03:10',
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->patch("/admin/themes/{$theme->id}/music", [
            'default_music_id' => $music->id,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        Theme::clearMusicCache();
        $updatedTheme = $theme->fresh();
        $this->assertEquals($music->id, $updatedTheme->default_music_id);
        $this->assertEquals('Preset Song – Preset Artist', $updatedTheme->preset_music_label);
    }

    public function test_admin_can_batch_update_theme_preset_music(): void
    {
        $theme1 = Theme::create([
            'name' => 'Test Theme 1',
            'slug' => 'test-theme-1',
            'tier' => 'basic',
            'price' => 0,
            'is_active' => true,
        ]);

        $music1 = Music::create([
            'title' => 'Batch Song 1',
            'artist' => 'Artist 1',
            'tier' => 'basic',
            'file_path' => 'https://example.com/audio/batch1.mp3',
            'duration' => '03:00',
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->post('/admin/themes/batch-music', [
            'theme_music' => [
                $theme1->id => $music1->id,
            ],
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        Theme::clearMusicCache();
        $this->assertEquals($music1->id, $theme1->fresh()->default_music_id);
    }
}
