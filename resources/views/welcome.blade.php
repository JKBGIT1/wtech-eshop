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
        @if ($message)
            <div class="alert alert-success text-center">{{ $message }}</div>
        @endif
        <div class="home-image-container"></div>
        <div class="container">
            <!-- Kitchen products -->
            <section class="kitchen">
                <div class="row">
                    <div class="col-12">
                        <h2>Kuchyňa</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($all_categories[1] as $product)
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
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5">
                        <a href="/categories/1" type="button" class="btn btn-dark btn-lg btn-block">Zobraziť kategóriu Kuchyňa</a>
                    </div>
                </div>
            </section>
            <!-- Living room products -->
            <section class="living_room">
                <div class="row">
                    <div class="col-12">
                        <h2>Obývačka</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($all_categories[2] as $product)
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
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5">
                        <a href="/categories/2" type="button" class="btn btn-dark btn-lg btn-block">Zobraziť kategóriu Obývačka</a>
                    </div>
                </div>
            </section>
            <!-- Bedroom products -->
            <section class="bedroom">
                <div class="row">
                    <div class="col-12">
                        <h2>Spálňa</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($all_categories[3] as $product)
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
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5">
                        <a href="/categories/3" type="button" class="btn btn-dark btn-lg btn-block">Zobraziť kategóriu Spálňa</a>
                    </div>
                </div>
            </section>
            <!-- Bathroom products -->
            <section class="bathroom">
                <div class="row">
                    <div class="col-12">
                        <h2>Kúpelňa</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($all_categories[4] as $product)
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
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5">
                        <a href="/categories/4" type="button" class="btn btn-dark btn-lg btn-block">Zobraziť kategóriu Kúpelňa</a>
                    </div>
                </div>
            </section>
            <!-- Working room products -->
            <section class="working_room">
                <div class="row">
                    <div class="col-12">
                        <h2>Pracovňa</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($all_categories[5] as $product)
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
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5">
                        <a href="/categories/5" class="btn btn-dark btn-lg btn-block">Zobraziť kategóriu Pracovňa</a>
                    </div>
                </div>
            </section>
            <!-- Garden products -->
            <section class="garden">
                <div class="row">
                    <div class="col-12">
                        <h2>Záhrada</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($all_categories[6] as $product)
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
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-5">
                        <a href="/categories/6" type="button" class="btn btn-dark btn-lg btn-block">Zobraziť kategóriu Záhrada</a>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
