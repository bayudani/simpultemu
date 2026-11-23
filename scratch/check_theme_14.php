<?php

use App\Models\Theme;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Support\Facades\Schema;

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

$cols = Schema::getColumnListing('themes');
print_r($cols);
$t14 = Theme::find(14);
print_r($t14->toArray());
