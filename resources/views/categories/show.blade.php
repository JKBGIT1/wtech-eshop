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
    <!-- IDS FOR FILTERS FORM WERE APPLIED ONLY ON BIG DEVICES FORMS, BECAUSE SMALL DEVICES CAN SUBMIT IT EVEN, WHEN IT IS HIDDEN -->
    <div class="container">
        <!-- Category name row -->
        <div class="row">
            <div class="col-12">
                <h2>{{ $category_name }}</h2>
            </div>
        </div>
        <!-- All posibilities of filtering -->
        <div class="row small-devices-container">
            <!-- Start of small devices filtering -->
            <div class="small-devices-filter col-12">
                <button class="btn btn-dark btn-block mb-3" type="button" data-toggle="collapse" data-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
                    Zobraziť možnosti filtrovania
                </button>
                <!-- Filtering on small devices -->
                <form id="small-device-form" action="{{ $category_id ? url('categories', [$category_id]) : url('categories') }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                <div class="collapse" id="filter_collapse">
                    <div class="card card-body">
                        <!-- Price filter -->
                        <div class="my-dropdown-container row" data-toggle="collapse" data-target="#price_collapse" aria-expanded="false" aria-controls="price_collapse">
                            <div class="col-10">Cena</div>
                            <div class="col-2"><i class="fas fa-angle-down"></i></div>
                        </div>
                        <!-- Price form -->
                        <div class="collapse" id="price_collapse">
                            <div class="form-row">
                                <!-- Price from -->
                                <div class="form-group col-6">
                                    <label for="price_from">Od:</label>
                                    <input class="small-device-input form-control"
                                           type="number"
                                           name="price_from"
                                           value="{{ $price_from ? $price_from : '' }}"
                                           id="price_from">
                                </div>
                                <!-- Price to -->
                                <div class="form-group col-6">
                                    <label for="price_to">Do:</label>
                                    <input class="small-device-input form-control"
                                           type="number"
                                           name="price_to"
                                           value="{{ $price_to ? $price_to : '' }}"
                                           id="price_to">
                                </div>
                            </div>
                        </div>
                        <!-- Color filter -->
                        <div class="my-dropdown-container row" data-toggle="collapse" data-target="#color_collapse" aria-expanded="false" aria-controls="color_collapse">
                            <div class="col-10">Farba</div>
                            <div class="col-2"><i class="fas fa-angle-down"></i></div>
                        </div>
                        <!-- Color form -->
                        <div class="collapse" id="color_collapse">
                            <!-- Black color radio button -->
                            <div class="form-check">
                                <input class="small-device-input form-check-input"
                                       type="checkbox"
                                       name="colors[]"
                                       id="black_checkbox"
                                       @if (in_array( "čierna", $colors))
                                            checked="true"
                                       @endif
                                       value="čierna">
                                <label class="form-check-label" for="black_checkbox">
                                    Čierna
                                </label>
                            </div>
                            <!-- White color radio button -->
                            <div class="form-check">
                                <input class="small-device-input form-check-input"
                                       type="checkbox"
                                       name="colors[]"
                                       id="white_checkbox"
                                       @if (in_array( "biela", $colors))
                                            checked="true"
                                       @endif
                                       value="biela">
                                <label class="form-check-label" for="white_checkbox">
                                    Biela
                                </label>
                            </div>
                            <!-- Brown color radio button -->
                            <div class="form-check">
                                <input class="small-device-input form-check-input"
                                       type="checkbox"
                                       name="colors[]"
                                       id="brown_checkbox"
                                       @if (in_array( "hnedá", $colors))
                                            checked="true"
                                       @endif
                                       value="hnedá">
                                <label class="form-check-label" for="brown_checkbox">
                                    Hnedá
                                </label>
                            </div>
                            <!-- Show more colors button -->
                            <div class="form-group">
                                <button type="button" class="btn btn-dark btn-block">Zobraziť viac</button>
                            </div>
                        </div>
                        <!-- Advantages filter -->
                        <div class="my-dropdown-container row" data-toggle="collapse" data-target="#advantages_collapse" aria-expanded="false" aria-controls="advantages_collapse">
                            <div class="col-10">Výhody</div>
                            <div class="col-2"><i class="fas fa-angle-down"></i></div>
                        </div>
                        <!-- Advantages form -->
                        <div class="collapse" id="advantages_collapse">
                            <!-- News radio button -->
                            <div class="form-check">
                                <input class="small-device-input form-check-input"
                                       type="checkbox"
                                       name="advantages[]"
                                       id="new_products_checkbox"
                                       @if (in_array( "new", $advantages))
                                            checked="true"
                                       @endif
                                       value="new">
                                <label class="form-check-label" for="new_products_checkbox">
                                    Novinky
                                </label>
                            </div>
                            <!-- Add products radio button -->
                            <div class="form-check">
                                <input class="small-device-input form-check-input"
                                       type="checkbox"
                                       name="advantages[]"
                                       id="add_products_checkbox"
                                       @if (in_array( "add_product", $advantages))
                                            checked="true"
                                       @endif
                                       value="add_product">
                                <label class="form-check-label" for="add_products_checkbox">
                                    Produkty z reklamy
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="small-device-input form-check-input"
                                       type="checkbox"
                                       name="advantages[]"
                                       id="add_products_checkbox"
                                       @if (in_array( "best_selling", $advantages))
                                            checked="true"
                                       @endif
                                       value="best_selling">
                                <label class="form-check-label" for="add_products_checkbox">
                                    Najpredávanejšie produkty
                                </label>
                            </div>
                        </div>
                        <!-- Relevance filter -->
                        <div class="my-dropdown-container row" data-toggle="collapse" data-target="#relevance_collapse" aria-expanded="false" aria-controls="relevance_collapse">
                            <div class="col-10">Zoradiť podľa relevantnosti</div>
                            <div class="col-2"><i class="fas fa-angle-down"></i></div>
                        </div>
                        <!-- Relevance form -->
                        <div class="collapse" id="relevance_collapse">
                            <!-- Ascending by price radio button -->
                            <div class="form-check">
                                <input class="small-device-input radios form-check-input"
                                       type="radio"
                                       name="order"
                                       id="ascending_checkbox"
                                       @if ($order == 1)
                                            checked="true"
                                       @endif
                                       value="1">
                                <label class="form-check-label" for="ascending_radio">
                                    Cena zostupne
                                </label>
                            </div>
                            <!-- Descending by price radio button -->
                            <div class="form-check">
                                <input class="small-device-input radios form-check-input"
                                       type="radio"
                                       name="order"
                                       id="descending_checkbox"
                                       @if ($order == 2)
                                            checked="true"
                                       @endif
                                       value="2">
                                <label class="form-check-label" for="descending_radio">
                                    Cena vzostupne
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-outline-dark btn-block" type="button">Filtrovať</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start of big devices filtering -->
        <form id="big-device-form" action="{{ $category_id ? url('categories', [$category_id]) : url('categories') }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="row">
                <!-- Price filter -->
                <div class="big-device-filtering col-3">
                    <div class="my-dropdown-container row" data-toggle="collapse" data-target="#big_price_collapse" aria-expanded="false" aria-controls="big_price_collapse">
                        <div class="col-10">Cena</div>
                        <div class="col-2"><i class="fas fa-angle-down"></i></div>
                    </div>
                    <!-- Price form -->
                    <div class="collapse" id="big_price_collapse">
                        <div class="my-wrap">
                            <div class="form-row">
                                <!-- Price from -->
                                <div class="form-group col-6">
                                    <label for="big_price_from">Od:</label>
                                    <input class="big-device-input form-control"
                                           type="number"
                                           name="price_from"
                                           value="{{ $price_from ? $price_from : '' }}"
                                           id="big_price_from">
                                </div>
                                <!-- Price to -->
                                <div class="form-group col-6">
                                    <label for="big_price_to">Do:</label>
                                    <input class="big-device-input form-control"
                                           type="number"
                                           name="price_to"
                                           value="{{ $price_to ? $price_to : '' }}"
                                           id="big_price_to">
                                </div>
                            </div>
                        </div>
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
                        <div class="my-wrap">
                            <!-- Black color radio button -->
                            <div class="form-check">
                                <input class="big-device-input form-check-input"
                                       type="checkbox"
                                       name="colors[]"
                                       id="big_black_checkbox"
                                       @if (in_array( "čierna", $colors ))
                                            checked="true"
                                       @endif
                                       value="čierna">
                                <label class="form-check-label" for="big_black_checkbox">
                                    Čierna
                                </label>
                            </div>
                            <!-- White color radio button -->
                            <div class="form-check">
                                <input class="big-device-input form-check-input"
                                       type="checkbox"
                                       name="colors[]"
                                       id="big_white_checkbox"
                                       @if (in_array( "biela", $colors ))
                                            checked="true"
                                       @endif
                                       value="biela">
                                <label class="form-check-label" for="big_white_checkbox">
                                    Biela
                                </label>
                            </div>
                            <!-- Brown color radio button -->
                            <div class="form-check">
                                <input class="big-device-input form-check-input"
                                       type="checkbox"
                                       name="colors[]"
                                       id="big_brown_checkbox"
                                       @if (in_array( "hnedá", $colors ))
                                            checked="true"
                                       @endif
                                       value="hnedá">
                                <label class="form-check-label" for="big_brown_checkbox">
                                    Hnedá
                                </label>
                            </div>
                            <!-- Show more colors button -->
                            <div class="form-group">
                                <button type="button" class="btn btn-dark btn-block">Zobraziť viac</button>
                            </div>
                        </div>
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
                        <div class="my-wrap">
                            <!-- News radio button -->
                            <div class="form-check">
                                <input class="big-device-input form-check-input"
                                       type="checkbox"
                                       name="advantages[]"
                                       id="big_new_products_checkbox"
                                       @if (in_array( "new", $advantages ))
                                            checked="true"
                                       @endif
                                       value="new">
                                <label class="form-check-label" for="big_new_products_checkbox">
                                    Novinky
                                </label>
                            </div>
                            <!-- Add products radio button -->
                            <div class="form-check">
                                <input class="big-device-input form-check-input"
                                       type="checkbox"
                                       name="advantages[]"
                                       id="big_add_products_checkbox"
                                       @if (in_array( "add_product", $advantages ))
                                            checked="true"
                                       @endif
                                       value="add_product">
                                <label class="form-check-label" for="big_add_products_checkbox">
                                    Produkty z reklamy
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="big-device-input form-check-input"
                                       type="checkbox"
                                       name="advantages[]"
                                       id="big_add_products_checkbox"
                                       @if (in_array( "best_selling", $advantages ))
                                           checked="true"
                                       @endif
                                       value="best_selling">
                                <label class="form-check-label" for="big_add_products_checkbox">
                                    Najpredávanejšie produkty
                                </label>
                            </div>
                        </div>
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
                        <!-- Ascending by price radio button -->
                        <div class="my-wrap">
                            <div class="form-check">
                                <input class="big-device-input radios form-check-input"
                                       type="checkbox"
                                       name="order"
                                       id="big_ascending_checkbox"
                                       @if ($order == 1)
                                            checked="true"
                                       @endif
                                       value="1">
                                <label class="form-check-label" for="big_ascending_radio">
                                    Cena zostupne
                                </label>
                            </div>
                            <!-- Descending by price radio button -->
                            <div class="form-check">
                                <input class="big-device-input radios form-check-input"
                                       type="checkbox"
                                       name="order"
                                       id="big_descending_checkbox"
                                       @if ($order == 2)
                                           checked="true"
                                       @endif
                                       value="2">
                                <label class="form-check-label" for="big_descending_radio">
                                    Cena vzostupne
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Products from category -->
        <article>
            <div class="row">
                @foreach($products_list as $product)
                    <div class="product-container col-12 col-md-6">
                        <a href="/products/{{ $product->id }}">
                            <div class="product-container-row row">
                                <div class="image-container col-12">
                                    <img src="{{ $product->images[0] }}" alt="Obrázok postele s názvom {{ $product->name }}">  <!-- ../../imgs/new_products/ikea-beds/bed-ikea.webp -->
                                </div>
                                <div class="col-8">
                                    <p>{{ $product->name }}</p>
                                </div>
                                <div class="product-price col-4">
                                    <p>{{ $product->price }}€</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </article>
        <!-- Pagination -->
        <div class="row">
            <div class="col-12 text-center">
{{--                <nav aria-label="Page navigation example">--}}
{{--                    <ul class="pagination justify-content-center">--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                <span aria-hidden="true">&laquo;</span>--}}
{{--                                <span class="sr-only">Previous</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#" aria-label="Next">--}}
{{--                                <span aria-hidden="true">&raquo;</span>--}}
{{--                                <span class="sr-only">Next</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
                {{ $products_list->links() }}
            </div>
        </div>
    </div>
    <script src="/js/categories.js"></script>
@endsection
