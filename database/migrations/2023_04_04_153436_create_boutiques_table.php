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
        Schema::create('boutiques', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->string('image')->nullable();
            $table->string('contact');
            $table->string('contact2')->nullable();
            $table->string('ville')->nullable();
            $table->string('quartier')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boutiques');
    }
};
