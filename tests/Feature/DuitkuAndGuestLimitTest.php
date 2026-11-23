<?php

namespace Tests\Feature;

use App\Models\Invitation;
use App\Models\Music;
use App\Models\Theme;
use App\Models\Transaction;
use App\Models\User;
use Database\Seeders\ThemeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DuitkuAndGuestLimitTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(ThemeSeeder::class);
    }

    private function createTestInvitation(User $user, Theme $theme, array $overrides = []): Invitation
    {
        return Invitation::create(array_merge([
            'user_id' => $user->id,
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Rian & Maya',
            'slug' => 'test-invitation-'.uniqid(),
            'groom_name' => 'Rian Hidayat',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Pertiwi',
            'bride_nickname' => 'Maya',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '09:00',
            'venue' => 'Grand Ballroom',
            'is_premium' => false,
            'status' => 'published',
            'published_at' => now(),
        ], $overrides));
    }

    public function test_pricing_page_displays_updated_pricing_and_guest_limitations(): void
    {
        $response = $this->get('/harga');

        $response->assertStatus(200);
        $response->assertSee('Pilih Paket Yang Sesuai Dengan Kebutuhanmu');
        $response->assertSee('5 Nama Tamu');
        $response->assertSee('5 Pilihan Lagu');
        $response->assertSee('Add-On Paket');
        $response->assertSee('Basic 1');
        $response->assertSee('Rp17.000');
        $response->assertSee('Total 12 Nama Tamu');
        $response->assertSee('Total 10 Lagu');
        $response->assertSee('Basic 2');
        $response->assertSee('Rp25.000');
        $response->assertSee('Total 17 Tamu');
        $response->assertSee('Total 20 Lagu');
        $response->assertSee('Premium');
        $response->assertSee('Rp59.000');
        $response->assertSee('Nama Tamu Tak Terbatas');
        $response->assertSee('Lagu Tak Terbatas');
    }

    public function test_basic_invitation_blocks_adding_guest_when_limit_of_5_is_reached(): void
    {
        $user = User::factory()->create(['package_tier' => 'basic']);
        $theme = Theme::where('tier', 'basic')->first();
        $invitation = $this->createTestInvitation($user, $theme, ['is_premium' => false, 'package_tier' => 'basic']);

        // Add 5 guests
        for ($i = 1; $i <= 5; $i++) {
            $invitation->guests()->create([
                'name' => "Tamu {$i}",
                'unique_token' => "TOKEN{$i}",
                'invitation_url' => url("/undangan/{$invitation->slug}/t/TOKEN{$i}"),
            ]);
        }

        $this->assertEquals(5, $invitation->guests()->count());

        // Attempt to add 6th guest via JSON/AJAX
        $response = $this->actingAs($user)
            ->postJson(route('dashboard.guests.store', $invitation), [
                'name' => 'Tamu Ke 6',
            ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'requires_upgrade' => true,
        ]);

        // Verify count didn't increase
        $this->assertEquals(5, $invitation->fresh()->guests()->count());

        // Now upgrade invitation to basic_addon_1 (limit 12)
        $invitation->update(['package_tier' => 'basic_addon_1']);

        // Adding 6th guest should now succeed
        $responseSuccess = $this->actingAs($user)
            ->postJson(route('dashboard.guests.store', $invitation), [
                'name' => 'Tamu Ke 6',
            ]);

        $responseSuccess->assertStatus(200);
        $responseSuccess->assertJson(['success' => true]);
        $this->assertEquals(6, $invitation->fresh()->guests()->count());
    }

    public function test_invitation_update_strictly_caps_guests_json_at_package_limit(): void
    {
        $user = User::factory()->create(['package_tier' => 'basic']);
        $theme = Theme::where('tier', 'basic')->first();
        $invitation = $this->createTestInvitation($user, $theme, ['is_premium' => false, 'package_tier' => 'basic']);

        $sixGuests = [
            ['name' => 'Tamu 1'],
            ['name' => 'Tamu 2'],
            ['name' => 'Tamu 3'],
            ['name' => 'Tamu 4'],
            ['name' => 'Tamu 5'],
            ['name' => 'Tamu 6'],
        ];

        $response = $this->actingAs($user)->put(route('dashboard.invitations.update', $invitation), [
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Rian & Maya',
            'groom_name' => 'Rian Hidayat',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Pertiwi',
            'bride_nickname' => 'Maya',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '09:00',
            'venue' => 'Grand Ballroom',
            'guests_json' => json_encode($sixGuests),
        ]);

        $response->assertStatus(302);
        // Database must strictly have at most 5 guests (basic limit)
        $this->assertEquals(5, $invitation->fresh()->guests()->count());
    }

    public function test_duitku_create_invoice_flow(): void
    {
        $user = User::factory()->create();
        $theme = Theme::where('tier', 'basic')->first();
        $invitation = $this->createTestInvitation($user, $theme, ['is_premium' => false]);

        // Mock Duitku createInvoice API
        Http::fake([
            'https://api-sandbox.duitku.com/api/merchant/createInvoice' => Http::response([
                'statusCode' => '00',
                'statusMessage' => 'SUCCESS',
                'reference' => 'DS37951TESTREF123456',
                'paymentUrl' => 'https://app-sandbox.duitku.com/payment/DS37951TESTREF123456',
                'vaNumber' => '80777123456789',
                'amount' => '59000',
            ], 200),
        ]);

        $response = $this->actingAs($user)
            ->postJson(route('dashboard.invitations.upgrade', $invitation));

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'reference' => 'DS37951TESTREF123456',
            'payment_url' => 'https://app-sandbox.duitku.com/payment/DS37951TESTREF123456',
        ]);

        // Check Transaction in DB
        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'invitation_id' => $invitation->id,
            'status' => 'pending',
            'reference' => 'DS37951TESTREF123456',
            'amount' => 59000,
        ]);
    }

    public function test_duitku_callback_webhook_validates_signature_and_upgrades_invitation(): void
    {
        $user = User::factory()->create();
        $theme = Theme::where('tier', 'basic')->first();
        $invitation = $this->createTestInvitation($user, $theme, ['is_premium' => false]);

        $merchantOrderId = 'INV-'.$invitation->id.'-1731580000-123';
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'invitation_id' => $invitation->id,
            'merchant_order_id' => $merchantOrderId,
            'amount' => 59000,
            'status' => 'pending',
            'reference' => 'DS37951CALLBACKTEST',
        ]);

        $merchantCode = 'DS37951';
        $apiKey = '2a7fe83924b88000f9c79675a3ceed86';
        $amount = '59000';

        // 1. Invalid signature should return 400
        $invalidResponse = $this->post(route('api.duitku.callback'), [
            'merchantCode' => $merchantCode,
            'amount' => $amount,
            'merchantOrderId' => $merchantOrderId,
            'signature' => 'invalid_signature_hash',
            'resultCode' => '00',
            'reference' => 'DS37951CALLBACKTEST',
        ]);
        $invalidResponse->assertStatus(400);
        $this->assertFalse((bool) $invitation->fresh()->is_premium);

        // 2. Valid signature: MD5(merchantCode + amount + merchantOrderId + apiKey)
        $validSignature = md5($merchantCode.$amount.$merchantOrderId.$apiKey);

        $validResponse = $this->post(route('api.duitku.callback'), [
            'merchantCode' => $merchantCode,
            'amount' => $amount,
            'merchantOrderId' => $merchantOrderId,
            'signature' => $validSignature,
            'resultCode' => '00',
            'reference' => 'DS37951CALLBACKTEST',
            'paymentCode' => 'VA',
        ]);

        $validResponse->assertStatus(200);
        $this->assertEquals('OK', $validResponse->getContent());

        // Check transaction updated to success
        $this->assertEquals('success', $transaction->fresh()->status);
        $this->assertNotNull($transaction->fresh()->paid_at);

        // Check invitation upgraded to premium
        $this->assertTrue((bool) $invitation->fresh()->is_premium);
    }

    public function test_editor_displays_rp_59k_and_gracefully_handles_premium_theme_publishing(): void
    {
        $user = User::factory()->create();
        $premiumTheme = Theme::where('tier', 'premium')->first();

        // 1. Ensure /dashboard/undangan/create displays Rp 59k
        $response = $this->actingAs($user)->get(route('dashboard.invitations.create'));
        $response->assertStatus(200);
        $response->assertSee('Rp 59k');

        // 2. Submitting with a premium theme saves as draft and triggers upgrade modal
        $storeResponse = $this->actingAs($user)->post(route('dashboard.invitations.store'), [
            'theme_id' => $premiumTheme->id,
            'title' => 'Pernikahan Mewah',
            'groom_name' => 'Raden',
            'groom_nickname' => 'Raden',
            'bride_name' => 'Anisa',
            'bride_nickname' => 'Anisa',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '09:00',
            'venue' => 'Grand Ballroom',
            'action' => 'publish',
        ]);

        $storeResponse->assertSessionHas('show_upgrade_modal', true);
        $storeResponse->assertSessionHas('upgrade_invitation_id');

        $createdInvitation = Invitation::where('title', 'Pernikahan Mewah')->first();
        $this->assertNotNull($createdInvitation);
        $this->assertEquals('draft', $createdInvitation->status);
        $this->assertFalse((bool) $createdInvitation->is_premium);
    }

    public function test_duitku_create_invoice_for_addons_and_premium(): void
    {
        $user = User::factory()->create();
        $theme = Theme::where('tier', 'basic')->first();
        $invitation = $this->createTestInvitation($user, $theme, ['is_premium' => false]);

        // Mock Duitku createInvoice API for Add-On 1 (17.000)
        Http::fake([
            'https://api-sandbox.duitku.com/api/merchant/createInvoice' => Http::response([
                'statusCode' => '00',
                'statusMessage' => 'SUCCESS',
                'reference' => 'DS_ADDON1_REF',
                'paymentUrl' => 'https://app-sandbox.duitku.com/payment/DS_ADDON1_REF',
                'vaNumber' => '80777123456789',
                'amount' => '17000',
            ], 200),
        ]);

        $response = $this->actingAs($user)
            ->postJson(route('dashboard.upgrade.package', $invitation), [
                'package_tier' => 'basic_addon_1',
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'reference' => 'DS_ADDON1_REF',
            'amount' => 17000,
            'package_tier' => 'basic_addon_1',
        ]);

        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'invitation_id' => $invitation->id,
            'amount' => 17000,
            'package_tier' => 'basic_addon_1',
        ]);
    }

    public function test_package_tier_guest_and_song_limits(): void
    {
        $user = User::factory()->create(['package_tier' => 'basic']);
        $theme = Theme::where('tier', 'basic')->first();
        $invitation = $this->createTestInvitation($user, $theme, ['package_tier' => 'basic']);

        // Basic
        $this->assertEquals(5, $invitation->getGuestLimit());
        $this->assertEquals(5, $invitation->getSongLimit());
        $this->assertEquals('Basic (Gratis)', $invitation->getPackageLabel());

        // Basic Add-On 1
        $invitation->update(['package_tier' => 'basic_addon_1']);
        $this->assertEquals(12, $invitation->getGuestLimit());
        $this->assertEquals(10, $invitation->getSongLimit());
        $this->assertEquals('Add-On Paket Basic 1', $invitation->getPackageLabel());

        // Basic Add-On 2
        $invitation->update(['package_tier' => 'basic_addon_2']);
        $this->assertEquals(17, $invitation->getGuestLimit());
        $this->assertEquals(20, $invitation->getSongLimit());
        $this->assertEquals('Add-On Paket Basic 2', $invitation->getPackageLabel());

        // Premium
        $invitation->update(['package_tier' => 'premium', 'is_premium' => true]);
        $this->assertNull($invitation->getGuestLimit());
        $this->assertNull($invitation->getSongLimit());
        $this->assertEquals('Premium', $invitation->getPackageLabel());
    }

    public function test_admin_can_update_user_package_tier_and_music_tier(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $regularUser = User::factory()->create(['package_tier' => 'basic']);
        $music = Music::first();

        // 1. Admin updates regular user to premium (Lifetime Premium)
        $resUser = $this->actingAs($admin)
            ->post(route('admin.users.updatePackage', $regularUser), [
                'package_tier' => 'premium',
            ]);

        $resUser->assertRedirect();
        $this->assertEquals('premium', $regularUser->fresh()->package_tier);
        $this->assertTrue($regularUser->fresh()->hasLifetimePremium());

        // 2. Admin updates music tier to premium
        if ($music) {
            $resMusic = $this->actingAs($admin)
                ->post(route('admin.music.updateTier', $music), [
                    'tier' => 'premium',
                ]);

            $resMusic->assertRedirect();
            $this->assertEquals('premium', $music->fresh()->tier);
        }
    }

    public function test_user_can_confirm_payment_via_client_endpoint(): void
    {
        $user = User::factory()->create(['package_tier' => 'basic', 'is_premium' => false]);
        $theme = Theme::where('tier', 'premium')->first();
        $invitation = $this->createTestInvitation($user, $theme, ['is_premium' => false, 'package_tier' => 'basic']);

        $transaction = Transaction::create([
            'user_id' => $user->id,
            'invitation_id' => $invitation->id,
            'merchant_order_id' => 'INV-'.$invitation->id.'-123456',
            'amount' => 59000,
            'status' => 'pending',
            'package_tier' => 'premium',
            'reference' => 'DS37951CLIENTCONFIRM',
        ]);

        $response = $this->actingAs($user)
            ->postJson(route('dashboard.invitations.upgrade.confirm', $invitation), [
                'package_tier' => 'premium',
                'merchant_order_id' => $transaction->merchant_order_id,
                'reference' => $transaction->reference,
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'is_premium' => true,
            'package_tier' => 'premium',
        ]);

        $this->assertTrue((bool) $invitation->fresh()->is_premium);
        $this->assertEquals('premium', $invitation->fresh()->package_tier);
        // Per-undangan: Akun pengguna tetap basic, hanya undangan yang di-upgrade
        $this->assertFalse((bool) $user->fresh()->is_premium);
        $this->assertEquals('basic', $user->fresh()->package_tier);
        $this->assertEquals('success', $transaction->fresh()->status);
    }

    public function test_updating_invitation_with_premium_theme_when_unpaid_retains_draft_and_triggers_upgrade_modal(): void
    {
        $user = User::factory()->create(['package_tier' => 'basic', 'is_premium' => false]);
        $basicTheme = Theme::where('tier', 'basic')->first();
        $premiumTheme = Theme::where('tier', 'premium')->first();

        $invitation = $this->createTestInvitation($user, $basicTheme, [
            'is_premium' => false,
            'package_tier' => 'basic',
            'status' => 'draft',
        ]);

        $response = $this->actingAs($user)
            ->put(route('dashboard.invitations.update', $invitation), [
                'theme_id' => $premiumTheme->id,
                'title' => 'Update to Premium Title',
                'groom_name' => 'Rian Hidayat',
                'groom_nickname' => 'Rian',
                'bride_name' => 'Maya Pertiwi',
                'bride_nickname' => 'Maya',
                'event_date' => now()->addMonth()->format('Y-m-d'),
                'event_time' => '09:00',
                'venue' => 'Grand Ballroom',
                'action' => 'publish',
            ]);

        $response->assertSessionHas('show_upgrade_modal', true);
        $response->assertSessionHas('upgrade_invitation_id', $invitation->id);
        $this->assertEquals('draft', $invitation->fresh()->status);
        $this->assertFalse((bool) $invitation->fresh()->is_premium);
    }
}
