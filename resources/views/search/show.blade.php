@extends('layouts.layout')

@section('head')
    <title>{{__('Search')}}</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/2343b3bcb7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/custom_search.css" />
@endsection

@section('content')
    <div class="container">

        <div class="search-heading">
            <h2>Najdenych vysledkov ({{ request()->input('searchText') }}): {{$products->count()}}</h2>
        </div>

        <div class="search-container">
            @foreach($products as $product)
                <div class="product-container col-12">
                    <a href="/products/{{ $product->id }}">
                        <div class="product-container-row row">

                            <div class="image-container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <img src="{{ $product->images[0] }}" alt="Obrázok produktu {{ $product->name }}">  <!-- ../../imgs/new_products/ikea-beds/bed-ikea.webp -->
                            </div>

                        </div>


                        <div class="product-container-row row row-name-price">
                            <div class="col col-sm col-md col-lg col-xl">
                                Produkt: {{ $product->name }}
                            </div>

                            <!--Empty space for formating-->
                            <div class="col col-sm col-md col-lg col-xl">
                            </div>

                            <!--Price tag to know to align to the end-->
                            <div class="col col-sm col-md col-lg col-xl price-part">
                                Cena: {{ $product->price }}€
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
