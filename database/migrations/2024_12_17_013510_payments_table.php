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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('authority')->nullable()->unique();
            $table->string('amount')->nullable();
            $table->unsignedBigInteger('order');
            $table->foreign('order')->references('id')->on('orders');
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');
            $table->text('customData')->nullable();
            $table->string('card_holder')->nullable();
            $table->string('refCode')->nullable();
            $table->string('cardHash')->nullable();
            $table->text('result')->nullable();
            $table->enum('status', ['pending' , 'payed' , 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
