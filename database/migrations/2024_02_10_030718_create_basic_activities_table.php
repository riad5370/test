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
        Schema::create('basic_activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('details');
            $table->string('image')->nullable();
            $table->string('gallery_header', 500);
            $table->string('vdo_header', 500);
            $table->text('vdo_link'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basic_activities');
    }
};
