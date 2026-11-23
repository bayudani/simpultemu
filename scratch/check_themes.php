<?php

use App\Models\Theme;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$themes = Theme::all(['id', 'slug', 'name', 'tier']);
foreach ($themes as $t) {
    echo "ID: {$t->id} | Slug: {$t->slug} | Name: {$t->name} | Tier: {$t->tier}\n";
}
