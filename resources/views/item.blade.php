@extends('layouts.app')
{{--POBRANIE ZMIENNEJ Z BAZY--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="welcome-message">
                <h1>Amerykańska motoryzacja na wyciągnięcie ręki!</h1>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Item name </div>
                    <br><br><br>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
{{--                        <div class="car-img"><img src=$ZMIENNA-Z-BAZY</div>--}}
                        <div> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
