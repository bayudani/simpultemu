<?php

use App\Models\Theme;
use Illuminate\Contracts\Console\Kernel;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$themes = Theme::all();
foreach ($themes as $t) {
    echo "ID: {$t->id} | Name: {$t->name} | Slug: {$t->slug}\n";
}
