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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title');
            $table->string('genre')->nullable();
            $table->year('year')->nullable();
            $table->unsignedInteger('stock')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
