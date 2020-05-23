@extends('layout')

@section('cabecalho')
{{ "Analyse by {$product->name} - {$product->barCode}" }}
@endsection

@section('conteudo')

{{-- @if(!empty($message))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif --}}

<a href="/product/{{ $product->id }}/analyse/add" class="btn btn-dark mb-2">Save Prices</a>

<ul class="list-group">
    @foreach ($prices as $price)
    <li class="list-group-item"><?= $price->textContent; ?></li>
    @endforeach
</ul>

@endsection
