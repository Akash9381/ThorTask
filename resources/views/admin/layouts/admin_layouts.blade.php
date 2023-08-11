<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <link rel="icon" href="{{asset('admin/assets/images/fav.jpg')}}" type="image/x-icon">
    <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Morris Chart Css-->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/morrisjs/morris.css')}}" />
    <!-- Colorpicker Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" />
    <!-- Multi Select Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/multi-select/css/multi-select.css')}}">
    <!-- Bootstrap Spinner Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/jquery-spinner/css/bootstrap-spinner.css')}}">
    <!-- Bootstrap Tagsinput Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <!-- Bootstrap Select Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />
    <!-- noUISlider Css -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/nouislider/nouislider.min.css')}}" />
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/select2/select2.css')}}" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('admin/light/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('admin/light/assets/css/coustam.css')}}">
    <link rel="stylesheet" href="{{asset('admin/light/assets/css/color_skins.css')}}">
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
    @yield('css')
</head>

<body class="theme-purple">
    <!-- Page Loader -->


    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

@include('admin.layouts.header')
@include('admin.layouts.sidebar')
@yield('content')

<!-- Jquery Core Js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="{{asset('admin/light/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
 <script src="{{asset('admin/light/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

 <script src="{{asset('admin/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script> <!-- Bootstrap Colorpicker Js -->
 <script src="{{asset('admin/assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script> <!-- Input Mask Plugin Js -->
 <script src="{{asset('admin/assets/plugins/multi-select/js/jquery.multi-select.js')}}"></script> <!-- Multi Select Plugin Js -->
 <script src="{{asset('admin/assets/plugins/jquery-spinner/js/jquery.spinner.js')}}"></script> <!-- Jquery Spinner Plugin Js -->
 <script src="{{asset('admin/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script> <!-- Bootstrap Tags Input Plugin Js -->
 <script src="{{asset('admin/assets/plugins/nouislider/nouislider.js')}}"></script> <!-- noUISlider Plugin Js -->
 <script src="{{asset('admin/assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->

 <script src="{{asset('admin/light/assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
 <script src="{{asset('admin/light/assets/js/pages/forms/advanced-form-elements.js')}}"></script>

 {{-- <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script> --}}
 <script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

@yield('js')
</body>

</html>
