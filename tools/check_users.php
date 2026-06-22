<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
try {
    $users = Illuminate\Support\Facades\DB::select('SELECT id FROM users');
    if (count($users)) {
        echo "users ids:\n";
        print_r($users);
    } else {
        echo "no users found\n";
    }
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
}
