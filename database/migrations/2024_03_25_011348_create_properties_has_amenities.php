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
        Schema::create('properties_has_amenities', function (Blueprint $table) {
            $table->foreignId('property_id')->constrained('properties', 'property_id');

            $table->unsignedTinyInteger('room_id');
            $table->foreign('room_id')->on('rooms')->references('room_id');

            $table->primary(['property_id', 'room_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties_has_amenities');
    }
};
