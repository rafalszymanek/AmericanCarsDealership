@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 ">
        <div class="row">
            <div class="col-2 border-right">
                <h2>Sprzedawca</h2>
                <p>{{ $user -> name }} {{ $user -> surname }}</p>
                

            </div>
            <div class="col-10">
                <h2>Zamówienia</h2>

                
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">Nr</th>
                    <th scope="col" class="text-center" style="width:20%">Imię i nazwisko klienta</th>
                    <th scope="col" class="text-center" style="width:10%;">ID produktu</th>
                    <th scope="col" class="text-center" style="width:11%">Marka</th>
                    <th scope="col" class="text-center" style="width:11%">Model</th>
                    <th scope="col" class="text-center" style="width:11%">Cena</th>
                    <th scope="col" class="text-center" style="width:%">Metoda płatności</th>
                    <th scope="col" class="text-center" style="width:%">Status</th>
                    <th scope="col" class="text-center" style="width:10%">Akcja</th>
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
                        <td class="text-center">
                            <select> 
                                    <option value="volvo">{{ $orders[$i] -> status}}</option>       
                                    <option value="volvo">Nowe</option>
                                    <option value="saab">Realizacja</option>
                                    <option value="mercedes">Dostawa</option>
                                    <option value="audi">Zakończone</option>
                            </select>
                        </td>       
                        <div class="form-group">
                        <td class="text-center"><button type="submit">Edytuj</button></td>
                        </div>
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