@extends('front-end.layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="front-end/assets/css/style.min.css">
@stop
@section('main')
    <main class="main my-account">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb my-10">
                    <li><a href="demo1.html">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content pt-2">
            <div class="container">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissable" role="alert">
                        <p class="mb-0">{{ session('message') }}<a class="alert-link" href="javascript:void(0)"></a></p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="form-group">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissable" role="alert">
                                <p class="mb-0">{{ $error }} <a class="alert-link" href="javascript:void(0)"></a>!
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="tab tab-vertical row gutter-lg">
                    <ul class="nav nav-tabs mb-6" role="tablist">
                        <li class="nav-item">
                            <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-orders" class="nav-link">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-addresses" class="nav-link">Addresses</a>
                        </li>
                        <li class="nav-item">
                            <a href="#account-details" class="nav-link">Account details</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();this.closest('form').submit();"
                                    class="nav-link">Logout</a>
                            </form>
                        </li>
                    </ul>

                    <div class="tab-content mb-6">

                        <div class="tab-pane active in" id="account-dashboard">
                            <p class="greeting">
                                Hello
                                <span class="text-dark font-weight-bold">{{ $users->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                (<a href="javascript:void(0)"
                                    onclick="event.preventDefault();this.closest('form').submit();" class="text-primary">Log
                                    out</a>)
                            </form>

                            </p>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-orders" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-orders">
                                                <i class="w-icon-orders"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Orders</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-addresses" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-address">
                                                <i class="w-icon-map-marker"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Addresses</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="#account-details" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-account">
                                                <i class="w-icon-user"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Account Details</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                    <a href="wishlist.html" class="link-to-tab">
                                        <div class="icon-box text-center">
                                            <span class="icon-box-icon icon-wishlist">
                                                <i class="w-icon-heart"></i>
                                            </span>
                                            <div class="icon-box-content">
                                                <p class="text-uppercase mb-0">Wishlist</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane mb-4" id="account-orders">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span class="icon-box-icon icon-orders">
                                    <i class="w-icon-orders"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                                </div>
                            </div>

                            <table class="shop-table account-orders-table mb-6">
                                <thead>
                                    <tr>
                                        <th class="order-id">Order</th>
                                        <th class="order-date">Date</th>
                                        <th class="order-status">Status</th>
                                        <th class="order-total">Total</th>
                                        <th class="order-actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="order-id">#2321</td>
                                        <td class="order-date">August 20, 2021</td>
                                        <td class="order-status">Processing</td>
                                        <td class="order-total">
                                            <span class="order-price">$121.00</span> for
                                            <span class="order-quantity"> 1</span> item
                                        </td>
                                        <td class="order-action">
                                            <a href="#"
                                                class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="order-id">#2321</td>
                                        <td class="order-date">August 20, 2021</td>
                                        <td class="order-status">Processing</td>
                                        <td class="order-total">
                                            <span class="order-price">$150.00</span> for
                                            <span class="order-quantity"> 1</span> item
                                        </td>
                                        <td class="order-action">
                                            <a href="#"
                                                class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="order-id">#2319</td>
                                        <td class="order-date">August 20, 2021</td>
                                        <td class="order-status">Processing</td>
                                        <td class="order-total">
                                            <span class="order-price">$201.00</span> for
                                            <span class="order-quantity"> 1</span> item
                                        </td>
                                        <td class="order-action">
                                            <a href="#"
                                                class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="order-id">#2318</td>
                                        <td class="order-date">August 20, 2021</td>
                                        <td class="order-status">Processing</td>
                                        <td class="order-total">
                                            <span class="order-price">$321.00</span> for
                                            <span class="order-quantity"> 1</span> item
                                        </td>
                                        <td class="order-action">
                                            <a href="#"
                                                class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                                Shop<i class="w-icon-long-arrow-right"></i></a>
                        </div>

                        <div class="tab-pane" id="account-addresses">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span class="icon-box-icon icon-map-marker">
                                    <i class="w-icon-map-marker"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                                </div>
                            </div>
                            <p>The following addresses will be used on the checkout page
                                by default.</p>
                            <div class="row">
                                <div class="col-sm-6 mb-6">
                                    <div class="ecommerce-address billing-address pr-lg-8">
                                        <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                        <address class="mb-4">
                                            <table class="address-table">
                                                <tbody>
                                                    <tr>
                                                        <th>Name:</th>
                                                        <td>John Doe</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Company:</th>
                                                        <td>Conia</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address:</th>
                                                        <td>Wall Street</td>
                                                    </tr>
                                                    <tr>
                                                        <th>City:</th>
                                                        <td>California</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country:</th>
                                                        <td>United States (US)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Postcode:</th>
                                                        <td>92020</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Phone:</th>
                                                        <td>1112223334</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </address>
                                        <a href="#" class="btn btn-link btn-underline btn-icon-right text-primary">Edit
                                            your billing address<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-6">
                                    <div class="ecommerce-address shipping-address pr-lg-8">
                                        <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                        <address class="mb-4">
                                            <table class="address-table">
                                                <tbody>
                                                    <tr>
                                                        <th>Name:</th>
                                                        <td>John Doe</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Company:</th>
                                                        <td>Conia</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address:</th>
                                                        <td>Wall Street</td>
                                                    </tr>
                                                    <tr>
                                                        <th>City:</th>
                                                        <td>California</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country:</th>
                                                        <td>United States (US)</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Postcode:</th>
                                                        <td>92020</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </address>
                                        <a href="#" class="btn btn-link btn-underline btn-icon-right text-primary">Edit your
                                            shipping address<i class="w-icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="account-details">
                            <div class="icon-box icon-box-side icon-box-light">
                                <span class="icon-box-icon icon-account mr-2">
                                    <i class="w-icon-user"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                                </div>
                            </div>
                            <form class="form account-details-form" action="{{ route('udpate.profile', $users->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name">Display name *</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-md mb-0"
                                        value="{{ $users->name }}">
                                </div>

                                <div class="form-group mb-6">
                                    <label for="email">Email address *</label>
                                    <input type="email" id="email" name="email" class="form-control form-control-md"
                                        value="{{ $users->email }}">
                                </div>

                                <div class="form-group mb-6">
                                    <label for="phone">Phone number *</label>
                                    <input type="text" id="phone" name="phone" value="{{ $users->phone }}"
                                        class="form-control form-control-md">
                                </div>
                                <div class="form-group">
                                    <label>Your Avatar</label>
                                    <div class="push">
                                        <img id="showImg" class="img-avatar"
                                            src="{{ !empty($users->profile_photo_path) ? url('uploads/site/' . $users->profile_photo_path) : url('uploads/no-img.jpg') }}"
                                            alt="img" width="100" height="100">
                                    </div>
                                </div>
                                <div class="form-group mb-6">
                                    <label for="profile_photo_path">Image *</label>
                                    <input type="file" id="profile_photo_path" name="profile_photo_path"
                                        class="form-control form-control-md">
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                            </form>

                            <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                            <form class="form account-details-form" action="{{ route('udpate.password', $users->id) }}"
                                method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="text-dark" for="cur-password">Current Password</label>
                                    <input type="password" class="form-control form-control-md" id="current_password"
                                        name="oldpassword">
                                </div>
                                <div class="form-group">
                                    <label class="text-dark" for="new-password">New Password</label>
                                    <input type="password" class="form-control form-control-md" id="new-password"
                                        name="password">
                                </div>
                                <div class="form-group mb-10">
                                    <label class="text-dark" for="conf-password">Confirm Password</label>
                                    <input type="password" class="form-control form-control-md" id="conf-password"
                                        name="password_confirmation">
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#profile_photo_path').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImg').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })

        });
    </script>
@stop
