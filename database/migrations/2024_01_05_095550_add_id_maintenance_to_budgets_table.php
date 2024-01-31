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
        Schema::table('budgets', function (Blueprint $table) {
            $table->unsignedBigInteger('id_maintenance')->after('id')->nullable();
            $table->foreign('id_maintenance')->references('id')->on('maintenances');
            $table->dropColumn('ticket');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->dropForeign(['id_maintenance']);
            $table->dropColumn('id_maintenance');
            $table->string('ticket')->after('id');
        });
    }
};
