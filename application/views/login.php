<!DOCTYPE html>
<html lang="en" ng-app="login">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Alumni Assocation</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap2.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/landing-page.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
  <style type="text/css">
    .logo
    {
      width: 120px;
      height: 120px;
      border-radius: 100%;
      position: absolute;
      margin-right: 20px;
    }
    .title-site
    {
      margin-left: 20px!important;
      font-size: 20px!important;
    }
  </style>
<body login>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
      <img src="<?php echo base_url('assets/img/saint-log.jpg') ?>" class="logo">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand topnav title-site" href="#">Alumni Associations</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#login" data-toggle="modal">Login</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/loginctrl/resume') ?>">Sign Up</a>
                    </li>
                    <li>
                        <a href="#events">Events</a>
                    </li>
                    <li>
                        <a href="#news">News</a>
                    </li>
                    <li>
                        <a href="#associations">The Associations</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <div class="intro-message">
                        <h1>Saint Michael College of Caraga</h1>
                        <h3>An Alumni Website</h3>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

  <a  name="news"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">News Section</h2>
                    <p class="lead">A special thanks to <a target="_blank" href="http://join.deathtothestockphoto.com/">Death to the Stock Photo</a> for providing the photographs that you see in this template. Visit their website to become a member.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url('assets/img/ipad.png') ?>" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

   <a  name="events"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Events Section</h2>
                    <p class="lead">A special thanks to <a target="_blank" href="http://join.deathtothestockphoto.com/">Death to the Stock Photo</a> for providing the photographs that you see in this template. Visit their website to become a member.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url('assets/img/ipad.png') ?>" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <a  name="associations"></a>
    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">The Associations</h2>
                    <br>
                    <h3>Alumni Officers College (SY. 2013 - 2014</h3>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>President</td>
                                <td>Ian S. Tampan</td>
                            </tr>
                            <tr>
                                <td>Vice President</td>
                                <td>Mena Kale Salvador</td>
                            </tr>
                            <tr>
                                <td>Treasurer</td>
                                <td>Aiza Mae Clemen</td>
                            </tr>
                            <tr>
                                <td>P.I.O</td>
                                <td>John Paul Ortiz <br> Michael Hidalgo</td>
                            </tr>
                            <tr>
                                <td>Business Manager</td>
                                <td>Niño Raphael Cocon <br> Mart Nearderian Atupan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="<?php echo base_url('assets/img/officers.jpg') ?>" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

  <a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Connect to Start Bootstrap:</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="login" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
              <form class="form-login custom-login" ng-submit="loginUser()">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Login Here!</h4>
                </div>
                <div class="modal-body">
                <div class="row"> 
                  <input type="text" ng-model="login.username" placeholder="Username" class="form-control">
                  <br>
                  <input type="password" ng-model="login.password" placeholder="Password" class="form-control">
                </div>
              </div>
                <div class="modal-footer">
                    <button class="btn btn-theme" type="submit">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/js/bootstrap2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angular.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-sanitize.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-strap.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-strap.tpl.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/login.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/loginFactory.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/loginDirective.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/loginController.js') ?>"></script>
</body>

</html>
