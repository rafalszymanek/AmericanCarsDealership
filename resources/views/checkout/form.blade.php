@extends('layouts.app')
@section('content')
    <div class="container-lg">
        <div class="steps row cart-body">
            <form style="width: 100%" method="post" action="{{ route('checkout_send') }}">
                <div class="row">
                    <div class="col-lg-6">
                        @input([
                            'label' => 'Imię',
                            'name' => 'name',
                            'value' => $defaultAddress->name,
                            'errors' => $errors,
                        ])
                        @input([
                            'label' => 'Nazwisko',
                            'name' => 'surname',
                            'value' => $defaultAddress->surname,
                            'errors' => $errors,
                        ])
                        @input([
                            'label' => 'Ulica',
                            'name' => 'street',
                            'value' => $defaultAddress->street,
                            'errors' => $errors,
                        ])
                        @input([
                            'label' => 'Numer domu',
                            'name' => 'house_number',
                            'value' => $defaultAddress->house_number,
                            'errors' => $errors,
                        ])
                        @input([
                            'label' => 'Numer lokalu',
                            'name' => 'local_number',
                            'value' => $defaultAddress->local_number,
                            'errors' => $errors,
                        ])
                        @input([
                            'label' => 'Miasto',
                            'name' => 'city',
                            'value' => $defaultAddress->city,
                            'errors' => $errors,
                        ])
                        @input([
                            'label' => 'Kod pocztowy',
                            'name' => 'postcode',
                            'value' => $defaultAddress->postcode,
                            'errors' => $errors,
                        ])
                        @csrf
                        <div class="row">
                            <div class="col-12"><strong>Metoda płatnosci</strong></div>
                            <div class="col-12">
                                <select name="payment_method" id="paymentMethods">
                                    @foreach (\App\Order::getPaymentMethods() as $key => $method)
                                        <option value="{{ $key }}">{{ $method }}</option>
                                    @endforeach
                                </select>
                                @foreach ($errors->get('payment_method') as $message)
                                    <small style="color: red">{{ $message }}</small>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12"><strong>Miejsce odbioru</strong></div>
                            <div class="col-12">
                                <select name="recollect_place" id="recollectPlace">
                                    @foreach (\App\Order::getRecollectionPlaces() as $key => $place)
                                        <option value="{{ $key }}">{{ $place }}</option>
                                    @endforeach
                                </select>
                                @foreach ($errors->get('recollect_place') as $message)
                                    <small style="color: red">{{ $message }}</small>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                Ilość produktow w koszyku:
                                <span class="badge badge-primary float-right">
                                               {{ $basketSummary['productsQty'] }}
                                           </span>
                            </li>
                            <li class="list-group-item">
                                Wartość koszyka:
                                <span
                                    class="badge badge-secondary float-right">{{ $basketSummary['grandTotal'] }} PLN</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-3">
                    <button class="btn btn-primary" type="submit">Wyślij zamówienie</button>
                </div>
            </form>
        </div>
        <div class="row cart-footer">

        </div>
    </div>
@endsection
