<?php

$lines = file('c:/Users/USER/Herd/simpultemu_kami/resources/views/invitations/show.blade.php');
for ($i = 6572; $i < 9150; $i++) {
    if (str_contains($lines[$i], 'aside') || str_contains($lines[$i], 'section-hero') || str_contains($lines[$i], 'main-wrapper')) {
        echo ($i + 1).': '.trim($lines[$i])."\n";
    }
}
