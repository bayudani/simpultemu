<?php

use App\Models\Theme;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$view = view('home', ['themes' => Theme::take(6)->get()])->render();
$pos = strpos($view, 'id="beranda"');
echo substr($view, $pos, 800)."\n";
