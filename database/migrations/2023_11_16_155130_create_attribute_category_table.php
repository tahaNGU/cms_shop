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
        Schema::create('attribute_category', function (Blueprint $table) {
            $table->foreignId('attribiute_id');
            $table->foreign('attribiute_id')->references('id')->on('attributes')->onDelete('cascade');

            $table->foreignId('product_cat_id');
            $table->foreign('product_cat_id')->references('id')->on('product_cats')->onDelete('cascade');

            $table->boolean('is_filter')->default(0);
            $table->boolean('is_variation')->default(0);

            $table->primary(['attribiute_id' , 'product_cat_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_category');
    }
};
