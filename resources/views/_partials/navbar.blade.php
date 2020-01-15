<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('products') }}">{{ __('Wszystkie produkty') }}</a>
    </li>
    <li class="nav-item mt-2">
        <a class="fas fa-shopping-cart" href="{{ route('basket_list') }}">
            {{ __('Koszyk') }}
            <span class="badge badge-primary">{{ $basketProductsQty ?? '0' }}</span>
        </a>
    </li>
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Zarejestruj') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @if (Auth::user()->role == "CLIENT")
                <a class="dropdown-item" href="/profile">
                    Moje zamówienia
                </a>
            @else
                <a class="dropdown-item" href="/retailer">
                    Moje zamówienia
                </a>
            @endif
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>
