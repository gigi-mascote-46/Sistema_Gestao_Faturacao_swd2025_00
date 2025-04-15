@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Política de Privacidade</h2>
                </div>

                <div class="card-body">
                    <h3 class="mb-3">1. Informações Gerais</h3>
                    <p>Esta Política de Privacidade descreve como coletamos, usamos e compartilhamos suas informações pessoais quando você utiliza nosso site.</p>

                    <h3 class="mb-3">2. Dados Coletados</h3>
                    <p>Podemos coletar as seguintes informações:</p>
                    <ul>
                        <li>Nome e informações de contato</li>
                        <li>Dados de uso do site</li>
                        <li>Informações de pagamento (quando aplicável)</li>
                    </ul>

                    <h3 class="mb-3">3. Uso dos Dados</h3>
                    <p>Utilizamos seus dados para:</p>
                    <ul>
                        <li>Fornecer e manter nosso serviço</li>
                        <li>Notificar sobre mudanças</li>
                        <li>Permitir sua participação em recursos interativos</li>
                        <li>Fornecer suporte ao cliente</li>
                    </ul>

                    <h3 class="mb-3">4. Segurança dos Dados</h3>
                    <p>Implementamos medidas de segurança para proteger seus dados pessoais contra acesso não autorizado ou divulgação.</p>

                    <h3 class="mb-3">5. Alterações nesta Política</h3>
                    <p>Podemos atualizar nossa Política de Privacidade periodicamente. Recomendamos que você revise esta página regularmente para quaisquer alterações.</p>

                    <div class="mt-4">
                        <p><strong>Última atualização:</strong> {{ date('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
