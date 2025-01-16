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
        Schema::create('bus_routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('festival_id');
            $table->dateTime('depature_time');
            $table->dateTime('arrival_time');
            $table->timestamps();

            $table->foreign('festival_id')->references('id')->on('festivals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_routes');
    }
};
