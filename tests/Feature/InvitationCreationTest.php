<?php

namespace Tests\Feature;

use App\Models\Invitation;
use App\Models\Theme;
use App\Models\User;
use Database\Seeders\MusicSeeder;
use Database\Seeders\ThemeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InvitationCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_access_invitation_create_page(): void
    {
        $this->seed(ThemeSeeder::class);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard/undangan/create');

        $response->assertStatus(200);
        $response->assertSee('Pilih Tema Undangan');
        $response->assertSee('Premium Crayon Dreams');
        $response->assertSee('Premium Summer Vibes');
    }

    public function test_authenticated_user_can_access_invitation_edit_page(): void
    {
        $this->seed(ThemeSeeder::class);

        $user = User::factory()->create();
        $theme = Theme::first();

        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $theme->id,
            'title' => 'The Wedding of Romeo & Juliet',
            'slug' => 'romeo-juliet',
            'groom_name' => 'Romeo Montague',
            'groom_nickname' => 'Romeo',
            'bride_name' => 'Juliet Capulet',
            'bride_nickname' => 'Juliet',
            'event_date' => now()->addDays(30)->toDateString(),
            'event_time' => '10:00:00',
            'venue' => 'Grand Ballroom',
            'address' => 'Verona, Italy',
            'status' => 'draft',
        ]);

        $response = $this->actingAs($user)->get("/dashboard/undangan/{$invitation->id}/edit");

        $response->assertStatus(200);
        $response->assertSee('Romeo');
        $response->assertSee('Juliet');
    }

    public function test_premium_theme_flow_on_invitation_create_page(): void
    {
        $this->seed(ThemeSeeder::class);

        $user = User::factory()->create(['package_tier' => 'basic', 'is_premium' => false]);
        $premiumTheme = Theme::where('tier', 'premium')->first();

        // 1. Initial page load displays step 1 and payment modal markup
        $createPageResponse = $this->actingAs($user)->get('/dashboard/undangan/create');
        $createPageResponse->assertStatus(200);
        $createPageResponse->assertSee('Pilih Tema Undangan');
        $createPageResponse->assertSee('universal-upgrade-modal');
        $createPageResponse->assertSee('triggerEditorPremiumUpgrade');

        // 2. Auto-save draft with chosen premium theme
        $draftResponse = $this->actingAs($user)->postJson(route('dashboard.invitations.saveDraft'), [
            'theme_id' => $premiumTheme->id,
            'title' => 'Pernikahan Habib & Adiba',
            'action' => 'draft',
        ]);

        $draftResponse->assertStatus(200);
        $draftResponse->assertJson(['success' => true]);
        $invitationId = $draftResponse->json('id');
        $this->assertNotNull($invitationId);

        $invitation = Invitation::find($invitationId);
        $this->assertFalse((bool) $invitation->is_premium);
        $this->assertEquals('draft', $invitation->status);

        // 3. Confirming payment via client unlock endpoint upgrades invitation and user
        $confirmResponse = $this->actingAs($user)->postJson(route('dashboard.invitations.upgrade.confirm', $invitation), [
            'package_tier' => 'premium',
            'merchant_order_id' => 'INV-'.$invitation->id.'-'.time(),
        ]);

        $confirmResponse->assertStatus(200);
        $confirmResponse->assertJson([
            'success' => true,
            'is_premium' => true,
            'package_tier' => 'premium',
        ]);

        $this->assertTrue((bool) $invitation->fresh()->is_premium);
        $this->assertEquals('premium', $invitation->fresh()->package_tier);
        // Per-undangan: Akun pengguna tetap basic, hanya undangan yang di-upgrade
        $this->assertFalse((bool) $user->fresh()->is_premium);

        // 4. Once unlocked, the user can now publish their premium invitation
        $publishResponse = $this->actingAs($user)->put(route('dashboard.invitations.update', $invitation), [
            'theme_id' => $premiumTheme->id,
            'title' => 'Pernikahan Habib & Adiba',
            'groom_name' => 'Habib Al-Fatih',
            'groom_nickname' => 'Habib',
            'bride_name' => 'Adiba Shakila',
            'bride_nickname' => 'Adiba',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '09:00',
            'venue' => 'Grand Ballroom',
            'action' => 'publish',
        ]);

        $publishResponse->assertSessionMissing('show_upgrade_modal');
        $this->assertEquals('published', $invitation->fresh()->status);
    }

    public function test_all_10_basic_themes_use_basic_music_presets(): void
    {
        $this->seed(MusicSeeder::class);
        $this->seed(ThemeSeeder::class);
        Theme::clearMusicCache();

        $basicThemes = Theme::where('tier', 'basic')->orderBy('id')->get();
        $this->assertCount(10, $basicThemes);

        foreach ($basicThemes as $theme) {
            $defaultMusic = $theme->default_music;
            $this->assertNotNull($defaultMusic, "Theme {$theme->name} should have a default music");
            $this->assertContains($defaultMusic->id, [1, 2, 3, 4, 5], "Theme {$theme->name} must use one of the 5 basic songs");
            $this->assertEquals('basic', $defaultMusic->tier);
        }

        // Test creating invitation with basic theme 6
        $user = User::factory()->create(['package_tier' => 'basic']);
        $theme6 = Theme::find(6);

        $response = $this->actingAs($user)->get("/dashboard/undangan/create?theme_id={$theme6->id}");
        $response->assertStatus(200);
        $response->assertSee('Basic Soft Blue Botanical');

        // Create and publish without error
        $publishResponse = $this->actingAs($user)->post(route('dashboard.invitations.store'), [
            'theme_id' => $theme6->id,
            'music_id' => $theme6->default_music_id,
            'title' => 'Pernikahan Rian & Maya',
            'groom_name' => 'Rian Pratama',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Anggraini',
            'bride_nickname' => 'Maya',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '09:00',
            'venue' => 'Gedung Serbaguna',
            'action' => 'publish',
        ]);

        $publishResponse->assertSessionMissing('show_upgrade_modal');
        $invitation = Invitation::where('groom_name', 'Rian Pratama')->first();
        $this->assertNotNull($invitation);
        $this->assertEquals('published', $invitation->status);
        $this->assertEquals($theme6->default_music_id, $invitation->music_id);
    }
}
