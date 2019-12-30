@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="welcome-message">
            <h1>Amerykańska motoryzacja na wyciągnięcie ręki!</h1>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Produkty</div>
                <br><br><br>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nazwa produktu</th>
                            <th scope="col">Cena</th>
                            <th scope="col">Kategoria</th>
                            <th scope="col">Akcje</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    <a href="{{ route('admin_products_update_form', ['id' => $product->id]) }}">Edytuj</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
