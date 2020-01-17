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
                    </table>

                    
                    
                    @php
                        $i = 0;
                    @endphp
                
                    @foreach ($orders as $order)   
                    <form method="POST" action="/retailer/order/{{$order->id}}">
                    @csrf
                    @method('PATCH') 
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th class="text-center" scope="row">{{ $i+1 }}</th>
                                    <td class="text-center">{{ $clients[$i] -> name }} {{ $clients[$i] -> surname }}</td>
                                    <td class="text-center">{{ $products[$i] -> id }}</td>
                                    <td class="text-center">{{ $products[$i] -> category -> name }}</td>
                                    <td class="text-center">{{ $products[$i] -> name }}</td>
                                    <td class="text-center">{{ $products[$i] -> price }} PLN</td>
                                    <td class="text-center">{{ $order -> payment_method }}</td>
                                    
                                    <td class="form-group text-center">
                                        <select id="status_to_ed" name="status"> 
                                                <option value="noChange">{{ $order -> status}}</option>       
                                                <option value="Nowe">Nowe</option>
                                                <option value="Realizacja">Realizacja</option>
                                                <option value="Dostawa">Dostawa</option>
                                                <option value="Zakończone">Zakończone</option>
                                        </select>
                                    </td>       
                                    <td class="form-group text-center">
                                        <button type="submit" class="btn btn-primary">Zapisz</button>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            </tbody>
                        </table>
                    </form>
                    @endforeach
            </div>
        </div>
    </div>
@endsection