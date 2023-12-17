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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('canonical')->nullable();
            $table->string('redirect')->nullable();
            $table->string('redirect_kind')->nullable();
            $table->string('robots')->nullable();
            $table->string('h1')->nullable();
            $table->string('url_seo')->unique();
            $table->string('title_seo');
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('title');
            $table->integer('order')->default('0');
            $table->integer('admin_id');
            $table->enum('state',["0","1"])->default('0');
            $table->string('pic');
            $table->string('alt_pic');
            $table->string('video');
            $table->string('address');
            $table->longText('long_note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
