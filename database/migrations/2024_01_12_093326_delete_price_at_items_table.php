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
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('class');
            $table->dropColumn('spec');
            $table->dropColumn('price_str');
            $table->dropColumn('price_int');
            $table->dropColumn('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('class')->after('name');
            $table->string('spec')->after('class')->nullable();
            $table->string('price_str')->after('unit');
            $table->integer('price_int')->after('price_str');
            $table->string('status')->after('editor');
        });
    }
};
