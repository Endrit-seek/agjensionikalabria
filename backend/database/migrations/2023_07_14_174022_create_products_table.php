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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->string('type');
            $table->string('status');
            $table->string('address')->nullable();
            $table->string('street');
            $table->integer('space');
            $table->integer('room');
            $table->integer('bath');
            $table->boolean('furnished');
            $table->bigInteger('city_id');
            $table->foreign('city_id')->on('cities')->references('id')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
