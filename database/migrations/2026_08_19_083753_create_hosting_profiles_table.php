<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hosting_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('name'); // Tên profile, vd: "Hosting chính – Tinovn"
            $table->enum('panel_type', ['cpanel', 'directadmin', 'manual'])->default('cpanel');
            $table->string('hostname'); // srv123.tinovn.vn
            $table->unsignedInteger('port')->default(2083); // 2083=cPanel, 2222=DA
            $table->string('cpanel_username'); // cPanel/DA username
            $table->text('api_token'); // encrypted – API Token hoặc DA API Key
            $table->string('domain'); // domain sẽ deploy lên
            $table->string('public_html_path')->default('public_html');
            $table->string('db_prefix')->nullable(); // Prefix cho DB/user trên hosting
            // FTP fallback (khi File Manager API không upload được file lớn)
            $table->string('ftp_host')->nullable();
            $table->unsignedInteger('ftp_port')->default(21);
            $table->string('ftp_username')->nullable();
            $table->text('ftp_password')->nullable(); // encrypted
            $table->boolean('ftp_passive')->default(true);
            $table->boolean('is_active')->default(true);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hosting_profiles');
    }
};
