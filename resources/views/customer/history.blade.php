<!DOCTYPE HTML>
<html>

<head>
    <title>Uniqlo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ url('uniqlo/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ url('uniqlo/css/comoon.css') }}">
    <!-- Ion Icon Fonts-->
    <link rel="stylesheet" href="{{ url('uniqlo/css/onicons.min.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ url('uniqlo/css/ootstrap.min.css') }}">

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

    {{-- <div class="colorlib-loader"></div> --}}

    <div id="page">
        @include('customer.partials.navbar')


        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="index.html">Home</a></span> / <span>History</span></p>
                    </div>
                </div>
            </div>
        </div>


        <div class="colorlib-product">
            <div class="container">
                <div class="row row-pb-lg">
                    <div class="col-md-12">
                        <div class="product-name d-flex">
                            <div class="one-forth text-left px-4">
                                <span>Product</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Status</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Total Price</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Detail</span>
                            </div>
                        </div>
                        @foreach ($orders as $order)
                            <div class="product-cart d-flex">
                                <div class="one-forth">
                                    <div class="display-tc">
                                        @foreach (json_decode($order->carts_id) as $id)
                                            @php
                                                $item = App\Models\Carts::where('id', $id)->first();
                                            @endphp
                                            <h3>
                                                {{ $item->product->product_name }}
                                                x
                                                ({{ $item->quantity }})
                                            </h3>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="price" style="text-transform: capitalize">
                                            {{ $order->status }}</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="price">Rp.
                                            {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <a href="{{ route('confirm', $order->code) }}" class="btn btn-warning">See
                                            Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('customer.partials.footer')
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>

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

    <script>
        $(document).ready(function() {
            $('#toggleTextarea').change(function() {
                if ($(this).is(':checked')) {
                    $('.textareaContainer').show();
                } else {
                    $('.textareaContainer').hide();
                }
            });
        });
    </script>
</body>

</html>
