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
        Schema::create('owners', function (Blueprint $table) {
            $table->id('owner_id');
            $table->string('name', 255);
            $table->string('surname', 255);
            $table->char('id', 12);
            $table->char('tin', 12);
            $table->string('email', 255);
            $table->string('address', 255);
            $table->string('province', 255);
            $table->string('city', 255);
            $table->string('country', 255);
            $table->unsignedInteger('zip_code');
            $table->unsignedInteger('area_code');
            $table->string('mobile_phone', 15);
            $table->date('date_of_birth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
