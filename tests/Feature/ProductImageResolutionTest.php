<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Product;
use Tests\TestCase;

class ProductImageResolutionTest extends TestCase
{
    public function test_post_model_featured_image_resolves_to_media_files_url(): void
    {
        $post = new Post([
            'featured_image' => 'media/products/man-hinh-may-tinh-dell-ultrasharp-u2424h/u2424h.jpg',
        ]);

        $featuredImage = $post->featured_image;
        $this->assertStringContainsString('media-files/media/products/man-hinh-may-tinh-dell-ultrasharp-u2424h/u2424h.jpg', $featuredImage);
        $this->assertStringNotContainsString('storage/media/products', $featuredImage);
    }

    public function test_product_model_featured_image_resolves_to_media_files_url(): void
    {
        $prod = new Product([
            'featured_image' => 'media/products/man-hinh-may-tinh-dell-ultrasharp-u2424h/u2424h.jpg',
        ]);

        $this->assertStringContainsString('media-files/media/products/man-hinh-may-tinh-dell-ultrasharp-u2424h/u2424h.jpg', $prod->featured_image);
    }

    public function test_media_url_crossover_resolves_to_media_files_when_file_exists(): void
    {
        $path = '/storage/media/products/man-hinh-may-tinh-dell-ultrasharp-u2424h/u2424h.jpg';
        $resolved = media_url($path);

        $this->assertStringContainsString('media-files/media/products/man-hinh-may-tinh-dell-ultrasharp-u2424h/u2424h.jpg', $resolved);
        $this->assertStringNotContainsString('/storage/', $resolved);
    }

    public function test_vtm_storage_images_remain_in_storage(): void
    {
        $vtmPath = '/storage/media/products/5-bach-tuoc-lam-sach-cap-dong-frozen-whole-clean-octopus.jpg';
        $resolved = media_url($vtmPath);

        $this->assertStringContainsString('storage/media/products/5-bach-tuoc-lam-sach-cap-dong-frozen-whole-clean-octopus.jpg', $resolved);
    }
}
