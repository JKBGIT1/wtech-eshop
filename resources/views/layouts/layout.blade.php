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
                <form id="form-inside-navbar" class="form-inline" action="" method="get">
                    <input class="form-control" type="text" placeholder="Zadajte hľadaný výraz" aria-label="Search">
                    <button class="btn btn-light"><i class="fas fa-search"></i></button>
                </form>
                <!-- User icon --> <!-- Pridanie spustenia modalu na prihlasenie pouzivatela -->
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#loginModal">
                    <i class="fas fa-user-circle"></i>
                </button>

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
                <!-- Dropdown link for Všetky kategórie -->
                <li class="nav-item">
                    <div class="dropdown show">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Všetky kategórie
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/categories/kitchen">Kuchyňa</a>
                            <a class="dropdown-item" href="/categories/living_room">Obývačka</a>
                            <a class="dropdown-item" href="/categories/bedroom">Spálňa</a>
                            <a class="dropdown-item" href="/categories/bathroom">Kúpelňa</a>
                            <a class="dropdown-item" href="/categories/working_room">Pracovňa</a>
                            <a class="dropdown-item" href="/categories/garden">Záhrada</a>
                        </div>
                    </div>
                </li>
                <!-- Dropdown link for Produkty -->
                <li class="nav-item">
                    <div class="dropdown show">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Produkty
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Novinky</a>
                            <a class="dropdown-item" href="#">Produkty z reklám</a>
                            <a class="dropdown-item" href="#">Najpredávanejšie produkty</a>
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
