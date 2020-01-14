@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 ">
        <div class="row">
            <div class="col-3 border-right">
                <h2>{{ $user->name }} {{ $user->surname }}</h2>
                <p>{{ $user->email }}</p>
                <p>Ulica: {{ $address['street'] }}</p>
                <p>Nr. domu: {{ $address['house_number'] }} / {{ $address['local_number'] }} </p>
                <p>Kod pocztowy: {{ $address['postcode'] }}</p>
                <p>Miasto: {{ $address['city'] }} </p>

            </div>
            <div class="col-9">
                <h2>Twoje zamówienia</h2>
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nr</th>
                    <th scope="col" style="width:14%">Marka</th>
                    <th scope="col" style="width:14%">Model</th>
                    <th scope="col" style="width:12%">Cena</th>
                    <th scope="col" style="width:9%">Rocznik</th>
                    <th scope="col" style="width:9%">Kolor</th>
                    <th scope="col" style="width:9%">Silnik</th>
                    <th scope="col" style="width:9%">Typ</th>
                    <th scope="col" style="width:9%">Skrzynia</th>
                    <th scope="col" style="width:11%">Status</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $i+1 }}</th>
                        <td>{{ $categories[$i]['name'] }}</td>
                        <td>{{ $product['name']}}</td>
                        <td>{{ $product['price']}} PLN</td>
                        <td>{{ $product['year']}}</td>
                        <td>{{ $product['color']}}</td>
                        <td>{{ $product['engine']}}</td>
                        <td>{{ $product['body_type']}}</td>
                        <td>{{ $product['gearbox']}}</td>
                        <td>{{ $orders[$i]->status }}</td>
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