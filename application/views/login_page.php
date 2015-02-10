<!DOCTYPE html>
<html lang="en" ng-app="login">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css') ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 	<style type="text/css">
 		body
	    {
	      background: url(/alumni/assets/img/bg-tracer.jpg) no-repeat center fixed;
	      background-size: 100% 100%;
	      color: white;
	    }
 		.login-header
 		{
 			position: fixed;
 			width: 100%;
 			height: 75px;
 			background: #1A1851;
 			border-bottom: 2px solid #FEB613;
 		}
 		.custom-login
 		{
 			width: 665px!important;
 		}
 		.recover-loading
 		{
 			display: none;
 		}
 		label
 		{
 			color: black;
 		}
 	</style>
  <body login>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
     
	  <div id="login-page">
	  <div class="login-header">

      </div>
	  	<div class="container">
	  	
		    <form class="form-login custom-login" ng-submit="loginUser()">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="Username" autofocus ng-model="login.username" required>
		            <br>
		            <input type="password" class="form-control" placeholder="Password" ng-model="login.password" required>
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="#forgot"> Forgot Password?</a>
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		            
		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a href="<?php echo base_url('index.php/loginctrl/resume') ?>">
		                    Create an account
		                </a>
		            </div>
		
		        </div>
			</form>
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="forgot" class="modal fade">
		              <div class="modal-dialog">
		              <form ng-submit="recover()">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>We will check if the email address you give exist in our records, we will send your username and password using the email address if valid.</p>
		                          <input type="email" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix" ng-model="rec.email">
		
		                      </div>
		                      <div class="modal-footer">
		                      	<img src="<?php echo base_url('assets/img/loading.gif') ?>" class="recover-loading">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="submit">Submit</button>
		                      </div>
		                  </div>
		               </form>
		              </div>
		          </div>

		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="succes-emailSent" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Email Status</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Please check your email account for your account recovery.</p>
		                      </div>
		                      <div class="modal-footer">
		                          <button class="btn btn-theme" type="button" data-dismiss="modal">Done</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="succes-reg" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Registration Status</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Please check you email address for your verification.</p>
		                      </div>
		                      <div class="modal-footer">
		                          <button class="btn btn-theme" type="button" data-dismiss="modal">Done</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal --> 
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

   
    <script type="text/javascript" src="<?php echo base_url('assets/js/angular.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-sanitize.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/angularstrap/angular-strap.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/angularstrap/angular-strap.tpl.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/login.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/loginFactory.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/loginDirective.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/loginController.js') ?>"></script>
   
  </body>
</html>
