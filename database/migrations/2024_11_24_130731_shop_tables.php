<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('BasePrice')->nullable();
            $table->float('discount')->nullable();
            $table->integer('weight')->nullable();
            $table->boolean('available')->default(false);
            $table->text('description')->nullable();
            $table->text('color')->nullable();
            $table->text('size')->nullable();
            $table->text('material')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
        Schema::create('category_products_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');
            $table->enum('status', ['initial', 'getData','waiting','printing','delivered' , 'cancel'])->default('initial');
            $table->enum('paymentStatus', ['pay', 'waiting'])->default('waiting');
            $table->string('cancelReason')->nullable();
            $table->text('comment')->nullable();
            $table->text('address')->nullable();
            $table->string('postRefCode')->nullable();
            $table->date('sendIn')->nullable();
            $table->unsignedBigInteger('totalPrice')->nullable();
            $table->unsignedBigInteger('cancelBy')->nullable();
            $table->foreign('cancelBy')->references('id')->on('users');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');

    }
};
