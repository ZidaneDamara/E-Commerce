<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register Customer</title>
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
                            <h4>New here? Let's get started</h4>
                            <h6 class="font-weight-light">Create an account to continue.</h6>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="pt-3" method="POST" action="{{ route('customer.register.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="customer_name"
                                        placeholder="Username" name="customer_name" value="{{ old('customer_name') }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email"
                                        placeholder="Email" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password"
                                        placeholder="Password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg"
                                        id="password_confirmation" placeholder="Confirm Password"
                                        name="password_confirmation" required>
                                </div>
                                <div class="mt-3">
                                    <button
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">REGISTER</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="{{ route('customer.login') }}"
                                        class="text-primary">Login</a>
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
