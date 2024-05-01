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
        Schema::create('properties_has_utilities', function (Blueprint $table) {
            $table->foreignId('property_id')->constrained('properties', 'property_id');

            $table->unsignedTinyInteger('utility_id');
            $table->foreign('utility_id')->on('utilities')->references('utility_id');

            $table->primary(['property_id', 'utility_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties_has_utilities');
    }
};
