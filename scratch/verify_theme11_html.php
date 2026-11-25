<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::create('/tema/11/demo', 'GET')
);

$html = $response->getContent();
echo 'Status code: '.$response->getStatusCode()."\n";
echo 'HTML length: '.strlen($html)." bytes\n";

$checks = [
    'Section mempelai background color #FAF7F2' => str_contains($html, 'id="section-mempelai"') && str_contains($html, 'background-color: #FAF7F2;'),
    'Section mempelai NO mountain background' => ! preg_match('/id="section-mempelai"[^>]*bg-mountain-landscape/', $html),
    'Bride Azalia Fasya with text-[#2C404E]' => str_contains($html, 'Azalia Fasya') && str_contains($html, 'text-[#2C404E]'),
    'Groom Dias Taufik with text-[#2C404E]' => str_contains($html, 'Dias Taufik') && str_contains($html, 'text-[#2C404E]'),
    'Pendopo sunset image in section acara' => str_contains($html, 'bg-pendopo-sunset.jpg'),
    'Caption below pendopo exists' => str_contains($html, 'Kedua mempelai menunggu di depan pendopo.') && str_contains($html, 'Sentuh untuk disapa.'),
    'Coastal road image exists' => str_contains($html, 'bg-coastal-road.jpg'),
    'Nostalgic wagon car exists' => str_contains($html, 'nostalgic-wagon-car'),
    'Car caption exists' => str_contains($html, 'Sentuh mobilnya untuk melaju.'),
];

foreach ($checks as $name => $pass) {
    echo ($pass ? '✅ PASS: ' : '❌ FAIL: ').$name."\n";
}
