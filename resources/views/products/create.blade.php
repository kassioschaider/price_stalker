@extends('layout')

@section('cabecalho')
Add Product
@endsection

@section('conteudo')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post">
    @csrf
    <div class="form-group">
        <label for="barCode">Bar Code</label>
        <input type="text" class="form-control" name="barCode" id="barCode">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <button class="btn btn-primary">Add</button>
</form>
@endsection
