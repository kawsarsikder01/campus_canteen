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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default(null);
            $table->string('email')->default(null);
            $table->string('phone')->default(null);
            $table->string('amount')->default(null);
            $table->string('address')->default(null);
            $table->string('status')->default('pending');
            $table->string('transaction_id')->default(null);
            $table->string('currency')->default('BDT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
