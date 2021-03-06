@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (!empty($product->id))
                    <div class="card-header">Edycja produktu</div>
                @else
                    <div class="card-header">Dodawanie produktu</div>
                @endif
                    <br><br><br>
                <div class="card-body">
                    @if (!empty($alert))
                        <div class="alert alert-{{ $alert['type'] }}" role="alert">
                            {{ $alert['message'] }}
                        </div>
                    @endif
                    <form action="{{ $formAction }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nazwa produktu <em>*</em></label>
                            <input
                                value="{{ $product->name }}"
                                type="text" name="name" required class="form-control" id="name" placeholder="Wprowadz nazwe produktu">
                        </div>
                        <div class="form-group">
                            <label for="description">Opis</label>
                            <textarea name="description" class="form-control" id="description">{{ $product->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="imageSrc">URL do obrazka</label>
                            <input value="{{ $product->image_src }}" name="image_src" type="text" class="form-control" id="imageSrc">
                        </div>
                        <div class="form-group">
                            <label for="price">Cena <em>*</em></label>
                            <input value="{{ $product->price }}" name="price" required type="text" class="form-control" id="price">
                        </div>
                        <div class="form-group">
                            <label for="categoryId">Kategoria <em>*</em></label>
                            <select required name="category_id" id="categoryId">
                                @foreach ($categories as $category)
                                    @if ($isSelected = $category->id === $product->category_id) @endif
                                    <option {{ $isSelected ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="year">Rok produkcji <em>*</em></label>
                            <input value="{{ $product->year }}" required name="year" type="text" class="form-control" id="year">
                        </div>
                        <div class="form-group">
                            <label for="retailerId">Sprzedawca <em>*</em></label>
                            <select name="retailer_id" id="retailerId" required>
                                @foreach ($retailers as $retailer)
                                    <option {{ $product && $product->retailer_id === $retailer->id ? 'selected' : ''}} value="{{ $retailer->id }}">
                                        {{ $retailer->name . ' ' . $retailer->surname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="color">Kolor <em>*</em></label>
                            <input value="{{ $product->color }}" required name="color" type="text" class="form-control" id="color">
                        </div>

                        <div class="form-group">
                            <label for="bodyType">Typ nadwozia <em>*</em></label>
                            <input value="{{ $product->body_type }}" required name="body_type" type="text" class="form-control" id="bodyType">
                        </div>

                        <div class="form-group">
                            <label for="engine">Silnik <em>*</em></label>
                            <input value="{{ $product->engine }}" required name="engine" type="text" class="form-control" id="engine">
                        </div>

                        <div class="form-group">
                            <label for="gearbox">Skrzynia biegów <em>*</em></label>
                            <input value="{{ $product->gearbox }}" required name="gearbox" type="text" class="form-control" id="gearbox">
                        </div>

                        <button type="submit">Dodaj pojazd</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
