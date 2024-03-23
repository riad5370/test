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
        Schema::create('guet_house_editable_images', function (Blueprint $table) {
            $table->id();
            $table->string('imageOne')->nullable();
            $table->string('imageTwo')->nullable();
            $table->string('imageThree')->nullable();
            $table->string('imageFour')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guet_house_editable_images');
    }
};
