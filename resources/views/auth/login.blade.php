@extends('front-end.layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="front-end/assets/css/style.min.css">
@stop
@section('main')
    <main class="main login-page">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <x-jet-validation-errors class="mb-4" style="color: red" />

                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-in" class="nav-link active">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sign-up" class="nav-link">Sign Up</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="sign-in">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>email *</label>
                                        <input type="email" class="form-control" name="email" id="email" required>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Password *</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="form-checkbox d-flex align-items-center justify-content-between">
                                        <input type="checkbox" class="custom-checkbox" id="remember_me" name="remember" >
                                        <label for="remember_me">Remember me</label>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Last your password?</a>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Sign In</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="sign-up">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" class="form-control" name="name" id="name" >
                                    @error('name')
                                        <span class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone *</label>
                                    <input type="text" class="form-control" name="phone" id="phone" >
                                </div>
                                <div class="form-group mb-5">
                                    <label>Password *</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                                <div class="form-group mb-5">
                                    <label>Confirm Password *</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                </div>
                                <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                                    <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                                    <label for="remember" class="font-size-md">I agree to the <a  href="#" class="text-primary font-size-md">privacy policy</a></label>
                                </div>
                                <button type="submit" class="w-100 btn btn-primary">Sign Un</button>
                                </form>
                            </div>
                        </div>
                        <p class="text-center">Sign in with social account</p>
                        <div class="social-icons social-icon-border-color d-flex justify-content-center">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-google fab fa-google"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
