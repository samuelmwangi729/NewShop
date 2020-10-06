
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
        <style>
            @media print {
               .noprint {
                  visibility: hidden;
               }
            }
            </style>
    </head>
    <body>
        <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
            <!--NAVBAR-->
            <!--===================================================-->
            <header id="navbar">
                <div id="navbar-container" class="boxed">
                    <!--Brand logo & name-->
                    <!--================================-->
                    <div class="navbar-header">
                        <a href="index.html" class="navbar-brand">
                            <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}">
                            <div class="brand-title">
                                <span class="brand-text">{{ config('app.name') }}</span>
                            </div>
                        </a>
                    </div>
                    <!--================================-->
                    <!--End brand logo & name-->
                    <!--Navbar Dropdown-->
                    <!--================================-->
                    <!--================================-->
                    <!--End Navbar Dropdown-->
                </div>
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->
            <div class="container">
                <div id="app" style="margin-top:10px">
                    <invoice-component></invoice-component>
                </div>
            </div>
            <!-- FOOTER -->
            <!--===================================================-->
            <footer id="footer">
                <!-- Visible when footer positions are fixed -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="show-fixed pull-right">
                    <ul class="footer-list list-inline">
                        <li>
                            <p class="text-sm">SEO Proggres</p>
                            <div class="progress progress-sm progress-light-base">
                                <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                            </div>
                        </li>
                        <li>
                            <p class="text-sm">Online Tutorial</p>
                            <div class="progress progress-sm progress-light-base">
                                <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                            </div>
                        </li>
                        <li>
                            <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
                        </li>
                    </ul>
                </div>
                <!-- Visible when footer positions are static -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <div class="hide-fixed pull-right pad-rgt">Currently v2.2</div>
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <p class="pad-lft">&#0169; 2015 Your Company</p>
            </footer>
            <!--===================================================-->
            <!-- END FOOTER -->
            <!-- SCROLL TOP BUTTON -->
            <!--===================================================-->
            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
            <!--===================================================-->
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
        <!--JAVASCRIPT-->
        <!--=================================================-->
        <script src="{{ asset('js/app.js') }}"></script>
        <!--jQuery [ REQUIRED ]-->
        <script src="{{ asset('user/js/jquery-2.1.1.min.js') }}"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="{{ asset('user/plugins/fast-click/fastclick.min.js') }}"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="{{ asset('user/js/scripts.js') }}"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="{{ asset('user/plugins/switchery/switchery.min.js') }}"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="{{ asset('user/plugins/parsley/parsley.min.js') }}"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="{{ asset('user/plugins/jquery-steps/jquery-steps.min.js') }}"></script>
        <!--Easy Pie Chart [ OPTIONAL ]-->
        <script src="{{ asset('user/plugins/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="{{ asset('user/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
        <!--Bootstrap Wizard [ OPTIONAL ]-->
        <script src="{{ asset('user/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
        <!--Masked Input [ OPTIONAL ]-->
        <script src="{{ asset('user/plugins/masked-input/bootstrap-inputmask.min.js') }}"></script>
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <script src="{{ asset('user/plugins/bootstrap-validator/bootstrapValidator.min.js') }}"></script>
        <script src="{{ asset('user/plugins/screenfull/screenfull.js') }}"></script>

        <!--Form Wizard [ SAMPLE ]-->
        <script src="{{ asset('user/js/demo/wizard.js') }}"></script>
        <!--Demo script [ DEMONSTRATION ]-->
        <script src="{{ asset('user/js/demo/jasmine.js') }}"></script>
        <script src="{{ asset('user/plugins/summernote/summernote.min.js') }}"></script>
        <script src="{{ asset('user/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('user/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
        <script src="{{ asset('user/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('user/js/demo/tables-datatables.js') }}"></script>

        <script>
            $('#demo-summernote').summernote({height: 550});
        </script>
    </body>
</html>
