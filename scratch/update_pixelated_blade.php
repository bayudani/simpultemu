<?php

$file = 'resources/views/invitations/themes/premium-melayu-pixelated.blade.php';
$content = file_get_contents($file);

// 1. Welcome Card Nickname fallback
$oldNick = "{{ \$invitation->groom_nickname ?? 'Dias' }} &amp; {{ \$invitation->bride_nickname ?? 'Azalia' }}";
$newNick = "{{ \$invitation->groom_nickname ?? \$invitation->groom_name ?? 'Dias' }} &amp; {{ \$invitation->bride_nickname ?? \$invitation->bride_name ?? 'Azalia' }}";
if (strpos($content, $oldNick) !== false) {
    $content = str_replace($oldNick, $newNick, $content);
    echo "1. Updated Welcome Card couple names\n";
}

// 2. Akad Venue fallback
$oldAkad = "{{ \$invitation->akad_venue ?? 'Sakinah Grand Ballroom' }}";
$newAkad = "{{ \$invitation->akad_venue ?? \$invitation->venue ?? 'Sakinah Grand Ballroom' }}";
if (strpos($content, $oldAkad) !== false) {
    $content = str_replace($oldAkad, $newAkad, $content);
    echo "2. Updated Akad Venue fallback\n";
}

$oldAkadAddr = "{{ \$invitation->akad_address ?? 'Jl. Melayu Indah No. 88, Pekanbaru, Riau' }}";
$newAkadAddr = "{{ \$invitation->akad_address ?? \$invitation->address ?? 'Jl. Melayu Indah No. 88, Pekanbaru, Riau' }}";
if (strpos($content, $oldAkadAddr) !== false) {
    $content = str_replace($oldAkadAddr, $newAkadAddr, $content);
    echo "3. Updated Akad Address fallback\n";
}

// 3. Reception Venue fallback
$oldRec = "{{ \$invitation->reception_venue ?? \$invitation->akad_venue ?? 'Sakinah Grand Ballroom' }}";
$newRec = "{{ \$invitation->reception_venue ?? \$invitation->venue ?? \$invitation->akad_venue ?? 'Sakinah Grand Ballroom' }}";
if (strpos($content, $oldRec) !== false) {
    $content = str_replace($oldRec, $newRec, $content);
    echo "4. Updated Reception Venue fallback\n";
}

$oldRecAddr = "{{ \$invitation->reception_address ?? \$invitation->akad_address ?? 'Jl. Melayu Indah No. 88, Pekanbaru, Riau' }}";
$newRecAddr = "{{ \$invitation->reception_address ?? \$invitation->address ?? \$invitation->akad_address ?? 'Jl. Melayu Indah No. 88, Pekanbaru, Riau' }}";
if (strpos($content, $oldRecAddr) !== false) {
    $content = str_replace($oldRecAddr, $newRecAddr, $content);
    echo "5. Updated Reception Address fallback\n";
}

file_put_contents($file, $content);
echo "Successfully updated $file\n";
