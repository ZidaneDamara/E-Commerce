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
    <div class="colorlib-loader"></div>

    @include('customer.partials.navbar')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="index.html">Home</a></span> / <span>Product Details</span></p>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-product">
        <div class="container">
            <div class="row row-pb-lg product-detail-wrap">
                <div class="col-sm-8">
                    <div class="owl-carousel">
                        @foreach (json_decode($product->photo) as $photo)
                            <div class="item">
                                <div class="product-entry border">
                                    <a href="#" class="prod-img">
                                        <img src="{{ asset('img/' . $photo) }}" class="img-fluid"
                                            alt="Free html5 bootstrap 4 template">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-4">
                    <form action="{{ route('cart.add') }}" method="POST" class="product-desc">
                        @csrf
                        <h3>{{ $product->product_name }}</h3>
                        <p class="price">
                            <span>Rp {{ number_format($product->product_price, 0, ',', '.') }}</span>
                            <span class="rate">
                                <i class="icon-star-full"></i>
                                <i class="icon-star-full"></i>
                                <i class="icon-star-full"></i>
                                <i class="icon-star-full"></i>
                                <i class="icon-star-half"></i>
                                (74 Rating)
                            </span>
                        </p>
                        <p>Stok: {{ $product->product_stock }}</p>
                        <p>{{ $product->product_description }}</p>
                        <div class="size-wrap">
                            <div class="block-26 mb-2">
                                <h4>Size</h4>
                                <ul>
                                    <li>
                                        <label class="bg-danger text-white label-size"
                                            style="position: relative; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center">
                                            <input type="radio" class="input-size"
                                                style="display: none;position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                                name="size" value="XS">
                                            XS
                                        </label>
                                    </li>
                                    <li>
                                        <label class="bg-danger text-white label-size"
                                            style="position: relative; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center">
                                            <input type="radio" class="input-size"
                                                style="display: none;position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                                name="size" value="S">
                                            S
                                        </label>
                                    </li>
                                    <li>
                                        <label class="bg-danger text-white label-size"
                                            style="position: relative; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center">
                                            <input type="radio" class="input-size"
                                                style="display: none;position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                                name="size" value="M">
                                            M
                                        </label>
                                    </li>
                                    <li>
                                        <label class="bg-danger text-white label-size"
                                            style="position: relative; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center">
                                            <input type="radio" class="input-size"
                                                style="display: none;position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                                name="size" value="L">
                                            L
                                        </label>
                                    </li>
                                    <li>
                                        <label class="bg-danger text-white label-size"
                                            style="position: relative; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center">
                                            <input type="radio" class="input-size"
                                                style="display: none;position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                                name="size" value="XL">
                                            XL
                                        </label>
                                    </li>
                                    <li>
                                        <label class="bg-danger text-white label-size"
                                            style="position: relative; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center">
                                            <input type="radio" class="input-size"
                                                style="display: none;position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                                name="size" value="2XL">
                                            2XL
                                        </label>
                                    </li>
                                    <li>
                                        <label class="bg-danger text-white label-size"
                                            style="position: relative; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center">
                                            <input type="radio" class="input-size"
                                                style="display: none;position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                                name="size" value="3XL">
                                            3XL
                                        </label>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <div>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                            <input type="hidden" name="product_price" value="{{ $product->product_price }}">
                            <input type="hidden" name="product_photo"
                                value="{{ json_decode($product->photo)[0] }}">
                            <div class="input-group mb-4">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-left-minus btn" data-type="minus"
                                        data-field="">
                                        <i class="icon-minus2"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity"
                                    class="form-control input-number" value="1" min="1" max="100">
                                <span class="input-group-btn ml-1">
                                    <button type="button" class="quantity-right-plus btn" data-type="plus"
                                        data-field="">
                                        <i class="icon-plus2"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-addtocart bg-danger text-white"
                                        style="display: flex; gap: 4;">
                                        <i class="icon-shopping-cart"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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

    <script>
        $(document).ready(function() {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });

        document.querySelectorAll('.input-size').forEach(input => {
            input.addEventListener('change', function() {
                // Reset all labels to bg-danger
                document.querySelectorAll('.label-size').forEach(label => {
                    label.classList.remove('bg-success');
                    label.classList.add('bg-danger');
                });

                // Set the selected label to bg-success
                if (this.checked) {
                    this.parentElement.classList.remove('bg-danger');
                    this.parentElement.classList.add('bg-success');
                }
            });
        });
    </script>


</body>

</html>
