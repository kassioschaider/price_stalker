@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if(Auth::user()->type == 'admin'))
                        <a href="{{ route('list_price') }}" class="btn btn-dark mb-2">Prices</a>
                    @endif

                    <a href="{{ route('list_product') }}" class="btn btn-dark mb-2">Products</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
