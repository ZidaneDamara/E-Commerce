<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- Your existing CSS links here -->
    <!-- Your existing CSS links here -->
    <style>
        .nav-menu {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .nav-menu .cart {
            margin-left: 28rem;
            /* Adjust the value to increase or decrease the space */
        }



        .nav-menu .dropdown .dropdown-menu {
            left: auto;
            right: 0;
        }

        .dropdown-menu .dropdown-item {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="colorlib-loader"></div>

    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7 col-md-9">
                            <div id="colorlib-logo"><a href="{{ url('/') }}"><img
                                        src="{{ asset('img/uniqlo.png') }}" alt=""></a></div>
                        </div>
                        <div class="col-sm-5 col-md-3">
                            <form action="#" class="search-wrap">
                                <div class="form-group">
                                    <input type="search" class="form-control search" placeholder="Search">
                                    <button class="btn btn-primary submit-search text-center bg-danger text-white"
                                        type="submit"><i class="icon-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-left menu-1">
                            <ul class="nav-menu">
                                <li><a href="{{ url('/') }}">Home</a></li>
                                <li><a href="{{ url('men') }}">Men</a></li>
                                <li><a href="{{ url('women') }}">Women</a></li>
                                <li class="cart">
                                    <a href="{{ url('cart') }}" style="text-wrap: nowrap">
                                        <i class="icon-shopping-cart"></i>
                                        Cart
                                        [{{ count($carts) }}]
                                    </a>
                                </li>
                                <li class="history">
                                    <a href="{{ url('history') }}">
                                        <i class="icon-shopping-history"></i>
                                        History
                                    </a>
                                </li>
                                @if (Session::has('customer'))
                                    <div class="has-dropdown">
                                        <button class="btn btn-primary dropdown-toggle icon-user" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Hii,
                                            {{ \App\Models\Customer::find(Session::get('customer'))->customer_name }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <form id="logout-form" action="{{ route('customer.logout') }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item">Logout</button>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="has-dropdown">
                                        <button class="btn btn-primary dropdown-toggle icon-user" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            User
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="{{ route('customer.login') }}">Login</a>
                                            <a class="dropdown-item"
                                                href="{{ route('customer.register') }}">Register</a>
                                        </div>
                                    </div>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sale bg-danger text-white">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2 text-center">
                            <div class="row">
                                <div class="owl-carousel2">
                                    <div class="item">
                                        <div class="col">
                                            <h3><a href="#">25% off (Almost) Everything! Use Code: Summer Sale</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col">
                                            <h3><a href="#">50% off all Overcoat Catalogue</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Your existing JS links here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
