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
        Schema::create('timeline_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_maintenance');
            $table->text('content')->nullable();
            $table->text('editor')->nullable();
            $table->timestamps();

            $table->foreign('id_maintenance')->references('id')->on('maintenances');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timeline_tickets');
    }
};
