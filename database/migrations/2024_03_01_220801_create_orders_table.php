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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->string('postcode');
            $table->string('mobile');
            $table->string('email');
            $table->string('order_note');
            $table->tinyInteger('status')->default('0');
            $table->string('message')->nullable();
            $table->string('tracking_no');
            $table->decimal('total_price');
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

