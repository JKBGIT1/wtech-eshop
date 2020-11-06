@extends('layouts.layout')

@section('head')
    <title>Dodacie údaje</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/2343b3bcb7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/shopping_cart_delivery_details.css" />
    <link rel="stylesheet" href="/css/modal.css" />
    <link rel="stylesheet" href="/css/no_anchor_href_styles" />
@endsection

@section('content')
    <article>
        <!-- Form container -->
        <div class="container">
            <!-- Delivery details form -->
            <form action="/shopping_cart_delivery_payment" method="GET">
                <!-- Current step of order and Dodacie údaje paragraph -->
                <div class="row">
                    <div class="shopping-cart-container col-md-10 col-lg-5">
                        <p><span id="shopping_cart_step">1/2</span> Dodacie údaje</p>
                    </div>
                </div>
                <!-- Meno row -->
                <div class="form-row">
                    <div class="form-group col-md-10 col-lg-5">
                        <label for="input_name">Meno:</label>
                        <input type="email" class="form-control" id="input_name">
                    </div>
                </div>
                <!-- Priezvisko row-->
                <div class="form-row">
                    <div class="form-group col-md-10 col-lg-5">
                        <label for="input_priezvisko">Priezvisko:</label>
                        <input type="password" class="form-control" id="input_priezvisko">
                    </div>
                </div>
                <!-- Street row -->
                <div class="form-row">
                    <div class="form-group col-md-10 col-lg-5">
                        <label for="input_street">Ulica:</label>
                        <input type="text" class="form-control" id="input_street">
                    </div>
                </div>
                <!-- City row -->
                <div class="form-row">
                    <div class="form-group col-md-10 col-lg-5">
                        <label for="input_state">Mesto:</label>
                        <input type="text" class="form-control" id="input_state">
                    </div>
                </div>
                <!-- Postal code row -->
                <div class="form-row">
                    <div class="form-group col-md-10 col-lg-5">
                        <label for="input_psc">PSČ</label>
                        <input type="text" class="form-control" id="input_psc">
                    </div>
                </div>
                <!-- Email row -->
                <div class="form-row">
                    <div class="form-group col-md-10 col-lg-5">
                        <label for="input_email">Email:</label>
                        <input type="email" class="form-control" id="input_email">
                    </div>
                </div>
                <!-- Phone number row -->
                <div class="form-row">
                    <div class="form-group col-md-10 col-lg-5">
                        <label for="input_phone">Číslo mobilného telefónu:</label>
                        <input type="text" class="form-control" id="input_phone" placeholder="+421 9xx xxx xxx">
                    </div>
                </div>
                <!-- Checkbox súhlasim s podmienkami predaja a dodávky -->
                <div class="terms-and-conditions form-row">
                    <div class="checkbox-group form-group col-md-10 col-lg-5">
                        <input class="form-check-input" type="checkbox" id="terms_and_conditions_checkbox">
                        <label class="form-check-label" for="terms_and_conditions_checkbox">
                            Súhlasím s <a href="#">podmienkami predaja a dodávky</a>
                        </label>
                    </div>
                </div>
                <!-- Pokračovať v objednávke row with button -->
                <div class="form-row">
                    <div class="form-group col-md-10 col-lg-5">
                        <button type="submit" class="btn btn-dark btn-block">Pokračovať v objednávke</button>
                    </div>
                </div>
                <!-- Späť row with button -->
                <div class="form-row">
                    <div class="form-group col-md-10 col-lg-5">
                        <a class="no-anchor-href-style" href="{{ url()->previous() }}">
                            <button type="button" class="btn btn-outline-dark btn-block">Späť</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </article>
@endsection
