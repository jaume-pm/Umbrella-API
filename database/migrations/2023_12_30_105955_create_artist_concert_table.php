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
        Schema::create('artist_concert', function (Blueprint $table) {
            $table->id();
            $table->string('artist_name');
            $table->unsignedBigInteger('concert_id');
            $table->timestamps();

            // Define foreign keys
            $table->foreign('artist_name')->references('name')->on('artists')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('concert_id')->references('id')->on('concerts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artist_concert');
    }
};
