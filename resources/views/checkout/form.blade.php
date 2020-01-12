@extends('layouts.app')
@section('content')
    <div class="container wrapper">

        <div class="steps row cart-body">
            <form  method="post" action="">

                <div class="">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-body">
                            <div class="row">
                               <div class="col-lg-6">
                                   @input([
                                       'label' => 'Imię',
                                       'name' => 'name',
                                       'value' => $defaultAddress->name,
                                   ])
                                   @input([
                                       'label' => 'Nazwisko',
                                       'name' => 'surname',
                                       'value' => $defaultAddress->surname,
                                   ])
                                   @input([
                                       'label' => 'Ulica',
                                       'name' => 'street',
                                       'value' => $defaultAddress->street,
                                   ])
                                   @input([
                                       'label' => 'Numer domu',
                                       'name' => 'house_number',
                                       'value' => $defaultAddress->house_number,
                                   ])
                                   @input([
                                       'label' => 'Numer lokalu',
                                       'name' => 'local_number',
                                       'value' => $defaultAddress->local_number,
                                   ])
                                   @input([
                                       'label' => 'Miasto',
                                       'name' => 'city',
                                       'value' => $defaultAddress->city,
                                   ])
                                   @input([
                                       'label' => 'Kod pocztowy',
                                       'name' => 'postcode',
                                       'value' => $defaultAddress->postcode,
                                   ])
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
                                           <span class="badge badge-secondary float-right">{{ $basketSummary['grandTotal'] }} PLN</span>
                                       </li>
                                   </ul>
                               </div>
                            </div>
                        </div>
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
