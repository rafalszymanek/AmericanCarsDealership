@extends('layouts.app')

@section('content')

<div class="container mt-4 mb-1">
    <h5> Szczegóły produktu <b>{{ $product->name }}:</b></h5>
    <div class="row justify-content-center mt-2">
        <div class="col-6 col-md-6" >
            <ul class="list-group">
                <li class="list-group-item"><span class="float-right">{{$product->price}} PLN</span></li>
                <li class="list-group-item">Kolor: <span class="float-right">{{$product->color}}</span></li>
                <li class="list-group-item">Rok: <span class="float-right">{{$product->year}}</span></li>
                <li class="list-group-item">Typ Nadwozia:<span class="float-right">{{$product->body_type}}</span></li>
                <li class="list-group-item">Silnik:<span class="float-right">{{$product->engine}}</span></li>
                <li class="list-group-item">Skrzynia biegów:<span class="float-right">{{$product->gearbox}}</span></li>
                <li class="list-group-item">Opis: <br>{{$product->description}}</li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-12 justify-content-center mt-2">
            @if (!empty($product->image_src))
                <img src="{{ $product->image_src }}" class="rounded" alt="{{ $product->name }}">
            @endif
        </div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col">
            @if ($product->is_available)
                <a class="btn btn-outline-success float-right m-1" href="{{ route('basket_add', ['productId' => $product->id]) }}" role="button">Dodaj do koszyka</a>
            @else
                <span>produkt niedostępny</span>
            @endif
            <a class="btn btn-outline-secondary float-right m-1" href="javascript:history.back()" role="button">Powrót</a>
        </div>

    </div>
</div>

@endsection
