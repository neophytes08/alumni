<!DOCTYPE html>
<html ng-app="login">
<head>
	<title> Graduate Tracer Study </title>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
	<link href="<?php echo base_url('assets/css/materialize.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/materialize.min.css') ?>" rel="stylesheet">
  <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
</head>
  	<style type="text/css">
    html, body, .container
    {
      height: 100%;
    }
    body
    {
      background: url(/alumni/assets/img/bg.jpg) no-repeat center fixed;
      background-size: 100% 90%;
      color: white;
    }
    h4, p
    {
      color: black!important;
    }
  	.tracer-logo
  	{
  		border-radius: 100px!important;
  		box-shadow: 0px 1px 2px black!important;
  	}
  	.login-head
  	{
  		height: 100px!important;
  	}
    .site-title
    {
      margin-right: 450px!important;
      color: #FEB613!important;
    }
    .site-title li:hover
    {
      background: transparent!important;
    }
    nav
    {
        background: #1A1851!important; 
        height: 100px!important;
        border-bottom: 3px solid #FEB614!important;
        z-index: 1!important;
    }
    .background_box
    {
      position: fixed;
      margin-left: 200px;
      width: 800px;
      height: 100%;
      background: black;
      z-index: -1;
      opacity: 0.5;
      padding: 20px;
    }
    .container
    {
       width: 800px;
       padding: 20px;
       margin-left: 200px;
       position: fixed!important;
       display: table!important;
       vertical-align: middle!important;
      
    }
    .vertical-center-row
    {
      display: table-cell!important;
      vertical-align: middle!important;
    }
    .site-description
    {
      margin: 150px auto;
      color: white!important;
      font-size: 18px!important;
      font-family: Arial, sans-serif;
      text-indent: 20px;
      text-align: justify;
    }
    .button-customize
    {
      background: #FEB613!important;
      font-weight: bold!important;
    }
    footer
    {
      margin-top: 40%!important;
      background: #1A1851!important;
      width: 100%!important; 
      height: 100%!important; 
      position: fixed!important;
      border-top: 3px solid #FEB614!important;
    }
    .background-layout
    {
      width: 100%;
      height: 100%;
      background: black;
      z-index: 1;
      position: fixed;
      opacity: 0.6;
      display: none;
    }
    #forgot, #register
    {
      z-index: 2;
    }
    .successSent
    {
      color: white!important;
    }
    .emailSent
    {
      position: absolute!important;
      margin-left: 600px;
      margin-top: -50px;
      display: none;
    }
    input.reg-input
    {
      color: black!important;
      width: 224px!important;
    }
    .select-custom
    {
      float: left!important;
      margin-left: 5px;
    }
    .doneRegistration
    {
      color: black!important;
      display: none;
    }
  	</style>
