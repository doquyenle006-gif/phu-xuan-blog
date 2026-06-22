<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
try {
    $res = Illuminate\Support\Facades\DB::select("SHOW TABLES LIKE 'categories'");
    if (count($res)) {
        echo "categories table exists\n";
        print_r($res);
    } else {
        echo "categories table NOT found\n";
    }
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
}
