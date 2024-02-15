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
        Schema::create('pizza_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pizza_id');
            $table->enum('size', ['small', 'medium', 'large']);
            $table->decimal('price', 8, 2);
            $table->timestamps();
            $table->foreign('pizza_id')->references('id')->on('pizzas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza_attributes');
    }
};
