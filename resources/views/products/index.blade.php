@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <a href="/productos/{{ $product->id }}" class="card padding">
                        <header>
                            <h2 class="card-title">{{ $product->title }}</h2>
                            <p class="card-subtitle">{{ $product->price }}</p>
                        </header>
                        <p class="card-text">{{ $product->description }}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="actions text-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
