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
            $table->integer('space');
            $table->integer('room');
            $table->integer('bath');
            $table->boolean('furnished');
            $table->timestamps();
            $table->bigInteger('street_id');
            $table->foreign('street_id')->on('streets')->references('id')->nullOnDelete();
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