<body login>
<div class="background-layout"></div>
        <div class="background_box"></div>  
    <header>
      <nav>
        <div class="nav-wrapper login-head" >
          <img src="<?php echo base_url('assets/img/logo.jpg')?>" alt="logo" class="tracer-logo">
          <ul class="side-nav site-title">
            <li><h3>Graduate Tracer</h3></li>
          </ul>
        </div>
      </nav>
    </header>
    <main>
            
        <div class="container">
          <div class="row vertical-center-row" style="opacity: 1!important;">
          <div class="col s6" style="border-right: 1px solid #9A9999!important;">
              <p class="site-description">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  
              </p>
          </div>
          <div class="col s6">
            <div class="card" style="margin-top: 100px!important; box-shadow: 0px 0px 0px transparent!important;">
              <div class="card-image">
                <span class="card-title">Please Login</span>
              </div>
              <form >
                <div class="card-content white-text">
                  <span class="card-title">Please Login</span>
                  <br>
                  <label>Username</label>
                  <br>
                  <input type="text" ng-model="login.username" required>
                  <br>
                  <label>Password</label>
                  <br>
                  <input type="password" ng-model="login.password" required>
                  <br>
                  <a href="#forgot" ng-click="recoveryAlert()">Fogot Password?</a>
                  <br>
                  <a href="#register" ng-click="register()">Register</a>
                </div>
              <div class="card-action">
                  <button type="submit" class="waves-effect waves-light btn-large button-customize">Cancel</button>
                  <button class="waves-effect waves-light btn-large button-customize">Login</button>
             </div>
              </form>
            </div>
          </div>
          </div>
        </div>
     </main>
     
    <!-- <footer>
        <div class="row">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5 class="white-text">Footer Content</h5>
                  <p class="grey-text lighten-4">You can use rows and columns here to organize your footer content.</p>
                </div>
                <div class="col l4 offset-l2 s12">
                  <h5 class="white-text">Links</h5>
                  <li><a class="grey-text lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text lighten-3" href="#!">Link 4</a></li>
                </div>
              </div>
            </div>
            <div class="footer-copyright">
              <div class="container">
              © 2014 Copyright Text
              <a class="grey-text lighten-4 right" href="#!">More Links</a>
              </div>
            </div>
        </div>
    </footer>  -->
    <div id="forgot" class="modal">
      <h4>Please type your valid email address</h4>
      <p>We will check if the email address you give exist in our records, we will send your username and password using the email address if valid.</p>
      <br>
      <form ng-submit="recover()">
        <input type="email" ng-model="rec.email" placehoder="Email Address here..." style="color: black;">
        <br>
        <a class="btn" ng-click="cancelRecovery()">Cancel</a>
        <button class="btn" type="submit">Send</button>
        <div class="preloader-wrapper small active emailSent">
            <div class="spinner-layer spinner-blue">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>

            <div class="spinner-layer spinner-red">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>

            <div class="spinner-layer spinner-yellow">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>

            <div class="spinner-layer spinner-green">
              <div class="circle-clipper left">
                <div class="circle"></div>
              </div><div class="gap-patch">
                <div class="circle"></div>
              </div><div class="circle-clipper right">
                <div class="circle"></div>
              </div>
            </div>
          </div>
      </form>
    </div>

    <div id="register" class="modal">
      <h4>Register</h4>
      <div class="row registration">
        <form ng-submit="submitReg()">
          <input type="text" placeholder="First Name" ng-model="reg.fname" class="reg-input">
          <input type="text" placeholder="Middle Name" ng-model="reg.mname" class="reg-input">
          <input type="text" placeholder="Last Name" ng-model="reg.lname" class="reg-input">
          <br>
          <select ng-model="reg.extention_name" class="disabled select-custom" style="color: black!important; width: 140px!important;">
            <option value="''" selected> </option>
            <option value="Jr">Jr</option>
            <option value="Sr">Sr</option>
          </select>
          <select ng-model="reg.course" class="disabled select-custom" style="color: black!important; width: 400px!important; margin-right: 5px;">
            <option selected disabled>Choose Degree Graduated</option>
            <option ng-cloak ng-repeat="list in courseList" value="{{list.course_name}}">{{list.course_name | capitalize}}</option>
          </select>
          <br>
          <input type="email" ng-model="reg.email" placeholder="Email Address" class="reg-input">
          <br>
            <a href class="waves-effect waves-light btn-large button-customize" ng-click="cancelReg()" style="margin-top: 5px!important;"> Cancel </a>
            <button type="submit" class="waves-effect waves-light btn-large button-customize" style="margin-top: 5px!important;"> Done </button>
        </form>
      </div>
      <div class="row doneRegistration">
        <h5>Thank you for registering to Graduate Tracer, your information will be reviewed by the admin to determine your existence in the school records. <br>
        You will be notifiy via email that you provided if you exist in school records. Thank you and God Bless!
        </h5>
        <a href="#" class="waves-effect btn-flat modal-close" ng-click="cancelReg()">Done</a>
      </div>
    </div>
    <script src="<?php echo base_url('assets/js/materialize.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/platform.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/angular.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/login.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/loginFactory.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/loginDirective.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/loginController.js') ?>"></script>
</body>
</html>           
    
    
