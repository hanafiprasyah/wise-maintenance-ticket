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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
