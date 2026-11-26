<?php

$lines = file('c:/Users/USER/Herd/simpultemu_kami/resources/views/invitations/show.blade.php');
foreach ($lines as $i => $line) {
    if (str_contains($line, '<main') || str_contains($line, '</main>') || str_contains($line, 'id="section-closing"') || str_contains($line, 'id="section-terima-kasih"') || str_contains($line, '<footer')) {
        echo ($i + 1).': '.trim($line)."\n";
    }
}
