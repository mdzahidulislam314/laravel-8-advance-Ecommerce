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
                    <li>Forget Password</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->
        <div class="page-content">
            <div class="container">
                <div class="login-popup">
                    <x-jet-validation-errors class="mb-4" style="color: red" />

                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <div class="tab-content">
                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            <div class="tab-pane active" id="sign-in">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autofocus>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Email Password Reset Link</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
