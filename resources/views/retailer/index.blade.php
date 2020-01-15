@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 ">
        <div class="row">
            <div class="col-3 border-right">
                <h2>Sprzedawca</h2>
                <p>{{ $user -> name }} {{ $user -> surname }}</p>
                

            </div>
            <div class="col-9">
                <h2>Zamówienia</h2>
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">Nr</th>
                    <th scope="col" class="text-center" style="width:20%">Imię i nazwisko klienta</th>
                    <th scope="col" class="text-center" style="width:11%;">ID produktu</th>
                    <th scope="col" class="text-center" style="width:15%">Marka</th>
                    <th scope="col" class="text-center" style="width:15%">Model</th>
                    <th scope="col" class="text-center" style="width:12%">Cena</th>
                    <th scope="col" class="text-center" style="width:%">Metoda płatności</th>
                    <th scope="col" class="text-center" style="width:%">Status</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($products as $product)
                    <tr>
                        <th class="text-center" scope="row">{{ $i+1 }}</th>
                        <td class="text-center">{{ $clients[$i] -> name }} {{ $clients[$i] -> surname }}</td>
                        <td class="text-center">{{ $product -> id }}</td>
                        <td class="text-center">{{ $product -> category -> name }}</td>
                        <td class="text-center">{{ $product -> name }}</td>
                        <td class="text-center">{{ $product -> price }} PLN</td>
                        <td class="text-center">{{ $orders[$i] -> payment_method }}</td>
                        <td class="text-center">{{ $orders[$i] -> status }}</td>
                        
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection