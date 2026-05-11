<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            
            // Liga este item a um Pedido específico (se apagar o pedido, apaga os itens dele)
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            
            // Liga este item à Boneca que foi comprada
            $table->foreignId('product_id')->constrained();
            
            // Quantas bonecas desse modelo a pessoa comprou?
            $table->integer('quantity');
            
            // O "Pulo do Gato" do E-commerce: Salvar o preço NA HORA da compra
            $table->decimal('price', 10, 2); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};