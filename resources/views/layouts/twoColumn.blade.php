<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <style>
        .active a{
            color: #FFFFFF !important;
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
{{--                   {{ config('app.name', 'Laravel') }}--}}
                    <div class="logo-small"><img src="/png/testlogo.png" ></div>
                    AmericanCarsShop
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    @include('_partials.navbar', ['basketProductsQty' => \App\Services\BasketService::getQty()])
                </div>
            </div>
        </nav>

        @if (!empty($alert))
            <div class="row flex-column">
                <div class="full-width alert alert-{{ $alert['type'] }}" role="alert">
                    {{ $alert['message'] }}
                </div>
            </div>
        @endif
        <div class="row justify-content-center pt-2 mb-2">

            <div class="welcome-message">
                <h1>Amerykańska motoryzacja na wyciągnięcie ręki!</h1>
            </div>
        </div>
        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3">
                        @if (!empty($categories))
                        <ul class="list-group">
                            @foreach ($categories as $category)
                                <li class="list-group-item
                                @if (!empty($currentCategoryId) && $currentCategoryId == $category->id)
                                    active
                                @endif
                                "><a href="{{route('products_category', ['id' => $category->id]) }}">{{ $category->name }} <span class="float-right">{{ $category->products->count() }}</span></a></li>

                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <div class="col-9">
                        @yield('content')
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>
</html>
