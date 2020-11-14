@extends('layouts.layout')

@section('head')
    <title>Spôsob dopravy a platby</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/2343b3bcb7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/shopping_cart_delivery_details.css" />
    <link rel="stylesheet" href="/css/shopping_cart_delivery_payment.css" />
    <link rel="stylesheet" href="/css/modal.css" />
    <link rel="stylesheet" href="/css/no_anchor_href_styles.css" />
@endsection

@section('content')
    <section>
        <!-- Form container -->
        <div class="container">
            <!-- Delivery and payment type form -->
            <form action="/" method="POST">
                {{ csrf_field() }}
                <!-- Current step of order and Výber dopravy a platby paragraph -->
                <div class="row">
                    <div class="shopping-cart-container col col-md-10 col-lg-5">
                        <p><span id="shopping_cart_step">2/2</span> Výber dopravy a platby</p>
                    </div>
                </div>
                <!-- Choose delivery -->
                <section>
                    <!-- Choose delivery row -->
                    <div class="row">
                        <div class="col col-md-10 col-lg-5">
                            <p class="form-header">Výber dopravy:</p>
                        </div>
                    </div>
                    <!-- Kuriér radio -->
                    <div class="form-row">
                        <div class="form-check col-md-10 col-lg-5">
                            <div class="row">
                                <div class="col-10">
                                    <input class="form-check-input" type="radio" name="delivery" id="radio_kurier" value="1" required>
                                    <label class="form-check-label" for="radio_kurier">
                                        Kuriér
                                    </label>
                                </div>
                                <div class="col-2">
                                    <span>4€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slovenská pošta radio -->
                    <div class="form-row">
                        <div class="form-check col-md-10 col-lg-5">
                            <div class="row">
                                <div class="col-10">
                                    <input class="form-check-input" type="radio" name="delivery" id="radio_slovenska_posta" value="2">
                                    <label class="form-check-label" for="radio_slovenska_posta">
                                        Slovenská pošta
                                    </label>
                                </div>
                                <div class="col-2">
                                    <span>3€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Osobný odber radio -->
                    <div class="form-row">
                        <div class="form-check col-md-10 col-lg-5">
                            <div class="row">
                                <div class="col-10">
                                    <input class="form-check-input" type="radio" name="delivery" id="radio_personal_collect" value="3">
                                    <label class="form-check-label" for="radio_personal_collect">
                                        Osobný odber
                                    </label>
                                </div>
                                <div class="col-2">
                                    <span>0€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Choose payment -->
                <section>
                    <!-- Choose payment row -->
                    <div class="row">
                        <div class="col col-md-10 col-lg-5">
                            <p class="form-header">Výber platby:</p>
                        </div>
                    </div>
                    <!-- Dobierka radio -->
                    <div class="form-row">
                        <div class="form-check col-md-10 col-lg-5">
                            <div class="row">
                                <div class="col-10">
                                    <input class="form-check-input" type="radio" name="payment" id="radio_dobierka" value="1" required>
                                    <label class="form-check-label" for="radio_dobierka">
                                        Dobierka
                                    </label>
                                </div>
                                <div class="col-2">
                                    <span>4€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Paypal radio -->
                    <div class="form-row">
                        <div class="form-check col-md-10 col-lg-5">
                            <div class="row">
                                <div class="col-10">
                                    <input class="form-check-input" type="radio" name="payment" id="radio_paypal" value="2">
                                    <label class="form-check-label" for="radio_paypal">
                                        Paypal
                                    </label>
                                </div>
                                <div class="col-2">
                                    <span>0€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- VISA/MasterCard radio -->
                    <div class="form-row">
                        <div class="form-check col-md-10 col-lg-5">
                            <div class="row">
                                <div class="col-10">
                                    <input class="form-check-input" type="radio" name="payment" id="radio_visa_master_card" value="3">
                                    <label class="form-check-label" for="radio_visa_master_card">
                                        VISA/MasterCard
                                    </label>
                                </div>
                                <div class="col-2">
                                    <span>0€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Summary, Prejsť k objednávke and Späť button -->
                <section>
                    <!-- Summary row -->
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-5">
                            <p class="summary-name">Súhrn:</p>
                        </div>
                    </div>
                    <!-- Merchandise row -->
                    <div class="row">
                        <div class="col col-md-10 col-lg-5">
                            <div class="row">
                                <div class="col-8">
                                    <p>Tovar:</p>
                                </div>
                                <div class="summary-price col-4">
                                    <p><span id="goods">{{ $total_price ? $total_price : '0' }}</span>€</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Payment and delivery type row -->
                    <div class="row">
                        <div class="col col-md-10 col-lg-5">
                            <div class="row">
                                <div class="col-8">
                                    <p>Spôsob platby a doprava:</p>
                                </div>
                                <div class="summary-price col-4">
                                    <p><span id="payment-delivery">0</span>€</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- DPH row -->
                    <div class="row">
                        <div class="col col-md-10 col-lg-5">
                            <div class="row">
                                <div class="col-8">
                                    <p>DPH:</p>
                                </div>
                                <div class="summary-price col-4">
                                    <p><span id="taxes">{{ $total_price ? $total_price * 0.2 : '0' }}</span>€</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Price summary row -->
                    <div class="last-summary-row row">
                        <div class="col col-md-10 col-lg-5">
                            <div class="row">
                                <div class="summary-price-name col-8">
                                    <p>Celková suma:</p>
                                </div>
                                <div class="summary-price col-4">
                                    <p><span id="total_price">{{ $total_price ? $total_price : '0' }}</span>€</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Záväzne objednať and Späť button -->
                    <div class="row">
                        <div class="col col-md-10 col-lg-5">
                            <button type="submit" class="btn btn-dark btn-block">Záväzne objednať</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-10 col-lg-5">
                            <a class="no-anchor-href-style" href="{{ url()->previous() }}">
                                <button type="button" class="btn btn-outline-dark btn-block">Späť</button>
                            </a>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </section>
    <script src="/js/shopping_cart_delivery_payment.js"></script>
@endsection
