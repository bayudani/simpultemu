<?php

$lines = file('c:/Users/USER/Herd/simpultemu_kami/resources/views/invitations/show.blade.php');
foreach ($lines as $i => $line) {
    if (str_contains($line, 'id="invitation-cover"') || str_contains($line, 'id="main-container"') || str_contains($line, 'id="section-hero"')) {
        echo ($i + 1).': '.trim($line)."\n";
    }
}
