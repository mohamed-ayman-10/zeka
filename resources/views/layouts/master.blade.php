<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/base/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admin/images/favicon.png')}}" />
</head>
<body class="position-relative">
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layouts.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('layouts.sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap admin  </a> templates</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="{{asset('admin/vendors/base/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/template.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
{{--<script src="{{asset('admin/js/admin.js')}}"></script>--}}
<script src="{{asset('admin/js/data-table.js')}}"></script>
<script src="{{asset('admin/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/js/dataTables.bootstrap4.js')}}"></script>
<!-- End custom js for this page-->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('scripts')

<script src="{{asset('admin/js/jquery.cookie.js')}}" type="text/javascript"></script>
</body>

</html>

