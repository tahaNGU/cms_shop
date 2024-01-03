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
        Schema::table('user', function (Blueprint $table) {
            $table->string('company_name')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('post_code')->nullable();
            $table->string('tell')->nullable();
            $table->string('tell_emergency')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('company_name');
            $table->dropColumn('province');
            $table->dropColumn('city');
            $table->dropColumn('post_code');
            $table->dropColumn('tell');
            $table->dropColumn('tell_emergency');
        });
    }
};
