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
        Schema::create('loan_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('film_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedInteger('qty');
            $table->unsignedInteger('returned_qty')->default(0);
            $table->timestamps();

            $table->unique(['loan_id', 'film_id']);
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_items');
    }
};
