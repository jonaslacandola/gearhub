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
            $table->uuid('id')->primary();
            $table->foreignUuid('userId')->constrained('users')->onDelete('cascade');
            $table->integer('total')->required();
            $table->string('status')->default('pending');
            $table->string('payment_intent')->required();
            $table->string('payment_status')->default('unpaid');
            $table->string('payment_method')->required();
            $table->string('name')->required();
            $table->string('email')->required();
            $table->string('address')->required();
            $table->string('city')->required();
            $table->string('country')->required();
            $table->string('refund')->nullable(true);
            $table->string('refund_status')->nullable(true);
            $table->string('refund_reason')->nullable(true);
            $table->timestamp('refund_completed_at')->nullable(true);
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
