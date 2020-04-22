@extends('layout')

@section('cabecalho')
Prices of <?= $product ?>
@endsection

@section('conteudo')

<a href="/prices/add" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
    @foreach ($prices as $price)
    <li class="list-group-item"><?= $price->textContent; ?></li>
    @endforeach
</ul>

@endsection
