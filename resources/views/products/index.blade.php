@extends('layout')

@section('cabecalho')
Products
@endsection

@section('conteudo')

@if(!empty($message))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

<a href="{{ route('form_add_product') }}" class="btn btn-dark mb-2">Add Product</a>

<ul class="list-group">
    @foreach ($products as $product)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ "{$product->barCode} - {$product->name}" }}
        <form method="post" action="/product/{{ $product->id }}"
            onsubmit="return confirm('Are you sure you want to remove {{ addslashes($product->name) }}?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
        </form>
    </li>
    @endforeach
</ul>

@endsection
