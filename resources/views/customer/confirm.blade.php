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
                        <p class="bread"><span><a href="index.html">Home</a></span> / <span>Confirm</span></p>
                    </div>
                </div>
            </div>
        </div>



        <div class="colorlib-product">
            <div class="container">

                <h2 style="color: rgb(0, 230, 0);" class="text-center fw-bold">Thank you. Your order has been received.
                </h2>

                <div class="row colorlib-form mt-5" style="border-left: 4px solid rgb(17, 254, 17)">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <h2 class="m-0">Order Info</h2>
                                <hr>
                                <ul>
                                    <li style="text-transform: capitalize">Order Status : {{ $order->status }}
                                    </li>
                                    <li>Order Code : {{ $order->code }}</li>
                                    <li>Date : {{ $order->created_at->format('d M y') }}</li>
                                    <li>Total : Rp. {{ number_format($order->total_price, 0, ',', '.') }}</li>
                                    <li>Payment method {{ 'Proof of Transfer' }}</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h2 class="m-0">Billing Address</h2>
                                <hr>
                                <ul>
                                    <li>Country : {{ $order->customer->country }}</li>
                                    <li>Province : {{ $order->customer->province }}</li>
                                    <li>City : {{ $order->customer->city }}</li>
                                    <li>Address : {{ $order->customer->address }}</li>
                                    <li>Postal Code : {{ $order->customer->postal_code }}</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h2 class="m-0">Shipping Address</h2>
                                <hr>
                                <ul>
                                    @if ($order->different_address_status == false)
                                        <li>Country : {{ $order->customer->country }}</li>
                                        <li>Province : {{ $order->customer->province }}</li>
                                        <li>City : {{ $order->customer->city }}</li>
                                        <li>Address : {{ $order->customer->address }}</li>
                                        <li>Postal Code : {{ $order->customer->postal_code }}</li>
                                    @else
                                        <li>Address : {{ $order->different_address }}</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <h2 class="m-0">Order Details</h2>
                                <hr>
                                <div class="product-name d-flex">
                                    <div class="one-forth text-left px-4">
                                        <span>Product Image</span>
                                    </div>
                                    <div class="one-forth text-left px-4">
                                        <span>Product Details</span>
                                    </div>
                                    <div class="one-eight text-center">
                                        <span>Quantity</span>
                                    </div>
                                    <div class="one-eight text-center">
                                        <span>Price</span>
                                    </div>
                                </div>
                                @php
                                    $subtotal = 0;
                                @endphp
                                @foreach (json_decode($order->carts_id) as $id)
                                    @php
                                        $item = App\Models\Carts::where('id', $id)->first();
                                    @endphp

                                    <div class="product-cart d-flex">
                                        <div class="one-forth">
                                            <div class="product-img"
                                                style="background-image: url({{ asset('img/' . $item->product->cover) }});">
                                            </div>
                                        </div>
                                        <div class="one-forth">
                                            <div class="display-tc">
                                                <h3>{{ $item->product->product_name }}</h3>
                                                <h3>Kategori: {{ $item->product->Category->category_name }}</h3>
                                            </div>
                                        </div>
                                        <div class="one-eight text-center">
                                            <div class="display-tc">
                                                <span class="price">{{ $item->quantity }}</span>
                                            </div>
                                        </div>
                                        <div class="one-eight text-center">
                                            <div class="display-tc">
                                                <span class="price">Rp.
                                                    {{ number_format($item->product->product_price, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $subtotal += $item->quantity * $item->product->product_price;
                                    @endphp
                                @endforeach

                                <div class="product-cart d-flex">
                                    <div class="one-forth">
                                        <div class="display-tc">
                                            <h3>Total</h3>
                                        </div>
                                    </div>
                                    <div class="one-forth">
                                    </div>
                                    <div class="one-eight text-center">
                                    </div>
                                    <div class="one-eight text-center">
                                        <div class="display-tc">
                                            <span class="price">Rp.
                                                {{ number_format($subtotal, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
</body>

</html>
