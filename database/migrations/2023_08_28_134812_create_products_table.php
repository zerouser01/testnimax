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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Название продукта');
            $table->string('description')->nullable()->comment('Описание');
            $table->integer('price')->comment('Цена');
            $table->boolean('is_published')->comment('Опубликован y/n');
            $table->boolean('is_deleted')->default(false)->comment('Удален y/n');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
