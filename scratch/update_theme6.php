<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\DB;

DB::table('themes')->where('id', 6)->update([
    'name' => 'Basic Soft Blue Botanical',
    'description' => 'Desain floral soft blue botanical dengan ornamen dedaunan biru anggun, layout editorial sinematik, grid galeri 6 foto, dan palet warna pastel romantis.',
]);

$theme = DB::table('themes')->where('id', 6)->first();
echo 'Updated Theme 6: ID='.$theme->id.' | Name='.$theme->name.' | Slug='.$theme->slug.PHP_EOL;
