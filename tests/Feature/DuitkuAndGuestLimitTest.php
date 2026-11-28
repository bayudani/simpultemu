<?php

namespace Tests\Feature;

use App\Models\Invitation;
use App\Models\Music;
use App\Models\Theme;
use App\Models\Transaction;
use App\Models\User;
use Database\Seeders\MusicSeeder;
use Database\Seeders\ThemeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
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

    public function test_first_basic_invitation_publish_consumes_free_quota_permanently_even_after_deletion(): void
    {
        $user = User::factory()->create([
            'package_tier' => 'basic',
            'is_premium' => false,
            'has_used_free_quota' => false,
        ]);
        $basicTheme = Theme::where('tier', 'basic')->first();

        $this->assertTrue($user->canUseFreeQuota());
        $this->assertTrue($user->canStartNewInvitation());

        $storeResponse = $this->actingAs($user)->post(route('dashboard.invitations.store'), [
            'theme_id' => $basicTheme->id,
            'title' => 'Undangan Gratis Pertama',
            'groom_name' => 'Andi Wijaya',
            'groom_nickname' => 'Andi',
            'bride_name' => 'Siti Nurhaliza',
            'bride_nickname' => 'Siti',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '09:00',
            'venue' => 'Gedung Melati',
            'action' => 'publish',
        ]);

        $storeResponse->assertRedirect();
        $invitation = Invitation::where('user_id', $user->id)->first();
        $this->assertNotNull($invitation);
        $this->assertEquals('published', $invitation->status);
        $this->assertEquals('free', $invitation->payment_status);

        $user->refresh();
        $this->assertTrue((bool) $user->has_used_free_quota);
        $this->assertNotNull($user->free_quota_used_at);
        $this->assertFalse($user->canUseFreeQuota());
        $this->assertFalse($user->canStartNewInvitation());

        // Halaman create harus menampilkan gerbang kuota Rp10.000
        $gateResponse = $this->actingAs($user)->get(route('dashboard.invitations.create'));
        $gateResponse->assertStatus(200);
        $gateResponse->assertSee('Rp10.000');

        // Hapus undangan pertama -> kuota gratis TIDAK boleh kembali
        $deleteResponse = $this->actingAs($user)->delete(route('dashboard.undangan.destroy', $invitation->id));
        $deleteResponse->assertRedirect();

        $user->refresh();
        $this->assertTrue((bool) $user->has_used_free_quota);
        $this->assertFalse($user->canUseFreeQuota());

        // Coba buat undangan kedua gratis via saveDraft -> harus ditolak (402)
        $draftAttempt = $this->actingAs($user)->postJson(route('dashboard.invitations.saveDraft'), [
            'theme_id' => $basicTheme->id,
            'title' => 'Percobaan Gratis Kedua',
        ]);
        $draftAttempt->assertStatus(402);
        $draftAttempt->assertJson(['requires_slot_purchase' => true]);

        // Coba buat undangan kedua gratis via store -> harus ditolak & redirect ke gate modal
        $storeAttempt = $this->actingAs($user)->post(route('dashboard.invitations.store'), [
            'theme_id' => $basicTheme->id,
            'title' => 'Percobaan Store Kedua',
            'groom_name' => 'Budi',
            'groom_nickname' => 'Budi',
            'bride_name' => 'Ayu',
            'bride_nickname' => 'Ayu',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '10:00',
            'venue' => 'Gedung Serbaguna',
            'action' => 'publish',
        ]);
        $storeAttempt->assertRedirect(route('dashboard.invitations.create'));
        $storeAttempt->assertSessionHas('show_slot_payment_modal', true);
        $this->assertEquals(0, Invitation::where('user_id', $user->id)->count());
    }

    public function test_purchasing_basic_slot_grants_one_paid_invitation_and_is_idempotent(): void
    {
        $user = User::factory()->create([
            'package_tier' => 'basic',
            'is_premium' => false,
            'has_used_free_quota' => true,
            'free_quota_used_at' => now(),
            'basic_invitation_credits' => 0,
        ]);
        $basicTheme = Theme::where('tier', 'basic')->first();

        Http::fake([
            'https://api-sandbox.duitku.com/*' => Http::response([
                'statusCode' => '00',
                'statusMessage' => 'SUCCESS',
                'reference' => 'REF-SLOT-001',
                'paymentUrl' => 'https://sandbox.duitku.com/payment/REF-SLOT-001',
            ], 200),
        ]);

        $invoiceResponse = $this->actingAs($user)->postJson(route('dashboard.upgrade.package'), [
            'package_tier' => 'basic_slot',
        ]);
        $invoiceResponse->assertStatus(200);
        $merchantOrderId = $invoiceResponse->json('merchant_order_id');
        $this->assertNotNull($merchantOrderId);

        // Konfirmasi pertama harus menambah tepat 1 kredit slot Basic
        $confirm1 = $this->actingAs($user)->postJson(route('dashboard.upgrade.confirm'), [
            'package_tier' => 'basic_slot',
            'merchant_order_id' => $merchantOrderId,
        ]);
        $confirm1->assertStatus(200);
        $this->assertEquals(1, $user->fresh()->basic_invitation_credits);

        // Konfirmasi duplikat + webhook callback untuk order sama tidak boleh menggandakan kredit
        $this->actingAs($user)->postJson(route('dashboard.upgrade.confirm'), [
            'package_tier' => 'basic_slot',
            'merchant_order_id' => $merchantOrderId,
        ])->assertStatus(200);

        config(['services.duitku.api_key' => 'test-key', 'services.duitku.merchant_code' => 'D9999']);
        $signature = md5('D999910000'.$merchantOrderId.'test-key');
        $this->postJson(route('api.duitku.callback'), [
            'merchantCode' => 'D9999',
            'amount' => '10000',
            'merchantOrderId' => $merchantOrderId,
            'resultCode' => '00',
            'signature' => $signature,
        ])->assertStatus(200);

        $this->assertEquals(1, $user->fresh()->basic_invitation_credits);
        $user->refresh();

        // Gunakan kredit tersebut untuk membuat undangan ke-2
        $storeResponse = $this->actingAs($user)->post(route('dashboard.invitations.store'), [
            'theme_id' => $basicTheme->id,
            'title' => 'Undangan Berbayar Kedua',
            'groom_name' => 'Dimas Pratama',
            'groom_nickname' => 'Dimas',
            'bride_name' => 'Nadia Putri',
            'bride_nickname' => 'Nadia',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '11:00',
            'venue' => 'Gedung Anggrek',
            'action' => 'publish',
        ]);

        $storeResponse->assertRedirect();
        $invitation = Invitation::where('user_id', $user->id)->first();
        $this->assertNotNull($invitation);
        $this->assertEquals('paid', $invitation->payment_status);
        $this->assertEquals(10000, $invitation->paid_amount);
        $this->assertEquals('basic', $invitation->package_tier);
        $this->assertEquals(0, $user->fresh()->basic_invitation_credits);
        $this->assertFalse($user->fresh()->canStartNewInvitation());
    }

    public function test_addons_and_premium_are_isolated_per_invitation_and_premium_has_unlimited_guests(): void
    {
        $user = User::factory()->create([
            'package_tier' => 'basic',
            'is_premium' => false,
            'has_used_free_quota' => true,
        ]);
        $basicTheme = Theme::where('tier', 'basic')->first();

        $invA = $this->createTestInvitation($user, $basicTheme, [
            'package_tier' => 'basic',
            'is_premium' => false,
            'payment_status' => 'paid',
            'paid_amount' => 10000,
        ]);
        $invB = $this->createTestInvitation($user, $basicTheme, [
            'package_tier' => 'basic',
            'is_premium' => false,
            'payment_status' => 'free',
        ]);

        // Upgrade hanya Undangan A ke Premium
        $this->actingAs($user)->postJson(route('dashboard.invitations.upgrade.confirm', $invA), [
            'package_tier' => 'premium',
            'merchant_order_id' => 'PREM-'.$invA->id.'-'.time(),
        ])->assertStatus(200);

        $invA->refresh();
        $invB->refresh();

        $this->assertTrue((bool) $invA->is_premium);
        $this->assertEquals('premium', $invA->package_tier);
        $this->assertEquals('paid', $invA->payment_status);
        $this->assertNull($invA->getGuestLimit());

        // Undangan B tetap Basic & tidak terpengaruh oleh upgrade Undangan A
        $this->assertFalse((bool) $invB->is_premium);
        $this->assertEquals('basic', $invB->package_tier);
        $this->assertEquals(5, $invB->getGuestLimit());

        // Undangan A (Premium per undangan) bisa tambah lebih dari 5 tamu
        for ($i = 1; $i <= 7; $i++) {
            $res = $this->actingAs($user)->postJson(route('dashboard.guests.store', $invA), [
                'name' => "Tamu VIP {$i}",
            ]);
            $res->assertStatus(200);
        }
        $this->assertEquals(7, $invA->guests()->count());

        // Upgrade Undangan B ke Add-On Basic 1 (12 tamu, 10 lagu) - tidak mengubah Undangan A
        $this->actingAs($user)->postJson(route('dashboard.invitations.upgrade.confirm', $invB), [
            'package_tier' => 'basic_addon_1',
            'merchant_order_id' => 'ADDON1-'.$invB->id.'-'.time(),
        ])->assertStatus(200);

        $invB->refresh();
        $this->assertEquals('basic_addon_1', $invB->package_tier);
        $this->assertEquals('paid', $invB->payment_status);
        $this->assertEquals(12, $invB->getGuestLimit());
        $this->assertEquals(10, $invB->getSongLimit());
    }

    public function test_backend_enforces_music_tier_and_custom_music_upload_by_invitation_package(): void
    {
        $this->seed(MusicSeeder::class);
        Theme::clearMusicCache();
        Storage::fake('public');

        $user = User::factory()->create(['package_tier' => 'basic', 'is_premium' => false]);
        $basicTheme = Theme::where('tier', 'basic')->first();
        $basicMusic = Music::where('tier', 'basic')->first();
        $premiumMusic = Music::where('tier', '!=', 'basic')->orderByDesc('id')->first();

        $invitation = $this->createTestInvitation($user, $basicTheme, [
            'package_tier' => 'basic',
            'is_premium' => false,
            'payment_status' => 'free',
            'music_id' => $basicMusic->id,
        ]);

        // Coba ganti musik ke lagu non-basic & unggah MP3 kustom pada undangan Basic
        $this->actingAs($user)->put(route('dashboard.invitations.update', $invitation), [
            'theme_id' => $basicTheme->id,
            'title' => 'Update Lagu Terbatas',
            'groom_name' => 'Rian Hidayat',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Pertiwi',
            'bride_nickname' => 'Maya',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '09:00',
            'venue' => 'Grand Ballroom',
            'music_id' => $premiumMusic->id,
            'custom_music' => UploadedFile::fake()->create('blocked.mp3', 120, 'audio/mpeg'),
            'action' => 'draft',
        ])->assertRedirect();

        $invitation->refresh();
        $this->assertNotEquals($premiumMusic->id, $invitation->music_id);
        $this->assertNull($invitation->custom_music);
    }

    public function test_pricing_and_dashboard_display_quota_package_and_payment_status_separately(): void
    {
        $user = User::factory()->create([
            'package_tier' => 'basic',
            'is_premium' => false,
            'has_used_free_quota' => true,
        ]);
        $basicTheme = Theme::where('tier', 'basic')->first();
        $this->createTestInvitation($user, $basicTheme, [
            'title' => 'Undangan Satu',
            'package_tier' => 'basic',
            'payment_status' => 'free',
            'status' => 'published',
        ]);
        $this->createTestInvitation($user, $basicTheme, [
            'title' => 'Undangan Dua',
            'package_tier' => 'basic_addon_1',
            'payment_status' => 'paid',
            'paid_amount' => 17000,
            'status' => 'published',
        ]);

        $pricingResponse = $this->get(route('pricing'));
        $pricingResponse->assertStatus(200);
        $pricingResponse->assertSee('Khusus 1 undangan pertama per akun');
        $pricingResponse->assertSee('Rp10.000');
        $pricingResponse->assertSee('Berlaku untuk satu undangan');

        $dashboardResponse = $this->actingAs($user)->get(route('dashboard'));
        $dashboardResponse->assertStatus(200);
        $dashboardResponse->assertSee('Paket:');
        $dashboardResponse->assertSee('Pembayaran:');
        $dashboardResponse->assertSee('Gratis');
        $dashboardResponse->assertSee('Lunas');

        $invListResponse = $this->actingAs($user)->get(route('dashboard.invitations.index'));
        $invListResponse->assertStatus(200);
        $invListResponse->assertSee('Paket');
        $invListResponse->assertSee('Pembayaran');
        $invListResponse->assertSee('Add-On Basic 1');
    }
}
