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
            $table->boolean('hot')->default(false);
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
            $table->foreign('category_id')->references('id')->on('category')->onDelete(null)->onUpdate(null);
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete(null)->onUpdate(null);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user')->nullable();
            $table->foreign('user')->references('id')->on('users')->onDelete(null)->onUpdate(null);
            $table->enum('status', ['initial', 'getData','waiting','printing','delivered' , 'cancel'])->default('initial');
            $table->enum('paymentStatus', ['pay', 'waiting',])->default('waiting');
            $table->string('cancelReason')->nullable();
            $table->string('postalCode')->nullable();
            $table->text('comment')->nullable();
            $table->text('address')->nullable();
            $table->string('postRefCode')->nullable();
            $table->date('sendIn')->nullable();
            $table->unsignedBigInteger('totalPrice')->default(0);
            $table->unsignedBigInteger('cancelBy')->nullable();
            $table->foreign('cancelBy')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::create('order_products', function (Blueprint $table) {
           $table->id();
           $table->integer('count')->default(1);
           $table->unsignedBigInteger('order_id');
           $table->foreign('order_id')->references('id')->on('orders');
           $table->unsignedBigInteger('product_id');
           $table->foreign('product_id')->references('id')->on('products');
           $table->text('color')->nullable();
           $table->text('size')->nullable();
           $table->text('material')->nullable();
           $table->unsignedBigInteger('finalPrice')->default(0);
           $table->string('hashed')->nullable();
           $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::dropIfExists('category');

    }
};
