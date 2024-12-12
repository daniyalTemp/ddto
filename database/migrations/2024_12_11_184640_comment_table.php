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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('msg')->nullable();
            $table->enum('type', ['comment' , 'contact'])->default('contact');
            $table->boolean('showInWebsite')->default(false);
            $table->boolean('seen')->default(false);
            $table->text('adminNote')->nullable();
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
