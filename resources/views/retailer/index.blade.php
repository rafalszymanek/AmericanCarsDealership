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

                @if(session('success'))
                <div class="alert alert-success" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Zaktualizowano! </strong> Status zamówienia został zmieniony.
                </div>
                @endif
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">Nr</th>
                        <th scope="col" class="text-center" style="width:20%">Imię i nazwisko klienta</th>
                        <th scope="col" class="text-center" style="width:10%;">ID produktu</th>
                        <th scope="col" class="text-center" style="width:11%">Marka</th>
                        <th scope="col" class="text-center" style="width:11%">Model</th>
                        <th scope="col" class="text-center" style="width:11%">Cena</th>
                        <th scope="col" class="text-center" style="width:10%">Metoda płatności</th>
                        <th scope="col" class="text-center" style="width:10%">Status</th>
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
                        <div id="accordionExample">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th class="text-center" scope="row">{{ $i+1 }}</th>
                                    <td class="text-center" style="width:20%">{{ $clients[$i] -> name }} {{ $clients[$i] -> surname }}</td>
                                    <td class="text-center" style="width:10%;">{{ $orderProducts[$i]->product->id }}</td>
                                    <td class="text-center" style="width:11%">{{ $orderProducts[$i]->product->category->name }}</td>
                                    <td class="text-center" style="width:11%">{{ $orderProducts[$i]->product->name }}</td>
                                    <td class="text-center" style="width:11%">{{ $orderProducts[$i]->product->price}} PLN</td>
                                    <td class="text-center" style="width:10%">{{ $order -> payment_method }}</td>
                                    
                                    <td class="form-group text-center" style="width:10%">
                                        <select id="status" name="status"> 
                                                <option value="noChange">{{ $order -> status}}</option>       
                                                <option value="Nowe">Nowe</option>
                                                <option value="Realizacja">Realizacja</option>
                                                <option value="Dostawa">Dostawa</option>
                                                <option value="Zakończone">Zakończone</option>
                                        </select>
                                    </td>       
                                    <td class="form-group text-center" style="width:10%">
                                        <button type="submit" class="btn btn-primary">Zapisz</button>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            </tbody>
                        </table>
                        </div>
                    </form>
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#order{{ $order->id }}" aria-expanded="true" aria-controls="collapseOne">Szczegóły zamówienia</button>
                    <div id="order{{ $order->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <h3>Dane zamawiającego</h3>
                            <p>Imię i Nazwisko: <span class="badge">{{ $order->name }} {{ $order->surname }} </span></p>
                            <p>Numer domu: <span class="badge">{{ $order->house_number }}/{{ $order->local_number }}</span> </p>
                            <p>Ulica: <span class="badge">{{ $order->street }}</span></p>
                            <p>Kod pocztowy: <span class="badge">{{ $order->postcode }}</span></p>
                            <p>Miasto: <span class="badge">{{ $order->city }}</span></p>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            $('#success-alert').fadeOut('normal');
        }, 3000);
    </script>
@endsection