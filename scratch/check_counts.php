<?php

$c = file_get_contents(__DIR__.'/../resources/views/invitations/show.blade.php');
$patterns = [
    'THEME 12 BESPOKE COVER',
    'THEME 12: BESPOKE HERO SECTION',
    'THEME 12 BESPOKE KUTIPAN SUCI',
    'THEME 12 BESPOKE PROFIL MEMPELAI',
    'THEME 12 BESPOKE RANGKAIAN ACARA',
    'THEME 12 BESPOKE LOVE STORY',
    'THEME 12 BESPOKE GALERI FOTO',
    'THEME 12 BESPOKE TITIP HADIAH',
    'THEME 12 BESPOKE CLOSING',
    'id="t12-desktop-sidebar"',
];
foreach ($patterns as $p) {
    echo $p.': '.substr_count($c, $p).PHP_EOL;
}
