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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();

            $table->string('product_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('collection')->nullable();
            $table->string('quantity')->default(1);
            $table->string('image')->nullable();
            $table->string('naira_price')->nullable();
            $table->string('naira_discount')->nullable();
            $table->string('dollar_price')->nullable();
            $table->string('dollar_discount')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
