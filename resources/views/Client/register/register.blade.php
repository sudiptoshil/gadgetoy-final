<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gadgetoy</title>

    <!-- favicon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/')}}client/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/')}}client/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}client/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{asset('/')}}client/assets/favicon/site.webmanifest">


    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

    <!-- CSS files -->

    <link href="{{asset('/')}}client/assets/css/magnific-popup.css" rel="stylesheet">
    <link href="{{asset('/')}}client/assets/css/owl.carousel.css" rel="stylesheet">
    <link href="{{asset('/')}}client/assets/css/owl.carousel.theme.min.css" rel="stylesheet">
    <link href="{{asset('/')}}client/assets/css/ionicons.css" rel="stylesheet">
    <link href="{{asset('/')}}client/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/')}}client/assets/css/main.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


<!-- Site Header -->
<div class="site-header-bg login">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{route('/')}}"><img src="{{asset('/')}}client/assets/images/logo.png" alt="logo"></a>
            </div>

        </div>
    </div>
</div>

<!-- Header -->

<section>
    <div class="container col-md-4">
        <div class="row justify-content-center mt-4 card">
            <div class="col-sm-12 card-body">
                <div class="row">
                    <div class="col text-center">
                        <h3>Register</h3>

                    </div>
                </div>
                <form action="{{route('registration-process')}}" method="post">
                    @csrf
                    <div class="form-group row align-items-center">
                        <div class="col mt-4">
                            <input name="full_name" type="text" class="form-control" placeholder="Full Name">
                            <span class="text-danger">{{$errors->has('full_name') ? $errors->first('full_name') : ' '}}</span>

                        </div>
                    </div>
                    <div class="form-group row align-items-center mt-4">
                        <div class="col">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ' '}}</span>

                        </div>
                    </div>

                    <div class="form-group row align-items-center mt-4">
                        <div class="col">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ' '}}</span>

                        </div>
                    </div>

                    <div class="form-group row align-items-center mt-4">
                        <div class="col">
                            <input type="text" name="contact_no" class="form-control" placeholder="Contact No">
                            <span class="text-danger">{{$errors->has('contact_no') ? $errors->first('contact_no') : ' '}}</span>

                        </div>

                    </div>

                    {{--<div class="form-group row mt-4">
                        <div class="col text-center">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    I Read and Accept <a href="https://www.froala.com">Terms and Conditions</a>
                                </label>
                            </div>


                        </div>
                    </div>--}}
                    <div class="form-group row align-items-center mt-4">
                        <div class="col text-center">
                            <input type="submit" value="Register" class="btn btn-success">
                        </div>
                    </div>
                    <div class="sign-up">
                        Already have an account? <a href="{{route('client-login')}}">Login Here</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- login -->


</body>
</html>
