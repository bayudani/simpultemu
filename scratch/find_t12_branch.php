<?php

$lines = file(__DIR__.'/../resources/views/invitations/show.blade.php');
foreach ($lines as $i => $l) {
    if (strpos($l, '$currentThemeId == 12 || $isChampagneBloom') !== false && strpos($l, '@elseif') !== false) {
        echo 'Line '.($i + 1).":\n";
        for ($j = max(0, $i - 2); $j <= min(count($lines) - 1, $i + 4); $j++) {
            echo '  '.($j + 1).': '.rtrim($lines[$j])."\n";
        }
        echo "---------------------------\n";
    }
}
