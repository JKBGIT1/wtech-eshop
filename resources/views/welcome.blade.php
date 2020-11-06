@extends('layouts.layout')
{{-- In this sections are links, scripts, meta data and title form head of specific page --}}
@section('head')
    <title>Homepage</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/2343b3bcb7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/welcome.css" />
    <link rel="stylesheet" href="/css/modal.css" />
    <link rel="stylesheet" href="/css/main_container_products.css" />
@endsection

@section('content')
    <section>
        <!-- Image under navbar -->
        <div class="home-image-container"></div>
        <div class="container">
            <!-- New products -->
            <section class="new-products">
                <div class="row">
                    <div class="col-12">
                        <h2>Novinky</h2>
                    </div>
                </div>
                <div class="row">
                    <!-- First new product on page -->
                    <div class="product-container col-12 col-md-6">
                        <a href="../product_detail/product_detail.html">
                            <div class="product-container-row row">
                                <div class="col-12">
                                    <img src="/imgs/new_products/ikea-beds/bed-ikea.webp" alt="Obrazok produktu">
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
                    <!-- Second new product on page -->
                    <div class="product-container col-12 col-md-6">
                        <a href="../product_detail/product_detail.html">
                            <div class="product-container-row row">
                                <div class="col-12">
                                    <img src="/imgs/new_products/ikea-beds/bed-ikea2.webp" alt="Obrazok produktu">
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
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5">
                        <button type="button" class="btn btn-dark btn-lg btn-block">Zobraziť novinky</button>
                    </div>
                </div>
            </section>
            <!-- Products from advertising -->
            <section class="advertising-products">
                <div class="row">
                    <div class="col-12">
                        <h2>Produkty z reklám</h2>
                    </div>
                </div>
                <div class="row">
                    <!-- First product from advertising on page -->
                    <div class="product-container col-12 col-md-6">
                        <a href="../product_detail/product_detail.html">
                            <div class="product-container-row row">
                                <div class="col-12">
                                    <img src="/imgs/new_products/ikea-beds/bed-ikea.webp" alt="Obrazok produktu">
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
                    <!-- Second product from advertising on page -->
                    <div class="product-container col-12 col-md-6">
                        <a href="../product_detail/product_detail.html">
                            <div class="product-container-row row">
                                <div class="col-12">
                                    <img src="/imgs/new_products/ikea-beds/bed-ikea2.webp" alt="Obrazok produktu">
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
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5">
                        <button type="button" class="btn btn-dark btn-lg btn-block">Zobraziť produky z reklamy</button>
                    </div>
                </div>
            </section>
            <!-- Best selling products -->
            <section class="best-selling-products">
                <div class="row">
                    <div class="col-12">
                        <h2>Najpredávanejšie produkty</h2>
                    </div>
                </div>
                <div class="row">
                    <!-- First best selling product on page -->
                    <div class="product-container col-12 col-md-6">
                        <a href="../product_detail/product_detail.html">
                            <div class="product-container-row row">
                                <div class="col-12">
                                    <img src="/imgs/new_products/ikea-beds/bed-ikea.webp" alt="Obrazok produktu">
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
                    <!-- Second best selling product on page -->
                    <div class="product-container col-12 col-md-6">
                        <a href="../product_detail/product_detail.html">
                            <div class="product-container-row row">
                                <div class="col-12">
                                    <img src="/imgs/new_products/ikea-beds/bed-ikea2.webp" alt="Obrazok produktu">
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
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5">
                        <button type="button" class="btn btn-dark btn-lg btn-block">Zobraziť najpredávanejšie produkty</button>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
