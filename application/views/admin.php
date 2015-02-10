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
            <div class="nav notify-row" id="top_menu" activities>
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme">5</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 5 new messages</p>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="<?php echo base_url('assets/img/ui-zac.jpg') ?>"></span>
                                    <span class="subject">
                                    <span class="from">Zac Snider</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hi mate, how is everything?
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="<?php echo base_url('assets/img/ui-divya.jpg') ?>"></span>
                                    <span class="subject">
                                    <span class="from">Divya Manian</span>
                                    <span class="time">40 mins.</span>
                                    </span>
                                    <span class="message">
                                     Hi, I need your help with this.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="<?php echo base_url('assets/img/ui-danro.jpg') ?>"></span>
                                    <span class="subject">
                                    <span class="from">Dan Rogers</span>
                                    <span class="time">2 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Love your new Dashboard.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">
                                    <span class="photo"><img alt="avatar" src="<?php echo base_url('assets/img/ui-sherman.jpg') ?>"></span>
                                    <span class="subject">
                                    <span class="from">Dj Sherman</span>
                                    <span class="time">4 hrs.</span>
                                    </span>
                                    <span class="message">
                                        Please, answer asap.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="index.html#">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
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
                          <span>List of Graduates</span>
                      </a>
                  </li>
                  <li class="sub-menu" ng-click="AddGradList()">
                      <a class="add" href>
                          <i class="fa fa-tasks"></i>
                          <span>Add Graduate</span>
                      </a>
                  </li>
                  <li class="sub-menu" ng-click="getStatistics()">
                      <a class="stat" href>
                          <i class=" fa fa-inbox"></i>
                          <span>Mail</span>
                      </a>
                  </li>
                  <li class="sub-menu" ng-click="getStatistics()">
                      <a class="stat" href>
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Statistical</span>
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
          </section>
      </section>

      <!-- admin -->



      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
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
    <!--script src="<?php echo base_url('assets/statistics/canvasjs.js') ?>"></script>
    <script src="<?php echo base_url('assets/statistics/jquery.canvasjs.js') ?>"></script>
    <script src="<?php echo base_url('assets/statistics/jscharts.js') ?>"></script>
    <script src="<?php echo base_url('assets/statistics/amcharts.js') ?>"></script>
    <script src="<?php echo base_url('assets/statistics/serial.js') ?>"></script>
    <script src="<?php echo base_url('assets/statistics/pie.js') ?>"></script-->


     <!-- angular ui -->
    <script src="<?php echo base_url('assets/js/angular.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dirPagination.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dirPagination.tpl.html') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-animate.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/loading-bar.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-sanitize.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-strap.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-strap.tpl.js') ?>"></script>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
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
	<script type="text/javascript">
        $(document).ready(function () {
        // var unique_id = $.gritter.add({
        //     // (string | mandatory) the heading of the notification
        //     title: 'Welcome to Dashgum!',
        //     // (string | mandatory) the text inside the notification
        //     text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
        //     // (string | optional) the image to display on the left
        //     image: 'assets/img/ui-sam.jpg',
        //     // (bool | optional) if you want it to fade out on its own or just sit there
        //     sticky: true,
        //     // (int | optional) the time you want it to be alive for before fading out
        //     time: '',
        //     // (string | optional) the class name you want to apply to that specific message
        //     class_name: 'my-sticky-class'
        // });
        // $(function(){
        //     $('select.styled').customSelect();
        // });
          
        // return false;
        });
	</script>
	
	<script type="application/javascript">
        $(document).ready(function () {


            // $("#date-popover").popover({html: true, trigger: "manual"});
            // $("#date-popover").hide();
            // $("#date-popover").click(function (e) {
            //     $(this).hide();
            // });
        
            // $("#my-calendar").zabuto_calendar({
            //     action: function () {
            //         return myDateFunction(this.id, false);
            //     },
            //     action_nav: function () {
            //         return myNavFunction(this.id);
            //     },
            //     ajax: {
            //         url: "show_data.php?action=1",
            //         modal: true
            //     },
            //     legend: [
            //         {type: "text", label: "Special event", badge: "00"},
            //         {type: "block", label: "Regular event", }
            //     ]
            // });
        });
        
        
        // function myNavFunction(id) {
        //     $("#date-popover").hide();
        //     var nav = $("#" + id).data("navigation");
        //     var to = $("#" + id).data("to");
        //     console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        // }
    </script>
    <script>
    //     (function (window) {

    // 'use strict';

    // // class helper functions from bonzo https://github.com/ded/bonzo

    // function classReg(className) {
    //     return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
    // }

    // // classList support for class management
    // // altho to be fair, the api sucks because it won't accept multiple classes at once
    // var hasClass, addClass, removeClass;

    // if ('classList' in document.documentElement) {
    //     hasClass = function (elem, c) {
    //         return elem.classList.contains(c);
    //     };
    //     addClass = function (elem, c) {
    //         elem.classList.add(c);
    //     };
    //     removeClass = function (elem, c) {
    //         elem.classList.remove(c);
    //     };
    // } else {
    //     hasClass = function (elem, c) {
    //         return classReg(c).test(elem.className);
    //     };
    //     addClass = function (elem, c) {
    //         if (!hasClass(elem, c)) {
    //             elem.className = elem.className + ' ' + c;
    //         }
    //     };
    //     removeClass = function (elem, c) {
    //         elem.className = elem.className.replace(classReg(c), ' ');
    //     };
    // }

    // function toggleClass(elem, c) {
    //     var fn = hasClass(elem, c) ? removeClass : addClass;
    //     fn(elem, c);
    // }

    // var classie = {
    //     // full names
    //     hasClass: hasClass,
    //     addClass: addClass,
    //     removeClass: removeClass,
    //     toggleClass: toggleClass,
    //     // short names
    //     has: hasClass,
    //     add: addClass,
    //     remove: removeClass,
    //     toggle: toggleClass
    // };

    // // transport
    // if (typeof define === 'function' && define.amd) {
    //     // AMD
    //     define(classie);
    // } else {
    //     // browser global
    //     window.classie = classie;
    // }

// })(window);


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
