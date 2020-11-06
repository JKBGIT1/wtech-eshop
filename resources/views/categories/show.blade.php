@extends('layouts.layout')

@section('head')
    <title>{{ $category_name }}</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/2343b3bcb7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/products_from_category.css" />
    <link rel="stylesheet" href="/css/main_container_products.css" />
    <link rel="stylesheet" href="/css/modal.css" />
@endsection

@section('content')
    <div class="container">
        <!-- Category name row -->
        <div class="row">
            <div class="col-12">
                <h2>{{ $category_name }}</h2>
            </div>
        </div>
        <!-- All posibilities of filtering -->
        <div class="row">
            <!-- Start of small devices filtering -->
            <div class="small-devices-filter col-12">
                <button class="btn btn-dark btn-block mb-3" type="button" data-toggle="collapse" data-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
                    Zobraziť možnosti filtrovania
                </button>
                <!-- Filtering on small devices -->
                <div class="collapse" id="filter_collapse">
                    <div class="card card-body">
                        <!-- Price filter -->
                        <div class="my-dropdown-container row" data-toggle="collapse" data-target="#price_collapse" aria-expanded="false" aria-controls="price_collapse">
                            <div class="col-10">Cena</div>
                            <div class="col-2"><i class="fas fa-angle-down"></i></div>
                        </div>
                        <!-- Price form -->
                        <div class="collapse" id="price_collapse">
                            <form>
                                <div class="form-row">
                                    <!-- Price from -->
                                    <div class="form-group col-6">
                                        <label for="price_from">Od:</label>
                                        <input type="number" class="form-control" id="price_from" placeholder="">
                                    </div>
                                    <!-- Price to -->
                                    <div class="form-group col-6">
                                        <label for="price_to">Do:</label>
                                        <input type="number" class="form-control" id="price_to" placeholder="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Color filter -->
                        <div class="my-dropdown-container row" data-toggle="collapse" data-target="#color_collapse" aria-expanded="false" aria-controls="color_collapse">
                            <div class="col-10">Farba</div>
                            <div class="col-2"><i class="fas fa-angle-down"></i></div>
                        </div>
                        <!-- Color form -->
                        <div class="collapse" id="color_collapse">
                            <form>
                                <!-- Black color radio button -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="black_radio" id="black_radio" value="option1">
                                    <label class="form-check-label" for="black_radio">
                                        Čierna
                                    </label>
                                </div>
                                <!-- White color radio button -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="white_radio" id="white_radio" value="option1">
                                    <label class="form-check-label" for="white_radio">
                                        Biela
                                    </label>
                                </div>
                                <!-- Brown color radio button -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="brown_radio" id="brown_radio" value="option1">
                                    <label class="form-check-label" for="brown_radio">
                                        Hnedá
                                    </label>
                                </div>
                                <!-- Show more colors button -->
                                <div class="form-group">
                                    <button type="button" class="btn btn-dark btn-block">Zobraziť viac</button>
                                </div>
                            </form>
                        </div>
                        <!-- Advantages filter -->
                        <div class="my-dropdown-container row" data-toggle="collapse" data-target="#advantages_collapse" aria-expanded="false" aria-controls="advantages_collapse">
                            <div class="col-10">Výhody</div>
                            <div class="col-2"><i class="fas fa-angle-down"></i></div>
                        </div>
                        <!-- Advantages form -->
                        <div class="collapse" id="advantages_collapse">
                            <form>
                                <!-- News radio button -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="new_products_radio" id="new_products_radio" value="option1">
                                    <label class="form-check-label" for="new_products_radio">
                                        Novinky
                                    </label>
                                </div>
                                <!-- Add products radio button -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="add_products_radio" id="add_products_radio" value="option1">
                                    <label class="form-check-label" for="add_products_radio">
                                        Produkty z reklamy
                                    </label>
                                </div>
                            </form>
                        </div>
                        <!-- Relevance filter -->
                        <div class="my-dropdown-container row" data-toggle="collapse" data-target="#relevance_collapse" aria-expanded="false" aria-controls="relevance_collapse">
                            <div class="col-10">Zoradiť podľa relevantnosti</div>
                            <div class="col-2"><i class="fas fa-angle-down"></i></div>
                        </div>
                        <!-- Relevance form -->
                        <div class="collapse" id="relevance_collapse">
                            <form>
                                <!-- Ascending by price radio button -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="ascending_radio" id="ascending_radio" value="option1">
                                    <label class="form-check-label" for="ascending_radio">
                                        Cena zostupne
                                    </label>
                                </div>
                                <!-- Descending by price radio button -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="descending_radio" id="descending_radio" value="option1">
                                    <label class="form-check-label" for="descending_radio">
                                        Cena vzostupne
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-outline-dark btn-block" type="button">Filtrovať</button>
                    </div>
                </div>
            </div>
            <!-- Start of big devices filtering -->
            <!-- Price filter -->
            <div class="big-device-filtering col-3">
                <div class="my-dropdown-container row" data-toggle="collapse" data-target="#big_price_collapse" aria-expanded="false" aria-controls="big_price_collapse">
                    <div class="col-10">Cena</div>
                    <div class="col-2"><i class="fas fa-angle-down"></i></div>
                </div>
                <!-- Price form -->
                <div class="collapse" id="big_price_collapse">
                    <form>
                        <div class="form-row">
                            <!-- Price from -->
                            <div class="form-group col-6">
                                <label for="big_price_from">Od:</label>
                                <input type="number" class="form-control" id="big_price_from" placeholder="">
                            </div>
                            <!-- Price to -->
                            <div class="form-group col-6">
                                <label for="big_price_to">Do:</label>
                                <input type="number" class="form-control" id="big_price_to" placeholder="">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Color filter -->
            <div class="big-device-filtering col-3">
                <div class="my-dropdown-container row" data-toggle="collapse" data-target="#big_color_collapse" aria-expanded="false" aria-controls="big_color_collapse">
                    <div class="col-10">Farba</div>
                    <div class="col-2"><i class="fas fa-angle-down"></i></div>
                </div>
                <!-- Color form -->
                <div class="collapse" id="big_color_collapse">
                    <form>
                        <!-- Black color radio button -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="big_black_radio" id="big_black_radio" value="option1">
                            <label class="form-check-label" for="big_black_radio">
                                Čierna
                            </label>
                        </div>
                        <!-- White color radio button -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="big_white_radio" id="big_white_radio" value="option1">
                            <label class="form-check-label" for="big_white_radio">
                                Biela
                            </label>
                        </div>
                        <!-- Brown color radio button -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="big_brown_radio" id="big_brown_radio" value="option1">
                            <label class="form-check-label" for="big_brown_radio">
                                Hnedá
                            </label>
                        </div>
                        <!-- Show more colors button -->
                        <div class="form-group">
                            <button type="button" class="btn btn-dark btn-block">Zobraziť viac</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Advantages filter -->
            <div class="big-device-filtering col-3">
                <div class="my-dropdown-container row" data-toggle="collapse" data-target="#big_advantages_collapse" aria-expanded="false" aria-controls="big_advantages_collapse">
                    <div class="col-10">Výhody</div>
                    <div class="col-2"><i class="fas fa-angle-down"></i></div>
                </div>
                <!-- Advantages form -->
                <div class="collapse" id="big_advantages_collapse">
                    <form>
                        <!-- News radio button -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="big_new_products_radio" id="big_new_products_radio" value="option1">
                            <label class="form-check-label" for="big_new_products_radio">
                                Novinky
                            </label>
                        </div>
                        <!-- Add products radio button -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="big_add_products_radio" id="big_add_products_radio" value="option1">
                            <label class="form-check-label" for="big_add_products_radio">
                                Produkty z reklamy
                            </label>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Relevance filter -->
            <div class="big-device-filtering col-3">
                <div class="my-dropdown-container row" data-toggle="collapse" data-target="#big_relevance_collapse" aria-expanded="false" aria-controls="big_relevance_collapse">
                    <div class="col-10">Zoradiť podľa relevantnosti</div>
                    <div class="col-2"><i class="fas fa-angle-down"></i></div>
                </div>
                <!-- Relevance form -->
                <div class="collapse" id="big_relevance_collapse">
                    <form>
                        <!-- Ascending by price radio button -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="big_ascending_radio" id="big_ascending_radio" value="option1">
                            <label class="form-check-label" for="big_ascending_radio">
                                Cena zostupne
                            </label>
                        </div>
                        <!-- Descending by price radio button -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="big_descending_radio" id="big_descending_radio" value="option1">
                            <label class="form-check-label" for="big_descending_radio">
                                Cena vzostupne
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Products from category -->
        <article>
            <div class="row">
                <!-- First product on page from category -->
                <div class="product-container col-12 col-md-6">
                    <a href="/products/1">
                        <div class="product-container-row row">
                            <div class="image-container col-12">
                                <img src="../../imgs/new_products/ikea-beds/bed-ikea.webp" alt="Obrazok produktu">
                            </div>
                            <div class="col-8">
                                <p>Veľká posteľ</p>
                            </div>
                            <div class="product-price col-4">
                                <p>1000€</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Second product on page from category -->
                <div class="product-container col-12 col-md-6">
                    <a href="/products/2">
                        <div class="product-container-row row">
                            <div class="col-12">
                                <img src="../../imgs/new_products/ikea-beds/bed-ikea2.webp" alt="Obrazok produktu">
                            </div>
                            <div class="col-8">
                                <p>Manželská posteľ</p>
                            </div>
                            <div class="product-price col-4">
                                <p>1000€</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Third product on page from category -->
                <div class="product-container col-12 col-md-6">
                    <a href="/products/3">
                        <div class="product-container-row row">
                            <div class="col-12">
                                <img src="../../imgs/new_products/ikea-beds/bed-ikea.webp" alt="Obrazok produktu">
                            </div>
                            <div class="col-8">
                                <p>Veľká posteľ</p>
                            </div>
                            <div class="product-price col-4">
                                <p>1000€</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Fourth product on page from category -->
                <div class="product-container col-12 col-md-6">
                    <a href="/products/4">
                        <div class="product-container-row row">
                            <div class="col-12">
                                <img src="../../imgs/new_products/ikea-beds/bed-ikea2.webp" alt="Obrazok produktu">
                            </div>
                            <div class="col-8">
                                <p>Manželská posteľ</p>
                            </div>
                            <div class="product-price col-4">
                                <p>1000€</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- End of products from category -->
            </div>
        </article>
        <!-- Pagination -->
        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
