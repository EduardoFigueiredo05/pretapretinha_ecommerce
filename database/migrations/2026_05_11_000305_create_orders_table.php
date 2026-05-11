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
            
            // user_id opcional (pode ser nulo para visitantes/checkout aberto)
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete(); 

            // Dados do Comprador (Guest)
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_cpf')->nullable(); // Essencial no Brasil para emissão de nota/frete

            // Endereço de Entrega
            $table->string('zip_code'); // CEP
            $table->string('street'); // Rua
            $table->string('number'); // Número
            $table->string('complement')->nullable(); // Complemento
            $table->string('neighborhood'); // Bairro
            $table->string('city'); // Cidade
            $table->string('state', 2); // Estado (UF)

            // Valores e Status
            $table->decimal('total_amount', 10, 2); // Total dos produtos
            $table->decimal('shipping_cost', 10, 2)->default(0); // Valor do Frete
            $table->string('status')->default('pendente'); // pendente, pago, enviado, entregue
            $table->string('tracking_code')->nullable(); // Código de rastreio dos Correios

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
