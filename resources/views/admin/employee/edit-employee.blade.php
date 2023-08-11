@extends('admin.layouts.admin_layouts')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Employee
                        <small>Welcome to THORTASK</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Add Employee </a></li>

                    </ul>
                </div>
            </div>
        </div>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <form id="registration-form" method="POST" action="{{ url('admin/update-employee/'.$employee['id']) }}">
            @csrf
            <div class="container-fluid">
                <!-- Color Pickers -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                            <div class="body">
                                <div class="row clearfix">

                                    <div class="col-12 mb-5">
                                        <p> <b>Company Name</b> </p>
                                        <select name="company_id" class="form-control">
                                            @forelse ($companies as $company)
                                                <option @if ($employee['company_id']==$company['id'])
                                                    selected
                                                @endif value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                                            @empty
                                                <option value="">No Company Found
                                                <option>
                                            @endforelse
                                        </select>
                                        @error('company_id')
                                            <div style="color:red;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Employee Name</b> </p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{ $employee['name'] }}"
                                                name="name" placeholder="Employee Name" />
                                            @error('name')
                                                <div style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Email</b></p>
                                        <div class="form-group">
                                            <input type="email" readonly id="email" value="{{ $employee['email'] }}" name="email"
                                                class="form-control" placeholder="Enter Email" />
                                            @error('email')
                                                <div style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Password</b> </p>
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="Enter Password" />
                                            @error('password')
                                                <div style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <p> <b>Confirm Password</b> </p>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                placeholder="Enter Confirm Password" />
                                            @error('password_confirmation')
                                                <div style="color:red;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary btn-round"> Add Employee</button>
                                    </div>
                                    <div style="visibility: hidden;" id="nouislider_basic_example"></div>

                                    <div style="visibility: hidden;" id="nouislider_range_example"></div>

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
            messages: {
                password_confirmation: {
                    required: "Confirm password is Required.",
                    equalTo: "Password not Matching."
                }
            }
        });
    </script>
@endsection
