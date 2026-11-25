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
preg_match('/<div class="relative w-full max-w-xs sm:max-w-sm aspect-\[4\/5\].*?<\/div>\s*<\/div>/s', $html, $matches);
echo $matches[0]."\n";
