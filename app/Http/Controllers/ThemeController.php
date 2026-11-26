<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Music;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::where('is_active', true)->get();

        return view('themes.index', compact('themes'));
    }

    public function show(Theme $theme)
    {
        return view('themes.show', compact('theme'));
    }

    public function demo(string $themeIdentifier)
    {
        $theme = is_numeric($themeIdentifier)
            ? Theme::where('is_active', true)->find($themeIdentifier)
            : Theme::where('is_active', true)->where('slug', $themeIdentifier)->first();

        if (! $theme) {
            $theme = Theme::where('is_active', true)->firstOrFail();
        }

        $themeConfig = is_array($theme->theme_config)
            ? $theme->theme_config
            : (json_decode($theme->theme_config, true) ?? []);

        // Preset music from theme config or db
        $defaultMusicId = $themeConfig['default_music_id'] ?? null;
        $music = null;
        if ($defaultMusicId) {
            $music = Music::find($defaultMusicId);
        }
        if (! $music) {
            $music = Music::find($theme->id) ?? Music::first();
        }

        $isMonochrome = ($theme->id == 5 || str_contains($theme->slug, 'monochrome'));
        $isMelayuPixelated = ($theme->id == 20 || str_contains($theme->slug, 'melayu-pixelated') || str_contains($theme->slug, 'dark-elegance'));
        $isDarkElegance = $isMelayuPixelated;
        $isSummerVibes = ($theme->id == 13 || str_contains($theme->slug, 'summer-vibes') || str_contains($theme->slug, 'royal-blue'));
        $isCrayonDreams = ($theme->id == 18 || str_contains($theme->slug, 'crayon-dreams') || str_contains($theme->slug, 'minimalist-white'));
        $isBlueBlossom = ($theme->id == 6 || str_contains($theme->slug, 'blue-blossom') || str_contains($theme->slug, 'soft-blue') || str_contains($theme->slug, 'terracotta'));
        $isEtherealBloom = ($theme->id == 17 || str_contains($theme->slug, 'ethereal-bloom') || str_contains($theme->slug, 'serenade-botanical'));
        $isLilacBlooms = ($theme->id == 7 || str_contains($theme->slug, 'lilac-blooms') || str_contains($theme->slug, 'harmony-lilac'));
        $isFairytaleCastle = ($theme->id == 14 || str_contains($theme->slug, 'fairytale-castle') || str_contains($theme->slug, 'night-sky') || str_contains($theme->slug, 'blush-pink'));
        $isNightSky = $isFairytaleCastle;
        $isNostalgicVillage = ($theme->id == 11 || str_contains($theme->slug, 'nostalgic-village') || str_contains($theme->slug, 'misty-romance') || str_contains($theme->slug, 'serenade-maroon'));
        $isMistyRomance = $isNostalgicVillage;
        $isChampagneBloom = ($theme->id == 12 || str_contains($theme->slug, 'champagne-bloom') || str_contains($theme->slug, 'serenade-emerald'));
        $isWantedPoster = ($theme->id == 4 || str_contains($theme->slug, 'wanted-poster') || str_contains($theme->slug, 'harmony-rose'));
        $isWhisperingGarden = ($theme->id == 9 || str_contains($theme->slug, 'whispering-garden') || str_contains($theme->slug, 'harmony-champagne'));
        $isSunnyBotanical = ($theme->id == 8 || str_contains($theme->slug, 'sunny-botanical') || str_contains($theme->slug, 'harmony-sage'));
        $isNewspaper = ($theme->id == 10 || str_contains($theme->slug, 'newspaper') || str_contains($theme->slug, 'charcoal'));
        $isSahalaPattern = ($theme->id == 19 || str_contains($theme->slug, 'sahala') || str_contains($theme->slug, 'lavender-mist'));

        $dummyInvitation = new Invitation([
            'id' => 999999,
            'user_id' => 1,
            'theme_id' => $theme->id,
            'music_id' => $music?->id,
            'title' => 'Pernikahan',
            'slug' => 'demo-'.$theme->slug,
            'status' => 'published',
            'groom_name' => $isSahalaPattern ? 'Bagas Sadewa' : ($isFairytaleCastle ? 'Andrian Sanjaya' : ($isNewspaper ? 'Angga Pratama, S.T.' : ($isSunnyBotanical ? 'Baskara Tirta Yudhistira' : ($isWhisperingGarden ? 'Dias Taufik' : ($isWantedPoster ? 'Samuel Ricard' : ($isChampagneBloom ? 'Rian Pratama, S.Kom.' : ($isMistyRomance ? 'Dias Taufik' : ($isNightSky ? 'Raden Wicaksono, S.T.' : ($isLilacBlooms ? 'Angga Pratama' : ($isEtherealBloom ? 'Tobias Justin, S.Kom.' : ($isBlueBlossom ? 'Putra Pratama, S.T.' : ($isCrayonDreams ? 'Dias Taufik, S.Ds.' : ($isSummerVibes ? 'Dion Yunus, S.T.' : ($isMelayuPixelated ? 'Dias Taufik' : ($isMonochrome ? 'Dilan Pratama, S.T.' : 'Rian Pratama, S.Kom.'))))))))))))))),
            'groom_nickname' => ($isMelayuPixelated || $isMistyRomance || $isWhisperingGarden || $isCrayonDreams) ? 'Dias' : ($isSahalaPattern ? 'Bagas' : ($isFairytaleCastle ? 'Andrian' : ($isNewspaper ? 'Angga' : ($isSunnyBotanical ? 'Baskara' : ($isWantedPoster ? 'Sam' : ($isChampagneBloom ? 'Rian' : ($isNightSky ? 'Raden' : ($isLilacBlooms ? 'Angga' : ($isEtherealBloom ? 'Justin' : ($isBlueBlossom ? 'Putra' : ($isSummerVibes ? 'Dion' : ($isMonochrome ? 'Dilan' : 'Rian')))))))))))),
            'groom_parents' => ($isMelayuPixelated || $isMistyRomance || $isWhisperingGarden || $isCrayonDreams) ? 'Putra dari Bapak Ayah Dias & Ibu Ibu Dias' : ($isSahalaPattern ? 'Putra ke-2 Bpk. Samuel & Ibu Masuya' : ($isFairytaleCastle ? 'Putra Bapak Andi Wijaya dan Ibu Susan Susiana' : ($isNewspaper ? 'Putra pertama dari Bapak Rahmad & Ibu Siti' : ($isSunnyBotanical ? 'Putra dari Bapak Bambang Pratomo & Ibu Zulaikha' : ($isWantedPoster ? 'Putra dari Bpk. Ricard & Ibu Elena' : ($isChampagneBloom ? 'Putra Pertama dari Bpk. Hendra Pratama & Ibu Susi Handayani' : ($isNightSky ? 'Putra Pertama dari Bpk. Bambang Wicaksono & Ibu Rini Handayani' : ($isLilacBlooms ? 'Putra Pertama dari Bapak Ayah Angga & Ibu Ibu Angga' : ($isEtherealBloom ? 'Putra dari Bapak Ayah Justin & Ibu Ibu Justin' : ($isBlueBlossom ? 'Putra dari Bpk. Hendra Pratama & Ibu Rina Pratama' : ($isSummerVibes ? 'Putra pertama dari Bpk. Yunus & Ibu Kartini' : ($isMonochrome ? 'Putra pertama dari Bapak Hendra & Ibu Susi' : 'Putra pertama dari Bpk. Hendra & Ibu Susi')))))))))))),
            'groom_instagram' => ($isMelayuPixelated || $isMistyRomance || $isWhisperingGarden || $isCrayonDreams) ? 'diastaufikr' : ($isSahalaPattern ? 'bagas.sadewa' : ($isFairytaleCastle ? 'andrian.sanjaya' : ($isNewspaper ? 'angga.pratama' : ($isSunnyBotanical ? 'wevitation' : ($isWantedPoster ? 'wevitation' : ($isChampagneBloom ? 'rian.pratama' : ($isNightSky ? 'raden.wicaksono' : ($isLilacBlooms ? 'angga.pratama' : ($isEtherealBloom ? 'jessnolimit' : ($isBlueBlossom ? 'putra.pratama' : ($isSummerVibes ? 'dion.yunus' : ($isMonochrome ? 'dilan.pratama' : 'rian.pratama')))))))))))),
            'groom_photo' => $isSahalaPattern ? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80' : ($isSunnyBotanical ? asset('images/themes/sunny-botanical/groom.jpg') : ($isWhisperingGarden ? asset('images/themes/whispering-garden/groom.jpg') : ($isWantedPoster ? asset('images/themes/wanted-poster/groom.jpg') : ($isChampagneBloom ? asset('images/themes/champagne-bloom/groom.jpg') : ($isMistyRomance ? 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80' : (($isMonochrome || $isLilacBlooms) ? null : 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80')))))),
            'bride_name' => $isSahalaPattern ? 'Arina Febriana' : ($isFairytaleCastle ? 'Annisa Rahmah' : ($isNewspaper ? 'Selly Permata, S.E.' : ($isSunnyBotanical ? 'Anggun Dewi Astria' : ($isWhisperingGarden ? 'Azalia Fasya' : ($isWantedPoster ? 'Angelica Dyssa' : ($isChampagneBloom ? 'Maya Anggraini, S.E.' : ($isMistyRomance ? 'Azalia Fasya' : ($isNightSky ? 'Anisa Rahmawati, S.Ked.' : ($isLilacBlooms ? 'Mita Anggraini Safitri' : ($isEtherealBloom ? 'Sisca Kohl, S.E.' : ($isBlueBlossom ? 'Putri Pratiwi, S.E.' : ($isCrayonDreams ? 'Azalia Fasya, S.Ars.' : ($isSummerVibes ? 'Dea Febriana, PhD' : ($isDarkElegance ? 'Azalia Fasya' : ($isMonochrome ? 'Milea Adnan Hussain, S.Ked.' : 'Maya Anggraini, S.E.'))))))))))))))),
            'bride_nickname' => $isSahalaPattern ? 'Arina' : ($isFairytaleCastle ? 'Annisa' : ($isNewspaper ? 'Selly' : ($isSunnyBotanical ? 'Anggun' : ($isWhisperingGarden ? 'Azalia' : ($isWantedPoster ? 'Angel' : ($isChampagneBloom ? 'Maya' : ($isMistyRomance ? 'Azalia' : ($isNightSky ? 'Anisa' : ($isLilacBlooms ? 'Mita' : ($isEtherealBloom ? 'Sisca' : ($isBlueBlossom ? 'Putri' : ($isCrayonDreams ? 'Azalia' : ($isSummerVibes ? 'Dea' : ($isDarkElegance ? 'Azalia' : ($isMonochrome ? 'Milea' : 'Maya'))))))))))))))),
            'bride_parents' => $isSahalaPattern ? 'Putri ke-1 Bpk. Sumarni & Ibu Maryati' : ($isFairytaleCastle ? 'Putri Bapak Syaifullah & Ibu Murhatanti' : ($isNewspaper ? 'Putri kedua dari Bapak Yusuf & Ibu Aminah' : ($isSunnyBotanical ? 'Putri dari Bapak Bayu Suhendar & Ibu Lilik Purnamasari' : ($isWhisperingGarden ? 'Putri dari Bapak Ayah Azalia & Ibu Ibu Azalia' : ($isWantedPoster ? 'Putri dari Bpk. Dyssa & Ibu Maria' : ($isChampagneBloom ? 'Putri Kedua dari Bpk. Ir. Bambang Irawan & Ibu Dewi Sartika' : ($isMistyRomance ? 'Putri dari Bapak Ayah Azalia & Ibu Ibu Azalia' : ($isNightSky ? 'Putri Kedua dari Bpk. Ir. Hendro Suyanto & Ibu Siti Aminah' : ($isLilacBlooms ? 'Putri Pertama dari Bapak Yusuf Ali dan Ibu Nurbaya' : ($isEtherealBloom ? 'Putri dari Bapak Ayah Sisca & Ibu Ibu Sisca' : ($isBlueBlossom ? 'Putri dari Bpk. Agus Pratiwi & Ibu Dewi Pratiwi' : ($isCrayonDreams ? 'Putri dari Bapak Ayah Azalia & Ibu Ibu Azalia' : ($isSummerVibes ? 'Putri pertama dari Bpk. Sumarni & Ibu Maryati' : ($isDarkElegance ? 'Putri dari Bapak Ayah Azalia & Ibu Ibu Azalia' : ($isMonochrome ? 'Putri kedua dari Bapak Bambang & Ibu Dewi' : 'Putri kedua dari Bpk. Bambang & Ibu Dewi'))))))))))))))),
            'bride_instagram' => $isSahalaPattern ? 'arina.febriana' : ($isFairytaleCastle ? 'annisa.rahmah' : ($isNewspaper ? 'selly.permata' : ($isSunnyBotanical ? 'wevitation' : ($isWhisperingGarden ? 'azalia.fasya' : ($isWantedPoster ? 'wevitation' : ($isChampagneBloom ? 'maya.anggraini' : ($isMistyRomance ? 'azalia.fasya' : ($isNightSky ? 'anisa.rahma' : ($isLilacBlooms ? 'mita.safitri' : ($isEtherealBloom ? 'siscachol' : ($isBlueBlossom ? 'putri.pratama' : ($isCrayonDreams ? 'azalia.fasya' : ($isSummerVibes ? 'dea.febriana' : ($isDarkElegance ? 'diastaufikr' : ($isMonochrome ? 'milea.adnan' : 'maya.anggraini'))))))))))))))),
            'bride_photo' => $isSahalaPattern ? 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=800&auto=format&fit=crop&q=80' : ($isSunnyBotanical ? asset('images/themes/sunny-botanical/bride.jpg') : ($isWhisperingGarden ? asset('images/themes/whispering-garden/bride.jpg') : ($isWantedPoster ? asset('images/themes/wanted-poster/bride.jpg') : ($isChampagneBloom ? asset('images/themes/champagne-bloom/bride.jpg') : ($isMistyRomance ? 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&auto=format&fit=crop&q=80' : (($isMonochrome || $isLilacBlooms) ? null : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=800&auto=format&fit=crop&q=80')))))),
            'background_photo' => $isSunnyBotanical ? asset('images/themes/sunny-botanical/cover.jpg') : ($isWhisperingGarden ? asset('images/themes/whispering-garden/cover.jpg') : ($isWantedPoster ? asset('images/themes/wanted-poster/bg-parchment.jpg') : ($isChampagneBloom ? asset('images/themes/champagne-bloom/bg-horizontal.jpg') : ($isMistyRomance ? asset('images/themes/nostalgic-village/bg-mountain-landscape.jpg') : (($isMonochrome || $isLilacBlooms) ? null : 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1600&auto=format&fit=crop&q=80'))))),
            'cover_photo' => $isSahalaPattern ? 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80' : ($isFairytaleCastle ? 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1000&auto=format&fit=crop&q=80' : ($isSunnyBotanical ? asset('images/themes/sunny-botanical/cover.jpg') : ($isWhisperingGarden ? asset('images/themes/whispering-garden/cover.jpg') : ($isWantedPoster ? asset('images/themes/wanted-poster/cover.jpg') : ($isChampagneBloom ? asset('images/themes/champagne-bloom/demo-cover.jpg') : ($isMistyRomance ? 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80' : 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1200&auto=format&fit=crop&q=80')))))),
            'countdown_photo' => $isSahalaPattern ? 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&auto=format&fit=crop&q=80' : ($isFairytaleCastle ? 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1000&auto=format&fit=crop&q=80' : ($isSunnyBotanical ? asset('images/themes/sunny-botanical/cover.jpg') : ($isWhisperingGarden ? asset('images/themes/whispering-garden/cover.jpg') : ($isWantedPoster ? asset('images/themes/wanted-poster/cover.jpg') : ($isChampagneBloom ? asset('images/themes/champagne-bloom/couple-portrait.jpg') : ($isMistyRomance ? 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=1200&auto=format&fit=crop&q=80' : null)))))),
            'story_photo_1' => $isSahalaPattern ? 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80' : ($isSunnyBotanical ? asset('images/themes/sunny-botanical/story-1.jpg') : ($isWhisperingGarden ? asset('images/themes/whispering-garden/story-1.jpg') : ($isWantedPoster ? asset('images/themes/wanted-poster/story-1.jpg') : ($isChampagneBloom ? asset('images/themes/champagne-bloom/story-1.jpg') : ($isMistyRomance ? asset('images/themes/misty-romance/story-1.jpg') : 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80'))))),
            'story_photo_2' => $isSahalaPattern ? 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?w=800&auto=format&fit=crop&q=80' : ($isSunnyBotanical ? asset('images/themes/sunny-botanical/story-2.jpg') : ($isWhisperingGarden ? asset('images/themes/whispering-garden/story-2.jpg') : ($isWantedPoster ? asset('images/themes/wanted-poster/story-2.jpg') : ($isChampagneBloom ? asset('images/themes/champagne-bloom/story-2.jpg') : ($isMistyRomance ? asset('images/themes/misty-romance/story-2.jpg') : 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80'))))),
            'story_photo_3' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80',
            'show_love_story' => true,
            'love_stories' => $isSahalaPattern ? [
                ['year' => 'Story 1', 'title' => 'Pertemuan Pertama', 'story' => 'Pertama kali kami bertemu saat menjadi anggota sebuah organisasi di kampus. Kebetulan kami berada di divisi yang sama, yang menjadikan kami lebih akrab. Obrolan hangat dan senyuman tulus perlahan menumbuhkan benih cinta di antara kami.'],
                ['year' => 'Story 2', 'title' => 'Menuju Pelaminan', 'story' => 'Setelah bertahun-tahun merajut kasih bersama, dengan penuh keyakinan dan restu kedua orang tua kami, kami melangkah mantap menuju ikatan pernikahan yang suci.'],
            ] : ($isFairytaleCastle ? [
                ['year' => 'Story 1', 'title' => 'Pertemuan Pertama', 'story' => 'Pertama kali kami bertemu saat menjadi anggota sebuah organisasi di kampus. Kebetulan kami berada di divisi yang sama, yang menjadikan kami lebih akrab. Obrolan hangat dan senyuman tulus perlahan menumbuhkan benih cinta di antara kami.'],
                ['year' => 'Story 2', 'title' => 'Lamaran', 'story' => 'Setelah bertahun-tahun merajut kasih bersama, dengan penuh keyakinan dan restu kedua orang tua kami, kami melangkah mantap menuju pelaminan suci.'],
            ] : ($isNewspaper ? [
                ['year' => 'Story 1', 'title' => 'Pertemuan Pertama', 'story' => 'Pertama kali kami bertemu saat menjadi anggota sebuah organisasi di kampus. Kebetulan kami berada di divisi yang sama, yang menjadikan kami lebih akrab. Obrolan hangat dan senyuman tulus perlahan menumbuhkan benih cinta di antara kami.'],
                ['year' => 'Story 2', 'title' => 'Menuju Pelaminan', 'story' => 'Setelah melewati berbagai kisah suka dan duka bersama, dengan penuh keyakinan dan restu keluarga, kami memutuskan untuk melangkah ke jenjang pernikahan.'],
            ] : ($isSunnyBotanical ? [
                ['year' => 'Story 1', 'title' => 'Pertemuan Pertama', 'story' => 'Pertama kali kami bertemu saat menjadi anggota sebuah organisasi di kampus. Kebetulan kami berada di divisi yang sama, yang menjadikan kami lebih akrab. Dari diskusi yang serius hingga tawa lepas karena lelucon yang garing, momen-momen ini perlahan menumbuhkan benih cinta yang tak terduga di antara kami.'],
                ['year' => 'Story 2', 'title' => 'Lamaran', 'story' => 'Walaupun kami sempat menjalani hubungan jarak jauh selama 2 tahun terakhir, namun hal itu bukan menjadi halangan untuk hubungan kami. Justru kami menjadi semakin yakin satu sama lain. Oleh karena itu kami memutuskan untuk menjalin hubungan lebih serius.'],
            ] : ($isWhisperingGarden ? [
                ['year' => '2021', 'title' => 'Pertemuan Pertama', 'story' => 'Pertemuan pertama kami yang tak disengaja di sebuah taman indah, mengawali perbincangan hangat yang membekas di hati.'],
                ['year' => '2023', 'title' => 'Menjalin Kasih', 'story' => 'Hari demi hari kami lalui dengan saling memahami, hingga rasa nyaman bertransformasi menjadi komitmen cinta yang tulus.'],
                ['year' => '2026', 'title' => 'Ikatan Janji Suci', 'story' => 'Dengan penuh rasa syukur dan restu keluarga, kami melangkah mantap untuk menyatukan dua hati dalam ikatan pernikahan abadi.'],
            ] : ($isWantedPoster ? [
                ['year' => 'Story 1', 'title' => 'From Bestfriend', 'story' => 'The story of us start from junior high. Our friendship blossoming through shared laughter & teenage dreams.'],
                ['year' => 'Story 2', 'title' => 'To Love', 'story' => 'Years later, a spark ignited, transforming our bond into a deep, undeniable affection. And now, we will start our journey from best friends to soulmates forever.'],
            ] : ($isLilacBlooms ? [
                ['year' => '1', 'title' => 'Awal Pertemuan', 'story' => 'Kami pertama kali berkenalan melalui seorang teman di kampus, yang memperkenalkan kami satu sama lain saat jam makan siang dikantin. Setelah pertemuan itu, kami mulai bertukar pin BBM dan saling chat2an, dengan setiap percakapan yang semakin mendalam. Seiring berjalannya waktu, hubungan kami semakin dekat dan erat. Kami sering berbagi cerita, mimpi, dan rasa dalam hidup kami, dan saling mendukung satu sama lain melalui segala tantangan yang kami hadapi.'],
                ['year' => '2', 'title' => 'Berpacaran', 'story' => 'Setelah beberapa bulan berkenalan, Angga dengan berani menyatakan perasaannya padaku. Ia mengungkapkan cintanya dengan tulus, dan tanpa ragu aku pun menerima perasaan yang sama. Dari situlah, hubungan kami berubah menjadi sesuatu yang lebih serius dan mendalam. Kami mulai lebih intens mengenal satu sama lain, menggali setiap lapisan kepribadian dan mimpi kami. Kami belajar saling menjaga, mendukung, dan tumbuh bersama melalui segala rintangan yang muncul di perjalanan kami.'],
                ['year' => '3', 'title' => 'Lamaran', 'story' => 'Setelah menjalin hubungan selama 4 tahun yang penuh cinta dan kepercayaan, kami akhirnya memutuskan untuk mengambil langkah serius menuju pernikahan. Pada tanggal 12 September 2019, dengan hati yang penuh kebahagiaan, kami mempertemukan kedua orang tua kami dalam acara lamaran yang penuh berkah.'],
            ] : ($isEtherealBloom ? [
                ['year' => '1', 'title' => 'Pertemuan Di Kereta Api', 'story' => 'Momen manis awal pertemuan kami di stasiun dan gerbong kereta api, obrolan singkat yang berlanjut menjadi ikatan yang abadi.'],
                ['year' => '2', 'title' => 'Lanjut Ke Pelaminan', 'story' => 'Setelah melalui suka dan duka bersama, kami mantap melangkah ke jenjang pernikahan yang suci ini.'],
            ] : [
                ['year' => '2020', 'title' => 'Pertama Bertemu', 'story' => 'Pertemuan pertama kami bermula di perpustakaan kampus saat menyelesaikan skripsi. Obrolan singkat mengenai buku membuka awal kisah indah kami.'],
                ['year' => '2022', 'title' => 'Menjalin Hubungan', 'story' => 'Saling memahami dan mendukung impian masing-masing membuat langkah kami kian mantap untuk mengarungi hidup bersama.'],
                ['year' => '2025', 'title' => 'Lamaran & Komitmen', 'story' => 'Di hadapan kedua keluarga besar, kami mengikrarkan niat tulus untuk melangkah ke ikatan pernikahan yang suci.'],
            ]))))))),
            'event_date' => $isMistyRomance ? now()->parse('2026-09-30 12:25:00') : ($isFairytaleCastle ? now()->parse('2025-12-31 08:00:00') : ($isNewspaper ? now()->parse('2026-10-18 08:00:00') : ($isSunnyBotanical ? now()->parse('2026-03-28 10:00:00') : ($isWhisperingGarden ? now()->parse('2026-09-30 08:00:00') : ($isWantedPoster ? now()->parse('2026-02-22 19:00:00') : now()->addDays(62)->startOfDay()))))),
            'event_time' => $isMistyRomance ? now()->parse('2026-09-30 12:25:00') : ($isFairytaleCastle ? now()->parse('2025-12-31 12:00:00') : ($isNewspaper ? now()->parse('2026-10-18 08:00:00') : ($isSunnyBotanical ? now()->parse('2026-03-28 10:00:00') : ($isWhisperingGarden ? now()->parse('2026-09-30 08:00:00') : ($isWantedPoster ? now()->parse('2026-02-22 19:00:00') : now()->startOfDay()->addHours(10)))))),
            'event_end_time' => ($isFairytaleCastle ? '00:00' : ($isMistyRomance ? 'Selesai' : 'Till end')),
            'venue' => $isMistyRomance ? 'Hotel Transit FM3' : ($isFairytaleCastle ? 'Kediaman Mempelai Wanita' : ($isNewspaper ? 'Shangri-La Hotel Surabaya' : ($isSunnyBotanical ? 'Shangri-La Hotel Surabaya' : ($isWhisperingGarden ? 'Edelweiss Wedding Hall' : ($isWantedPoster ? 'Hilton Garden Inn' : ($isLilacBlooms ? 'Golden Tulip Essential Tangerang' : ($isEtherealBloom ? 'Rumah Justin di Jakarta' : ($isBlueBlossom ? 'Gedung Pertemuan Harmoni' : ($isSummerVibes ? 'Kediaman Mempelai Wanita' : 'Grand Ballroom Hotel Mulia'))))))))),
            'address' => $isMistyRomance ? 'Jl. Raya Serpong No.104, RT.5/RW.1, Pakualam, Kec. Serpong Utara, Kota Tangerang Selatan, Banten 15320, Indonesia' : ($isFairytaleCastle ? 'Jl. Bojongsoang, No 135, Lengkong, Bandung' : ($isNewspaper ? 'Jl. Mayjen Sungkono No. 120, Surabaya' : ($isSunnyBotanical ? 'Jl. Mayjen Sungkono No. 120, Surabaya' : ($isWhisperingGarden ? 'Sport Club Goldland Karawaci, Gedung Edelweiss No. 1 & 2, West Panunggangan, Cibodas, Tangerang' : ($isWantedPoster ? 'Jl. Taman Palem Lestari No. 1' : ($isLilacBlooms ? 'Jl. Jend. Sudirman Kav. 9 Cikokol Sukasari, Tangerang, Banten' : ($isEtherealBloom ? 'Rumah Justin di Jakarta' : ($isBlueBlossom ? 'Jl. Melati Indah No. 22, Jakarta Selatan' : ($isSummerVibes ? 'Jl. Soekarno-Hatta, No 17, Jakarta' : 'Jl. Asia Afrika No. 6, Senayan, Jakarta Pusat'))))))))),
            'maps_url' => $isMistyRomance ? 'https://maps.google.com/?q='.urlencode('Hotel Transit FM3 Serpong Tangerang') : ($isFairytaleCastle ? 'https://maps.google.com/?q='.urlencode('Jl. Bojongsoang No 135 Lengkong Bandung') : ($isNewspaper ? 'https://maps.google.com/?q='.urlencode('Shangri-La Hotel Surabaya') : ($isSunnyBotanical ? 'https://maps.google.com/?q='.urlencode('Shangri-La Hotel Surabaya') : ($isWhisperingGarden ? 'https://maps.google.com/?q='.urlencode('Edelweiss Wedding Hall Tangerang') : ($isWantedPoster ? 'https://maps.google.com/?q='.urlencode('Hilton Garden Inn Jakarta') : ($isLilacBlooms ? 'https://maps.google.com/?q='.urlencode('Golden Tulip Essential Tangerang') : ($isEtherealBloom ? 'https://maps.google.com/?q='.urlencode('Jakarta') : ($isBlueBlossom ? 'https://maps.google.com/?q='.urlencode('Gedung Pertemuan Harmoni Jakarta') : ($isSummerVibes ? 'https://maps.google.com/?q='.urlencode('Jl. Soekarno-Hatta, No 17, Jakarta') : 'https://maps.google.com/?q=Hotel+Mulia+Senayan'))))))))),
            'akad_date' => $isMistyRomance ? now()->parse('2026-09-30 08:00:00') : ($isFairytaleCastle ? now()->parse('2025-12-31 08:00:00') : ($isNewspaper ? now()->parse('2026-10-18 08:00:00') : ($isSunnyBotanical ? now()->parse('2026-03-28 08:00:00') : ($isWhisperingGarden ? now()->parse('2026-09-30 12:25:00') : ($isWantedPoster ? now()->parse('2026-02-22 10:00:00') : now()->addDays(62)->startOfDay()))))),
            'akad_time' => $isMistyRomance ? now()->parse('2026-09-30 08:00:00') : ($isFairytaleCastle ? now()->parse('2025-12-31 08:00:00') : ($isNewspaper ? now()->parse('2026-10-18 08:00:00') : ($isSunnyBotanical ? now()->parse('2026-03-28 08:00:00') : ($isWhisperingGarden ? now()->parse('2026-09-30 12:25:00') : ($isWantedPoster ? now()->parse('2026-02-22 10:00:00') : now()->startOfDay()->addHours(8)))))),
            'akad_end_time' => ($isFairytaleCastle ? '10:00' : ($isMistyRomance ? 'Selesai' : 'Till end')),
            'akad_venue' => $isMistyRomance ? 'Edelweiss Wedding Hall' : ($isFairytaleCastle ? 'Kediaman Mempelai Wanita' : ($isNewspaper ? 'Shangri-La Hotel Surabaya' : ($isSunnyBotanical ? 'Shangri-La Hotel Surabaya' : ($isWhisperingGarden ? 'Hotel Transit FM3' : ($isWantedPoster ? 'Saint Cristopher Catholic Church' : ($isLilacBlooms ? 'Golden Tulip Essential Tangerang' : ($isEtherealBloom ? 'Denpasar Bali' : ($isBlueBlossom ? 'Masjid Raya Al-Ikhlas' : 'Masjid Agung Al-Azhar')))))))),
            'akad_address' => $isMistyRomance ? 'Sport Club Goldland Karawaci, Gedung Edelweiss no. 1 dan 2, West Panunggangan, Cibodas, Jl. Palem Raja Raya, RT.002/RW.004, Bencongan Indah, Kelapa Dua, Tangerang, Banten 15810' : ($isFairytaleCastle ? 'Jl. Bojongsoang, No 135, Lengkong, Bandung' : ($isNewspaper ? 'Jl. Mayjen Sungkono No. 120, Surabaya' : ($isSunnyBotanical ? 'Jl. Mayjen Sungkono No. 120, Surabaya' : ($isWhisperingGarden ? 'Jl. Raya Serpong No.104, RT.5/RW.1, Pakulonan, Serpong Utara, Tangerang Selatan' : ($isWantedPoster ? 'Jl. Satria IV No. 68' : ($isLilacBlooms ? 'Jl. Jend. Sudirman Kav. 9 Cikokol Sukasari, Tangerang, Banten' : ($isEtherealBloom ? 'Jalan gunung batur, no 78, Denpasar, Bali' : ($isBlueBlossom ? 'Jl. Fatmawati No. 10, Jakarta Selatan' : 'Jl. Sisingamangaraja, Kebayoran Baru, Jakarta Selatan')))))))),
            'akad_maps_url' => $isMistyRomance ? 'https://maps.google.com/?q='.urlencode('Edelweiss Wedding Hall Tangerang') : ($isFairytaleCastle ? 'https://maps.google.com/?q='.urlencode('Jl. Bojongsoang No 135 Lengkong Bandung') : ($isNewspaper ? 'https://maps.google.com/?q='.urlencode('Shangri-La Hotel Surabaya') : ($isSunnyBotanical ? 'https://maps.google.com/?q='.urlencode('Shangri-La Hotel Surabaya') : ($isWhisperingGarden ? 'https://maps.google.com/?q='.urlencode('Hotel Transit FM3 Serpong Tangerang') : ($isWantedPoster ? 'https://maps.google.com/?q='.urlencode('Saint Cristopher Catholic Church Jakarta') : ($isLilacBlooms ? 'https://maps.google.com/?q='.urlencode('Golden Tulip Essential Tangerang') : ($isEtherealBloom ? 'https://maps.google.com/?q='.urlencode('Jalan gunung batur, no 78, Denpasar, Bali') : 'https://maps.google.com/?q='.urlencode('Masjid Raya Al-Ikhlas Jakarta')))))))),
            'show_quote' => true,
            'quran_text' => $isSunnyBotanical ? 'وَمِن كُلِّ شَيْءٍ خَلَقْنَا زَوْجَيْنِ لَعَلَّكُمْ تَذَكَّرُونَ' : 'وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا لِّتَسْكُنُوا إِلَيْهَا وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً',
            'quran_translation' => $isSunnyBotanical ? 'Dan segala sesuatu Kami ciptakan berpasang-pasangan supaya kamu mengingat kebesaran Allah.' : 'Dan di antara tanda-tanda kekuasaan-Nya diciptakan-Nya untukmu pasangan hidup dari jenismu sendiri supaya kamu dapat ketenangan hati dan dijadikannya kasih sayang di antara kamu. Sesungguhnya yang demikian menjadi tanda-tanda kebesaran-Nya bagi orang-orang yang berpikir.',
            'quote_source' => $isSunnyBotanical ? 'Adz Dzariyat: 49' : 'Q.S. Ar-Rum: 21',
            'gift_bank_name' => $isFairytaleCastle ? 'Bank Mandiri' : 'Bank Central Asia (BCA)',
            'gift_account_number' => $isFairytaleCastle ? '1300098765432' : '8420194821',
            'gift_account_holder' => $isFairytaleCastle ? 'Andrian Sanjaya' : ($isNewspaper ? 'Angga Pratama' : ($isSunnyBotanical ? 'Baskara Tirta Yudhistira' : ($isWhisperingGarden ? 'Dias Taufik' : ($isLilacBlooms ? 'Mita Anggraini Safitri' : ($isEtherealBloom ? 'Sisca Kohl' : ($isBlueBlossom ? 'Putra Pratama' : ($isCrayonDreams ? 'Dias Taufik' : ($isSummerVibes ? 'Dion Yunus' : ($isDarkElegance ? 'Dias Taufik' : ($isMonochrome ? 'Dilan Pratama' : 'Rian Pratama')))))))))),
            'gift_address' => $isFairytaleCastle ? 'Jl. Bojongsoang, No 135, Lengkong, Bandung' : ($isNewspaper ? 'Jl. Mayjen Sungkono No. 120, Surabaya, Jawa Timur' : ($isSunnyBotanical ? 'Jl. Mayjen Sungkono No. 120, Surabaya, Jawa Timur' : 'Jl. West Panunggangan No. 12, Cibodas, Tangerang, Banten')),
            'gift_recipient_name' => $isFairytaleCastle ? 'Annisa & Andrian' : ($isNewspaper ? 'Selly & Angga' : ($isSunnyBotanical ? 'Anggun & Baskara' : ($isWhisperingGarden ? 'Azalia & Dias' : ($isLilacBlooms ? 'Mita Anggraini Safitri' : ($isEtherealBloom ? 'Justin & Sisca' : ($isBlueBlossom ? 'Putri & Putra' : ($isCrayonDreams ? 'Azalia & Dias' : ($isSummerVibes ? 'Dea & Dion' : ($isDarkElegance ? 'Azalia & Dias' : ($isMonochrome ? 'Dilan & Milea' : 'Rian & Maya')))))))))),
            'gift_phone' => '081234567890',
            'gift_maps_url' => 'https://maps.google.com/?q='.urlencode('Shangri-La Hotel Surabaya'),
            'closing_title' => 'Terima Kasih',
            'closing_message' => $isSunnyBotanical ? 'Atas kehadiran saudara/(i) & Do\'a restunya, kami ucapkan terimakasih.' : 'Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu kepada kedua mempelai.',
            'closing_signature' => $isFairytaleCastle ? 'Kami yang berbahagia, Annisa & Andrian beserta Keluarga Besar' : ($isNewspaper ? 'Kami yang berbahagia, Selly & Angga beserta Keluarga Besar' : ($isSunnyBotanical ? 'Hormat Kami, Anggun & Baskara' : ($isWhisperingGarden ? 'Kami yang berbahagia, Azalia & Dias beserta Keluarga Besar' : ($isMistyRomance ? 'Kami yang berbahagia, Azalia & Dias beserta Keluarga Besar' : ($isNightSky ? 'Kami yang berbahagia, Raden & Anisa beserta Keluarga Besar' : ($isLilacBlooms ? 'Kami yang berbahagia, Mita & Angga' : ($isEtherealBloom ? 'Kami yang berbahagia, Justin & Sisca beserta Keluarga Besar' : ($isBlueBlossom ? 'Kami yang berbahagia, Putri & Putra beserta Keluarga Besar' : ($isCrayonDreams ? 'Kami yang berbahagia, Azalia & Dias beserta Keluarga Besar' : ($isSummerVibes ? 'Kami yang berbahagia, Dea & Dion beserta Keluarga Besar' : ($isDarkElegance ? 'Kami yang berbahagia, Azalia & Dias beserta Keluarga Besar' : ($isMonochrome ? 'Kami yang berbahagia, Dilan & Milea beserta Keluarga Besar' : 'Kami yang berbahagia, Rian & Maya beserta Keluarga Besar')))))))))))),
        ]);
        $dummyInvitation->id = 999999;
        $dummyInvitation->exists = true;

        $coupleLabel = $isFairytaleCastle ? 'Annisa & Andrian' : ($isNewspaper ? 'Selly & Angga' : ($isSunnyBotanical ? 'Anggun & Baskara' : ($isWhisperingGarden ? 'Azalia & Dias' : ($isWantedPoster ? 'Angel & Sam' : ($isChampagneBloom ? 'Rian & Maya' : ($isMistyRomance ? 'Azalia & Dias' : ($isNightSky ? 'Raden & Anisa' : ($isLilacBlooms ? 'Mita & Angga' : ($isEtherealBloom ? 'Justin & Sisca' : ($isBlueBlossom ? 'Putri & Putra' : ($isCrayonDreams ? 'Azalia & Dias' : ($isSummerVibes ? 'Dea & Dion' : ($isDarkElegance ? 'Azalia & Dias' : ($isMonochrome ? 'Dilan & Milea' : 'Rian & Maya'))))))))))))));

        $demoPhotos = collect([]);
        if ($isSunnyBotanical) {
            $demoPhotos = collect([
                (object) ['id' => 1, 'path' => asset('images/themes/sunny-botanical/gallery-1.jpg'), 'caption' => 'Golden Sunlight'],
                (object) ['id' => 2, 'path' => asset('images/themes/sunny-botanical/gallery-2.jpg'), 'caption' => 'Pure Happiness'],
                (object) ['id' => 3, 'path' => asset('images/themes/sunny-botanical/gallery-3.jpg'), 'caption' => 'Botanical Love'],
                (object) ['id' => 4, 'path' => asset('images/themes/sunny-botanical/gallery-4.jpg'), 'caption' => 'Hand in Hand'],
                (object) ['id' => 5, 'path' => asset('images/themes/sunny-botanical/gallery-5.jpg'), 'caption' => 'Soulmates Forever'],
            ]);
        } elseif ($isWhisperingGarden) {
            $demoPhotos = collect([
                (object) ['id' => 1, 'path' => asset('images/themes/whispering-garden/gallery-1.jpg'), 'caption' => 'Moment of Love'],
                (object) ['id' => 2, 'path' => asset('images/themes/whispering-garden/gallery-2.jpg'), 'caption' => 'Together Forever'],
                (object) ['id' => 3, 'path' => asset('images/themes/whispering-garden/gallery-3.jpg'), 'caption' => 'Sweet Memories'],
                (object) ['id' => 4, 'path' => asset('images/themes/whispering-garden/gallery-4.jpg'), 'caption' => 'Hand in Hand'],
                (object) ['id' => 5, 'path' => asset('images/themes/whispering-garden/gallery-5.jpg'), 'caption' => 'Eternal Vows'],
                (object) ['id' => 6, 'path' => asset('images/themes/whispering-garden/gallery-6.jpg'), 'caption' => 'Endless Journey'],
            ]);
        } elseif ($isWantedPoster) {
            $demoPhotos = collect([
                (object) ['id' => 1, 'path' => asset('images/themes/wanted-poster/gallery-1.jpg'), 'caption' => 'Desert Sunset'],
                (object) ['id' => 2, 'path' => asset('images/themes/wanted-poster/gallery-2.jpg'), 'caption' => 'Across the Dunes'],
                (object) ['id' => 3, 'path' => asset('images/themes/wanted-poster/gallery-3.jpg'), 'caption' => 'Wanted for Stealing My Heart'],
                (object) ['id' => 4, 'path' => asset('images/themes/wanted-poster/gallery-4.jpg'), 'caption' => 'Hand in Hand'],
                (object) ['id' => 5, 'path' => asset('images/themes/wanted-poster/gallery-5.jpg'), 'caption' => 'Soulmates Forever'],
            ]);
        } elseif ($isNewspaper) {
            $demoPhotos = collect([
                (object) ['id' => 1, 'path' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80', 'caption' => 'Special Edition Moments'],
                (object) ['id' => 2, 'path' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80', 'caption' => 'The Headline of Our Hearts'],
                (object) ['id' => 3, 'path' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80', 'caption' => 'A Lifetime Chronicle'],
                (object) ['id' => 4, 'path' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1000&auto=format&fit=crop&q=80', 'caption' => 'Editorial Romance in Frame'],
                (object) ['id' => 5, 'path' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80', 'caption' => 'Our Forever Story Edition'],
            ]);
        } elseif ($isFairytaleCastle) {
            $demoPhotos = collect([
                (object) ['id' => 1, 'path' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80', 'caption' => 'Once Upon a Time'],
                (object) ['id' => 2, 'path' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80', 'caption' => 'Royal Promise of Love'],
                (object) ['id' => 3, 'path' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80', 'caption' => 'Enchanted Moments'],
                (object) ['id' => 4, 'path' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1000&auto=format&fit=crop&q=80', 'caption' => 'Fairytale Romance in Bloom'],
                (object) ['id' => 5, 'path' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80', 'caption' => 'Happily Ever After'],
            ]);
        } elseif ($isChampagneBloom || $isMistyRomance || $isDarkElegance || $isSummerVibes || $isCrayonDreams || $isBlueBlossom || $isEtherealBloom || $isNightSky) {
            $demoPhotos = collect([
                (object) ['id' => 1, 'path' => 'https://images.unsplash.com/photo-1519741497674-611481863552?w=800&auto=format&fit=crop&q=80', 'caption' => 'The Starlit Promise'],
                (object) ['id' => 2, 'path' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=800&auto=format&fit=crop&q=80', 'caption' => 'Under the Crescent Moon'],
                (object) ['id' => 3, 'path' => 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?w=800&auto=format&fit=crop&q=80', 'caption' => 'Eternity in Your Eyes'],
                (object) ['id' => 4, 'path' => 'https://images.unsplash.com/photo-1583939003579-730e3918a45a?w=1000&auto=format&fit=crop&q=80', 'caption' => 'Celestial Romance'],
                (object) ['id' => 5, 'path' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?w=800&auto=format&fit=crop&q=80', 'caption' => 'Serenade of the Stars'],
                (object) ['id' => 6, 'path' => 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=800&auto=format&fit=crop&q=80', 'caption' => 'Bound by Love'],
                (object) ['id' => 7, 'path' => 'https://images.unsplash.com/photo-1537633552985-df8429e8048b?w=800&auto=format&fit=crop&q=80', 'caption' => 'Whispering Clouds'],
                (object) ['id' => 8, 'path' => 'https://images.unsplash.com/photo-1606800052052-a08af7148866?w=800&auto=format&fit=crop&q=80', 'caption' => 'Forever and Beyond'],
            ]);
        }

        $dummyInvitation->setRelation('theme', $theme);
        $dummyInvitation->setRelation('music', $music);
        $dummyInvitation->setRelation('photos', $demoPhotos);
        $dummyInvitation->setRelation('comments', collect([
            (object) [
                'name' => 'Budi Santoso',
                'attendance' => 'hadir',
                'message' => 'Selamat menempuh hidup baru untuk '.$coupleLabel.'! Semoga selalu bahagia, rukun, dan diberkahi Allah SWT.',
                'created_at' => now()->subHours(2),
            ],
            (object) [
                'name' => 'Anisa Rahma',
                'attendance' => 'hadir',
                'message' => 'Barakallahu lakuma wa baraka alaikuma wa jamaa bainakuma fii khoir. Selamat berbahagia!',
                'created_at' => now()->subHours(5),
            ],
        ]));
        $dummyInvitation->setRelation('theme', $theme);

        if ($isMistyRomance) {
            $giftAccounts = collect([
                (object) [
                    'bank_name' => 'Bank Central Asia (BCA)',
                    'account_number' => '8420194821',
                    'account_holder' => 'Dias Taufik',
                ],
                (object) [
                    'bank_name' => 'Bank Mandiri',
                    'account_number' => '137009283741',
                    'account_holder' => 'Azalia Fasya',
                ],
            ]);
        } elseif ($isNightSky) {
            $giftAccounts = collect([
                (object) [
                    'bank_name' => 'Bank Central Asia (BCA)',
                    'account_number' => '8801928374',
                    'account_holder' => 'Raden Wicaksono',
                ],
                (object) [
                    'bank_name' => 'Bank Mandiri',
                    'account_number' => '137009283741',
                    'account_holder' => 'Anisa Rahmawati',
                ],
                (object) [
                    'bank_name' => 'Bank Syariah Indonesia (BSI)',
                    'account_number' => '7182930491',
                    'account_holder' => 'Raden Wicaksono',
                ],
            ]);
        } elseif ($isEtherealBloom) {
            $giftAccounts = collect([
                (object) [
                    'bank_name' => 'Bank Central Asia (BCA)',
                    'account_number' => '12345678',
                    'account_holder' => 'Sisca Kohl',
                ],
                (object) [
                    'bank_name' => 'Bank Sinarmas',
                    'account_number' => '0982309823',
                    'account_holder' => 'Tobias Justin',
                ],
                (object) [
                    'bank_name' => 'Bank BRI',
                    'account_number' => '99787238',
                    'account_holder' => 'Papanya Sisca',
                ],
            ]);
        } else {
            $giftAccounts = collect([
                (object) [
                    'bank_name' => 'Bank Central Asia (BCA)',
                    'account_number' => '8801234567',
                    'account_holder' => $isNewspaper ? 'Angga Pratama' : ($isBlueBlossom ? 'Putra Pratama' : ($isCrayonDreams ? 'Dias Taufik' : ($isSummerVibes ? 'Dion Yunus' : ($isDarkElegance ? 'Dias Taufik' : 'Rian Pratama')))),
                ],
                (object) [
                    'bank_name' => 'Bank Mandiri',
                    'account_number' => '137001928374',
                    'account_holder' => $isNewspaper ? 'Selly Permata' : ($isBlueBlossom ? 'Putri Pratiwi' : ($isCrayonDreams ? 'Azalia Fasya' : ($isSummerVibes ? 'Dea Febriana' : ($isDarkElegance ? 'Azalia Fasya' : 'Maya Anggraini')))),
                ],
            ]);
        }
        $dummyInvitation->setRelation('giftAccounts', $giftAccounts);

        $defaultGuestName = $isWantedPoster ? 'Tamara' : ($isSummerVibes ? 'Agus Budiardjo' : ($isNightSky ? 'Bapak & Ibu Tamu Undangan' : 'Budi Santoso & Pasangan'));
        $guest = (object) [
            'name' => request('to', $defaultGuestName),
            'unique_token' => 'demo-token',
        ];

        return view('invitations.show', [
            'invitation' => $dummyInvitation,
            'guest' => $guest,
            'isDemo' => true,
        ]);
    }
}
