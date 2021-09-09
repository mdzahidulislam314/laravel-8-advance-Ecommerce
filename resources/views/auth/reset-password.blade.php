@extends('front-end.layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/assets/css/style.min.css')}}">
@stop
@section('main')
    <main class="main login-page">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>Reset Password</li>
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
                            <div class="tab-pane active" id="sign-in">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input class="form-control" id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Password *</label>
                                        <input class="form-control" id="password" type="password" name="password" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password *</label>
                                        <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
