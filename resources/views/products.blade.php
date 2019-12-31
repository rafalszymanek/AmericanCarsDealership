@extends('layouts.twoColumn')

@section('content')
    <div class="row">
        @foreach ($products as $product)
        <div class="mb-3 col-md-6 col-xl-3 col-lg-4 col-sm-12">
            <div class="card">
                @if (!empty($product->image_src))
                    <img src="{{ $product->image_src }}" class="card-img-top" alt="{{ $product->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="#" class="btn btn-primary">Add to basket</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
@endsection
