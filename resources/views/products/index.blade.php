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

@can('create', $products[0])
    <a href="{{ route('form_add_product') }}" class="btn btn-dark mb-2">Add Product</a>
@endcan

<ul class="list-group">
    @foreach ($products as $product)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ "{$product->barCode} - {$product->name}" }}
            <span class="d-flex">
                @can('edit', $product)
                    <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $product->id }})">
                        <i class="fas fa-edit"></i>
                    </button>
                @endcan

                @can('analyse', $product)
                    <a href="/product/{{ $product->id }}/analyse" class="btn btn-info btn-sm mr-1">
                        <i class="fas fa-chart-line"></i></i>
                    </a>
                @endcan

                @can('destroy', $product)
                    <form method="post" action="/product/{{ $product->id }}"
                        onsubmit="return confirm('Are you sure you want to remove {{ addslashes($product->name) }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                    </form>
                @endcan

            </span>
        </li>
    @endforeach
</ul>

@endsection
