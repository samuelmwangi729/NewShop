
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Tag -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name='copyright' content=''>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Title Tag  -->
        <title>{{ config('app.name') }}.</title>
        <!-- Favicon -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="images/favicon.png">
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Roboto Slab Font [ OPTIONAL ] -->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
        <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="{{ asset('user/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="{{ asset('user/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="{{ asset('user/plugins/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet">
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="{{ asset('user/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <link href="{{ asset('user/plugins/bootstrap-validator/bootstrapValidator.min.css') }}" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="{{ asset('user/css/demo/jquery-steps.min.css') }}" rel="stylesheet">
        <!--Demo [ DEMONSTRATION ]-->
        <link href="{{ asset('user/css/demo/jasmine.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/dropzone/dropzone.css') }}" rel="stylesheet">
        <link href="{{ asset('user/plugins/summernote/summernote.min.css') }}" rel="stylesheet">
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="{{ asset('user/plugins/pace/pace.min.css') }}" rel="stylesheet">
        <script src="{{ asset('user/plugins/pace/pace.min.js') }}"></script>
    </head>
    <body>
        <div id="container" class="cls-container">
            <!-- REGISTRATION FORM -->
            <!--===================================================-->
            <div class="lock-wrapper">
                <div class="panel lock-box">
                    <div class="center"> <img alt="" src="{{ asset('images/logo.png') }}"/> </div>
                    <p class="text-center">Please Register An Account With Us</p>
                    <div class="row">
                        <form id="registration" class="form-inline" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div id="demo-error-container"></div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <input  type="text" placeholder="Enter First Name" class="form-control @error('FirstName') is-invalid @enderror" name="FirstName" />
                                    @error('FirstName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <input  type="text" placeholder="Enter Last Name" class="form-control @error('LastName') is-invalid @enderror" name="LastName" />
                                    @error('LastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <input type="email" placeholder="Enter Email Address" class="form-control @error('email') is-invalid @enderror" name="email" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <input  type="password" placeholder="Password" class="form-control lock-input @error('password') is-invalid @enderror" name="password" />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <input id="signupInputRepassword" type="password" placeholder="Retype Password" class="form-control lock-input" name="password_confirmation" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">
                           Register With Us
                            </button>
                        </form>
                    </div>
                </div>
                <div class="registration"> Already registered! <a href="#"> <span class="text-primary"> Please Login Here </span> </a> </div>
            </div>
            <!--===================================================-->
            <!-- REGISTRATION FORM -->
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
        <!--JAVASCRIPT-->
        <!--=================================================-->
    </body>
</html>
