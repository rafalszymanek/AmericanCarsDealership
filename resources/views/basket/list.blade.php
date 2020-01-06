@extends('layouts.app')

@section('content')

<div class="container mt-4 mb-1">
    <h5>Mój koszyk</h5>
    @if (!empty($basket) && count($basket) > 0)
        @foreach ($basket as $item)
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        @if (!empty($item['product']->image_src))
                            <img src="{{ $item['product']->image_src }}" class="card-img" alt="{{ $item['product']->name }}">
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['product']->name }}</h5>
                            <p class="card-text">{{ $item['product']->description }}</p>
                            <p class="card-text">Cena: {{ $item['product']->price }} PLN</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('basket_remove', ['productId' => $item['product']->id]) }}" class="btn btn-danger">
                            Usuń z koszyka
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    <div class="row">
        <div class="card">
            <h4>Calkowita wartosc koszyka:
                <span class="badge badge-primary">
                    {{ $basketSummary['grandTotal'] }} PLN
                </span>
            </h4>
            <h4>Ilosc produktow w koszyku:
                <span class="badge badge-primary">
                    {{ $basketSummary['productsQty'] }} PLN
                </span>
            </h4>
        </div>
    </div>

            <a href="{{ route('checkout_view') }}" class="btn btn-primary">Zamów</a>
    @else
        <p>Koszyk jest pusty</p>
    @endif

    <a href="{{ route('products') }}" class="btn btn-primary">Kontynuuj zakupy</a>
</div>

@endsection
