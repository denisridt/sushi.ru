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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('city'); // Город
            $table->string('street'); // Улица
            $table->string('house'); // Дом
            $table->string('floor')->nullable(); // Этаж, может быть null
            $table->string('apartment')->nullable(); // Квартира, может быть null
            $table->string('entrance')->nullable(); // Подъезд, может быть null
            $table->string('intercom')->nullable(); // Домофон, может быть null
            $table->text('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
