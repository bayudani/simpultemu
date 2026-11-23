<?php

namespace Tests\Feature;

use App\Models\Invitation;
use App\Models\Theme;
use App\Models\User;
use Database\Seeders\ThemeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GuestPersonalizedLinkTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(ThemeSeeder::class);
    }

    public function test_invitation_cover_displays_guest_name_from_to_query_parameter(): void
    {
        $user = User::factory()->create();
        $theme = Theme::where('tier', 'basic')->first();

        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Dimas & Nabila',
            'slug' => 'dimas-nabila-test',
            'groom_name' => 'Dimas Arya',
            'groom_nickname' => 'Dimas',
            'bride_name' => 'Nabila Putri',
            'bride_nickname' => 'Nabila',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '09:00',
            'venue' => 'Gedung Serbaguna',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $guestName = 'Bapak Sukardi & Keluarga';
        $response = $this->get(route('invitation.show', $invitation->slug).'?to='.urlencode($guestName));

        $response->assertStatus(200);
        $response->assertSee($guestName);
        $response->assertSee('btn-open-invitation');
    }

    public function test_invitation_cover_displays_guest_name_on_theme_2_emerald_and_theme_3_navy(): void
    {
        $user = User::factory()->create();
        $theme2 = Theme::where('slug', 'basic-harmony-emerald')->first() ?? Theme::find(2);
        $theme3 = Theme::where('slug', 'basic-harmony-navy')->first() ?? Theme::find(3);

        if ($theme2) {
            $invitation2 = Invitation::create([
                'user_id' => $user->id,
                'theme_id' => $theme2->id,
                'title' => 'Pernikahan Emerald',
                'slug' => 'emerald-guest-test',
                'groom_name' => 'Dimas Arya',
                'groom_nickname' => 'Dimas',
                'bride_name' => 'Nabila Putri',
                'bride_nickname' => 'Nabila',
                'event_date' => now()->addMonth()->format('Y-m-d'),
                'event_time' => '09:00',
                'venue' => 'Emerald Hall',
                'status' => 'published',
                'published_at' => now(),
            ]);

            $response2 = $this->get(route('invitation.show', $invitation2->slug).'?to='.urlencode('Rudi Hartono'));
            $response2->assertStatus(200);
            $response2->assertSee('KEPADA YTH');
            $response2->assertSee('Rudi Hartono');
            $response2->assertSee('btn-open-invitation');
        }

        if ($theme3) {
            $invitation3 = Invitation::create([
                'user_id' => $user->id,
                'theme_id' => $theme3->id,
                'title' => 'Pernikahan Navy',
                'slug' => 'navy-guest-test',
                'groom_name' => 'Dimas Arya',
                'groom_nickname' => 'Dimas',
                'bride_name' => 'Nabila Putri',
                'bride_nickname' => 'Nabila',
                'event_date' => now()->addMonth()->format('Y-m-d'),
                'event_time' => '09:00',
                'venue' => 'Navy Ballroom',
                'status' => 'published',
                'published_at' => now(),
            ]);

            $response3 = $this->get(route('invitation.show', $invitation3->slug).'?to='.urlencode('Citra Lestari'));
            $response3->assertStatus(200);
            $response3->assertSee('Kepada Yth.');
            $response3->assertSee('Citra Lestari');
            $response3->assertSee('btn-open-invitation');
        }
    }

    public function test_owner_can_sync_guests_via_guests_json_on_invitation_update(): void
    {
        $user = User::factory()->create();
        $theme = Theme::where('tier', 'basic')->first();

        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Test',
            'slug' => 'wedding-test-sync',
            'groom_name' => 'Dimas Arya',
            'groom_nickname' => 'Dimas',
            'bride_name' => 'Nabila Putri',
            'bride_nickname' => 'Nabila',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '09:00',
            'venue' => 'Gedung Serbaguna',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $guestsData = [
            ['name' => 'Tamu Pertama', 'phone' => '08123456789'],
            ['name' => 'Tamu Kedua Sekeluarga', 'phone' => '08987654321'],
        ];

        $response = $this->actingAs($user)
            ->from(route('dashboard.invitations.edit', $invitation))
            ->put(route('dashboard.invitations.update', $invitation), [
                'theme_id' => $theme->id,
                'title' => 'Pernikahan Test',
                'slug' => 'wedding-test-sync',
                'groom_name' => 'Dimas Arya',
                'groom_nickname' => 'Dimas',
                'bride_name' => 'Nabila Putri',
                'bride_nickname' => 'Nabila',
                'event_date' => now()->addMonth()->format('Y-m-d'),
                'event_time' => '09:00',
                'venue' => 'Gedung Serbaguna',
                'guests_json' => json_encode($guestsData),
                'action' => 'save',
            ]);

        $response->assertRedirect(route('dashboard.invitations.edit', $invitation));

        $this->assertDatabaseHas('invitation_guests', [
            'invitation_id' => $invitation->id,
            'name' => 'Tamu Pertama',
        ]);
        $this->assertDatabaseHas('invitation_guests', [
            'invitation_id' => $invitation->id,
            'name' => 'Tamu Kedua Sekeluarga',
        ]);

        $guestRecord = $invitation->guests()->where('name', 'Tamu Pertama')->first();
        $this->assertNotNull($guestRecord);
        $this->assertStringContainsString('?to=Tamu+Pertama', $guestRecord->invitation_url);
    }

    public function test_owner_can_view_draft_invitation_with_personalized_to_param(): void
    {
        $user = User::factory()->create();
        $theme = Theme::where('tier', 'basic')->first();

        $draftInvitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $theme->id,
            'title' => 'Draf Pernikahan',
            'slug' => 'draf-pernikahan-test',
            'groom_name' => 'Dimas Arya',
            'groom_nickname' => 'Dimas',
            'bride_name' => 'Nabila Putri',
            'bride_nickname' => 'Nabila',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '09:00',
            'venue' => 'Gedung Serbaguna',
            'status' => 'draft',
        ]);

        // Non-owner gets 404
        $guestResponse = $this->get(route('invitation.show', $draftInvitation->slug).'?to='.urlencode('Tamu Rahasia'));
        $guestResponse->assertStatus(404);

        // Owner gets 200 and sees guest name
        $ownerResponse = $this->actingAs($user)->get(route('invitation.show', $draftInvitation->slug).'?to='.urlencode('Tamu Rahasia'));
        $ownerResponse->assertStatus(200);
        $ownerResponse->assertSee('Tamu Rahasia');
        $ownerResponse->assertSee('btn-open-invitation');
    }
}
