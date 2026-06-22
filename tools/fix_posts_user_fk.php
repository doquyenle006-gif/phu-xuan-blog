<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
try {
    $userIds = DB::table('users')->pluck('id')->toArray();
    if (empty($userIds)) {
        echo "No users found; creating admin user...\n";
        $adminId = DB::table('users')->insertGetId([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        echo "Created admin user id={$adminId}\n";
        $userIds = [$adminId];
    } else {
        $adminId = $userIds[0];
        echo "Found existing user id={$adminId}; using as admin.\n";
    }

    $affected = DB::table('posts')
        ->where(function ($q) use ($userIds) {
            $q->whereNull('user_id');
            if (!empty($userIds)) {
                $q->orWhereNotIn('user_id', $userIds);
            }
        })
        ->update(['user_id' => $adminId]);

    echo "Updated posts rows to reference user id={$adminId}: {$affected} rows affected\n";
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
}
