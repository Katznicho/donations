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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('amount');
            $table->string('phone_number');
            $table->string("payment_mode");
            $table->string("payment_method")->nullable();
            $table->text('description')->nullable;
            $table->string('reference');
            $table->string('status');
            $table->string("order_tracking_id")->nullable();
            $table->string("OrderNotificationType")->nullable();
            $table->foreignId('sponsor_id')->nullable()->references('id')->on('sponsors')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
