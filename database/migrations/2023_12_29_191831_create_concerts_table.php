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
        Schema::create('concerts', function (Blueprint $table) {
            $table->id();
            $table->integer('max_capacity');
            $table->boolean('is_outdoors');
            $table->string('address');
            $table->dateTime('datetime');
            $table->string('country');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->decimal('price',10,2);
            $table->decimal('discount',2,2)->default('00.00');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concerts');
    }
};
