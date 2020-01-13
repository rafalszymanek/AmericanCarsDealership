@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 ">
        <div class="row">
            <div class="col-3 border-right">
                <h2>{{ $user->name }} {{ $user->surname }}</h2>
                <p>{{ $user->email }}</p>
                <p>Ulica:</p>
                <p>Nr. domu: </p>
                <p>Kod pocztowy: </p>
                <p>Miasto: </p>

            </div>
            <div class="col-9">
                <h2>Twoje zamówienia</h2>
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nr</th>
                    <th scope="col" style="width:15%">Marka</th>
                    <th scope="col" style="width:15%">Model</th>
                    <th scope="col">Cena</th>
                    <th scope="col" style="width:9%">Rocznik</th>
                    <th scope="col" style="width:9%">Kolor</th>
                    <th scope="col" style="width:9%">Silnik</th>
                    <th scope="col" style="width:9%">Typ</th>
                    <th scope="col" style="width:9%">Skrzynia</th>
                    <th scope="col" style="width:11%">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Ford</td>
                        <td>Mustang</td>
                        <td>10000$</td>
                        <td>2018</td>
                        <td>Czerwony</td>
                        <td>Benzynowy</td>
                        <td>Coupe</td>
                        <td>Manualna</td>
                        <td>Dostawa</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Ford</td>
                        <td>Mustang</td>
                        <td>10000$</td>
                        <td>2018</td>
                        <td>Czerwony</td>
                        <td>Benzynowy</td>
                        <td>Coupe</td>
                        <td>Manualna</td>
                        <td>Weryfikowanie</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Ford</td>
                        <td>Mustang</td>
                        <td>10000$</td>
                        <td>2018</td>
                        <td>Czerwony</td>
                        <td>Benzynowy</td>
                        <td>Coupe</td>
                        <td>Manualna</td>
                        <td>Oczekuje płatności</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection