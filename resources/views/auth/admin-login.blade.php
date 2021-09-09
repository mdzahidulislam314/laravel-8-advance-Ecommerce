<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>OneUI - Bootstrap 4 Admin Template &amp; UI Framework</title>

    <!-- Open Graph Meta -->
    <meta property="og:title" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="OneUI">
    <meta property="og:description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{asset('admin/assets/css/oneui.min.css')}}">

</head>
<body>

<div id="page-container">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static">
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!-- Sign In Block -->
                        <div class="block block-rounded block-themed mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Sign In</h3>
                                @if (Route::has('password.request'))
                                    <div class="block-options">
                                        <a class="btn-block-option font-size-sm" href="{{ route('password.request') }}">Forgot Password?</a>
                                    </div>
                                @endif
                            </div>
                            <div class="block-content">
                                <x-jet-validation-errors class="mb-4" style="color: red" />
                                <div class="p-sm-3 px-lg-4 py-lg-5">
                                    <h1 class="h2 mb-1">Admin</h1>
                                    <p class="text-muted">
                                        Welcome, please login.
                                    </p>
                                    <form method="POST" action="{{ url('admin/login') }}">
                                        @csrf
                                        <div class="py-3">
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-alt form-control-lg" id="email" name="email" placeholder="Email" required autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-alt form-control-lg" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                                    <label class="custom-control-label font-w400" for="remember">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-xl-5">
                                                <button type="submit" class="btn btn-block btn-alt-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Sign In Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Sign In Block -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<script src="{{asset('admin/assets/js/oneui.core.min.js')}}"></script>
<script src="{{asset('admin/assets/js/oneui.app.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/op_auth_signin.min.js')}}"></script>
</body>
</html>
