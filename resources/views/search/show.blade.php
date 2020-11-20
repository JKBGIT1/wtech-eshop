@extends('layouts.layout')

@section('head')
    <title>{{__('Vyhľadávanie')}}</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/2343b3bcb7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/products_from_category.css" />
    <link rel="stylesheet" href="/css/main_container_products.css" />
@endsection

@section('content')
    <div class="container">

        <div class="container">
            <!-- Category name row -->
            <div class="row">
                <div class="col-12">
                    <h2>{{ 'Výsledky hľadania'}}</h2>
                </div>
            </div>

            <!-- Products from category -->
            <article>
                <div class="row">
                    @foreach($products as $product)
                        <div class="product-container col-12 col-md-6">
                            <a href="/products/{{ $product->id }}">
                                <div class="product-container-row row">
                                    <div class="image-container col-12">
                                        <img src="{{ $product->images[0] }}" alt="Obrázok s názvom {{ $product->name }}">  <!-- ../../imgs/new_products/ikea-beds/bed-ikea.webp -->
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
                    {{$products->appends(Request::all())->links()}}         <!-- pomoc so strankovanim z: https://stackoverflow.com/questions/50957776/laravel-pagination-is-not-working-after-first-page -->
                </div>
            </div>
        </div>
@endsection
