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
        Schema::create('propositions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('boutique_id');
            $table->unsignedBigInteger('produit_id');
            $table->unsignedBigInteger('prix');
            $table->unsignedBigInteger('fake_prix')->nullable();
            $table->boolean('is_actif')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propositions');
    }
};
