<?php

$file = 'c:/Users/USER/Herd/simpultemu_kami/app/Http/Controllers/ThemeController.php';
$content = file_get_contents($file);

$content = preg_replace(
    "/('groom_name'\s*=>\s*)[^,]+,\n/",
    "$1(\$isMelayuPixelated || \$isMistyRomance || \$isWhisperingGarden || \$isCrayonDreams) ? 'Dias Taufik' : (\$isSahalaPattern ? 'Bagas Sadewa' : (\$isFairytaleCastle ? 'Andrian Sanjaya' : (\$isNewspaper ? 'Angga Pratama, S.T.' : (\$isSunnyBotanical ? 'Baskara Tirta Yudhistira' : (\$isWantedPoster ? 'Samuel Ricard' : (\$isChampagneBloom ? 'Rian Pratama, S.Kom.' : (\$isNightSky ? 'Raden Wicaksono, S.T.' : (\$isLilacBlooms ? 'Angga Pratama' : (\$isEtherealBloom ? 'Tobias Justin, S.Kom.' : (\$isBlueBlossom ? 'Putra Pratama, S.T.' : (\$isSummerVibes ? 'Dion Yunus, S.T.' : (\$isMonochrome ? 'Dilan Pratama, S.T.' : 'Rian Pratama, S.Kom.')))))))))))),\n",
    $content
);

$content = preg_replace(
    "/('groom_nickname'\s*=>\s*)[^,]+,\n/",
    "$1(\$isMelayuPixelated || \$isMistyRomance || \$isWhisperingGarden || \$isCrayonDreams) ? 'Dias' : (\$isSahalaPattern ? 'Bagas' : (\$isFairytaleCastle ? 'Andrian' : (\$isNewspaper ? 'Angga' : (\$isSunnyBotanical ? 'Baskara' : (\$isWantedPoster ? 'Sam' : (\$isChampagneBloom ? 'Rian' : (\$isNightSky ? 'Raden' : (\$isLilacBlooms ? 'Angga' : (\$isEtherealBloom ? 'Justin' : (\$isBlueBlossom ? 'Putra' : (\$isSummerVibes ? 'Dion' : (\$isMonochrome ? 'Dilan' : 'Rian')))))))))))),\n",
    $content
);

$content = preg_replace(
    "/('groom_parents'\s*=>\s*)[^,]+,\n/",
    "$1(\$isMelayuPixelated || \$isMistyRomance || \$isWhisperingGarden || \$isCrayonDreams) ? 'Putra dari Bapak Ayah Dias & Ibu Ibu Dias' : (\$isSahalaPattern ? 'Putra ke-2 Bpk. Samuel & Ibu Masuya' : (\$isFairytaleCastle ? 'Putra Bapak Andi Wijaya dan Ibu Susan Susiana' : (\$isNewspaper ? 'Putra pertama dari Bapak Rahmad & Ibu Siti' : (\$isSunnyBotanical ? 'Putra dari Bapak Bambang Pratomo & Ibu Zulaikha' : (\$isWantedPoster ? 'Putra dari Bpk. Ricard & Ibu Elena' : (\$isChampagneBloom ? 'Putra Pertama dari Bpk. Hendra Pratama & Ibu Susi Handayani' : (\$isNightSky ? 'Putra Pertama dari Bpk. Bambang Wicaksono & Ibu Rini Handayani' : (\$isLilacBlooms ? 'Putra Pertama dari Bapak Ayah Angga & Ibu Ibu Angga' : (\$isEtherealBloom ? 'Putra dari Bapak Ayah Justin & Ibu Ibu Justin' : (\$isBlueBlossom ? 'Putra dari Bpk. Hendra Pratama & Ibu Rina Pratama' : (\$isSummerVibes ? 'Putra pertama dari Bpk. Yunus & Ibu Kartini' : (\$isMonochrome ? 'Putra pertama dari Bapak Hendra & Ibu Susi' : 'Putra pertama dari Bpk. Hendra & Ibu Susi')))))))))))),\n",
    $content
);

$content = preg_replace(
    "/('groom_instagram'\s*=>\s*)[^,]+,\n/",
    "$1(\$isMelayuPixelated || \$isMistyRomance || \$isWhisperingGarden || \$isCrayonDreams) ? 'diastaufikr' : (\$isSahalaPattern ? 'bagas.sadewa' : (\$isFairytaleCastle ? 'andrian.sanjaya' : (\$isNewspaper ? 'angga.pratama' : (\$isSunnyBotanical ? 'wevitation' : (\$isWantedPoster ? 'wevitation' : (\$isChampagneBloom ? 'rian.pratama' : (\$isNightSky ? 'raden.wicaksono' : (\$isLilacBlooms ? 'angga.pratama' : (\$isEtherealBloom ? 'jessnolimit' : (\$isBlueBlossom ? 'putra.pratama' : (\$isSummerVibes ? 'dion.yunus' : (\$isMonochrome ? 'dilan.pratama' : 'rian.pratama')))))))))))),\n",
    $content
);

file_put_contents($file, $content);
echo "ThemeController syntax fixed!\n";
