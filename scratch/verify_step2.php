<?php

$content = file_get_contents(__DIR__.'/../resources/views/dashboard/invitations/create.blade.php');

$checks = [
    'Theme 11 Name is Premium Nostalgic Village' => str_contains($content, 'name: "Premium Nostalgic Village"'),
    'Theme 11 galleryLimit is 8' => (bool) preg_match('/11:\s*\{[^}]*galleryLimit:\s*8/s', $content),
    'Slot tracker element exists' => str_contains($content, 'id="theme-gallery-slot-tracker"'),
    'Empty slots container exists' => str_contains($content, 'id="emptyGallerySlotsContainer"'),
    'renderGallerySlotPlaceholders defined' => str_contains($content, 'function renderGallerySlotPlaceholders'),
    'File input triggers dynamic slot rendering' => str_contains($content, 'renderGallerySlotPlaceholders(cfg.galleryLimit || 8);'),
];

foreach ($checks as $name => $pass) {
    echo ($pass ? '✅ PASS: ' : '❌ FAIL: ').$name."\n";
}
