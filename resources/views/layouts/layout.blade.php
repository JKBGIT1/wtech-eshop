<!DOCTYPE html>
<html lang="en">
<head>
    @yield('head')
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- Menu and logo container -->
        <div class="container-logo-menu">
            <div class="row">
                <button type="button"
                        aria-expanded="false"
                        data-toggle="collapse"
                        aria-label="Toggle navigation"
                        data-target="#navbarTogglerDemo03"
                        aria-controls="navbarTogglerDemo03"
                        class="btn btn-light navbar-toggler"
                >
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/">Logo</a>
            </div>
        </div>

        <!-- Search & icon container -->
        <div class="container-search-user-cart">
            <div class="row">

                <!-- Fulltext search -->
                <form id="form-inside-navbar" class="form-inline" action="{{ route('search') }}" method="GET">   <!--  action dopln a method nechaj get-->

                    <input id="text" name="text" class="form-control" type="text" placeholder="Zadajte hľadaný výraz" aria-label="Search" value="{{ $text ?? '' ? $text ?? '' : '' }}">

                    <button id="button-searching" class="btn btn-light"><i class="fas fa-search"></i></button>
                </form>


                <!-- User icon --> <!-- Pridanie spustenia modalu na prihlasenie pouzivatela -->
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <!--
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#loginModal">
                                <i class="fas fa-user-circle"></i>
                            </button>-->

                            <a class="btn btn-light nav-link" href="{{ route('login') }}" role="button"><i class="fas fa-user-circle"></i></a>

                        <!--<li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>-->
                        @endif
                    @else

                        <div class="dropdown">
                            <!--
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Dropdown button
                            </button>-->

                            <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle" ></i>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item logout-button" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Odhlásiť sa') }}

                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </div>


                    <!--
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                        </form>
                    </div>
                </li>-->
                @endguest

                <!-- Login window -->
                <div class="modal fade bd-example-modal-lg" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="loginModalLabel">Prihlásenie používateľa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="loginInputEmail">Email</label>
                                        <input type="email" class="form-control" id="loginInputEmail" aria-describedby="emailHelp" placeholder="example@mail.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="loginInputPassword">Heslo</label>
                                        <input type="password" class="form-control" id="loginInputPassword" placeholder="Heslo">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Prihlásiť sa</button>
                                    <button type="button" class="btn btn-lg btn-danger" disabled>Odhlásiť</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <p>Nemáte účet?</p>
                                <a class="btn btn-dark" href="../../html/registration/registration.html" target="_self" role="button">Registrovať</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Shopping cart !-->
                <a href="/shopping_cart_review">
                    <button type="button" class="btn btn-light">
                        <i class="fas fa-shopping-cart"></i>
                    </button>
                </a>
            </div>
        </div>

        <!-- Collapse container -->
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Domov</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kontakt">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#informcie">Informácie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cms">Admin</a>
                </li>
                <!-- Dropdown link for Všetky kategórie -->
                <li class="nav-item">
                    <div class="dropdown show">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Všetky kategórie
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/categories/1">Kuchyňa</a>
                            <a class="dropdown-item" href="/categories/2">Obývačka</a>
                            <a class="dropdown-item" href="/categories/3">Spálňa</a>
                            <a class="dropdown-item" href="/categories/4">Kúpelňa</a>
                            <a class="dropdown-item" href="/categories/5">Pracovňa</a>
                            <a class="dropdown-item" href="/categories/6">Záhrada</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <form id="form-under-navbar" action="" method="get">
        <div class="header-search">
            <button class="btn btn-light"><i class="fas fa-search"></i></button>
            <input class="form-control" type="text" placeholder="Sem zadajte hladaný výraz" aria-label="Search">
        </div>
    </form>
</header>
<main>

    @yield('content')

</main>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <p class="footer-header">
                    Všetky kategórie
                </p>
                <ul>
                    <li>
                        <a href="/categories/kitchen">Kuchyňa</a>
                    <li>
                        <a href="/categories/living_room">Obývačka</a>
                    </li>
                    <li>
                        <a href="/categories/bedroom">Spálňa</a>
                    </li>
                    <li>
                        <a href="/categories/bathroom">Kúpelňa</a>
                    </li>
                    <li>
                        <a href="/categories/working_room">Pracovňa</a>
                    </li>
                    <li>
                        <a href="/categories/garden">Záhrada</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-4">
                <p id="informcie" class="footer-header">
                    Informácie
                </p>
                <ul>
                    <li>
                        <a href="#">Spôsob dopravy</a>
                    <li>
                        <a href="#">Spôsob platby</a>
                    </li>
                    <li>
                        <a href="#">Novinky</a>
                    </li>
                    <li>
                        <a href="#">Produkty z reklamy</a>
                    </li>
                    <li>
                        <a href="#">Najpredávanejšie produkty</a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-12 col-md-4">
                <p id="kontakt" class="footer-header">
                    Kontakt
                </p>
                <ul>
                    <li>
                        Email: info@nabytok.sk
                    </li>
                    <li>
                        Tel. číslo: +421 990 123 654
                    </li>
                    <li>
                        <!-- Facebook Icon -->
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <!-- Instagram Icon -->
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <!-- Linkedin Icon -->
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
