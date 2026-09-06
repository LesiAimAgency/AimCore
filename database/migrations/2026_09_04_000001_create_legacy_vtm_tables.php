<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Coupons
        if (! Schema::hasTable('coupons')) {
            Schema::create('coupons', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable()->index();
                $table->unsignedBigInteger('tenant_id')->nullable()->index();
                $table->string('code')->unique()->index();
                $table->string('name')->nullable();
                $table->enum('type', ['fixed', 'percentage'])->default('fixed');
                $table->decimal('value', 15, 2);
                $table->decimal('min_order_value', 15, 2)->default(0);
                $table->decimal('max_discount_value', 15, 2)->nullable();
                $table->dateTime('start_date')->nullable();
                $table->dateTime('end_date')->nullable();
                $table->integer('usage_limit')->nullable();
                $table->integer('usage_limit_per_user')->default(1);
                $table->integer('usage_count')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // 2. Flash Sale Campaigns
        if (! Schema::hasTable('flash_sale_campaigns')) {
            Schema::create('flash_sale_campaigns', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable()->index();
                $table->unsignedBigInteger('tenant_id')->nullable()->index();
                $table->string('name');
                $table->text('description')->nullable();
                $table->dateTime('starts_at');
                $table->dateTime('ends_at');
                $table->enum('status', ['draft', 'active', 'ended'])->default('draft');
                $table->boolean('apply_to_all')->default(false);
                $table->timestamps();

                $table->index(['status', 'starts_at', 'ends_at']);
            });
        }

        // 3. Flash Sale Items
        if (! Schema::hasTable('flash_sale_items')) {
            Schema::create('flash_sale_items', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('campaign_id')->index();
                $table->unsignedBigInteger('product_id')->nullable()->index();
                $table->unsignedBigInteger('category_id')->nullable();
                $table->enum('discount_type', ['percent', 'fixed'])->default('percent');
                $table->decimal('discount_value', 12, 0);
                $table->integer('sale_limit')->nullable();
                $table->integer('sold_count')->default(0);
                $table->timestamps();

                $table->index(['campaign_id', 'product_id']);
            });
        }

        // 4. Agents
        if (! Schema::hasTable('agents')) {
            Schema::create('agents', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable()->index();
                $table->unsignedBigInteger('tenant_id')->nullable()->index();
                $table->string('name');
                $table->string('code')->unique()->nullable();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->text('address')->nullable();
                $table->string('contact_person')->nullable();
                $table->string('region')->nullable();
                $table->enum('type', ['distributor', 'retailer', 'franchise', 'other'])->default('retailer');
                $table->decimal('commission_rate', 5, 2)->default(0);
                $table->boolean('is_active')->default(true);
                $table->text('notes')->nullable();
                $table->unsignedBigInteger('user_id')->nullable()->index();
                $table->timestamps();

                $table->index(['is_active', 'name']);
            });
        }

        // 5. User Addresses
        if (! Schema::hasTable('user_addresses')) {
            Schema::create('user_addresses', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->index();
                $table->string('receiver_name')->nullable();
                $table->string('receiver_phone')->nullable();
                $table->string('province_code')->nullable();
                $table->string('ward_code')->nullable();
                $table->string('province_name')->nullable();
                $table->string('district_name')->nullable();
                $table->string('ward_name')->nullable();
                $table->string('address_detail')->nullable();
                $table->string('full_address')->nullable();
                $table->boolean('is_default')->default(false);
                $table->timestamps();
            });
        }

        // 6. Form Templates
        if (! Schema::hasTable('form_templates')) {
            Schema::create('form_templates', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable()->index();
                $table->unsignedBigInteger('tenant_id')->nullable()->index();
                $table->string('name');
                $table->text('description')->nullable();
                $table->json('fields');
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        // 7. Modal Forms
        if (! Schema::hasTable('modal_forms')) {
            Schema::create('modal_forms', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable()->index();
                $table->unsignedBigInteger('tenant_id')->nullable()->index();
                $table->string('name');
                $table->string('title');
                $table->text('description')->nullable();
                $table->unsignedBigInteger('form_template_id')->nullable()->index();
                $table->json('config');
                $table->boolean('is_active')->default(true);
                $table->enum('trigger_type', ['immediate', 'delay', 'scroll', 'exit_intent'])->default('delay');
                $table->integer('trigger_delay')->default(3);
                $table->integer('trigger_scroll')->default(50);
                $table->enum('show_frequency', ['always', 'once_per_session', 'once_per_day', 'once_per_week'])->default('once_per_session');
                $table->timestamps();
            });
        }

        // 8. Form Submissions
        if (! Schema::hasTable('form_submissions')) {
            Schema::create('form_submissions', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable()->index();
                $table->unsignedBigInteger('tenant_id')->nullable()->index();
                $table->unsignedBigInteger('form_template_id')->nullable()->index();
                $table->unsignedBigInteger('modal_form_id')->nullable()->index();
                $table->json('data');
                $table->string('source')->default('widget');
                $table->string('ip_address')->nullable();
                $table->text('user_agent')->nullable();
                $table->timestamp('submitted_at')->nullable();
                $table->timestamps();
            });
        } else {
            Schema::table('form_submissions', function (Blueprint $table) {
                if (! Schema::hasColumn('form_submissions', 'modal_form_id')) {
                    $table->unsignedBigInteger('modal_form_id')->nullable()->index();
                }
                if (! Schema::hasColumn('form_submissions', 'form_template_id')) {
                    $table->unsignedBigInteger('form_template_id')->nullable()->index();
                }
                if (! Schema::hasColumn('form_submissions', 'source')) {
                    $table->string('source')->default('widget');
                }
                if (! Schema::hasColumn('form_submissions', 'submitted_at')) {
                    $table->timestamp('submitted_at')->nullable();
                }
            });
        }

        // 9. Product Categories fallback
        if (! Schema::hasTable('product_categories')) {
            Schema::create('product_categories', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable()->index();
                $table->unsignedBigInteger('tenant_id')->nullable()->index();
                $table->string('name')->nullable();
                $table->string('slug')->nullable()->index();
                $table->text('description')->nullable();
                $table->unsignedBigInteger('parent_id')->nullable()->index();
                $table->integer('level')->default(0);
                $table->string('path')->nullable();
                $table->integer('sort_order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->softDeletes();
                $table->timestamps();
            });
        }

        // 10. Posts fallback
        if (! Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable()->index();
                $table->unsignedBigInteger('tenant_id')->nullable()->index();
                $table->string('title')->nullable();
                $table->string('slug')->nullable()->index();
                $table->string('post_type')->default('post');
                $table->longText('content')->nullable();
                $table->string('status')->default('published');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        // 11. Products Enhanced fallback (for clean test database environments)
        if (! Schema::hasTable('products_enhanced')) {
            Schema::create('products_enhanced', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('project_id')->nullable()->index();
                $table->unsignedBigInteger('tenant_id')->nullable()->index();
                $table->string('name')->nullable();
                $table->string('slug')->nullable()->index();
                $table->string('sku')->nullable();
                $table->decimal('price', 15, 2)->nullable();
                $table->decimal('regular_price', 15, 2)->default(0);
                $table->decimal('sale_price', 15, 2)->nullable();
                $table->string('status')->default('publish');
                $table->integer('stock_quantity')->default(0);
                $table->boolean('is_in_stock')->default(true);
                $table->boolean('is_featured')->default(false);
                $table->boolean('is_favorite')->default(false);
                $table->boolean('is_bestseller')->default(false);
                $table->string('thumbnail')->nullable();
                $table->text('description')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('form_submissions');
        Schema::dropIfExists('modal_forms');
        Schema::dropIfExists('form_templates');
        Schema::dropIfExists('user_addresses');
        Schema::dropIfExists('agents');
        Schema::dropIfExists('flash_sale_items');
        Schema::dropIfExists('flash_sale_campaigns');
        Schema::dropIfExists('coupons');
    }
};
