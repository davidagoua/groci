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
        Schema::create('bannieres', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('boutique_id')->nullable();
            $table->string('image');
            $table->string('captions')->nullable();
            $table->string('link')->nullable();
            $table->string('place')->nullable();
            $table->boolean('is_actif')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bannieres');
    }
};
