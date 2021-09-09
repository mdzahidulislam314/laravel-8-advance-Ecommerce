<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel 8 Admin</title>

    <link rel="shortcut icon" href="{{ asset('admin/assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('admin/assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('admin/assets/media/favicons/apple-touch-icon-180x180.png') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/tagsinput.css')}}"/>

    <link rel="stylesheet" href="{{ asset('admin/assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
    <link rel="stylesheet" id="css-main" href="{{ asset('admin/assets/css/oneui.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('admin/assets/css/custom.css') }}">
    @routes
    @yield('css')
</head>

<body>
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        @include('flash::message')
        @include('admin.layouts.sidebar')

        @include('admin.layouts.header')

        @yield('main')

        @include('admin.layouts.footer')

    </div>

    <script src="{{ asset('admin/assets/js/oneui.core.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/oneui.app.min.js') }}"></script>
    <!-- Page JS Plugins -->
    <script src="{{ asset('admin/assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js"></script>
    <script src="{{asset('admin/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{asset('admin/assets/vendor/tagsinput.js')}}"></script>
    <!-- Page JS Code -->
    <script src="{{ asset('admin/assets/js/pages/be_pages_dashboard.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/be_tables_datatables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <script>
        jQuery(function() {
            One.helpers(['sparkline']);
        });
        // add csrf token to ajax request
        $.ajaxSetup({
            headers:
                { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        @foreach (session('flash_notification', collect())->toArray() as $message)
         One.helpers('notify', {type: '{{ $message['level'] }}', message: '{{ $message['message'] }}'});
        @endforeach
    </script>

    @stack('script')
</body>

</html>
