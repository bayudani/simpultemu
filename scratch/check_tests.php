<?php

$lines = file('c:/Users/USER/Herd/simpultemu_kami/tests/Feature/NavigationAndThemesTest.php');
foreach ($lines as $i => $line) {
    if (str_contains($line, 'theme') || str_contains($line, '20') || str_contains($line, 'dark-elegance') || str_contains($line, 'melayu')) {
        if (str_contains($line, 'assert')) {
            echo ($i + 1).': '.trim($line)."\n";
        }
    }
}
