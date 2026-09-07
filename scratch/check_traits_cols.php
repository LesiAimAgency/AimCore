<?php

use App\Models\Brand;
use App\Models\Font;
use App\Models\FormSubmission;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatusHistory;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCombo;
use App\Models\ProductReview;
use App\Models\ProjectProduct;
use App\Models\ProjectProductCategory;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
use App\Models\Wkcomputer\WkBrand;
use App\Models\Wkcomputer\WkCategory;
use App\Models\Wkcomputer\WkPost;
use App\Models\Wkcomputer\WkProduct;
use App\Models\Wkcomputer\WkProductCombo;
use Illuminate\Contracts\Console\Kernel;

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

$models = [
    Font::class,
    FormSubmission::class,
    Menu::class,
    Order::class,
    MenuItem::class,
    OrderStatusHistory::class,
    OrderItem::class,
    Post::class,
    Product::class,
    ProductCategory::class,
    ProductCombo::class,
    ProductReview::class,
    ProjectProduct::class,
    Brand::class,
    ProjectProductCategory::class,
    Review::class,
    Tag::class,
    User::class,
    WkProductCombo::class,
    WkProduct::class,
    WkPost::class,
    WkCategory::class,
    WkBrand::class,
];

foreach ($models as $m) {
    $tbl = (new $m)->getTable();
    $hasP = Schema::hasColumn($tbl, 'project_id');
    $hasT = Schema::hasColumn($tbl, 'tenant_id');
    echo "$tbl: tenant_id=".($hasT ? 'yes' : 'no').', project_id='.($hasP ? 'yes' : 'no').PHP_EOL;
}
