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
        Schema::table('products',function (Blueprint $table){
            $table->enum('state_new',['0','1'])->default('0');
            $table->enum('state_suggest',['0','1'])->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products',function (Blueprint $table){
            $table->dropColumn('state_new');
            $table->dropColumn('state_suggest');
        });
    }
};
