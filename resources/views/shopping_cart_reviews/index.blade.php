@extends('layouts.layout')

@section('head')
    <title>Prehľad košíka</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/2343b3bcb7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/shopping_cart_review.css" />
    <link rel="stylesheet" href="/css/modal.css" />
    <link rel="stylesheet" href="/css/no_anchor_href_styles.css" />
@endsection

@section('content')
    <!-- There starts container for this page -->
    <section>
        <div class="container shopping-cart-container">
            <div class="column">
                <!-- Ďalej nakupovať anchor tag and Nákupný košík -->
                <div class="row">
                    <div class="col-12">
                        <a class="keep-shopping" href="{{ url()->previous() }}">
                            <i class="fas fa-arrow-left"></i> Ďalej nakupovať
                        </a>
                    </div>
                    <div class="col-12">
                        <p class="shopping-cart-name">Nákupný košík</p>
                    </div>
                </div>
                <!-- Products in shopping cart -->
                <section>
                    @if ($products)
                        @foreach($products as $product)
                            <!-- Product in your shopping cart -->
                                <div class="row">
                                    <div class="product-container col">
                                        <div class="product-container-row row">
                                            <!-- Column of product image in shopping cart -->
                                            <div class="product-name-number-container col-12 col-sm-6 col-lg-3">
                                                <div class="row">
                                                    <div class="col-10 col-lg-12">
                                                        <p class="">{{ $product['product']['name'] }}</p>
                                                        <p>Číslo produktu: {{ $product['product']['id'] }}</p>
                                                    </div>
                                                    <div class="remove-icon col-2 d-lg-none">
                                                        <i class="fas fa-times"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Column of product image -->
                                            <div class="product-image-container text-center col-12 col-sm-6 col-lg-3">
                                                <img srcset="{{ $product['product']['images'][0] }} 420w,
                                                    {{ $product['product']['images'][0] }} 330w,
                                                    {{ $product['product']['images'][0] }} 250w"
                                                     sizes="(max-width: 576px) 250px,
                                                    250px"
                                                     src="{{ $product['product']['images'][0] }}"
                                                     alt="image of product in shopping cart"
                                                >
                                            </div>
                                            <!-- Number of product input -->
                                            <div class="product-input-container col-7 col-sm-6 col-lg-3">
                                                <div class="row">
                                                    <form id="form_{{ $loop->index }}" action="{{url('/shopping_cart_review', $product['product']['id'])}}" method="POST">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        <input type="hidden" name="update" value="true">
                                                        {{ csrf_field() }}
                                                        <div class="row numbers">
                                                            <div class="col-3 text-center minus"><i class="fas fa-minus"></i></div>
                                                            <div class="col-6 text-center">
                                                                <input type="text"
                                                                       data-lpignore="true"
                                                                       name="products_number"
                                                                       value="{{ $product['quantity'] }}"
                                                                       id="products_number_{{ $loop->index }}"
                                                                       class="products_number_inputs form-control mb-1 mr-sm-1 text-center">
                                                            </div>
                                                            <div class="col-3 text-center plus"><i class="fas fa-plus"></i></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Price for product/products -->
                                            <div class="product-price-container col-5 col-sm-6 col-lg-2">
                                                <p>{{ $product['price'] }}€</p>
                                            </div>
                                            <div class="discard-product col-lg-1 d-none d-lg-block">
                                                <i class="fas fa-times"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    @else
                        <div class="row">
                            <div class="col-12 m-4 text-center">
                                <h2>Nákupný košík je prázdny.</h2>
                            </div>
                        </div>
                    @endif
                </section>
                <!-- Súhrn and Prejsť k objednávke button -->
                <section class="summary-section">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-5">
                            <p class="summary-name">Súhrn:</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-9 col-lg-3">
                            <p>Medzi súčet bez DPH:</p>
                        </div>
                        <div class="col-3 col-lg-2 summary-price-container">
                            <p>{{ $total_price ? $total_price * 0.8 : '0' }}€</p>
                        </div>
                    </div>
                    <div class="last-summary-row row justify-content-center">
                        <div class="col-9 col-lg-3">
                            <p>Medzi súčet s DPH:</p>
                        </div>
                        <div class="col-3 col-lg-2 summary-price-container">
                            <p>{{ $total_price ? $total_price : '0' }}€</p>
                        </div>
                    </div>
                    <!-- Prejsť k objednávke row with button -->
                    <div class="button-container row">
                        <div class="col col-md-6 col-lg-5">
                            <a class="no-anchor-href-style" href="/shopping_cart_delivery_details">
                                <button class="btn btn-dark btn-lg btn-block">Prejsť k objednávke</button>
                            </a>
                        </div>
                    </div>
                    <!-- Späť row with button -->
                    <div class="button-container row">
                        <div class="col col-md-6 col-lg-5">
                            <a class="no-anchor-href-style" href="{{ url()->previous() }}">
                                <button type="button" class="btn btn-outline-dark btn-block">Späť</button>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <script src="/js/shopping_cart_review.js"></script>
@endsection
