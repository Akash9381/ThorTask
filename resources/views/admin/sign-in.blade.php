<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title> Login</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('admin/assets/images/fav.jpg') }}" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/light/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/light/assets/css/authentication.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/light/assets/css/color_skins.css') }}">
</head>

<body class="theme-purple authentication sidebar-collapse">
    <!-- Navbar -->

    <!-- End Navbar -->
    <div class="page-header">
        <div class="page-header-image" style="background-image:url({{ asset('admin/assets/images/login.jpg') }})"></div>
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="card-plain">
                    <form id="" class="form" method="POST" action="{{ url('authenticate') }}"
                        autocomplete="off">
                        @csrf
                        <div class="header">
                            <h5>Log in</h5>
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="content">
                            <div class="input-group">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                    placeholder="Enter Email id" autocomplete="off" required>
                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-account-circle"></i>
                                </span>
                                @error('email')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="input-group">
                                <input type="password" name="password" placeholder="Password" class="form-control"
                                    autocomplete="off" required />
                                <span class="input-group-addon">
                                    <i class="zmdi zmdi-lock"></i>
                                </span>
                                @error('password')
                                    <label class="error">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button class="btn btn-primary btn-round btn-block ">LOG IN</button>
                        </div>
                        <div class="footer text-center">
                            <a class="btn btn-primary btn-round" href="{{url('/')}}">Registration</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('admin/light/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/light/assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->

    <script>
        $(".navbar-toggler").on('click', function() {
            $("html").toggleClass("nav-open");
        });
        //=============================================================================
        $('.form-control').on("focus", function() {
            $(this).parent('.input-group').addClass("input-group-focus");
        }).on("blur", function() {
            $(this).parent(".input-group").removeClass("input-group-focus");
        });
    </script>
</body>


</html>
