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
            @if ($orders)
                    <div class="accordion" id="accordionExample">
                        @foreach ($orders as $order)
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#order{{ $order->id }}" aria-expanded="true" aria-controls="collapseOne">
                                            Zamówienie o id: <span class="badge badge-info">{{ $order->id }}</span>
                                            Utworzone <span class="badge badge-success">{{ $order->created_at->diffForHumans() }}</span>
                                            <!-- Utworzone <span class="badge badge-success"></span> -->
                                        </button>
                                    </h2>
                                </div>

                                <div id="order{{ $order->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>Metoda płatnosci: <span class="badge">{{ $order->getFormattedPaymentMethod() }}</span></p>
                                        <p>Miejsce odbioru: <span class="badge">{{ $order->getFormattedRecollectionMethod() }}</span></p>
                                        <p>Status zamówienia: <span class="badge">{{ $order->getFormattedStatus() }}</span></p>
                                        <form method="POST" action="/retailer/order/{{$order->id}}">
                                        @csrf
                                        @method('PATCH') 
                                        <p>Zmiana statusu zamówienia
                                            <select id="status" name="status"> 
                                                    <option value="noChange">{{ $order -> status}}</option>       
                                                    <option value="Nowe">Nowe</option>
                                                    <option value="Realizacja">Realizacja</option>
                                                    <option value="Dostawa">Dostawa</option>
                                                    <option value="Zakończone">Zakończone</option>
                                            </select>
                                            <button type="submit" class="btn btn-primary">Zapisz</button>
                                            </p>
                                        </form>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col" >Nazwa produktu</th>
                                                    <th scope="col" >Kategoria</th>
                                                    <th scope="col">Cena</th>
                                                    <th scope="col">Rocznik</th>
                                                    <th scope="col">Kolor</th>
                                                    <th scope="col">Silnik</th>
                                                    <th scope="col">Typ</th>
                                                    <th scope="col">Skrzynia</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($order->orderProducts as $orderProduct)
                                                <tr>
                                                   <td>{{ $i = $i+1 }}</td>
                                                   <td>{{ $orderProduct->product->name }}</td>
                                                   <td>{{ $orderProduct->product->category->name }}</td>
                                                   <td>{{ $orderProduct->product->price }}</td>
                                                   <td>{{ $orderProduct->product->year }}</td>
                                                   <td>{{ $orderProduct->product->color }}</td>
                                                   <td>{{ $orderProduct->product->engine }}</td>
                                                   <td>{{ $orderProduct->product->body_type }}</td>
                                                   <td>{{ $orderProduct->product->gearbox }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#order_data_{{ $order->id }}" aria-expanded="true" aria-controls="collapseTwo">Szczegóły zamówienia</button>
                                    </div>
                                    <div id="order_data_{{ $order->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#order{{ $order->id }}">
                                        <div class="card-body">
                                            <h3>Dane zamawiającego</h3>
                                            <p>Imię i Nazwisko: <span class="badge">{{ $order->name }} {{ $order->surname }} </span></p>
                                            <p>Numer domu: <span class="badge">{{ $order->house_number }}/{{ $order->local_number }}</span> </p>
                                            <p>Ulica: <span class="badge">{{ $order->street }}</span></p>
                                            <p>Kod pocztowy: <span class="badge">{{ $order->postcode }}</span></p>
                                            <p>Miasto: <span class="badge">{{ $order->city }}</span></p>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>Nie masz adnych zamówień</p>
                @endif


                
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            $('#success-alert').fadeOut('normal');
        }, 3000);
    </script>
@endsection