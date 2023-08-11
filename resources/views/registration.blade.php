<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Registration Form</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-5">{{__('msg.registration')}}</h1>
        <div class="flot-right row">
            <label for="">Language</label>
            <a class="btn btn-primary" href="{{url('/lang/en')}}">Eng</a>
            <a class="btn btn-success mx-2" href="{{url('/lang/hi')}}">Hin</a>
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
        <form id="registration-form" action="{{ url('registration') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                        placeholder="Enter Full Name">
                    @error('name')
                        <label class="error">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                        placeholder="Enter Email">
                    @error('email')
                        <label class="error">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Enter Password">
                    @error('password')
                        <label class="error">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="Enter Confirm Password">
                    @error('password_confirmation')
                        <label class="error">{{ $message }}</label>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a type="button" href="{{url('login')}}" class="btn btn-success text-light float-right">Login</a>
        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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

</body>

</html>
