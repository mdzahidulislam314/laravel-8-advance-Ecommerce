@php
    $prefix = Request::getRequestUri();
    $route = Route::current()->getName();
@endphp

<nav id="sidebar" aria-label="Main Navigation">
    <div class="content-header bg-white-5">
        <a class="font-w600 text-dual" href="index.html">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide font-size-h5 tracking-wider">
                One<span class="font-w400">UI</span>
            </span>
        </a>
        <div>
            <!-- Options -->
            <div class="dropdown d-inline-block ml-2">
                <a class="btn btn-sm btn-dual" id="sidebar-themes-dropdown" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" href="#">
                    <i class="si si-drop"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right font-size-sm smini-hide border-0"
                    aria-labelledby="sidebar-themes-dropdown">
                    <!-- Color Themes -->
                    <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                    <a class="dropdown-item d-flex align-items-center justify-content-between font-w500"
                        data-toggle="theme" data-theme="default" href="#">
                        <span>Default</span>
                        <i class="fa fa-circle text-default"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between font-w500"
                        data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" href="#">
                        <span>Amethyst</span>
                        <i class="fa fa-circle text-amethyst"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between font-w500"
                        data-toggle="theme" data-theme="assets/css/themes/city.min.css" href="#">
                        <span>City</span>
                        <i class="fa fa-circle text-city"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between font-w500"
                        data-toggle="theme" data-theme="assets/css/themes/flat.min.css" href="#">
                        <span>Flat</span>
                        <i class="fa fa-circle text-flat"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between font-w500"
                        data-toggle="theme" data-theme="assets/css/themes/modern.min.css" href="#">
                        <span>Modern</span>
                        <i class="fa fa-circle text-modern"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between font-w500"
                        data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" href="#">
                        <span>Smooth</span>
                        <i class="fa fa-circle text-smooth"></i>
                    </a>
                    <!-- END Color Themes -->

                    <div class="dropdown-divider"></div>

                    <!-- Sidebar Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item font-w500" data-toggle="layout" data-action="sidebar_style_light" href="#">
                        <span>Sidebar Light</span>
                    </a>
                    <a class="dropdown-item font-w500" data-toggle="layout" data-action="sidebar_style_dark" href="#">
                        <span>Sidebar Dark</span>
                    </a>
                    <!-- Sidebar Styles -->

                    <div class="dropdown-divider"></div>

                    <!-- Header Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item font-w500" data-toggle="layout" data-action="header_style_light" href="#">
                        <span>Header Light</span>
                    </a>
                    <a class="dropdown-item font-w500" data-toggle="layout" data-action="header_style_dark" href="#">
                        <span>Header Dark</span>
                    </a>
                    <!-- Header Styles -->
                </div>
            </div>
            <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{$prefix == '/admin/dashboard' ? 'active' : ''}}" href="{{url('/admin/dashboard')}}">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-heading">Pages</li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-layers"></i>
                        <span class="nav-main-link-name">Products</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{$route == 'brands.index' ? 'active' : ''}}" href="{{ route('brands.index') }}">
                                <span class="nav-main-link-name">Brands</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{$route == 'products.create' ? 'active' : ''}}" href="{{ route('products.create') }}">
                                <span class="nav-main-link-name">Add Product</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{$route == 'products.index' ? 'active' : ''}}" href="{{ route('products.index') }}">
                                <span class="nav-main-link-name">All Products</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                       aria-expanded="false" href="#">
                        <i class="nav-main-link-icon si si-layers"></i>
                        <span class="nav-main-link-name">Categories</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{$route == 'categories.index' ? 'active' : ''}}" href="{{ route('categories.index') }}">
                                <span class="nav-main-link-name">Categories</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{$route == 'subcategories.index' ? 'active' : ''}}" href="{{ route('subcategories.index') }}">
                                <span class="nav-main-link-name">Sub Categories</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{$route == 'innercategories.index' ? 'active' : ''}}" href="{{ route('innercategories.index') }}">
                                <span class="nav-main-link-name">Inner Categories</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
<!-- END Sidebar -->
