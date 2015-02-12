<!DOCTYPE html>
<html lang="en" ng-app="myadmin">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style_graph.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css') ?>">
    <!--link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/js/gritter/css/jquery.gritter.css') ?>" /-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lineicons/style.css') ?>">    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css') ?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body logs>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg header-admin">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href class="logo"><b>Alumni Admin Page</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo base_url('index.php/loginctrl/logout') ?>">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion" navigator>
              
              	  <p class="centered"><a href><img src="<?php echo base_url('assets/pictures/') ?>/{{admin.picture}}" class="img-circle" width="60"></a></p>
              	  <h5 class="centered" ng-cloak>{{admin.fname | capitalize}} {{admin.mname | capitalize}} {{admin.lname | capitalize}}</h5>
              	  <h6 class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</h6>
                  <li class="mt" ng-click="getDashBoard()">
                      <a class="dashboard active" href>
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="admin" href>
                          <i class="fa fa-desktop"></i>
                          <span>Admin</span>
                      </a>
                  </li>

                  <li class="sub-menu" ng-click="Settings()">
                      <a class="setings" href >
                          <i class="fa fa-cogs"></i>
                          <span>Settings</span>
                      </a>
                  </li>
                  <li class="sub-menu" ng-click="getGradList()">
                      <a class="list" href>
                          <i class="fa fa-book"></i>
                          <span>List of Alumni</span>
                      </a>
                  </li>
                  <li class="sub-menu" ng-click="AddGradList()">
                      <a class="add" href>
                          <i class="fa fa-tasks"></i>
                          <span>Add Alumni</span>
                      </a>
                  </li>
                  <li class="sub-menu" ng-click="Events()">
                      <a class="events" href>
                          <i class=" fa fa-inbox"></i>
                          <span>Add Events</span>
                      </a>
                  </li>
                  <li class="sub-menu" ng-click="News()">
                      <a class="news" href>
                          <i class=" fa fa-inbox"></i>
                          <span>Add News</span>
                      </a>
                  </li>
                  <li class="sub-menu" ng-click="getStatistics()">
                      <a class="stat" href>
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Analysis</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <section dashboard></section>
            <section add></section>
            <section list></section>
            <section statistics></section>
            <section admin></section>
            <section settings></section>
            <section events></section>
            <section news></section>
          </section>
      </section>

      <!-- admin -->



      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
             Saint Michael College of Caraga
              <a href="index.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>
  <div class='success' style='display:none'>Success!</div>
  <div class='activated' style='display:none'>Activated!</div>
  <div class='deactivated' style='display:none'>Deactivated!</div>
  <div class='exist' style='display:none'>Already Exist!</div>
  <div class='success-stat' style='display:none'>Statistics Generated!</div>

    <!-- prompts -->

    <!-- statistics -->
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/chart-master/Chart.js') ?>"></script>
    <script src="<?php echo base_url('assets/statistics/canvasjs.js') ?>"></script>
    <script src="<?php echo base_url('assets/statistics/jquery.canvasjs.js') ?>"></script>
    <script src="<?php echo base_url('assets/statistics/jscharts.js') ?>"></script>
    <script src="<?php echo base_url('assets/statistics/amcharts.js') ?>"></script>
    <script src="<?php echo base_url('assets/statistics/serial.js') ?>"></script>
    <script src="<?php echo base_url('assets/statistics/pie.js') ?>"></script>


     <!-- angular ui -->
    <script src="<?php echo base_url('assets/js/angular.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dirPagination.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dirPagination.spec.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dirPagination.tpl.html') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-animate.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/loading-bar.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-sanitize.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-strap.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-strap.tpl.js') ?>"></script>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-fileupload.js') ?>"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url('assets/js/jquery.dcjqaccordion.2.7.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.nicescroll.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/js/jquery.sparkline.js') ?>"></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url('assets/js/common-scripts.js') ?>"></script>
    
    <!--custom tagsinput-->
    <script src="<?php echo base_url('assets/js/jquery.tagsinput.js') ?>"></script>
    
    <!--custom checkbox & radio-->
    <script src="<?php echo base_url('assets/js/jquery-ui-1.9.2.custom.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-ui-1.js') ?>"></script>
  
  

  
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js') ?>"></script>  

    <!-- angular -->
	  <script src="<?php echo base_url('assets/scripts/admin.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/factory.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/directive.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/controllers.js') ?>"></script>

    <script>

/**
 * modalEffects.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2013, Codrops
 * http://www.codrops.com
 */
var ModalEffects = (function () {

    function init() {

        var overlay = document.querySelector('.md-overlay');

        [].slice.call(document.querySelectorAll('.md-trigger')).forEach(function (el, i) {

            var modal = document.querySelector('#' + el.getAttribute('data-modal')),
                close = modal.querySelector('.md-close');

            function removeModal(hasPerspective) {
                classie.remove(modal, 'md-show');

                if (hasPerspective) {
                    classie.remove(document.documentElement, 'md-perspective');
                }
            }

            function removeModalHandler() {
                removeModal(classie.has(el, 'md-setperspective'));
            }

            el.addEventListener('click', function (ev) {
                classie.add(modal, 'md-show');
                overlay.removeEventListener('click', removeModalHandler);
                overlay.addEventListener('click', removeModalHandler);

                if (classie.has(el, 'md-setperspective')) {
                    setTimeout(function () {
                        classie.add(document.documentElement, 'md-perspective');
                    }, 25);
                }
            });

            close.addEventListener('click', function (ev) {
                ev.stopPropagation();
                removeModalHandler();
            });

        });

    }

    init();

})();
    </script>

  </body>
</html>
