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
        Schema::create('about_basics', function (Blueprint $table) {
            $table->id();
            $table->string('title',150);
            $table->string('image')->nullable();
            $table->text('we_are_content');
            $table->text('we_do_content');
            $table->text('missionContent');
            $table->text('vishionContent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_basics');
    }
};
