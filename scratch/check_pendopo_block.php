<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    Request::create('/tema/11/demo', 'GET')
);

$html = $response->getContent();

// Check pendopo banner block
preg_match('/<div class="relative w-full max-w-xs sm:max-w-sm aspect-\[4\/5\].*?<\/div>\s*<\/div>/s', $html, $matches);
if (! empty($matches[0])) {
    $block = $matches[0];
    echo "Found Pendopo Card Block:\n";
    echo 'Contains bg-pendopo-sunset.jpg: '.(str_contains($block, 'bg-pendopo-sunset.jpg') ? 'YES' : 'NO')."\n";
    echo 'Contains couple-pendopo.png: '.(str_contains($block, 'couple-pendopo.png') ? 'YES' : 'NO')."\n";
    echo 'Contains car-yellow-wagon.png: '.(str_contains($block, 'car-yellow-wagon.png') ? 'YES' : 'NO')."\n";
    echo 'Contains pendopo-bubble: '.(str_contains($block, 'pendopo-bubble') ? 'YES' : 'NO')."\n";
} else {
    echo "Pendopo block not matched\n";
}
