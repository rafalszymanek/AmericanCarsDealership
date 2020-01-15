@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5 ">
        <div class="row">
            <div class="col-3 border-right">
                <h2>TEST</h2>
                <p></p>
                

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
                
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection