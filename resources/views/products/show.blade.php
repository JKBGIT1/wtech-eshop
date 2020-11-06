@extends('layouts.layout')

@section('head')
    <title>Detail produktu</title>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/2343b3bcb7.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layout.css" />
    <link rel="stylesheet" href="/css/product_detail.css" />
    <link rel="stylesheet" href="/css/modal.css" />
@endsection

@section('content')
    <div class="container">

        <div class="row">

            <!-- Image part of page -->
            <div class="col-md-6">

                <div class="row col-12 col-sm-12 col-md-12 col-lg-12">
                    <!-- Dorobit srcset -->
                    <img srcset="/imgs/new_products/bed_320w.png 320w,
                                 /imgs/new_products/bed_480w.png 480w,
                                 /imgs/new_products/bed_800w.png 800w"
                         sizes="(max-width: 320px) 280px,
                                (max-width: 480px) 440px,
                                800px"
                         src="/imgs/new_products/bed_800w.png">
                </div>

                <div class="row">
                    <div class="col-4 col-sm-4 col-md-4">
                        <img srcset="/imgs/new_products/bed_320w.png 320w,
                                     /imgs/new_products/bed_480w.png 480w,
                                     /imgs/new_products/bed_800w.png 800w"
                             sizes="(max-width: 320px) 280px,
                                (max-width: 480px) 440px,
                                800px"
                             src="/imgs/new_products/bed_800w.png">
                    </div>

                    <div class="col-4 col-sm-4 col-md-4">
                        <img srcset="/imgs/new_products/bed_320w.png 320w,
                                     /imgs/new_products/bed_480w.png 480w,
                                     /imgs/new_products/bed_800w.png 800w"
                             sizes="(max-width: 320px) 280px,
                                (max-width: 480px) 440px,
                                800px"
                             src="/imgs/new_products/bed_800w.png">
                    </div>

                    <div class="col-4 col-sm-4 col-md-4">
                        <img srcset="/imgs/new_products/bed_320w.png 320w,
                                     /imgs/new_products/bed_480w.png 480w,
                                     /imgs/new_products/bed_800w.png 800w"
                             sizes="(max-width: 320px) 280px,
                                (max-width: 480px) 440px,
                                800px"
                             src="/imgs/new_products/bed_800w.png">
                    </div>
                </div>
            </div>

            <!-- Empty column for space -->
            <div class="col-md-1"></div>

            <!-- Info part of page -->
            <div class="col-md-5">
                <div class="row">
                    <div class="col-12">
                        <h2>Názov výrobku: Veľká posteľ</h2>
                        <h2>Kód výrobku: 012345678910</h2>
                        <p>Dostupný na sklade v predajni
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </p>

                        <p>Dostupný na sklade v eshope
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <button class="btn btn-dark btn-lg" type="submit">Vhodiť do košíka</button>
                </div>

                <!-- Info about the product -->
                <table class="table">
                    <thead>
                    <tr>
                        <h2>Informácie o výrobku</h2>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th scope="row">Materiál</th>
                        <td>Masívne drevo</td>
                    </tr>

                    <tr>
                        <th scope="row">Farba</th>
                        <td>Hnedá, biela</td>
                    </tr>

                    <tr>
                        <th scope="row">Rozmery</th>
                        <td>Šírka: 80cm, Dĺžka: 195cm, Výška: 34cm</td>
                    </tr>

                    <tr>
                        <th scope="row">Info o montáži</th>
                        <td>Nezmontované</td>
                    </tr>

                    <tr>
                        <th scope="row">Počet balení</th>
                        <td>1</td>
                    </tr>


                    </tbody>
                </table>

            </div>

        </div>

    </div>
@endsection
