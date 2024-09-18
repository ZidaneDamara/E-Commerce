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
                        <p class="bread"><span><a href="index.html">Home</a></span> / <span>Checkout</span></p>
                    </div>
                </div>
            </div>
        </div>


        <div class="colorlib-product">
            <div class="container">
                <div class="row row-pb-lg">
                    <div class="col-sm-10 offset-md-1">
                        <div class="process-wrap">
                            <div class="process text-center active">
                                <p><span>01</span></p>
                                <h3>Shopping Cart</h3>
                            </div>
                            <div class="process text-center active">
                                <p><span>02</span></p>
                                <h3>Checkout</h3>
                            </div>
                            <div class="process text-center">
                                <p><span>03</span></p>
                                <h3>Order Complete</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{ route('store.checkout') }}" method="POST" class="row"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-8">
                        <div class="colorlib-form">
                            <h2>Billing Details</h2>
                            <div class="row">
                                <input type="hidden" name="customer_id" id="{{ $customer->id }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fname">Customer Name</label>
                                        <input type="text" id="fname" class="form-control"
                                            placeholder="Your name" disabled value="{{ $customer->customer_name }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country">Select Country</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="people" id="people" class="form-control" disabled>
                                                <option value="#">Select country</option>
                                                <option value="#"
                                                    {{ $customer->country == 'Alaska' ? 'selected' : '' }}>Alaska
                                                </option>
                                                <option value="#"
                                                    {{ $customer->country == 'China' ? 'selected' : '' }}>China
                                                </option>
                                                <option value="#"
                                                    {{ $customer->country == 'Japan' ? 'selected' : '' }}>Japan
                                                </option>
                                                <option value="#"
                                                    {{ $customer->country == 'Korea' ? 'selected' : '' }}>Korea
                                                </option>
                                                <option value="#"
                                                    {{ $customer->country == 'Philippines' ? 'selected' : '' }}>
                                                    Philippines</option>
                                                <option value="#"
                                                    {{ $customer->country == 'Indonesia' ? 'selected' : '' }}>Indonesia
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="fname">Address</label>
                                        <input type="text" id="address" class="form-control"
                                            placeholder="Enter Your Address" disabled value="{{ $customer->address }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyname">Town/City</label>
                                        <input type="text" id="towncity" class="form-control"
                                            placeholder="Town or City" disabled value="{{ $customer->city }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stateprovince">State/Province</label>
                                        <input type="text" id="fname" class="form-control"
                                            placeholder="State Province" disabled value="{{ $customer->province }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Zip/Postal Code</label>
                                        <input type="text" id="zippostalcode" class="form-control"
                                            placeholder="Zip / Postal" disabled value="{{ $customer->postal_code }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">E-mail Address</label>
                                        <input type="text" id="email" class="form-control"
                                            placeholder="State Province" disabled value="{{ $customer->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Phone">Phone Number</label>
                                        <input type="text" id="zippostalcode" class="form-control" placeholder=""
                                            disabled value="{{ $customer->phone_number }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="checkbox" id="toggleTextarea"
                                                    name="different_address_status" value="y"> Ship to different
                                                address
                                            </label>
                                        </div>
                                        <div class="textareaContainer" style="display: none;">
                                            <label for="different_address">Different Address</label>
                                            <input type="text" id="different_address" name="different_address"
                                                class="form-control" placeholder="Different Address">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cart-detail">
                                    <h2>Cart Total</h2>
                                    <ul>
                                        <li>
                                            {{-- <span>Subtotal</span> <span>$100.00</span> --}}
                                            <ul>
                                                @php
                                                    $total = 0;
                                                @endphp
                                                @foreach ($carts as $cart)
                                                    <li>
                                                        <input type="hidden" name="carts_id[]"
                                                            value="{{ $cart->id }}">
                                                        <span>
                                                            {{ $cart->quantity }}
                                                            x
                                                            {{ $cart->product->product_name }}
                                                        </span>
                                                        <span>Rp.
                                                            {{ number_format($cart->product->product_price * $cart->quantity, 0, ',', '.') }}</span>
                                                    </li>

                                                    @php
                                                        $total += $cart->product->product_price * $cart->quantity;
                                                    @endphp
                                                @endforeach
                                            </ul>
                                        </li>
                                        {{-- <li><span>Shipping</span> <span>$0.00</span></li> --}}
                                        <li>
                                            <span>Order Total</span>
                                            <span>Rp.
                                                {{ number_format($total, 0, ',', '.') }}
                                            </span>

                                            <input type="hidden" name="total_price" value="{{ $total }}">
                                        </li>
                                        <li>
                                            <ul>
                                                <li>Upload Bukti Pembayaran</li>
                                                <li class="mt-2">
                                                    <input type="file" class="form-control" name="image"
                                                        required>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="w-100"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>
                                    <button type="submit" class="btn btn-primary">Place an order</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
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
