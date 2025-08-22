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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->date('loan_date');
            $table->date('due_date');
            $table->timestamp('returned_at')->nullable();
            $table->enum('status', ['PENDING', 'RETURNED', 'OVERDUE'])->default('PENDING');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
