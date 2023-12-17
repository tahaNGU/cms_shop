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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('kind');
            $table->string('content_type');
            $table->bigInteger('content_id');
            $table->string('pic')->nullable();
            $table->string('video')->nullable();
            $table->longText('note')->nullable();
            $table->string('title2')->nullable();
            $table->integer('admin_id');
            $table->integer('order')->default('0');
            $table->enum('state',['0','1'])->default('0');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
