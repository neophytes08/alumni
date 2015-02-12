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
    .title-site
    {
      margin-left: 5px!important;
      font-size: 30px!important;
    }
    .custom-gallery-pic
    {
        width: 260px!important;
        height: 195px!important;
    }
    .gallery-college
    {
        display: none;
    }
    .active
    {
        color: #5B9ACD!important;
    }
    h3.highschool h3.college
    {
        color: black;
        
    }
    h3.highschool:hover, h3.college:hover
    {
        cursor: pointer;
    }
    .custom-header
    {
        background: #3DA1DE!important;
    }
    .custom-color
    {
        color: white!important;
        font-size: 12px;
    }
    .navbar-default .navbar-nav>li>a {
        color:white;
    }
  </style>
<body login>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav custom-header" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand topnav title-site custom-color" href="#">SMCC Online Alumni Management System</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right custom-color">
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
                        <a href="#news">News</a>
                    </li>
                    <li>
                        <a href="#events">Events</a>
                    </li>
                    <li>
                        <a href="#gallery">Gallery</a>
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
                        
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->
    <a  name="news"></a>
   
    <div class="container">
    <div class="content-section-a">
       <div class="panel-body">
        <h2 class="section-heading">News Section</h2>
       </div>
    </div>
     <div class="row">
       <div class="container">
         <div class="col-md-12 mb">
            <div class="white-panel pn" dir-paginate="list in listNews | itemsPerPage: 1">
          <div class="white-body text-center">
          <img src="<?php echo base_url('assets/news/') ?>/{{list.news_pic}}" style="width: 90%; height: 300px;">
        </div>
        <div class="white-header">
        <h3>{{list.news_title | capitalize}}</h3>
      </div>
      <div class="white-body" style="text-align: justify!important; color: black;">
              <p>{{list.news_description}}
            </div>
      </div>
           <div class="col-md-12 mb text-center">
              <div class="row">
                <dir-pagination-controls></dir-pagination-controls>
              </div>
            </div>
         </div>
        </div>

        <hr />
        </div>
    </div>
  <!-- <a  name="news"></a>
    <div class="content-section-a">
       

    </div> -->
    <!-- /.content-section-a -->

   <a  name="events"></a>
    <div class="content-section-a">
        <div class="container">
            <h2 class="section-heading">Events Section</h2>
        </div>
        <div class="container">
     <div class="row">
         <div class="col-md-12 mb">
            <div class="white-panel pn" dir-paginate="list in listEvent | itemsPerPage: 1" pagination-id="branch">
                
                
          <div class="white-body">
          <img src="<?php echo base_url('assets/events/') ?>/{{list.event_picture}}" style="width: 90%; height: 300px;">
        </div>
        <div class="white-header">
        <h5>{{list.event_title | capitalize}}</h5>
        <h6>{{list.event_date | date}}</h6>
      </div>
      <div class="white-body" style="text-align: justify!important; color: black;">
         <p>{{list.event_description}}
            <br>
        <a href data-toggle="modal" data-target="#event" ng-click="showEvent(list)"> View Comments</a>
      </div>
      </div>

           <div class="col-md-12 mb">
              <div class="row">
                <dir-pagination-controls pagination-id="branch"></dir-pagination-controls>
              </div>
            </div>
         </div>
        </div>
    </div>

    </div>
    <!-- /.content-section-a -->
