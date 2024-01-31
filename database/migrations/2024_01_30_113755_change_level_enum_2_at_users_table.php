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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('level');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->enum("level", [
                'Super Admin',
                'Management',
                'Helpdesk',
                'Engineer',
                'DACSO'
            ])->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('level');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->enum("level", [
                'Super Admin',
                'Admin',
                'Helpdesk',
                'Support',
                'DACSO',
                'User'
            ])->nullable()->after('name');
        });
    }
};
