<?php

$c = file_get_contents('resources/views/invitations/themes/premium-melayu-pixelated.blade.php');
preg_match_all('/&#[0-9]+;/', $c, $m);
echo "Entities found:\n".implode("\n", array_unique($m[0]))."\n";
