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
        Schema::create('guest_house_basics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('details', 500);
            $table->string('image')->nullable();
            $table->text('slideDownDetails');
            $table->text('vdo_link'); 
            $table->text('bottom_content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_house_basics');
    }
};
