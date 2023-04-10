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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('marque_id')->nullable();
            $table->unsignedBigInteger('fournisseur_id')->nullable();
            $table->unsignedBigInteger('prix')->nullable();
            $table->unsignedBigInteger('fake_price')->nullable();
            $table->string('nom');
            $table->unsignedBigInteger('stock')->default(1);
            $table->longText('description')->nullable();
            $table->string('unite')->nullable();
            $table->boolean('is_actif')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
