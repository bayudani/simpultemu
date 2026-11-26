<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::create('/tema', 'GET')
);

echo 'Status: '.$response->getStatusCode()."\n";
echo "Headers:\n";
foreach ($response->headers->all() as $name => $values) {
    echo "  $name: ".implode(', ', $values)."\n";
}
