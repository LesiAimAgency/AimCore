<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = App\Models\User::where('email', 'Quanpham@gmail.com')->first();
if ($user) {
    $user->role = 'super_admin';
    $user->level = 0;
    $user->department = 'Quản trị hệ thống';
    $user->save();
    $user->syncRoles(['super_admin']);
    echo 'Success';
} else {
    echo 'Not Found';
}
