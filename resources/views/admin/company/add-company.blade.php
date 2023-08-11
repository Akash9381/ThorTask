@extends('admin.layouts.admin_layouts')
@section('title','Add Company')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
@endsection
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Company
                        <small>Welcome to THORTASK</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Add Company</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <form id="registration-form">
            <div class="container-fluid">
                <!-- Color Pickers -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                            <div class="body">
                                <div class="row clearfix">

                                    <div class="col-lg-12 col-md-12">
                                        <p> <b>Company Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                                name="name" placeholder="Company Name" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <p> <b>Company Email</b></p>
                                        <div class="form-group">
                                            <input type="email" id="email"  name="email"
                                                class="form-control" placeholder="Company Email" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Password</b></p>
                                        <div class="form-group">
                                            <input type="password" id="password"
                                                name="password" class="form-control" placeholder="Password" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Confirm Password</b></p>
                                        <div class="form-group">
                                            <input type="password"  name="password_confirmation"
                                                class="form-control" placeholder="Confirm Password" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round"> Add Company</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        $('#registration-form').validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 4
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                }
            },
            submitHandler: function(form) {
                var data = $("#registration-form").serialize();
                $.ajax({
                    url: '/admin/create-company',
                    type: "post",
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status) {
                            alertify.success(response.success);
                            $("#registration-form")[0].reset();

                        } else {
                            alertify.error(response.error);

                        }
                    }
                })
            }
        });
    </script>
@endsection
