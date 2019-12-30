@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="welcome-message">
            <h1>Amerykańska motoryzacja na wyciągnięcie ręki!</h1>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <br><br><br>
                <div class="card-body">
                    @if (!empty($alert))
                        <div class="alert alert-{{ $alert['type'] }}" role="alert">
                            {{ $alert['message'] }}
                        </div>
                    @endif
                    <form action="{{ route('admin_products_add_action') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nazwa produktu <em>*</em></label>
                            <input type="text" name="name" required class="form-control" id="name" placeholder="Wprowadz nazwe produktu">
                        </div>
                        <div class="form-group">
                            <label for="description">Opis</label>
                            <textarea name="description" class="form-control" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="imageSrc">URL do obrazka</label>
                            <input name="image_src" type="text" class="form-control" id="imageSrc">
                        </div>
                        <div class="form-group">
                            <label for="price">Cena <em>*</em></label>
                            <input name="price" required type="text" class="form-control" id="price">
                        </div>
                        <div class="form-group">
                            <label for="categoryId">Kategoria <em>*</em></label>
                            <select required name="category_id" id="categoryId">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="year">Rok produkcji <em>*</em></label>
                            <input required name="year" type="text" class="form-control" id="year">
                        </div>
                        <div class="form-group">
                            <label for="retailerId">Id sprzedawcy <em>*</em></label>
                            <input required name="retailer_id" type="text" class="form-control" id="retailerId">
                        </div>

                        <div class="form-group">
                            <label for="color">Kolor <em>*</em></label>
                            <input required name="color" type="text" class="form-control" id="color">
                        </div>

                        <div class="form-group">
                            <label for="bodyType">Typ nadwozia <em>*</em></label>
                            <input required name="body_type" type="text" class="form-control" id="bodyType">
                        </div>

                        <div class="form-group">
                            <label for="engine">Silnik <em>*</em></label>
                            <input required name="engine" type="text" class="form-control" id="engine">
                        </div>

                        <div class="form-group">
                            <label for="gearbox">Skrzynia biegów <em>*</em></label>
                            <input required name="gearbox" type="text" class="form-control" id="gearbox">
                        </div>

                        <button type="submit">Dodaj pojazd</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
