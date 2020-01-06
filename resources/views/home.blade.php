@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($randomProducts as $product)
        <div class="mb-3 col-md-6 col-xl-3 col-lg-4 col-sm-12">
            <div class="card">
                @if (!empty($product->image_src))
                    <img src="{{ $product->image_src }}" class="card-img-top" alt="{{ $product->name }}">
                @else
                    <img src="https://via.placeholder.com/500" class="card-img-top" alt="{{ $product->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="{{ route('basket_add', ['productId' => $product->id]) }}" class="btn btn-primary">Dodaj do koszyka</a>
                    <a href="{{ route('products_details', ['id' => $product->id]) }}" class="btn btn-primary">Szczegóły</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection
