@extends('layouts.main')

@section('title', 'Finalizar Compra | Preta Pretinha')

@section('content')
<div class="container section" style="padding-top: 40px; padding-bottom: 80px; background: #f8fafc;">
    
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 style="font-size: 2rem; color: #111; margin-bottom: 10px;">Finalize seu Pedido</h1>
        <p style="color: #666;"><i class="bi bi-shield-lock-fill" style="color: #166534;"></i> Ambiente 100% seguro e criptografado</p>
    </div>

    <form action="#" method="POST" class="checkout-layout">
        @csrf
        
        <!-- COLUNA ESQUERDA: DADOS DO CLIENTE -->
        <div class="checkout-forms">
            
            <!-- Bloco 1: Dados Pessoais -->
            <div class="checkout-card">
                <h3>1. Dados Pessoais</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div style="grid-column: span 2;">
                        <label>Nome Completo</label>
                        <input type="text" name="name" required class="form-input">
                    </div>
                    <div>
                        <label>E-mail</label>
                        <input type="email" name="email" required class="form-input">
                    </div>
                    <div>
                        <label>CPF</label>
                        <input type="text" name="cpf" placeholder="000.000.000-00" required class="form-input">
                    </div>
                    <div style="grid-column: span 2;">
                        <label>Telefone / WhatsApp</label>
                        <input type="text" name="phone" placeholder="(00) 00000-0000" required class="form-input">
                    </div>
                </div>
            </div>

            <!-- Bloco 2: Endereço de Entrega -->
            <div class="checkout-card">
                <h3>2. Endereço de Entrega</h3>
                <div style="display: grid; grid-template-columns: 1fr 2fr 1fr; gap: 15px;">
                    <div style="grid-column: span 3;">
                        <label>CEP</label>
                        <input type="text" name="cep" placeholder="00000-000" style="width: 40%;" required class="form-input">
                    </div>
                    <div style="grid-column: span 2;">
                        <label>Rua / Avenida</label>
                        <input type="text" name="street" required class="form-input">
                    </div>
                    <div>
                        <label>Número</label>
                        <input type="text" name="number" required class="form-input">
                    </div>
                    <div style="grid-column: span 3;">
                        <label>Complemento (Opcional)</label>
                        <input type="text" name="complement" class="form-input">
                    </div>
                </div>
            </div>

            <!-- Bloco 3: Pagamento -->
            <div class="checkout-card" style="border: 2px solid #111;">
                <h3>3. Pagamento <i class="bi bi-credit-card float-right"></i></h3>
                <div style="background: #f1f5f9; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
                    <div style="grid-column: span 2; margin-bottom: 15px;">
                        <label>Número do Cartão</label>
                        <input type="text" placeholder="0000 0000 0000 0000" class="form-input">
                    </div>
                    <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 15px;">
                        <div>
                            <label>Nome no Cartão</label>
                            <input type="text" placeholder="Como impresso no cartão" class="form-input">
                        </div>
                        <div>
                            <label>Validade</label>
                            <input type="text" placeholder="MM/AA" class="form-input">
                        </div>
                        <div>
                            <label>CVV</label>
                            <input type="text" placeholder="123" class="form-input">
                        </div>
                    </div>
                </div>
                <div style="text-align: center;">
                    <img src="https://logospng.org/download/pix/logo-pix-icone-1024.png" alt="Pix" style="height: 20px; filter: grayscale(100%); margin-right: 10px;">
                    <span style="font-size: 0.9rem; color: #666;">Pagamento via PIX será gerado na próxima tela.</span>
                </div>
            </div>

        </div>

        <!-- COLUNA DIREITA: RESUMO DO PEDIDO -->
        <div class="checkout-sidebar">
            <div class="checkout-card" style="position: sticky; top: 20px;">
                <h3 style="margin-bottom: 20px; font-size: 1.2rem;">Resumo da Compra</h3>
                
                <div style="max-height: 250px; overflow-y: auto; padding-right: 10px; margin-bottom: 20px;">
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <div style="display: flex; gap: 10px; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 15px;">
                            <img src="{{ $details['image'] }}" alt="Produto" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                            <div style="flex: 1;">
                                <div style="font-size: 0.9rem; font-weight: bold; color: #333;">{{ $details['title'] }}</div>
                                <div style="font-size: 0.8rem; color: #666;">Qtd: {{ $details['quantity'] }}</div>
                            </div>
                            <div style="font-size: 0.95rem; font-weight: bold; color: #111;">
                                R$ {{ number_format($details['price'] * $details['quantity'], 2, ',', '.') }}
                            </div>
                        </div>
                    @endforeach
                </div>

                <div style="display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 1rem; color: #555;">
                    <span>Subtotal</span>
                    <span>R$ {{ number_format($total, 2, ',', '.') }}</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 20px; font-size: 1rem; color: #555;">
                    <span>Frete Fixo (SP)</span>
                    <span>R$ 22,50</span>
                </div>

                <div style="display: flex; justify-content: space-between; margin-bottom: 30px; font-size: 1.3rem; font-weight: bold; color: #111; border-top: 2px solid #eee; padding-top: 20px;">
                    <span>Total a Pagar</span>
                    <span>R$ {{ number_format($total + 22.50, 2, ',', '.') }}</span>
                </div>

                <button type="button" onclick="alert('Pedido simulado com sucesso! A seguir configuraríamos a tabela Orders e Order_Items no banco de dados.')" class="btn-checkout" style="width: 100%; background: #166534; color: white; border: none; padding: 18px; border-radius: 8px; font-size: 1.1rem; font-weight: bold; cursor: pointer; transition: 0.3s;">
                    <i class="bi bi-lock-fill"></i> Finalizar Compra
                </button>
            </div>
        </div>

    </form>
</div>

<style>
    .checkout-layout {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
        align-items: start;
    }
    .checkout-card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.03);
        margin-bottom: 20px;
        border: 1px solid #e2e8f0;
    }
    .checkout-card h3 {
        font-size: 1.1rem;
        color: #111;
        margin-bottom: 20px;
        font-weight: bold;
        border-bottom: 2px solid #FFB800;
        display: inline-block;
        padding-bottom: 5px;
    }
    label {
        display: block;
        font-size: 0.85rem;
        font-weight: bold;
        color: #555;
        margin-bottom: 5px;
    }
    .form-input {
        width: 100%;
        padding: 12px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 1rem;
        outline: none;
        transition: 0.3s;
        box-sizing: border-box;
    }
    .form-input:focus {
        border-color: #111;
        box-shadow: 0 0 0 3px rgba(17, 17, 17, 0.1);
    }
    @media (max-width: 768px) {
        .checkout-layout { grid-template-columns: 1fr; }
        .checkout-card { padding: 20px; }
    }
</style>
@endsection