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
        Schema::create('image_produits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('path');
            $table->unsignedBigInteger('produit_id');
            $table->string('caption')->nullable();
            $table->boolean('main')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_produits');
    }
};
