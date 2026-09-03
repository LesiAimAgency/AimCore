<?php

use App\Models\HostingProfile;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();
$p = HostingProfile::find(2);
$p->db_prefix = null;
$p->save();
echo 'Fixed db_prefix';
