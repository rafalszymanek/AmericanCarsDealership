@extends('layouts.app')
@section('content')
    <div class="container-lg">
        <div class="steps row cart-body">
            <h2>Zamówienie złożone</h2>
            
        </div>
        <div class="row cart-footer">
            <p>Dziekujemy, Panstwa zamowienie zostalo zlozone. Identyfikator zamowienia: <span class="badge badge-default">{{ $order->id }}</span></p>
        </div>
    </div>
@endsection
