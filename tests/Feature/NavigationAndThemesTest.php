<?php

namespace Tests\Feature;

use App\Models\Invitation;
use App\Models\Music;
use App\Models\Theme;
use App\Models\User;
use Database\Seeders\MusicSeeder;
use Database\Seeders\ThemeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class NavigationAndThemesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(ThemeSeeder::class);
    }

    public function test_all_navbar_routes_are_accessible_and_return_ok(): void
    {
        $routes = [
            '/',
            '/tema',
            '/themes',
            '/harga',
            '/pricing',
            '/cara-kerja',
            '/how-it-works',
            '/faq',
            '/login',
            '/register',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    public function test_editor_and_create_routes_require_authentication(): void
    {
        $protectedRoutes = [
            '/dashboard/undangan/create',
            '/dashboard/editor',
            '/buat-undangan',
        ];

        foreach ($protectedRoutes as $route) {
            $this->get($route)->assertRedirect('/login');
        }
    }

    public function test_auth_pages_display_luxury_wedding_theme(): void
    {
        $login = $this->get('/login');
        $login->assertStatus(200);
        $login->assertSee('Masuk ke SimpulTemu');
        $login->assertSee('border-[#EAE3D9]');
        $login->assertSee('bg-[#FAF7F2]');
        $login->assertSee('Masuk dengan Google');

        $register = $this->get('/register');
        $register->assertStatus(200);
        $register->assertSee('Daftar SimpulTemu');
        $register->assertSee('border-[#EAE3D9]');
        $register->assertSee('bg-[#FAF7F2]');
        $register->assertSee('Daftar dengan Google');
        $register->assertDontSee('auth-welcome-overlay');
        $register->assertDontSee('SimpulTemu Family!');
        $login->assertDontSee('auth-welcome-overlay');
        $login->assertDontSee('SimpulTemu Family!');
    }

    public function test_user_can_login_directly_and_redirect_to_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'directlogin@simpultemu.test',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'directlogin@simpultemu.test',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_register_directly_and_redirect_to_dashboard(): void
    {
        $response = $this->post('/register', [
            'name' => 'Bintang Pratama',
            'email' => 'bintang@simpultemu.test',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();
    }

    public function test_theme_catalog_displays_all_themes_and_tiers(): void
    {
        $response = $this->get('/tema');

        $response->assertStatus(200);
        $response->assertSee('Katalog');
        $response->assertSee('Tema Basic');
        $response->assertSee('Tema Premium');
        $response->assertSee('Gratis');
        $response->assertSee('Rp 59.000');
        $response->assertSee('Basic Harmony Maroon');
        $response->assertSee('Premium Misty Romance');
    }

    public function test_theme_detail_routes_are_accessible(): void
    {
        $this->get('/tema/1')->assertStatus(200)->assertSee('Basic Harmony Maroon');
        $this->get('/tema/11')->assertStatus(200)->assertSee('Premium Misty Romance');
    }

    public function test_dashboard_user_flow_and_three_column_editor(): void
    {
        $user = User::factory()->create([
            'name' => 'Aditya Pratama',
        ]);

        // 1. Dashboard Ringkasan
        $dashboard = $this->actingAs($user)->get('/dashboard');
        $dashboard->assertStatus(200);
        $dashboard->assertSee('Aditya Pratama');
        $dashboard->assertSee('Total Undangan');
        $dashboard->assertSee('Undangan Published');
        $dashboard->assertSee('Pesan &amp; RSVP Masuk', false);
        $dashboard->assertSee('Buat Undangan Baru');

        // 2. Editor Multi-Step Wizard via /dashboard/undangan/create
        $editor = $this->actingAs($user)->get('/dashboard/undangan/create');
        $editor->assertStatus(200);
        $editor->assertSee('Data Mempelai');
        $editor->assertSee('Detail Rangkaian Acara');
        $editor->assertSee('Fitur Pelengkap');
        $editor->assertSee('Pilih Tema Undangan (20 Tema)');
        $editor->assertSee('Pratinjau Undangan');

        // 3. Editor alias route /dashboard/editor
        $editorAlias = $this->actingAs($user)->get('/dashboard/editor');
        $editorAlias->assertStatus(200);
        $editorAlias->assertSee('Pratinjau Undangan');

        // 4. Pesan & RSVP Masuk /dashboard/pesan
        $messages = $this->actingAs($user)->get('/dashboard/pesan');
        $messages->assertStatus(200);
        $messages->assertSee('Pesan');
        $messages->assertSee('Konfirmasi Kehadiran (RSVP)');
        $messages->assertSee('Doa Restu');
    }

    public function test_user_can_create_invitation_with_three_column_editor_data(): void
    {
        $user = User::factory()->create();
        $theme = Theme::where('tier', 'basic')->first();

        $response = $this->actingAs($user)->post('/dashboard/undangan', [
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Mulia',
            'slug' => 'rian-maya-wedding',
            'groom_name' => 'Rian Pratama, S.Kom.',
            'groom_nickname' => 'Rian',
            'groom_parents' => 'Putra dari Bapak Hendra & Ibu Susi',
            'groom_instagram' => '@rianpratama',
            'bride_name' => 'Maya Anggraini, S.E.',
            'bride_nickname' => 'Maya',
            'bride_parents' => 'Putri dari Bapak Bambang & Ibu Dewi',
            'bride_instagram' => '@mayaanggraini',
            'akad_date' => '2026-12-12',
            'akad_time' => '08:00',
            'akad_end_time' => '10:00',
            'akad_venue' => 'Masjid Raya Al-Azhar',
            'akad_address' => 'Jl. Kebayoran Baru, Jakarta Selatan',
            'akad_maps_url' => 'https://maps.google.com/akad',
            'event_date' => '2026-12-12',
            'event_time' => '11:00',
            'event_end_time' => '14:00',
            'venue' => 'Grand Ballroom Hotel Mulia',
            'address' => 'Jl. Asia Afrika No. 8, Jakarta Pusat',
            'maps_url' => 'https://maps.google.com/resepsi',
            'show_quote' => '1',
            'quran_text' => 'وَمِنْ آيَاتِهِ...',
            'quran_translation' => 'Dan di antara tanda-tanda kebesaran-Nya...',
            'quote_source' => 'QS. Ar-Rum: 21',
            'gift_bank_name' => 'Bank BCA',
            'gift_account_number' => '1234567890',
            'gift_account_holder' => 'Rian Pratama',
            'gift_address' => 'Jl. Melati No. 12, Jakarta',
            'action' => 'publish',
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('invitations', [
            'title' => 'Pernikahan Mulia',
            'slug' => 'rian-maya-wedding',
            'groom_nickname' => 'Rian',
            'groom_instagram' => '@rianpratama',
            'bride_nickname' => 'Maya',
            'bride_instagram' => '@mayaanggraini',
            'gift_bank_name' => 'Bank BCA',
            'show_quote' => 1,
            'status' => 'published',
            'akad_end_time' => '10:00',
            'event_end_time' => '14:00',
        ]);
    }

    public function test_dynamic_theme_engine_renders_all_twenty_themes(): void
    {
        $user = User::factory()->create();
        $themes = Theme::where('is_active', true)->get();

        $this->assertCount(20, $themes);

        foreach ($themes as $theme) {
            $invitation = Invitation::create([
                'user_id' => $user->id,
                'theme_id' => $theme->id,
                'title' => 'The Wedding of '.$theme->name,
                'slug' => 'test-'.$theme->slug,
                'groom_name' => 'Dimas Arya',
                'groom_nickname' => 'Dimas',
                'groom_parents' => 'Putra dari Bapak Arya & Ibu Sinta',
                'groom_instagram' => '@dimasarya',
                'bride_name' => 'Nabila Putri',
                'bride_nickname' => 'Nabila',
                'bride_parents' => 'Putri dari Bapak Gunawan & Ibu Rini',
                'bride_instagram' => '@nabilaputri',
                'event_date' => now()->addDays(30),
                'event_time' => '10:00',
                'event_end_time' => '13:00',
                'venue' => 'Sasana Kriya Grand Ballroom',
                'address' => 'TMII, Jakarta Timur',
                'show_quote' => true,
                'quran_text' => 'وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا',
                'quran_translation' => 'Dan di antara tanda-tanda kebesaran-Nya...',
                'quote_source' => 'QS. Ar-Rum: 21',
                'status' => 'published',
                'published_at' => now(),
            ]);

            $response = $this->get('/undangan/'.$invitation->slug);
            $response->assertStatus(200);
            $response->assertSee('Dimas');
            $response->assertSee('Nabila');
            $response->assertSee('Sasana Kriya Grand Ballroom');
            $response->assertSee('floating-bottom-nav-wrapper');
            $response->assertSee('floating-bottom-nav');
            $response->assertSee('floating-music-container');
            $response->assertSee('fixed bottom-4 left-0 right-0 z-50 flex justify-center items-center pointer-events-none px-4');
            $response->assertSee('fixed bottom-4 right-4 z-50 flex items-center gap-2 pointer-events-auto');
        }
    }

    public function test_quote_section_is_conditionally_rendered_based_on_show_quote(): void
    {
        $user = User::factory()->create();
        $theme = Theme::first();

        // 1. With show_quote = false
        $invitationHiddenQuote = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $theme->id,
            'title' => 'Wedding Without Quote',
            'slug' => 'wedding-no-quote',
            'groom_name' => 'Fajar Pratama',
            'groom_nickname' => 'Fajar',
            'bride_name' => 'Tiara Lestari',
            'bride_nickname' => 'Tiara',
            'event_date' => now()->addDays(30),
            'event_time' => '10:00',
            'venue' => 'Hotel Indonesia Kempinski',
            'show_quote' => false,
            'quran_text' => 'وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا',
            'quran_translation' => 'Dan di antara tanda-tanda kebesaran-Nya...',
            'quote_source' => 'QS. Ar-Rum: 21',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $responseHidden = $this->get('/undangan/'.$invitationHiddenQuote->slug);
        $responseHidden->assertStatus(200);
        $responseHidden->assertDontSee('وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا');
        $responseHidden->assertDontSee('QS. Ar-Rum: 21');

        // 2. With show_quote = true
        $invitationShownQuote = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $theme->id,
            'title' => 'Wedding With Quote',
            'slug' => 'wedding-with-quote',
            'groom_name' => 'Fajar Pratama',
            'groom_nickname' => 'Fajar',
            'bride_name' => 'Tiara Lestari',
            'bride_nickname' => 'Tiara',
            'event_date' => now()->addDays(30),
            'event_time' => '10:00',
            'venue' => 'Hotel Indonesia Kempinski',
            'show_quote' => true,
            'quran_text' => 'وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا',
            'quran_translation' => 'Dan di antara tanda-tanda kebesaran-Nya...',
            'quote_source' => 'QS. Ar-Rum: 21',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $responseShown = $this->get('/undangan/'.$invitationShownQuote->slug);
        $responseShown->assertStatus(200);
        $responseShown->assertSee('وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا');
        $responseShown->assertSee('QS. Ar-Rum: 21');
    }

    public function test_all_theme_templates_strictly_contain_zero_emojis(): void
    {
        $themeFiles = glob(resource_path('views/invitations/themes/*.blade.php'));
        $this->assertCount(20, $themeFiles);

        $emojiPattern = '/[\x{1F600}-\x{1F64F}\x{1F300}-\x{1F5FF}\x{1F680}-\x{1F6FF}\x{1F1E0}-\x{1F1FF}\x{2600}-\x{26FF}\x{2700}-\x{27BF}\x{1F900}-\x{1F9FF}\x{1FA70}-\x{1FAFF}]/u';

        foreach ($themeFiles as $file) {
            $content = file_get_contents($file);
            $hasEmoji = preg_match($emojiPattern, $content);
            $this->assertEquals(0, $hasEmoji, 'Emoji detected in theme file: '.basename($file));
        }
    }

    public function test_invitation_show_page_renders_cover_overlay_recipient_and_buka_undangan(): void
    {
        $user = User::factory()->create();
        $theme = Theme::first();

        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Rian & Maya',
            'slug' => 'rian-dan-maya-show',
            'groom_name' => 'Rian Pratama',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Savitri',
            'bride_nickname' => 'Maya',
            'event_date' => now()->addDays(20),
            'event_time' => '10:00',
            'venue' => 'Grand Ballroom',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->get('/undangan/'.$invitation->slug.'?to=Bapak+Hendra+Kurniawan');
        $response->assertStatus(200);
        $response->assertSee('invitation-cover-overlay');
        $response->assertSee('The Wedding of');
        $response->assertSee('Rian & Maya');
        $response->assertSee('Bapak Hendra Kurniawan');
        $response->assertSee('Buka Undangan');
        $response->assertSee('musicToggleBtn');
        $response->assertSee('vinylDiscSvg');
    }

    public function test_theme_12_champagne_bloom_renders_bespoke_dual_pane_and_custom_guest_name(): void
    {
        $user = User::factory()->create();
        $theme12 = Theme::where('slug', 'premium-champagne-bloom')->firstOrFail();

        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $theme12->id,
            'title' => 'The Wedding of Raden & Anisa',
            'slug' => 'raden-anisa-champagne-bloom',
            'groom_name' => 'Raden Mas Arya',
            'groom_nickname' => 'Raden',
            'groom_parents' => 'Putra dari Bapak Arya & Ibu Sinta',
            'groom_instagram' => '@radenarya',
            'groom_photo' => 'groom.jpg',
            'bride_name' => 'Anisa Rahmawati',
            'bride_nickname' => 'Anisa',
            'bride_parents' => 'Putri dari Bapak Gunawan & Ibu Rini',
            'bride_instagram' => '@anisarhma',
            'bride_photo' => 'bride.jpg',
            'event_date' => now()->addDays(25),
            'event_time' => '09:00',
            'venue' => 'Grand Ballroom Senayan',
            'address' => 'Jakarta Pusat',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->get('/undangan/'.$invitation->slug.'?to=Bapak+Joko+Susanto');
        $response->assertStatus(200);

        // Custom guest name verification on Cover & Sidebar
        $response->assertSee('Bapak Joko Susanto');

        // Assets verification
        $response->assertSee('bg-vertical.jpg');
        $response->assertSee('bg-horizontal.jpg');
        $response->assertSee('frame-circle.png');
        $response->assertSee('garland-horizontal.png');
        $response->assertSee('flower-corner-tl.png');
        $response->assertSee('flower-corner-tr.png');
        $response->assertSee('t12-desktop-sidebar');

        // Names & sections
        $response->assertSee('Raden');
        $response->assertSee('Anisa');
        $response->assertSee('Simpan Tanggal');
        $response->assertSee('Our Story');
        $response->assertSee('Galeri Bahagia');
        $response->assertSee('Kirim Hadiah Digital');
        $response->assertSee('Salin Rekening');
        $response->assertSee('Buka Undangan');

        // Demo endpoint test with custom guest name
        $demoResponse = $this->get('/tema/12/demo?to=Ibu+Siti+Aminah');
        $demoResponse->assertStatus(200);
        $demoResponse->assertSee('Ibu Siti Aminah');
        $demoResponse->assertSee('frame-circle.png');
        $demoResponse->assertSee('bg-vertical.jpg');
    }

    public function test_theme_catalog_and_editor_support_demo_modal_and_music_library(): void
    {
        $user = User::factory()->create();

        // 1. Catalog page contains Lihat Demo and Demo Modal
        $catalog = $this->get('/tema');
        $catalog->assertStatus(200);
        $catalog->assertSee('Lihat Demo');
        $catalog->assertSee('theme-demo-modal');
        $catalog->assertSee('Buka Undangan');

        // 2. Editor page contains Preview button, Music Library Modal, and Theme Demo Modal
        $editor = $this->actingAs($user)->get('/dashboard/undangan/create');
        $editor->assertStatus(200);
        $editor->assertSee('Pratinjau Undangan');
        $editor->assertSee('btn-preview-invitation');
        $editor->assertSee('music-library-modal');
        $editor->assertSee('theme-demo-modal');
        $editor->assertSee('Pilih dari Pustaka (20 Lagu)');
        $editor->assertSee('Modern Acoustic (10)');
        $editor->assertSee('Classical & Sacred (10)', false);
        $editor->assertSee('Upload Lagu Sendiri (.mp3)');
        $editor->assertSee('modal_custom_music_input');
    }

    public function test_music_library_has_20_royalty_free_tracks_in_two_categories(): void
    {
        $this->seed(MusicSeeder::class);

        $this->assertEquals(20, Music::count());

        $track1 = Music::find(1);
        $this->assertEquals('Solo Acoustic Serenade', $track1->title);
        $this->assertEquals('Modern Acoustic', $track1->category);
        $this->assertStringStartsWith('http', $track1->audio_url);

        $track11 = Music::find(11);
        $this->assertEquals('Canon in D Major', $track11->title);
        $this->assertEquals('Classical & Sacred', $track11->category);
        $this->assertStringStartsWith('http', $track11->audio_url);

        $track12 = Music::find(12);
        $this->assertEquals('Bridal Chorus (Here Comes the Bride)', $track12->title);
        $this->assertEquals('Classical & Sacred', $track12->category);
    }

    public function test_theme_demo_endpoint_renders_full_invitation_with_dummy_data(): void
    {
        $this->seed(MusicSeeder::class);

        $theme1 = Theme::find(1);
        $response = $this->get('/tema/'.$theme1->id.'/demo');
        $response->assertStatus(200);
        $response->assertSee('The Wedding of');
        $response->assertSee('Rian & Maya', false);
        $response->assertSee('Buka Undangan');
        $response->assertSee('Grand Ballroom Hotel Mulia');
        $response->assertSee('Akad Nikah');
        $response->assertSee('Resepsi Pernikahan');
        $response->assertSee('Konfirmasi Kehadiran (RSVP)');
        $response->assertSee('Tanda Kasih');
        $response->assertSee('bgMusic');
        $response->assertSee('vinylDiscSvg');

        // Test with slug
        $responseSlug = $this->get('/tema/'.$theme1->slug.'/demo');
        $responseSlug->assertStatus(200);
        $responseSlug->assertSee('The Wedding of');

        // Test all 20 themes render successfully
        $allThemes = Theme::all();
        $this->assertCount(20, $allThemes);
        foreach ($allThemes as $t) {
            $resp = $this->get('/tema/'.$t->id.'/demo');
            $resp->assertStatus(200);
            $resp->assertSee('Buka Undangan');
        }
    }

    public function test_invitation_editor_renders_6_step_wizard_and_guest_management_ui(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard/undangan/create');
        $response->assertStatus(200);

        // Stepper Bar Lingkaran 1 sampai 6
        $response->assertSee('step-circle-1');
        $response->assertSee('step-circle-2');
        $response->assertSee('step-circle-3');
        $response->assertSee('step-circle-4');
        $response->assertSee('step-circle-5');
        $response->assertSee('step-circle-6');

        // Step Panes 1 sampai 6
        $response->assertSee('step-content-1');
        $response->assertSee('step-content-2');
        $response->assertSee('step-content-3');
        $response->assertSee('step-content-4');
        $response->assertSee('step-content-5');
        $response->assertSee('step-content-6');

        // Step 6 Features: WhatsApp Template & Guest Management
        $response->assertSee('whatsapp_template_editor');
        $response->assertSee('{nama_tamu}');
        $response->assertSee('{link_undangan}');
        $response->assertSee('whatsapp-live-preview-box');
        $response->assertSee('new_guest_name_input');
        $response->assertSee('new_guest_phone_input');
        $response->assertSee('guest-table-body');
        $response->assertSee('guests_json');
        $response->assertSee('toast-notification');
    }

    public function test_user_can_save_invitation_with_whatsapp_template_and_guests_json(): void
    {
        $user = User::factory()->create();
        $theme = Theme::where('tier', 'basic')->first();

        $guests = [
            ['name' => 'Budi Santoso & Pasangan', 'phone' => '08123456789'],
            ['name' => 'Keluarga Bpk. Hendra', 'phone' => '08987654321'],
        ];

        $whatsappTemplate = "Kepada Yth. {nama_tamu},\nKami mengundang Anda: {link_undangan}";

        $postData = [
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Budi & Ani',
            'slug' => 'budi-ani-'.uniqid(),
            'groom_name' => 'Budi Santoso',
            'groom_nickname' => 'Budi',
            'bride_name' => 'Ani Lestari',
            'bride_nickname' => 'Ani',
            'event_date' => '2026-11-20',
            'event_time' => '10:00',
            'venue' => 'Gedung Serbaguna',
            'address' => 'Jl. Merdeka No. 10',
            'whatsapp_template' => $whatsappTemplate,
            'guests_json' => json_encode($guests),
            'action' => 'publish',
        ];

        $response = $this->actingAs($user)->post('/dashboard/undangan', $postData);
        $response->assertRedirect();

        $invitation = Invitation::where('slug', $postData['slug'])->first();
        $this->assertNotNull($invitation);
        $this->assertEquals($whatsappTemplate, $invitation->whatsapp_template);
        $this->assertEquals('published', $invitation->status);

        // Check guests created
        $this->assertCount(2, $invitation->guests);
        $this->assertTrue($invitation->guests->contains('name', 'Budi Santoso & Pasangan'));
        $this->assertTrue($invitation->guests->contains('name', 'Keluarga Bpk. Hendra'));

        foreach ($invitation->guests as $g) {
            $this->assertNotEmpty($g->unique_token);
            $this->assertNotEmpty($g->invitation_url);
        }
    }

    public function test_preview_route_and_ajax_draft_persistence(): void
    {
        $this->seed(MusicSeeder::class);
        $user = User::factory()->create();
        $theme = Theme::where('tier', 'basic')->first();

        // 1. AJAX Store Draft
        $storeData = [
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Draf Test',
            'slug' => 'draf-test-'.uniqid(),
            'groom_name' => 'Rian Pratama',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Anggraini',
            'bride_nickname' => 'Maya',
            'action' => 'draft',
        ];

        $storeResponse = $this->actingAs($user)->postJson('/dashboard/undangan', $storeData);
        $storeResponse->assertStatus(200);
        $storeResponse->assertJson([
            'success' => true,
        ]);

        $invitationId = $storeResponse->json('id');
        $this->assertNotNull($invitationId);
        $this->assertEquals(url('/undangan/preview/'.$invitationId), $storeResponse->json('preview_url'));

        // 2. AJAX Update Draft
        $updateData = [
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Draf Updated',
            'groom_name' => 'Rian Updated',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Updated',
            'bride_nickname' => 'Maya',
            'action' => 'draft',
        ];

        $updateResponse = $this->actingAs($user)->putJson('/dashboard/undangan/'.$invitationId, $updateData);
        $updateResponse->assertStatus(200);
        $updateResponse->assertJson([
            'success' => true,
            'id' => $invitationId,
        ]);

        // 3. GET /undangan/preview/{id}
        $previewResponse = $this->actingAs($user)->get('/undangan/preview/'.$invitationId);
        $previewResponse->assertStatus(200);
        $previewResponse->assertSee('Rian Updated');
        $previewResponse->assertSee('Maya Updated');
        $previewResponse->assertSee('bgMusic');
        $previewResponse->assertSee('vinylDiscSvg');
    }

    public function test_draft_photo_upload_supports_large_images_and_safely_falls_back(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $theme = Theme::where('tier', 'basic')->first();

        // 1. Create with uploaded photos (6MB fake image)
        $bridePhoto = UploadedFile::fake()->image('bride.jpg', 800, 800)->size(6144);
        $groomPhoto = UploadedFile::fake()->image('groom.jpg', 800, 800)->size(6144);

        $storeResponse = $this->actingAs($user)->post('/dashboard/undangan', [
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Foto Test',
            'slug' => 'foto-test-'.uniqid(),
            'groom_name' => 'Rian Pratama',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Anggraini',
            'bride_nickname' => 'Maya',
            'groom_photo' => $groomPhoto,
            'bride_photo' => $bridePhoto,
            'action' => 'draft',
        ], ['X-Requested-With' => 'XMLHttpRequest']);

        $storeResponse->assertStatus(200);
        $invitationId = $storeResponse->json('id');
        $invitation = Invitation::find($invitationId);
        $this->assertNotNull($invitation->bride_photo);
        $this->assertStringContainsString('invitations/photos', $invitation->bride_photo);

        // 2. Update draft without sending photos (simulating subsequent preview or update without re-upload)
        $updateResponse = $this->actingAs($user)->put('/dashboard/undangan/'.$invitationId, [
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Foto Test Updated',
            'groom_name' => 'Rian Pratama',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Anggraini',
            'bride_nickname' => 'Maya',
            'action' => 'draft',
        ], ['X-Requested-With' => 'XMLHttpRequest']);

        $updateResponse->assertStatus(200);
        $invitation->refresh();
        // Existing photo is preserved
        $this->assertNotNull($invitation->bride_photo);

        // 3. Preview page renders both preserved photos
        $previewResponse = $this->actingAs($user)->get('/undangan/preview/'.$invitationId);
        $previewResponse->assertStatus(200);
        $previewResponse->assertSee($invitation->bride_photo);
        $previewResponse->assertSee($invitation->groom_photo);
    }

    public function test_auto_save_draft_wizard_photo_handling_does_not_fail_on_subsequent_steps(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $theme = Theme::where('tier', 'basic')->first();

        // Step 1/2 auto-save without photos
        $initialSave = $this->actingAs($user)->post('/dashboard/undangan', [
            'theme_id' => $theme->id,
            'title' => 'Simpul Auto Save Wizard',
            'slug' => 'auto-save-'.uniqid(),
            'action' => 'draft',
        ], ['X-Requested-With' => 'XMLHttpRequest']);

        $initialSave->assertStatus(200);
        $initialSave->assertJsonMissing(['errors' => ['bride_photo']]);
        $invitationId = $initialSave->json('id');
        $invitation = Invitation::findOrFail($invitationId);

        // Step 3: user uploads bride photo
        $bridePhoto = UploadedFile::fake()->image('bride-step3.jpg', 600, 600);
        $step3Save = $this->actingAs($user)->put('/dashboard/undangan/'.$invitationId, [
            'theme_id' => $theme->id,
            'bride_photo' => $bridePhoto,
            'action' => 'draft',
        ], ['X-Requested-With' => 'XMLHttpRequest']);

        $step3Save->assertStatus(200);
        $invitation->refresh();
        $this->assertNotNull($invitation->bride_photo);
        $savedBridePath = $invitation->bride_photo;

        // Step 4 to 6: user moves across steps without sending photo keys
        $subsequentStepSave = $this->actingAs($user)->put('/dashboard/undangan/'.$invitationId, [
            'theme_id' => $theme->id,
            'venue' => 'Grand Ballroom',
            'address' => 'Jl. Kebahagiaan No. 1',
            'action' => 'draft',
        ], ['X-Requested-With' => 'XMLHttpRequest']);

        $subsequentStepSave->assertStatus(200);
        $subsequentStepSave->assertJsonMissingValidationErrors(['bride_photo', 'groom_photo']);
        $invitation->refresh();
        // Photo from step 3 is preserved!
        $this->assertEquals($savedBridePath, $invitation->bride_photo);
    }

    public function test_preview_renders_uploaded_photos_and_fallback_avatars_across_themes(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $basicTheme = Theme::where('slug', 'basic-harmony-maroon')->first() ?? Theme::where('tier', 'basic')->first();
        $monoTheme = Theme::where('slug', 'basic-harmony-monochrome')->first();

        // 1. Test Fallback placeholder avatar when no photo is uploaded
        $draftNoPhoto = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $basicTheme->id,
            'slug' => 'test-fallback-'.uniqid(),
            'groom_name' => 'Groom Dummy',
            'groom_nickname' => 'Groom',
            'bride_name' => 'Bride Dummy',
            'bride_nickname' => 'Bride',
            'event_date' => now()->addDays(30),
            'event_time' => '09:00',
            'venue' => 'Venue Dummy',
            'status' => 'draft',
        ]);

        $this->assertNull($draftNoPhoto->groom_photo_url);
        $this->assertNull($draftNoPhoto->bride_photo_url);

        $responseFallback = $this->actingAs($user)->get('/undangan/preview/'.$draftNoPhoto->id);
        $responseFallback->assertStatus(200);
        $responseFallback->assertSee('placeholder-avatar');
        $responseFallback->assertSee('bg-[#8B3A1C]');
        $responseFallback->assertSee('bg-[#65011E]');

        // 2. Test Uploaded photos rendering
        $groomFile = UploadedFile::fake()->image('groom.jpg', 400, 400);
        $brideFile = UploadedFile::fake()->image('bride.jpg', 400, 400);

        $groomPath = $groomFile->store('invitations/photos', 'public');
        $bridePath = $brideFile->store('invitations/photos', 'public');

        $draftWithPhoto = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $basicTheme->id,
            'slug' => 'test-photos-'.uniqid(),
            'groom_name' => 'Groom Real',
            'groom_nickname' => 'Groom',
            'groom_photo' => $groomPath,
            'bride_name' => 'Bride Real',
            'bride_nickname' => 'Bride',
            'bride_photo' => $bridePath,
            'event_date' => now()->addDays(30),
            'event_time' => '09:00',
            'venue' => 'Venue Dummy',
            'status' => 'draft',
        ]);

        $this->assertStringContainsString('storage/'.$groomPath, $draftWithPhoto->groom_photo_url);
        $this->assertStringContainsString('storage/'.$bridePath, $draftWithPhoto->bride_photo_url);

        $responsePhotos = $this->actingAs($user)->get('/undangan/preview/'.$draftWithPhoto->id);
        $responsePhotos->assertStatus(200);
        $responsePhotos->assertSee('storage/'.$groomPath);
        $responsePhotos->assertSee('storage/'.$bridePath);

        // 3. Test Monochrome theme preserves grayscale
        if ($monoTheme) {
            $draftMono = Invitation::create([
                'user_id' => $user->id,
                'theme_id' => $monoTheme->id,
                'slug' => 'test-mono-'.uniqid(),
                'groom_name' => 'Groom Mono',
                'groom_nickname' => 'Groom',
                'groom_photo' => $groomPath,
                'bride_name' => 'Bride Mono',
                'bride_nickname' => 'Bride',
                'bride_photo' => $bridePath,
                'event_date' => now()->addDays(30),
                'event_time' => '09:00',
                'venue' => 'Venue Mono',
                'status' => 'draft',
            ]);

            $responseMono = $this->actingAs($user)->get('/undangan/preview/'.$draftMono->id);
            $responseMono->assertStatus(200);
            $responseMono->assertSee('grayscale');
        }
    }

    public function test_save_draft_endpoint_saves_photos_and_updates_same_row(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $basicTheme = Theme::where('tier', 'basic')->first();

        // 1. Initial save-draft via AJAX
        $groomFile = UploadedFile::fake()->image('groom_first.jpg', 500, 500);
        $firstSave = $this->actingAs($user)->postJson('/dashboard/undangan/save-draft', [
            'theme_id' => $basicTheme->id,
            'title' => 'Draf Pernikahan',
            'slug' => 'draf-pertama-'.uniqid(),
            'groom_name' => 'Rian Pertama',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Pertama',
            'bride_nickname' => 'Maya',
            'groom_photo' => $groomFile,
        ]);

        $firstSave->assertStatus(200)
            ->assertJson([
                'success' => true,
            ])
            ->assertJsonStructure(['id', 'slug', 'preview_url']);

        $invitationId = $firstSave->json('id');
        $invitation = Invitation::findOrFail($invitationId);
        $this->assertEquals($user->id, $invitation->user_id);
        $this->assertNotNull($invitation->groom_photo);
        $firstGroomPath = $invitation->groom_photo;
        Storage::disk('public')->assertExists($firstGroomPath);

        // 2. Subsequent save-draft passing invitation_id updates the same row
        $brideFile = UploadedFile::fake()->image('bride_second.jpg', 500, 500);
        $secondSave = $this->actingAs($user)->postJson('/dashboard/undangan/save-draft', [
            'invitation_id' => $invitationId,
            'theme_id' => $basicTheme->id,
            'venue' => 'Gedung Kesenian Baru',
            'bride_photo' => $brideFile,
        ]);

        $secondSave->assertStatus(200)
            ->assertJson([
                'success' => true,
                'id' => $invitationId,
            ]);

        // Verify count: still 1 invitation, not duplicated!
        $this->assertEquals(1, Invitation::where('user_id', $user->id)->count());

        $invitation->refresh();
        $this->assertEquals('Gedung Kesenian Baru', $invitation->venue);
        $this->assertEquals($firstGroomPath, $invitation->groom_photo);
        $this->assertNotNull($invitation->bride_photo);
        Storage::disk('public')->assertExists($invitation->bride_photo);
    }

    public function test_all_twenty_themes_render_couple_arch_dome_containers_and_photos(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $allThemes = Theme::all();
        $this->assertGreaterThanOrEqual(20, $allThemes->count());

        $groomFile = UploadedFile::fake()->image('groom.jpg', 300, 300);
        $brideFile = UploadedFile::fake()->image('bride.jpg', 300, 300);
        $groomPath = $groomFile->store('invitations/photos', 'public');
        $bridePath = $brideFile->store('invitations/photos', 'public');

        foreach ($allThemes as $theme) {
            // Test with photos
            $invWithPhotos = Invitation::create([
                'user_id' => $user->id,
                'theme_id' => $theme->id,
                'slug' => 'test-theme-photos-'.$theme->slug.'-'.uniqid(),
                'groom_name' => 'Mempelai Pria Test',
                'groom_nickname' => 'Groom',
                'groom_photo' => $groomPath,
                'bride_name' => 'Mempelai Wanita Test',
                'bride_nickname' => 'Bride',
                'bride_photo' => $bridePath,
                'event_date' => now()->addDays(30),
                'event_time' => '09:00',
                'venue' => 'Gedung Uji',
                'status' => 'draft',
            ]);

            $responsePhotos = $this->actingAs($user)->get('/undangan/preview/'.$invWithPhotos->id);
            $responsePhotos->assertStatus(200);
            if ($theme->id === 1) {
                $responsePhotos->assertSee('aspect-[3/4]', false);
                $responsePhotos->assertSee('storage/'.$groomPath, false);
                $responsePhotos->assertSee('storage/'.$bridePath, false);
                $responsePhotos->assertSee('alt="Mempelai Pria"', false);
                $responsePhotos->assertSee('alt="Mempelai Wanita"', false);
            } elseif ($theme->id === 2) {
                $responsePhotos->assertSee('aspect-[3/4] mx-auto rounded-lg overflow-hidden border-2 border-[#D4AF37]/70 shadow-lg', false);
                $responsePhotos->assertSee('storage/'.$groomPath, false);
                $responsePhotos->assertSee('storage/'.$bridePath, false);
                $responsePhotos->assertSee('alt="The Groom"', false);
                $responsePhotos->assertSee('alt="The Bride"', false);
            } elseif ($theme->id === 3) {
                $responsePhotos->assertSee('aspect-[3/4] bg-slate-900', false);
                $responsePhotos->assertSee('storage/'.$groomPath, false);
                $responsePhotos->assertSee('storage/'.$bridePath, false);
                $responsePhotos->assertSee('alt="The Groom"', false);
                $responsePhotos->assertSee('alt="The Bride"', false);
            } elseif ($theme->id === 5) {
                $responsePhotos->assertSee('rounded-full overflow-hidden border-2 border-white/20', false);
                $responsePhotos->assertSee('storage/'.$groomPath, false);
                $responsePhotos->assertSee('storage/'.$bridePath, false);
            } elseif (in_array($theme->id, [4, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20])) {
                $responsePhotos->assertSee('storage/'.$groomPath, false);
                $responsePhotos->assertSee('storage/'.$bridePath, false);
            } else {
                $responsePhotos->assertSee('w-36 h-48 mx-auto rounded-t-full overflow-hidden border-2 border-[#D4AF37] relative flex items-center justify-center', false);
                $responsePhotos->assertSee('storage/'.$groomPath, false);
                $responsePhotos->assertSee('storage/'.$bridePath, false);
                $responsePhotos->assertSee('alt="Mempelai Pria"', false);
                $responsePhotos->assertSee('alt="Mempelai Wanita"', false);
            }

            // Test without photos (fallback placeholder SVG or preset gallery photo)
            $invNoPhotos = Invitation::create([
                'user_id' => $user->id,
                'theme_id' => $theme->id,
                'slug' => 'test-theme-empty-'.$theme->slug.'-'.uniqid(),
                'groom_name' => 'Mempelai Pria Empty',
                'groom_nickname' => 'Groom',
                'groom_photo' => null,
                'bride_name' => 'Mempelai Wanita Empty',
                'bride_nickname' => 'Bride',
                'bride_photo' => null,
                'event_date' => now()->addDays(30),
                'event_time' => '09:00',
                'venue' => 'Gedung Uji',
                'status' => 'draft',
            ]);

            $responseEmpty = $this->actingAs($user)->get('/undangan/preview/'.$invNoPhotos->id);
            $responseEmpty->assertStatus(200);
            if ($theme->id === 1) {
                $responseEmpty->assertSee('bg-[#8B3A1C]', false);
                $responseEmpty->assertSee('bg-[#65011E]', false);
                $responseEmpty->assertSee('aspect-[3/4]', false);
            } elseif ($theme->id === 2) {
                $responseEmpty->assertSee('aspect-[3/4] mx-auto rounded-lg overflow-hidden border-2 border-[#D4AF37]/70 shadow-lg', false);
                $responseEmpty->assertSee('THE BRIDE', false);
                $responseEmpty->assertSee('THE GROOM', false);
            } elseif ($theme->id === 3) {
                $responseEmpty->assertSee('aspect-[3/4] bg-slate-900', false);
                $responseEmpty->assertSee('The Bride', false);
                $responseEmpty->assertSee('The Groom', false);
            } elseif ($theme->id === 5) {
                $responseEmpty->assertSee('bg-[#2C2D2F]', false);
                $responseEmpty->assertSee('rounded-full overflow-hidden border-2 border-white/20', false);
            } elseif ($theme->id === 7) {
                $responseEmpty->assertSee('bride-cartoon.png', false);
                $responseEmpty->assertSee('groom-cartoon.png', false);
            } elseif (in_array($theme->id, [4, 6, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20])) {
                $responseEmpty->assertStatus(200);
            } else {
                $responseEmpty->assertSee('bg-[#8B3A1C]', false);
                $responseEmpty->assertSee('bg-[#65011E]', false);
                $responseEmpty->assertSee('w-36 h-48 mx-auto rounded-t-full overflow-hidden border-2 border-[#D4AF37] relative flex items-center justify-center', false);
            }
        }
    }

    public function test_dashboard_and_invitations_index_render_delete_button_and_modal(): void
    {
        $user = User::factory()->create();
        $theme = Theme::first();

        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Akbar',
            'slug' => 'pernikahan-akbar-'.uniqid(),
            'groom_name' => 'Akbar',
            'groom_nickname' => 'Akbar',
            'bride_name' => 'Lestari',
            'bride_nickname' => 'Lestari',
            'event_date' => now()->addDays(30),
            'event_time' => '09:00',
            'venue' => 'Gedung Kartika',
            'status' => 'draft',
        ]);

        // 1. Check /dashboard
        $responseDashboard = $this->actingAs($user)->get('/dashboard');
        $responseDashboard->assertStatus(200);
        $responseDashboard->assertSee('btn-delete-invitation', false);
        $responseDashboard->assertSee('data-id="'.$invitation->id.'"', false);
        $responseDashboard->assertSee('data-title="'.$invitation->title.'"', false);
        $responseDashboard->assertSee('Hapus Undangan Ini? Seluruh data mempelai, jadwal acara, daftar tamu, dan foto terkait undangan ini akan dihapus secara permanen.', false);
        $responseDashboard->assertSee('Ya, Hapus', false);

        // 2. Check /dashboard/undangan
        $responseList = $this->actingAs($user)->get('/dashboard/undangan');
        $responseList->assertStatus(200);
        $responseList->assertSee('btn-delete-invitation', false);
        $responseList->assertSee('data-id="'.$invitation->id.'"', false);
        $responseList->assertSee('data-title="'.$invitation->title.'"', false);
        $responseList->assertSee('id="invitation-card-'.$invitation->id.'"', false);
        $responseList->assertSee('Hapus Undangan Ini? Seluruh data mempelai, jadwal acara, daftar tamu, dan foto terkait undangan ini akan dihapus secara permanen.', false);
        $responseList->assertSee('Ya, Hapus', false);
    }

    public function test_delete_invitation_removes_photos_relations_and_database_row(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $theme = Theme::first();

        $groomFile = UploadedFile::fake()->image('groom_del.jpg', 300, 300);
        $brideFile = UploadedFile::fake()->image('bride_del.jpg', 300, 300);
        $groomPath = $groomFile->store('invitations/photos', 'public');
        $bridePath = $brideFile->store('invitations/photos', 'public');

        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Hapus',
            'slug' => 'pernikahan-hapus-'.uniqid(),
            'groom_name' => 'Groom',
            'groom_nickname' => 'Groom',
            'groom_photo' => $groomPath,
            'bride_name' => 'Bride',
            'bride_nickname' => 'Bride',
            'bride_photo' => $bridePath,
            'event_date' => now()->addDays(30),
            'event_time' => '09:00',
            'venue' => 'Gedung Hapus',
            'status' => 'draft',
        ]);

        // Add related guest, rsvp, and comments
        $guest = $invitation->guests()->create([
            'name' => 'Tamu Pertama',
            'phone' => '08123456789',
            'unique_token' => 'TOK12345',
        ]);

        $invitation->rsvps()->create([
            'name' => 'Tamu Pertama',
            'attendance' => 'hadir',
            'guest_count' => 2,
        ]);

        $invitation->comments()->create([
            'name' => 'Tamu Pertama',
            'message' => 'Selamat berbahagia!',
            'status' => 'approved',
        ]);

        Storage::disk('public')->assertExists($groomPath);
        Storage::disk('public')->assertExists($bridePath);

        // 1. Other user cannot delete
        $unauthResponse = $this->actingAs($otherUser)->deleteJson('/dashboard/undangan/'.$invitation->id);
        $unauthResponse->assertStatus(404);
        $this->assertDatabaseHas('invitations', ['id' => $invitation->id]);

        // 2. Owner can delete via JSON AJAX
        $deleteResponse = $this->actingAs($user)->deleteJson('/dashboard/undangan/'.$invitation->id);
        $deleteResponse->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'Undangan berhasil dihapus',
            ]);

        // Storage photos deleted
        Storage::disk('public')->assertMissing($groomPath);
        Storage::disk('public')->assertMissing($bridePath);

        // Database row and relations deleted
        $this->assertDatabaseMissing('invitations', ['id' => $invitation->id]);
        $this->assertDatabaseMissing('invitation_guests', ['id' => $guest->id]);
        $this->assertDatabaseMissing('rsvps', ['invitation_id' => $invitation->id]);
        $this->assertDatabaseMissing('comments', ['invitation_id' => $invitation->id]);

        // 3. Test standard DELETE form request redirects with success session
        $inv2 = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Kedua',
            'slug' => 'pernikahan-kedua-'.uniqid(),
            'groom_name' => 'Groom 2',
            'groom_nickname' => 'Groom',
            'bride_name' => 'Bride 2',
            'bride_nickname' => 'Bride',
            'event_date' => now()->addDays(30),
            'event_time' => '09:00',
            'venue' => 'Venue 2',
            'status' => 'draft',
        ]);
        $redirectResponse = $this->actingAs($user)->delete('/dashboard/undangan/'.$inv2->id);
        $redirectResponse->assertRedirect(route('dashboard.invitations.index'));
        $redirectResponse->assertSessionHas('success', 'Undangan berhasil dihapus');
        $this->assertDatabaseMissing('invitations', ['id' => $inv2->id]);
    }

    public function test_save_draft_with_base64_photo_fallback_and_preview_across_themes(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $theme = Theme::where('tier', 'basic')->first();

        // 1x1 transparent png in base64
        $fakeBase64 = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=';

        $draftResponse = $this->actingAs($user)->post('/dashboard/undangan/save-draft', [
            'theme_id' => $theme->id,
            'title' => 'Pernikahan Base64 Fallback',
            'groom_name' => 'Ferry Pratama',
            'groom_nickname' => 'Ferry',
            'bride_name' => 'Siti Aisyah',
            'bride_nickname' => 'Aisyah',
            'groom_photo_base64' => $fakeBase64,
            'bride_photo_base64' => $fakeBase64,
        ], ['X-Requested-With' => 'XMLHttpRequest']);

        $draftResponse->assertStatus(200);
        $draftData = $draftResponse->json();
        $this->assertTrue($draftData['success']);
        $this->assertNotNull($draftData['groom_photo']);
        $this->assertNotNull($draftData['bride_photo']);

        $invitation = Invitation::findOrFail($draftData['id']);
        Storage::disk('public')->assertExists($invitation->groom_photo);
        Storage::disk('public')->assertExists($invitation->bride_photo);

        $previewResponse = $this->actingAs($user)->get('/undangan/preview/'.$invitation->id);
        $previewResponse->assertStatus(200);
        $previewResponse->assertSee($invitation->groom_photo);
        $previewResponse->assertSee($invitation->bride_photo);
        $previewResponse->assertSee('alt="Mempelai Pria"', false);
        $previewResponse->assertSee('alt="Mempelai Wanita"', false);
    }

    public function test_floating_bottom_navbar_is_centered_in_theme_demo_simulator_mode(): void
    {
        $theme = Theme::first();
        $response = $this->get('/tema/'.$theme->slug.'/demo');
        $response->assertStatus(200);
        $response->assertSee('floating-bottom-nav-wrapper');
        $response->assertSee('floating-bottom-nav');
        $response->assertSee('floating-music-container');
        $response->assertSee('fixed bottom-4 left-0 right-0 z-50 flex justify-center items-center pointer-events-none px-4');
        $response->assertSee('fixed bottom-4 right-4 z-50 flex items-center gap-2 pointer-events-auto');
    }

    public function test_invitation_wizard_supports_gallery_photos_and_love_story_and_unified_editor(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $theme = Theme::first();

        // 1. Check Create view contains Galeri Foto and Love Story
        $createResponse = $this->actingAs($user)->get('/dashboard/undangan/create');
        $createResponse->assertStatus(200);
        $createResponse->assertSee('Galeri Foto Undangan (Pre-Wedding)');
        $createResponse->assertSee('Tampilkan Kisah Cinta (Love Story)');
        $createResponse->assertSee('galleryPhotoInput');

        // 2. Store with love stories and gallery photo
        $fakePhoto = UploadedFile::fake()->image('prewed1.jpg');
        $storeResponse = $this->actingAs($user)->post('/dashboard/undangan', [
            'theme_id' => $theme->id,
            'title' => 'The Wedding of Kevin & Vania',
            'slug' => 'kevin-vania-story',
            'groom_name' => 'Kevin Sanjaya',
            'groom_nickname' => 'Kevin',
            'bride_name' => 'Vania Alyssa',
            'bride_nickname' => 'Vania',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '10:00',
            'venue' => 'Sky Ballroom',
            'show_love_story' => '1',
            'love_stories' => [
                ['year' => '2019', 'title' => 'Pertama Jumpa', 'story' => 'Bertemu saat ospek kampus.'],
                ['year' => '2021', 'title' => 'Jadian', 'story' => 'Memulai hubungan pacaran.'],
            ],
            'gallery_photos' => [$fakePhoto],
            'status' => 'published',
        ]);

        $invitation = Invitation::where('slug', 'kevin-vania-story')->firstOrFail();
        $this->assertEquals(1, $invitation->photos()->count());
        $this->assertTrue($invitation->show_love_story);
        $this->assertCount(2, $invitation->love_stories);
        $this->assertEquals('Pertama Jumpa', $invitation->love_stories[0]['title']);

        // 3. Check Edit view opens the unified wizard populated with data
        $editResponse = $this->actingAs($user)->get('/dashboard/undangan/'.$invitation->id.'/edit');
        $editResponse->assertStatus(200);
        $editResponse->assertSee('Edit Undangan: Kevin & Vania');
        $editResponse->assertSee('kevin-vania-story');
        $editResponse->assertSee('Pertama Jumpa');
        $editResponse->assertSee('1 Foto Tersimpan');

        // 4. Check Public view displays the custom love stories
        $publicResponse = $this->get('/undangan/'.$invitation->slug);
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('Pertama Jumpa');
        $publicResponse->assertSee('Bertemu saat ospek kampus.');
        $publicResponse->assertSee('Jadian');

        // 5. When show_love_story is turned off, section is hidden
        $invitation->update(['show_love_story' => false]);
        $publicNoStoryResponse = $this->get('/undangan/'.$invitation->slug);
        $publicNoStoryResponse->assertStatus(200);
        $publicNoStoryResponse->assertDontSee('section-cerita');
    }

    public function test_theme_19_sahala_pattern_renders_and_custom_background_photo(): void
    {
        $this->seed(MusicSeeder::class);

        // 1. Check Demo Mode for Theme 19
        $demoResponse = $this->get('/tema/19/demo');
        $demoResponse->assertStatus(200);
        $demoResponse->assertSee('The Wedding of', false);
        $demoResponse->assertSee('hero-cd-days');
        $demoResponse->assertSee('Simpan di Kalender');
        $demoResponse->assertSee('/images/themes/sahala-pattern/rumah-adat-gold.png');
        $demoResponse->assertSee('/images/themes/sahala-pattern/border-horizontal.png');
        $demoResponse->assertSee('/images/themes/sahala-pattern/border-vertical.png');
        $demoResponse->assertSee('/images/themes/sahala-pattern/couple-frame.png');
        $demoResponse->assertSee('/images/themes/sahala-pattern/cover-bg.jpg');
        $demoResponse->assertSee('/images/themes/sahala-pattern/bg-maroon-pattern.jpg');
        $demoResponse->assertSee('/images/themes/sahala-pattern/desktop-left-bg.jpg');
        $demoResponse->assertSee('Navigasi Map');
        $demoResponse->assertSee('Live Streaming');
        $demoResponse->assertSee('Terima Kasih');

        // 2. Create an invitation with custom background photo
        $user = User::factory()->create(['is_premium' => true]);
        $theme19 = Theme::find(19);

        Storage::fake('public');
        $customBg = UploadedFile::fake()->image('custom_bg.jpg', 1200, 1600);

        $response = $this->actingAs($user)->post('/dashboard/undangan', [
            'theme_id' => $theme19->id,
            'slug' => 'randy-yulia-sahala',
            'groom_name' => 'Randy Pratama',
            'groom_nickname' => 'Randy',
            'bride_name' => 'Yulia Anggraini',
            'bride_nickname' => 'Yulia',
            'event_date' => now()->addMonths(2)->format('Y-m-d'),
            'event_time' => '10:00',
            'venue' => 'Sahala Grand Hall',
            'background_photo' => $customBg,
            'status' => 'published',
        ]);

        $invitation = Invitation::where('slug', 'randy-yulia-sahala')->first();
        $this->assertNotNull($invitation);
        $this->assertNotNull($invitation->background_photo);
        $this->assertStringContainsString('invitations/photos', $invitation->background_photo);

        // 3. Render invitation show and ensure full-bleed photo hero uses custom background photo
        $publicResponse = $this->get('/undangan/'.$invitation->slug);
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('Randy & Yulia', false);
        $publicResponse->assertSee('hero-cd-days');
        $publicResponse->assertSee('Simpan di Kalender');
        $publicResponse->assertSee($invitation->background_photo_url);
        $publicResponse->assertSee('/images/themes/sahala-pattern/rumah-adat-gold.png');
        $publicResponse->assertSee('/images/themes/sahala-pattern/border-horizontal.png');
    }

    public function test_create_invitation_with_theme_query_param_preselects_specified_theme(): void
    {
        $user = User::factory()->create(['is_premium' => true]);

        // Visit create route with theme_id=19 (Lavender Mist)
        $response = $this->actingAs($user)->get('/dashboard/undangan/create?theme_id=19');
        $response->assertStatus(200);

        // Assert theme 19 radio is selected
        $response->assertSee('value="19" checked', false);
        $response->assertSee('Terpilih');
    }

    public function test_dashboard_and_invitations_index_render_share_button_and_share_modal(): void
    {
        $user = User::factory()->create();
        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => 1,
            'title' => 'Pernikahan Rian & Maya',
            'slug' => 'rian-maya-share-test',
            'groom_name' => 'Rian Pratama',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Anggraini',
            'bride_nickname' => 'Maya',
            'event_date' => now()->addDays(45),
            'event_time' => '10:00',
            'venue' => 'Grand Ballroom',
            'status' => 'published',
            'published_at' => now(),
        ]);

        // 1. Check Dashboard
        $dashResponse = $this->actingAs($user)->get('/dashboard');
        $dashResponse->assertStatus(200);
        $dashResponse->assertSee('btn-share-invitation');
        $dashResponse->assertSee('Bagikan');
        $dashResponse->assertSee('share-invitation-modal');
        $dashResponse->assertSee('rian-maya-share-test');

        // 2. Check Undangan Saya
        $indexResponse = $this->actingAs($user)->get('/dashboard/undangan');
        $indexResponse->assertStatus(200);
        $indexResponse->assertSee('btn-share-invitation');
        $indexResponse->assertSee('Bagikan');
        $indexResponse->assertSee('share-invitation-modal');
    }

    public function test_rsvp_submission_and_comments_flow_and_dashboard_messages(): void
    {
        $user = User::factory()->create();
        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => 1,
            'title' => 'The Wedding of Rama & Shinta',
            'slug' => 'rama-shinta-messages-test',
            'groom_name' => 'Rama Wijaya',
            'groom_nickname' => 'Rama',
            'bride_name' => 'Shinta Dewi',
            'bride_nickname' => 'Shinta',
            'event_date' => now()->addDays(60),
            'event_time' => '09:00',
            'venue' => 'Candi Prambanan Ballroom',
            'status' => 'published',
            'published_at' => now(),
        ]);

        // Submit RSVP
        $rsvpResponse = $this->post('/undangan/'.$invitation->slug.'/rsvp', [
            'name' => 'Bambang Sudarmono',
            'attendance' => 'masih_ragu',
            'guest_count' => 2,
            'message' => 'Insya Allah akan hadir jika tidak berhalangan dinas.',
        ]);
        $rsvpResponse->assertSessionHas('success');

        // Also test "ragu" fallback
        $rsvpResponse2 = $this->post('/undangan/'.$invitation->slug.'/rsvp', [
            'name' => 'Siti Nurhaliza',
            'attendance' => 'ragu',
            'guest_count' => 1,
            'message' => 'Semoga dilancarkan acaranya.',
        ]);
        $rsvpResponse2->assertSessionHas('success');

        // Submit Comment / Wish
        $commentResponse = $this->post('/undangan/'.$invitation->slug.'/comment', [
            'name' => 'Ahmad Fauzi',
            'message' => 'Selamat menempuh hidup baru Rama & Shinta!',
        ]);
        $commentResponse->assertSessionHas('success');

        // Verify in /dashboard/pesan
        $messagesResponse = $this->actingAs($user)->get('/dashboard/pesan');
        $messagesResponse->assertStatus(200);
        $messagesResponse->assertSee('Bambang Sudarmono');
        $messagesResponse->assertSee('Masih Ragu');
        $messagesResponse->assertSee('Ahmad Fauzi');
        $messagesResponse->assertSee('Selamat menempuh hidup baru Rama & Shinta!');
    }

    public function test_guest_personalized_link_and_whatsapp_sharing(): void
    {
        $user = User::factory()->create();
        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => 1,
            'title' => 'Pernikahan Dimas & Nadia',
            'slug' => 'dimas-nadia-guest-test',
            'groom_name' => 'Dimas Pratama',
            'groom_nickname' => 'Dimas',
            'bride_name' => 'Nadia Salsabila',
            'bride_nickname' => 'Nadia',
            'event_date' => now()->addDays(30),
            'event_time' => '11:00',
            'venue' => 'Hotel Mulia Jakarta',
            'status' => 'published',
            'published_at' => now(),
        ]);

        // Add guest via controller
        $guestResponse = $this->actingAs($user)->post('/dashboard/undangan/'.$invitation->id.'/tamu', [
            'name' => 'Bapak Joko & Istri',
            'phone' => '081298765432',
            'category' => 'Keluarga',
        ]);
        $guestResponse->assertSessionHas('success');

        $guest = $invitation->guests()->where('name', 'Bapak Joko & Istri')->first();
        $this->assertNotNull($guest);
        $this->assertNotNull($guest->unique_token);
        $this->assertNotNull($guest->invitation_url);
        $this->assertStringContainsString('/t/'.$guest->unique_token, $guest->invitation_url);
        $this->assertStringContainsString('Bapak Joko & Istri', $guest->whatsapp_message);

        // Visit personalized invitation link
        $personalizedResponse = $this->get($guest->invitation_url);
        $personalizedResponse->assertStatus(200);
        $personalizedResponse->assertSee('Bapak Joko & Istri');

        // Visit share page
        $shareResponse = $this->actingAs($user)->get('/dashboard/undangan/'.$invitation->id.'/sebar');
        $shareResponse->assertStatus(200);
        $shareResponse->assertSee('Bapak Joko & Istri');
        $shareResponse->assertSee('wa.me/081298765432');
    }

    public function test_theme_2_basic_harmony_emerald_renders_bespoke_design(): void
    {
        $demoResponse = $this->get('/tema/2/demo');
        $demoResponse->assertStatus(200);
        $demoResponse->assertSee('data-theme-id="2"', false);
        $demoResponse->assertSee('emerald-royal-crest.svg');
        $demoResponse->assertSee('emerald-interlocking-rings.svg');
        $demoResponse->assertSee('KEPADA YTH');
        $demoResponse->assertSee('BUKA UNDANGAN');
        $demoResponse->assertSee('THE WEDDING OF');
        $demoResponse->assertSee('Thinking of you keeps me awake');
        $demoResponse->assertSee('ASSALAMUALAIKUM WR. WB.');
        $demoResponse->assertSee('THE BRIDE');
        $demoResponse->assertSee('THE GROOM');
        $demoResponse->assertSee('AKAD NIKAH');
        $demoResponse->assertSee('RESEPSI PERNIKAHAN');
        $demoResponse->assertSee('TANDA KASIH &amp; AMPLOP DIGITAL', false);
    }

    public function test_theme_3_basic_harmony_navy_renders_bespoke_design(): void
    {
        $demoResponse = $this->get('/tema/3/demo');
        $demoResponse->assertStatus(200);
        $demoResponse->assertSee('data-theme-id="3"', false);
        $demoResponse->assertSee('navy-wave-top.svg');
        $demoResponse->assertSee('navy-wave-bottom.svg');
        $demoResponse->assertSee('navy-crest-feather.svg');
        $demoResponse->assertSee('THE WEDDING OF');
        $demoResponse->assertSee('Buka Undangan');
        $demoResponse->assertSee("ASSALAMU'ALAIKUM WR. WB.", false);
        $demoResponse->assertSee('The Bride');
        $demoResponse->assertSee('The Groom');
        $demoResponse->assertSee('theme3-vertical-label');
        $demoResponse->assertSee('COUNTDOWN');
        $demoResponse->assertSee('AKAD NIKAH');
        $demoResponse->assertSee('RESEPSI');
        $demoResponse->assertSee('DRESSCODE');
        $demoResponse->assertSee('OUR MOMENTS');
        $demoResponse->assertSee('LOVE STORY');
        $demoResponse->assertSee('RSVP');
        $demoResponse->assertSee('Reservasi kehadiranmu via whatsapp');
        $demoResponse->assertSee('Kirim via WhatsApp');
        $demoResponse->assertSee('Kirim Hadiah');
    }

    public function test_dashboard_sidebar_has_collapsible_burger_menu_and_responsive_drawer(): void
    {
        $user = User::factory()->create([
            'email' => 'sidebar_tester@simpultemu.test',
        ]);

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);

        // Sidebar elements
        $response->assertSee('id="dashboard-sidebar"', false);
        $response->assertSee('sidebar-logo-full');
        $response->assertSee('sidebar-logo-mini');
        $response->assertSee('logo-icon.png');
        $response->assertSee('logo-simpultemu.png');

        // Burger menu toggles
        $response->assertSee('id="sidebar-collapse-btn"', false);
        $response->assertSee('toggleDesktopSidebar', false);

        // Responsive mobile drawer and backdrop
        $response->assertSee('id="mobile-sidebar-backdrop"', false);
        $response->assertSee('openMobileSidebar', false);
        $response->assertSee('closeMobileSidebar', false);

        // Navigation links and tooltips
        $response->assertSee('Dashboard');
        $response->assertSee('Undangan Saya');
        $response->assertSee('Pesan &amp; RSVP Masuk', false);
        $response->assertSee('sidebar-tooltip');
    }

    public function test_home_page_navbar_shares_guest_auth_state_for_guests(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response->assertInertia(fn (Assert $page) => $page
            ->component('Home')
            ->has('themes')
            ->where('auth.user', null)
        );
    }

    public function test_home_page_navbar_shares_authenticated_user_auth_state(): void
    {
        $user = User::factory()->create([
            'name' => 'Cahya Dwi Saputra',
            'email' => 'cahya@simpultemu.test',
        ]);

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);

        $response->assertInertia(fn (Assert $page) => $page
            ->component('Home')
            ->has('themes')
            ->where('auth.user.id', $user->id)
            ->where('auth.user.name', 'Cahya Dwi Saputra')
            ->where('auth.user.email', 'cahya@simpultemu.test')
        );
    }

    public function test_invitation_preview_action_updates_data_and_redirects_to_preview_route(): void
    {
        $user = User::factory()->create();
        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => 1,
            'title' => 'Pernikahan Rian & Maya',
            'slug' => 'rian-maya-preview-test',
            'status' => 'draft',
            'groom_name' => 'Rian Lama',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Lama',
            'bride_nickname' => 'Maya',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '10:00',
            'venue' => 'Gedung Lama',
        ]);

        $theme3 = Theme::find(3);

        $response = $this->actingAs($user)->put("/dashboard/undangan/{$invitation->id}", [
            'action' => 'preview',
            'theme_id' => $theme3->id,
            'groom_name' => 'Rian Slenew',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Sari',
            'bride_nickname' => 'Maya',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '10:00',
            'venue' => 'Grand Ballroom Navy',
        ]);

        $response->assertRedirect(route('dashboard.invitations.preview', $invitation));

        $invitation->refresh();
        $this->assertEquals(3, $invitation->theme_id);
        $this->assertEquals('Rian Slenew', $invitation->groom_name);

        // Preview route displays the updated theme in real time
        $previewResponse = $this->actingAs($user)->get(route('dashboard.invitations.preview', $invitation));
        $previewResponse->assertStatus(200);
        $previewResponse->assertSee('Rian Slenew');
        $previewResponse->assertSee('Basic Harmony Navy');
        $previewResponse->assertSee('data-theme-id="3"', false);
    }

    public function test_saving_published_invitation_preserves_published_status(): void
    {
        $user = User::factory()->create();
        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => 3,
            'title' => 'Pernikahan Rian & Maya',
            'slug' => 'rian-maya-preserve-pub',
            'status' => 'published',
            'published_at' => now(),
            'groom_name' => 'Rian',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya',
            'bride_nickname' => 'Maya',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '10:00',
            'venue' => 'Gedung Mulia',
        ]);

        $response = $this->actingAs($user)->put("/dashboard/undangan/{$invitation->id}", [
            'action' => 'save',
            'theme_id' => 3,
            'groom_name' => 'Rian Updated',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya Updated',
            'bride_nickname' => 'Maya',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '10:00',
            'venue' => 'Gedung Mulia',
        ]);

        $invitation->refresh();
        $this->assertEquals('published', $invitation->status);
        $this->assertTrue($invitation->isPublished());
    }

    public function test_edit_page_shows_open_public_button_and_no_redundant_publish_button_when_published(): void
    {
        $user = User::factory()->create();
        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => 3,
            'title' => 'Pernikahan Rian & Maya',
            'slug' => 'rian-maya-edit-page-test',
            'status' => 'published',
            'published_at' => now(),
            'groom_name' => 'Rian',
            'groom_nickname' => 'Rian',
            'bride_name' => 'Maya',
            'bride_nickname' => 'Maya',
            'event_date' => now()->addMonth()->format('Y-m-d'),
            'event_time' => '10:00',
            'venue' => 'Gedung Mulia',
        ]);

        $response = $this->actingAs($user)->get("/dashboard/undangan/{$invitation->id}/edit");
        $response->assertStatus(200);

        // Shows Preview and Open Public Invitation
        $response->assertSee('Pratinjau Undangan');
        $response->assertSee('Simpan Perubahan');
        $response->assertSee('Buka Undangan Publik');
        $response->assertSee(route('invitation.show', $invitation->slug));

        // Does NOT show duplicate/confusing publish button when already published
        $response->assertDontSee('Perbarui Publikasi');
    }

    public function test_basic_harmony_maroon_theme_renders_bespoke_dual_pane_cover_and_desktop_sidebar(): void
    {
        $user = User::factory()->create();
        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => 1, // Basic Harmony Maroon
            'title' => 'Pernikahan Deva & Dion',
            'slug' => 'deva-dion-wedding',
            'status' => 'published',
            'published_at' => now(),
            'groom_name' => 'Dion Putra Tama',
            'groom_nickname' => 'Dion',
            'bride_name' => 'Deva Rizki Putri',
            'bride_nickname' => 'Deva',
            'event_date' => '2026-12-31',
            'event_time' => '10:00',
            'venue' => 'Grand Ballroom',
            'address' => 'Jakarta',
            'background_photo' => 'invitations/photos/custom-maroon-cover.jpg',
        ]);

        $response = $this->get('/undangan/'.$invitation->slug.'?to=Lukman%20S');
        $response->assertStatus(200);

        // Opening cover checks (Image 1 smartphone & Image 2 desktop)
        $response->assertSee('invitation-cover');
        $response->assertSee('btn-open-invitation');
        $response->assertSee('Buka Undangan');
        $response->assertSee('Undangan Pernikahan');
        $response->assertSee('Dion & Deva');
        $response->assertSee('Lukman S');
        $response->assertSee('31 Desember 2026');

        // Dual pane desktop sidebar (Image 3)
        $response->assertSee('id="t1-desktop-sidebar"', false);
    }

    public function test_invitation_editor_has_opening_cover_photo_upload_input(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/dashboard/undangan/create');
        $response->assertStatus(200);

        // Step 2 Cover upload card
        $response->assertSee('Foto Cover Pembuka Undangan (Cover Buka Undangan)');
        $response->assertSee('name="background_photo"', false);
        $response->assertSee('id="background_photo"', false);
        $response->assertSee('id="preview-background-photo"', false);
        $response->assertSee('id="preview-background-photo-step5"', false);
    }

    public function test_invitation_editor_has_countdown_photo_upload_input(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/dashboard/undangan/create');
        $response->assertStatus(200);

        // Step 2 Countdown & Ayat photo upload card (starts hidden by default, only shown for Monochrome)
        $response->assertSee('countdown_photo');
        $response->assertSee('preview-countdown-photo');
        $response->assertSee('Foto Latar Hitung Mundur &amp; Ayat (Khusus Basic Harmony Monochrome)', false);
        $response->assertSee('id="countdown-photo-section"', false);
        $response->assertSee('countdown-photo-section" class="p-4 sm:p-5 bg-[#FAF8F5] rounded-2xl border border-[#E7E0D6] space-y-3 hidden"', false);
    }

    public function test_basic_harmony_monochrome_theme_renders_bespoke_sections_and_photos(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $monoTheme = Theme::where('slug', 'like', '%monochrome%')->firstOrFail();

        $coverFile = UploadedFile::fake()->image('custom_cover.jpg', 600, 800);
        $countdownFile = UploadedFile::fake()->image('custom_countdown.jpg', 800, 600);
        $coverPath = $coverFile->store('invitations/photos', 'public');
        $countdownPath = $countdownFile->store('invitations/photos', 'public');

        $invitation = Invitation::create([
            'user_id' => $user->id,
            'theme_id' => $monoTheme->id,
            'title' => 'The Wedding of Dilan & Milea',
            'slug' => 'dilan-milea-monochrome',
            'status' => 'published',
            'published_at' => now(),
            'groom_name' => 'Dilan Pratama, S.T.',
            'groom_nickname' => 'Dilan',
            'groom_parents' => 'Putra dari Bapak Hendra & Ibu Susi',
            'groom_instagram' => 'dilan.pratama',
            'bride_name' => 'Milea Adnan Hussain, S.Ked.',
            'bride_nickname' => 'Milea',
            'bride_parents' => 'Putri dari Bapak Bambang & Ibu Dewi',
            'bride_instagram' => 'milea.adnan',
            'event_date' => '2026-12-01',
            'event_time' => '11:00',
            'venue' => 'Grand Ballroom Monokrom',
            'address' => 'Jl. Sudirman No. 1, Jakarta',
            'background_photo' => $coverPath,
            'countdown_photo' => $countdownPath,
        ]);

        $response = $this->get('/undangan/'.$invitation->slug.'?to=Andi%20Keluarga');
        $response->assertStatus(200);

        // 1. Bespoke Cover (Gambar 2)
        $response->assertSee('invitation-cover');
        $response->assertSee('The Wedding of');
        $response->assertSee('Dilan &amp; Milea', false);
        $response->assertSee('Andi Keluarga');
        $response->assertSee('btn-open-invitation');
        $response->assertSee('storage/'.$coverPath, false);

        // 2. Hero Section with Downward Gradient & Monogram "D | M" (Gambar 3)
        $response->assertSee('section-hero');
        $response->assertSee('D');
        $response->assertSee('M');

        // 3. 5 Rolling Photos Strip (Gambar 3)
        $response->assertSee('animate-rolling-strip');

        // 4. Heading BRIDE & GROOM with ghost reflection
        $response->assertSee('BRIDE &amp; GROOM', false);

        // 5. Dark Charcoal Capsule for Mempelai (Gambar 4)
        $response->assertSee('bg-[#2C2D2F]');
        $response->assertSee('Milea Adnan Hussain, S.Ked.');
        $response->assertSee('Dilan Pratama, S.T.');
        $response->assertSee('milea.adnan');
        $response->assertSee('dilan.pratama');

        // 6. Count The Date & Ayat with Custom Background (Gambar 5)
        $response->assertSee('Count The Date');
        $response->assertSee('Simpan tanggal');
        $response->assertSee('storage/'.$countdownPath, false);

        // 7. Light Arch Capsule for Acara (Gambar 1)
        $response->assertSee('Akad Nikah');
        $response->assertSee('Resepsi Pernikahan');
        $response->assertSee('Grand Ballroom Monokrom');

        // 8. Floating Bottom Navigation
        $response->assertSee('floating-bottom-nav');
    }

    public function test_basic_harmony_monochrome_love_story_and_gift_and_photo_uploads(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $story1 = UploadedFile::fake()->image('story1.jpg', 600, 800);
        $story2 = UploadedFile::fake()->image('story2.jpg', 600, 800);

        $response = $this->actingAs($user)->post(route('dashboard.invitations.store'), [
            'theme_id' => 5,
            'title' => 'Pernikahan Dilan & Milea',
            'slug' => 'dilan-milea-story-'.uniqid(),
            'groom_name' => 'Dilan Pratama',
            'groom_nickname' => 'Dilan',
            'bride_name' => 'Milea Adnan',
            'bride_nickname' => 'Milea',
            'event_date' => '2026-12-12',
            'event_time' => '10:00',
            'venue' => 'Grand Monokrom Hall',
            'address' => 'Jl. Thamrin No. 9',
            'show_love_story' => '1',
            'story_photo_1' => $story1,
            'story_photo_2' => $story2,
            'love_stories' => [
                ['year' => '2020', 'title' => 'Awal Bertemu', 'story' => 'Bertemu di perpustakaan secara tidak sengaja.'],
            ],
            'gift_account_number' => '1234567890',
            'action' => 'publish',
        ]);

        $response->assertRedirect();
        $invitation = Invitation::where('slug', 'like', 'dilan-milea-story-%')->firstOrFail();

        $this->assertNotNull($invitation->story_photo_1);
        $this->assertNotNull($invitation->story_photo_2);
        Storage::disk('public')->assertExists($invitation->story_photo_1);
        Storage::disk('public')->assertExists($invitation->story_photo_2);

        $viewResponse = $this->get('/undangan/'.$invitation->slug);
        $viewResponse->assertStatus(200);

        // Assert Love Story Section
        $viewResponse->assertSee('LOVE STORY');
        $viewResponse->assertSee('Awal Bertemu');
        $viewResponse->assertSee('Bertemu di perpustakaan secara tidak sengaja.');
        $viewResponse->assertSee(Storage::url($invitation->story_photo_1), false);
        $viewResponse->assertSee(Storage::url($invitation->story_photo_2), false);

        // Assert Kirim Hadiah Section
        $viewResponse->assertSee('TANDA KASIH');
        $viewResponse->assertSee('1234567890');
        $viewResponse->assertSee('copyToClipboard');
    }

    public function test_theme_7_basic_lilac_blooms_renders_bespoke_cartoon_design_and_disables_photo_upload(): void
    {
        $this->seed(MusicSeeder::class);

        // 1. Check Theme 7 database state
        $theme7 = Theme::find(7);
        $this->assertNotNull($theme7);
        $this->assertEquals('Basic Lilac Blooms', $theme7->name);
        $this->assertEquals('basic-lilac-blooms', $theme7->slug);
        $this->assertEquals('basic', $theme7->tier);

        // 2. Check Demo Mode for Theme 7
        $demoResponse = $this->get('/tema/7/demo');
        $demoResponse->assertStatus(200);
        $demoResponse->assertSee('data-theme-id="7"', false);
        $demoResponse->assertSee('THE WEDDING OF');
        $demoResponse->assertSee('Angga Pratama');
        $demoResponse->assertSee('Mita Anggraini Safitri');
        $demoResponse->assertSee('Golden Tulip Essential Tangerang');
        $demoResponse->assertSee('Akad Nikah');
        $demoResponse->assertSee('Resepsi');
        $demoResponse->assertSee('Our Story');
        $demoResponse->assertSee('Awal Pertemuan');
        $demoResponse->assertSee('Berpacaran');
        $demoResponse->assertSee('Lamaran');
        $demoResponse->assertSee('Wedding Gift');
        $demoResponse->assertSee('BCA');
        $demoResponse->assertSee('DANA');
        $demoResponse->assertSee('bride-cartoon.png');
        $demoResponse->assertSee('groom-cartoon.png');
        $demoResponse->assertSee('couple-cartoon.png');
        $demoResponse->assertSee('bg-floral-portrait.jpg');
        $demoResponse->assertSee('bg-floral-landscape.jpg');
        $demoResponse->assertDontSee('id="section-galeri"', false);

        // 3. Check Editor loads for Theme 7
        $user = User::factory()->create();
        $editorResponse = $this->actingAs($user)->get('/dashboard/undangan/create?theme_id=7');
        $editorResponse->assertStatus(200);
    }

    public function test_premium_ethereal_bloom_theme_renders_bespoke_layout_and_floating_particles(): void
    {
        // 1. Check Theme 17 database state
        $theme17 = Theme::find(17);
        $this->assertNotNull($theme17);
        $this->assertEquals('Premium Ethereal Bloom', $theme17->name);
        $this->assertEquals('premium-ethereal-bloom', $theme17->slug);
        $this->assertEquals('premium', $theme17->tier);

        // 2. Check Demo Mode for Theme 17
        $demoResponse = $this->get('/tema/17/demo');
        $demoResponse->assertStatus(200);
        $demoResponse->assertSee('data-theme-id="17"', false);
        $demoResponse->assertSee('Justin');
        $demoResponse->assertSee('Sisca');

        // Stray corner lily element should be removed from desktop
        $demoResponse->assertDontSee('floral-corner-lily.png');

        // Floating ambient blue leaves and flowers should be present
        $demoResponse->assertSee('t17-ethereal-particles');
        $demoResponse->assertSee('floating-leaf-blue.png');
        $demoResponse->assertSee('floating-flower-blue.png');

        // Floral frame and adjusted photo alignment class
        $demoResponse->assertSee('floral-frame-round.png');
        $demoResponse->assertSee('-translate-y-2.5 sm:-translate-y-3');

        // Closing section footer
        $demoResponse->assertSee('floral-footer-bicycle.png');
        $demoResponse->assertSee('SimpulTemu Digital Wedding Platform');
    }
}
