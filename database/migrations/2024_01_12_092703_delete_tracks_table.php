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
        Schema::dropIfExists('tracks');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_maintenance');
            $table->boolean('is_open');
            $table->double('progress');
            $table->string('status');
            $table->string('solution')->nullable();
            $table->string('note')->nullable();
            $table->string('editor');
            $table->timestamps();

            $table->foreign('id_maintenance')->references('id')->on('maintenances');
        });

        // Schema::create('tracks', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('id_maintenance');
        //     $table->unsignedBigInteger('id_budget')->after('id_maintenance')->nullable();
        //     $table->string('status');
        //     $table->string('solution')->nullable();
        //     $table->string('note')->nullable();
        //     $table->string('editor');
        //     $table->timestamps();

        //     $table->foreign('id_maintenance')->references('id')->on('maintenances');
        //     $table->foreign('id_budget')->references('id')->on('budgets');
        // });
    }
};