<a name="gallery"></a>
    <div class="content-section-a">

    <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Photo Gallery</h2>
                    
                </div>
                <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Thumbnail Gallery</h1>
                <h3 class="highschool active" ng-click="highschoolActive()">High School</h3>
                <h3 class="college" ng-click="collegeActive()">College</h3>
            </div>
        <div class="gallery-hischool">
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2012/HS-13.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2012/HS-15.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb ">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2013/HS1.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb ">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2013/HS-2.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2013/HS-3.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2013/HS-4.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2013/HS-5.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2014/HS-6.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2014/HS-7.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2014/HS-8.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2014/HS-9.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2014/HS-10.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2014/HS-11.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2014/HS-12.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/highSchool/homecoming2014/HS-14.jpg') ?>" alt="">
                </a>
            </div>

        </div>

        <div class="gallery-college">
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/college/homecoming2014/2014-1.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/college/homecoming2014/2014-2.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb ">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/college/homecoming2014/2014-3.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb ">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/college/homecoming2015/2015-1.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/college/homecoming2015/2015-2.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/college/homecoming2015/2015-3.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/college/homecoming2015/2015-4.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/college/homecoming2015/2015-5.jpg') ?>" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive custom-gallery-pic" src="<?php echo base_url('assets/gallery/college/homecoming2015/2015-6.jpg') ?>" alt="">
                </a>
            </div>

        </div>

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
                <div class="col-lg-12>">
                    <h2 class="section-heading">The Associations</h2>
                    <br>
                    <p style="text-align: justify; font-weight: normal;" >
                        Welcome to your Saint Michael College of Caraga Alumni Association, where we support the School's mission,vision, and services by facilitating more meaningful lifelong relationships within the Michaelinians family,alumni, teachers, and school administrator.
                        <br>
                        <br>
                        Situated in the heart of Nasipit specifically along the Atupan Street beside the Saint Michael the Archangel Parish Church, Versoza Park and the Municipal hall,we present our school where we oath to serve with passion and will be ever loyal and to extend the culture of the school to local communities and worldwide.
                        <br>
                        <br>
                        We cover a variety of events and services to professional development, continuing education, and wide outreach. Larger annual events are the Alumni Homecoming oh High School in March or April , and the College in December. The Events cover different activities prepared by the Alumni Homecoming Hosts.
                        <br>
                        We celebrate and support the truly global Michaelinians family. On behalf of all of us, thank you for your dedication to Saint Michael College of Caraga, and welcome!
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="col-lg-5">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    
                    <br>
                    <h3>Alumni Officers College (SY. 2013 - 2014)</h3>
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
                <div class="col-lg-6">
                    <img class="img-responsive" src="<?php echo base_url('assets/img/officers.jpg') ?>" alt="" style="margin-top: 10px; box-shadow: 0px 0px 2px black; width: 680px; height: 354px">
                </div>
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
                    <h2>Reach Us Through: </h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://www.facebook.com/pages/SMCC-Alumni-Homecoming-2014-College/1547195152190894" target="_blank" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.banner -->

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
                  <input type="text" ng-model="login.username" placeholder="Username" class="form-control" required>
                  <br>
                  <input type="password" ng-model="login.password" placeholder="Password" class="form-control" required>
                </div>
              </div>
                <div class="modal-footer">
                    <a href="#forgot" data-toggle="modal" ng-click="recoveryAlert()" class="pull-left">Fogot Password?</a>
                    <button class="btn btn-info" type="submit">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="changePic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="changePic">{{showEventList.event_title | capitalize}}</h4>
      </div>
      <div class="modal-body">
        <img src="<?php echo base_url('assets/events/') ?>/{{list.event_picture}}" style="width: 90%; height: 300px;">
      </div>
      <div class="modal-body">
            <h6>Date Posted: {{showEventList.event_date | date}}</h6>
            <p>{{showEventList.event_description}}</p>
      </div>
      <div class="modal-body">
            <h5>Comments</h5>
      </div>
      <div class="modal-body" ng-repeat="list in commentList" ng-mouseover="showOptions(list)">
            <p style="color: blue;"><img src="<?php echo base_url('assets/pictures/') ?>/{{list.picture}}" width="50" height="50"> {{list.fname | capitalize}} {{list.mname | capitalize}} {{list.lname}} {{list.extention_name}} <br> <h6>{{list.comment_event_date | date}} <a href class="editEventComment_{{list.comment_event_id}}" id="editEvent" ng-click="editEventOpt(list)">Edit</a> <a href class="deleteEventComment_{{list.comment_event_id}}" id="deleteEvent" ng-click="deleteEventOption(list)">Delete</a></h6></p>
            <h5 style="margin-left: 60px;">{{list.comment_event_details}}</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
<div class="modal fade" id="error-login" tabindex="-1" role="dialog" aria-labelledby="Editinfo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="Editinfo">Error Login</h4>
      </div>
      <div class="modal-body">
            <label>Error login!</label>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Okie</button>
      </div>
    </div>
  </div>
</div>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="forgot" class="modal fade">
    <div class="modal-dialog">
        <form ng-submit="recover()">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><h4>Please type your valid email address</h4></h4>
            </div>
            <div class="modal-body">
                <p>We will check if the email address you give exist in our records, we will send your username and password using the email address if valid.</p>
            </div>
            <div class="modal-body">
            <div class="row"> 
                <input type="email" ng-model="rec.email" placehoder="Email Address here..." class="form-control" required>
            </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-theme" type="submit">Recover</button>
            </div>
        </div>
    </form>
    </div>
</div>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="emailNoti" class="modal fade">
    <div class="modal-dialog">
        <form ng-submit="recover()">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><h4>Email Notification</h4></h4>
            </div>
            <div class="modal-body">
                <p>Please check your email account.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-info" type="button" data-dismiss="modal">Done</button>
            </div>
        </div>
    </form>
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
    <script src="<?php echo base_url('assets/js/dirPagination.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/login.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/loginFactory.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/loginDirective.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/loginController.js') ?>"></script>
</body>

</html>
