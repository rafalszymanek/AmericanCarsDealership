@extends('layouts.app')
@section('content')
    <div class="container-lg">
        <div class="steps row cart-body">
            <h2>Zamówienie złożone</h2>
            <p>Dziekujemy, Panstwa zamowienie zostalo zlozone. Identyfikator zamowienia: <span class="badge badge-default">{{ $order->id }}</span></p>
        </div>
        <div class="row cart-footer">

        </div>
    </div>
@endsection
