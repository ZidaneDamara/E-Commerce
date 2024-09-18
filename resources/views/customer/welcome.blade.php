<!DOCTYPE HTML>
<html>

<head>
    <title>Uniqlo.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ url('uniqlo/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ url('uniqlo/css/icomoon.css') }}">
    <!-- Ion Icon Fonts-->
    <link rel="stylesheet" href="{{ url('uniqlo/css/ionicons.min.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ url('uniqlo/css/bootstrap.min.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ url('uniqlo/css/magnific-popup.css') }}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ url('uniqlo/css/flexslider.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ url('uniqlo/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('uniqlo/css/owl.theme.default.min.css') }}">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ url('uniqlo/css/bootstrap-datepicker.css') }}">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{ url('uniqlo/fonts/flaticon/font/flaticon.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ url('uniqlo/css/style.css') }}">

</head>

<body>

    @include('customer.partials.navbar')


    <div class="colorlib-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xl-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="side border mb-1">
                                <h3>Size/Width</h3>
                                <div class="block-26 mb-2">
                                    <h4>Size</h4>
                                    <ul>
                                        <li class=" bg-danger text-white"><a href="#">XS</a></li>
                                        <li class=" bg-danger text-white"><a href="#">X</a></li>
                                        <li class=" bg-danger text-white"><a href="#">M</a></li>
                                        <li class=" bg-danger text-white"><a href="#">L</a></li>
                                        <li class=" bg-danger text-white"><a href="#">XL</a></li>
                                        <li class=" bg-danger text-white"><a href="#">2XL</a></li>
                                        <li class=" bg-danger text-white"><a href="#">3XL</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="side border mb-1">
                                <h3>Style</h3>
                                <ul>
                                    <li>
                                        <a href="{{ url('/') }}">All</a>
                                    </li>
                                    @foreach ($categories as $category)
                                        <li><a
                                                href="{{ url('/?kategori=' . $category->id) }}">{{ $category->category_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="side border mb-1">
                                <h3>Material</h3>
                                <ul>
                                    <li><a href="#">Linen</a></li>
                                    <li><a href="#">Cotton</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-xl-9">
                    <div class="row row-pb-md">

                        @if (count($products) != 0)
                            @foreach ($products as $produk)
                                <div class="col-lg-4 mb-4 text-center">
                                    <div class="product-entry border">
                                        <a href="#" class="prod-img">
                                            <img src="{{ asset('img/' . $produk->cover) }}" class="img-fluid"
                                                alt="Cover">
                                        </a>
                                        <div class="desc">
                                            <h2><a
                                                    href="{{ route('product.show', $produk->id) }}">{{ $produk->product_name }}</a>
                                            </h2>
                                            <span class="price">Rp
                                                {{ number_format($produk->product_price, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-md-12 text-center">
                                <p>Barang tidak tersedia</p>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="block-27">
                                <ul>
                                    <li><a href="#"><i class="ion-ios-arrow-back"></i></a></li>
                                    <li><a href="#" class=" bg-danger text-white">1</a></li>
                                    <li><a href="#" class=" bg-danger text-white">2</a></li>
                                    <li><a href="#" class=" bg-danger text-white">3</a></li>
                                    <li><a href="#" class=" bg-danger text-white">4</a></li>
                                    <li><a href="#" class=" bg-danger text-white">5</a></li>
                                    <li><a href="#"><i class="ion-ios-arrow-forward"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('customer.partials.footer')

    <!-- jQuery -->
    <script src="{{ url('uniqlo/js/jquery.min.js') }}"></script>
    <!-- popper -->
    <script src="{{ url('uniqlo/js/popper.min.js') }}"></script>
    <!-- bootstrap 4.1 -->
    <script src="{{ url('uniqlo/js/bootstrap.min.js') }}"></script>
    <!-- jQuery easing -->
    <script src="{{ url('uniqlo/js/jquery.easing.1.3.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ url('uniqlo/js/jquery.waypoints.min.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ url('uniqlo/js/jquery.flexslider-min.js') }}"></script>
    <!-- Owl carousel -->
    <script src="{{ url('uniqlo/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ url('uniqlo/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('uniqlo/js/magnific-popup-options.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ url('uniqlo/js/bootstrap-datepicker.js') }}"></script>
    <!-- Stellar Parallax -->
    <script src="{{ url('uniqlo/js/jquery.stellar.min.js') }}"></script>
    <!-- Main -->
    <script src="{{ url('uniqlo/js/main.js') }}"></script>

</body>

</html>
