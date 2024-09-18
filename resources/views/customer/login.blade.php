<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customer Login</title>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/typicons.font/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/dashboard/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/dashboard/images/logo.svg') }}" alt="logo">
                            </div>
                            <h4>Hello! Let's get started</h4>
                            <h6 class="font-weight-light">Don't have an account? <a
                                    href="{{ route('customer.register') }}">Register here</a></h6>

                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form class="pt-3" method="POST" action="{{ route('customer.signin') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                                        placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="exampleInputPassword1" placeholder="Password" name="password" required>
                                </div>
                                <div class="mt-3">
                                    <button
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN
                                        IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('assets/dashboard/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('assets/dashboard/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/template.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/settings.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>

</html>
