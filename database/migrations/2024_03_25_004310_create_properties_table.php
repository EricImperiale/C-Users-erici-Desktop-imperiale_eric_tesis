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
        Schema::create('properties', function (Blueprint $table) {
            $table->id('property_id');
            $table->string('full_address', 255);
            $table->string('neighborhood', 255);
            $table->string('address', 255);
            $table->string('province', 255);
            $table->string('city', 255);
            $table->unsignedInteger('zip_code');
            $table->unsignedInteger('rooms');
            $table->unsignedInteger('bedrooms');
            $table->unsignedInteger('bathrooms');
            $table->unsignedInteger('garages')->nullable();
            $table->unsignedInteger('covered_area');
            $table->unsignedInteger('total_area');
            $table->unsignedInteger('age')->nullable();
            $table->string('rent_price', 255);
            $table->string('expenses', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->unsignedInteger('floor')->nullable();
            $table->string('department', 10)->nullable();
            $table->boolean('is_professional_use')->default(false);
            $table->boolean('is_brand_new')->default(false);
            $table->boolean('is_internal')->default(false);
            $table->float('latitude', 10, 6)->nullable();
            $table->float('longitude', 10, 6)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
