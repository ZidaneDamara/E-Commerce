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
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ url('uniqlo/css/style.css') }}">

</head>

<body>

    <div class="colorlib-loader"></div>

    <div id="page">
        @include('customer.partials.navbar')
        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="bread"><span><a href="{{ url('/') }}">Home</a></span> / <span>Shopping
                                Cart</span></p>
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
                                <span>Product Image</span>
                            </div>
                            <div class="one-forth text-left px-4">
                                <span>Product Details</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Price</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Quantity</span>
                            </div>
                            <div class="one-eight text-center">
                                <span>Total</span>
                            </div>
                            <div class="one-eight text-center px-4">
                                <span>Remove</span>
                            </div>
                        </div>
                        @php
                            $subtotal = 0;
                        @endphp
                        @foreach ($carts as $item)
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
                                        <span class="price">Rp.
                                            {{ number_format($item->product->product_price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <input type="number" id="quantity_{{ $item->id }}" name="quantity"
                                            class="form-control input-number text-center" value="{{ $item->quantity }}"
                                            min="1" max="100"
                                            onchange="updateQuantity({{ $item->id }})">
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <span class="price">Rp.
                                            {{ number_format($item->quantity * $item->product->product_price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                <div class="one-eight text-center">
                                    <div class="display-tc">
                                        <a href="{{ route('cart.remove', $item->id) }}" class="closed"></a>
                                    </div>
                                </div>
                            </div>

                            @php
                                $subtotal += $item->quantity * $item->product->product_price;
                            @endphp
                        @endforeach
                    </div>
                </div>
                <div class="row row-pb-lg">
                    <div class="col-md-12">
                        <div class="total-wrap">
                            <div class="row">
                                <div class="col-sm-8">
                                </div>
                                <div class="col-sm-4 text-center">
                                    <div class="total">
                                        <div class="sub">
                                            <p><span>Subtotal:</span>
                                                <span>Rp. {{ number_format($subtotal, 0, ',', '.') }}</span>
                                            </p>
                                        </div>
                                        <div class="grand-total">
                                            <p><span><strong>Total:</strong></span> <span>Rp.
                                                    {{ number_format($subtotal, 0, ',', '.') }}</span>
                                            </p>
                                        </div>
                                        <div class="grand-total">
                                            <div class="col">
                                                <a href="{{ route('index.checkout') }}"
                                                    class="btn btn-primary">Checkout</a>
                                            </div>
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

    <script>
        function updateQuantity(itemId) {
            var quantity = document.getElementById('quantity_' + itemId).value;
            window.location.href = '/cart/update/' + itemId + '/' + quantity;
        }
    </script>

</body>

</html>
