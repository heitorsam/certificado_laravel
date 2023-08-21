<h3>Fornecedor</h3>

{{-- Página Fornecedor --}}

@php
    //Trecho php
    echo 'php puro' . '</br></br>';
@endphp

<?= 'Outro tipo de echo' ?>

{{-- @dd($fornecedores) --}}

@if(count($fornecedores)>0&&count($fornecedores)<10)
    <h3>Existem entre 0 e 10 fornecedores cadastrados</h3>
@elseif(count($fornecedores)>10)
    <h3>Existem mais de 10 fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif

@isset($fornecedores)

    @foreach($fornecedores as $row => $fornecedor)
        Total Iterações: {{ $loop->count }} 
        Iteração Atual: {{ $loop->iteration }}
        Fornecedor: {{$fornecedor['nome']}}
        Status: {{$fornecedor['status']}}
        @unless($fornecedor['status']=='S')
            Forncedor inativo
        @endunless
        CNPJ: {{ $fornecedor['cnpj'] }}
        @empty($fornecedor['cnpj'])
            Vazio
        @endempty
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        @switch($fornecedor['ddd'])
            @case ('11') 
                São Paulo - SP
                @break
            @case ('32') 
                Juiz de Fora - MG 
                @break
            @case ('85') 
                Fortaleza - CE 
                @break 
            @default
                Estado não identificado       
        @endswitch
        @if($loop->first)
            Primeira Iteração
        @endif
        @if($loop->last)
            Úlima Iteração
        @endif
        <hr>
    @endforeach
@endisset