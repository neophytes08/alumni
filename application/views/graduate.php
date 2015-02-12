<!DOCTYPE html>
<html ng-app="graduate">
<head>
	<title> Graduate Profile</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Graduate Tracer for MUST">
    <meta name="author" content="Graduate Tracer">
    <meta name="keyword" content="Mindanao University of Science and Technology Graduate Profile">
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-fileupload.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style-responsive.css') ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/loading-bar.css') ?>"> 
    
</head>
<body info ng-controller="dateCtrl">

<section id="container" class="user_id" data-user="<?php echo $this->session->userdata('user_id') ?>">
	<header class="header black-bg header-admin">
            <!--logo start-->
        <a href class="logo"><b>Alumni Tracer</b></a>
        <div class="top-menu">
        	<ul class="nav pull-right top-menu">
                <li><a class="logout" href="<?php echo base_url('index.php/loginctrl/logout') ?>">Logout</a></li>
        	</ul>
        </div>
    </header>

	<section class="">
          <section class="wrapper site-min-height graduate-section">
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="row content-panel graduate-page-header">
						<div class="col-md-4 profile-text mt mb centered">
							<div class="right-divider hidden-sm hidden-xs updateUserBOx">
								<form ng-submit="updateAccount()">
									<input type="text" placeholder="New Username" class="form-control edit-group" ng-model="listAccount.username">
									<input type="text" placeholder="New Password" class="form-control edit-group" ng-model="listAccount.password">
									<input type="email" placeholder="New Email" class="form-control edit-group" ng-model="listAccount.email">
									<br>
									<img src="<?php echo base_url('assets/img/loading.gif') ?>" class="updateLoading pull-left">
									<button class="btn btn-info pull-right">Update</button>
								</form>
							</div>
						</div><!-- --/col-md-4 ---->
						
						<div class="col-md-4 profile-text">
							<h3 ng-cloak>{{infoList.fname | capitalize}} {{infoList.mname | capitalize}} {{infoList.lname | capitalize}} {{infoList.extention_name}}</h3>
							<h6>Currently log in as {{infoList.username}}, {{date | date}}</h6>
							<p class="survey-exist" ng-cloak>Hello {{infoList.username}}! Survey is currently active this time.</p>
							<p class="survey-notexist" ng-cloak>Hello {{infoList.username}}! There is no survey at this time.</p>
							<br>
							<p><button class="btn btn-theme" data-toggle="modal" data-target="#message"><i class="fa fa-envelope"></i> Send Message to Admin</button></p>
							<p><button class="btn btn-info updateInfoBox" ng-click="getUserAccount()">Update User Account</button></p>
						</div><!-- --/col-md-4 ---->
						
						<div class="col-md-4 centered">
						<?php echo form_open_multipart('homectrl/update_picture');?>
                          <div class="fileupload fileupload-new profile-pic" data-provides="fileupload">
                              <div class="fileupload-new thumbnail profile-pic custom-profile-pic">
                                  <img src="<?php echo base_url('assets/pictures/') ?>/{{infoList.picture}}" alt="" class="img-circle">
                              </div>
                              <div class="fileupload-preview fileupload-exists thumbnail custom-thumb"></div>
                             
                              <div>
                                  <span class="btn btn-theme btn-file">
                                      <span class="fileupload-new"><i class="fa fa-check"></i> Edit Picture</span>
                                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                      <input class="default" name="userfile" id="userfile" type="file" ng-file-select="onFileSelect($files)">
								  </span>
                                  <button type="submit" class="btn btn-theme04 fileupload-exists"><i class="fa fa-check"></i> Done</button>
                              </div>
                          </div>
                          </form>
						</div><!-- --/col-md-4 ---->
					</div><!-- /row -->	   
          		</div><!-- --/col-lg-12 ---->
			</div>
				
			<div class="col-lg-12 mt">		
					<div class="row content-panel">
							<div class="panel-heading">
								<ul class="nav nav-tabs nav-justified">
									<li class="active">
										<a data-toggle="tab" href="#overview">My Profile</a>
									</li>
									<li class="">
										<a data-toggle="tab" href="#elementary" ng-click="getElementary(infoList)">Elemetary</a>
									</li>
									<li class="">
										<a data-toggle="tab" href="#secondary" ng-click="getSecondary(infoList)">Secondary</a>
									</li>
									<li class="">
										<a data-toggle="tab" href="#tertiary" ng-click="getTertiary(infoList)">Tertiary</a>
									</li>
									<li class="">
										<a data-toggle="tab" href="#employment">Employment Records</a>
									</li>
									<li class="">
										<a data-toggle="tab" href="#events">Events and News</a>
									</li>
									<li class="">
										<a data-toggle="tab" href="#messages">Messages</a>
									</li>
								</ul>
							</div><!-- --/panel-heading ---->
							
							<div class="panel-body">
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
										<div class="row">
										<h4><i class="fa fa-angle-right"></i> Updates</h4>
											<div class="col-md-6">
												<div class="detailed mt">
												<form ng-submit="updatePersonal()">
												<div class="alert alert-warning alert-dismissable">
												<label>What's your Full Name?</label>
												  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												  <input type="text" placeholder="First Name" class="form-control edit-group" ng-model="infoList.fname">
												  <input type="text" placeholder="Middle Name" class="form-control edit-group" ng-model="infoList.mname">
												  <input type="text" placeholder="Last Name" class="form-control edit-group" ng-model="infoList.lname">
												  <select class="form-control edit-group" ng-model="infoList.extention_name">
												  	<option selected disabled> Extention Name</option>
												  	<option value=" ">  </option>
												  	<option value="Jr" ng-selected="infoList.extention_name == 'Jr'">Jr</option>
												  	<option value="Sr" ng-selected="infoList.extention_name == 'Sr'">Sr</option>
												  </select>
												  <br>
												  <input name="gender" id="genderMale" type="radio" value="Male" ng-model="infoList.gender" class="default">
						                          <label for="genderMale">Male</label>
						                          <br>
						                          <input name="gender" id="genderFemale" type="radio" value="Female" ng-model="infoList.gender"  class="default">
						                          <label for="genderFemale">Female</label>
						                          <br>
						                          <input type="text" class="form-control edit-group" bs-datepicker placeholder="Birthday" ng-model="infoList.birthdate" required>
						                          <br>
						                          <input type="text" placeholder="Street" class="form-control edit-group" ng-model="infoList.street">
												  <input type="text" placeholder="Barangay" class="form-control edit-group" ng-model="infoList.barangay">
												  <input type="text" placeholder="City" class="form-control edit-group" ng-model="infoList.city">
												  <input type="text" placeholder="Province" class="form-control edit-group" ng-model="infoList.province">
												  <br>
												  <input type="text" placeholder="Email Address" class="form-control edit-group" ng-model="infoList.email">
												  <input type="text" placeholder="Mobile No" class="form-control edit-group" ng-model="infoList.mobile_no">
												  <input type="text" placeholder="Telephone No" class="form-control edit-group" ng-model="infoList.tele_no">
												  <br>
												  <input type="text" placeholder="Citizenship" class="form-control edit-group" ng-model="infoList.citizenship">
												  <br>
												  <div class="row">
												  	<button type="submit" class="btn btn-theme pull-right">Done</button>
												  </div>
												</div>
												</form>
												</div><!-- /detailed -->

												<div class="alert alert-warning alert-dismissable">
													<label>We currently need your Elementary Background</label>
												</div>
											</div><!-- --/col-md-6 ---->
											
											<div class="col-md-6 detailed">
												<h4>My Information</h4>
												<div class="row mt mb">
													<div class="activity-panel">
														<h5>Basic Information</h5>
														<p>Name: <strong>{{infoList.fname | capitalize}} {{infoList.mname | capitalize}} {{infoList.lname | capitalize}} {{infoList.extention_name}}</strong></p>
														<p>Birthday: <strong>{{infoList.birthdate |  date}}</strong></p>
														<p>Gender: <strong>{{infoList.gender | capitalize}}</strong></p>
														<p>Citizenship: <strong>{{infoList.citizenship | capitalize}}</strong></p>
													</div>
														
													<div class="activity-icon bg-theme02"><i class="fa fa-trophy"></i></div>
													<div class="activity-panel">
														<h5>Contact Information</h5>
														<p>Address: <strong>{{infoList.street | capitalize}} {{infoList.barangay | capitalize}} {{infoList.city | capitalize}}, {{infoList.province | capitalize}}</strong></p>
														<p>Email Address: <strong>{{infoList.email}}</strong></p>
														<p>Mobile #: <strong>{{infoList.mobile_no}}</strong></p>
														<p>Telephone #: <strong>{{infoList.tele_no }}</strong></p>
														<!--?php echo $map['js']; ?-->
														<!--?php echo $map['html']; ?-->
													</div>
												</div>
										</div><!-- /col-md-6-->
									</div><!-- --/OVERVIEW ---->
								</div><!-- --/tab-pane ---->
									<!-- elementary section -->
									<div id="elementary" class="tab-pane">
										<div class="row">
										<h4><i class="fa fa-angle-right"></i> Updates</h4>
											<div class="col-md-6">
												<form ng-submit="updateElementary()">
													<div class="alert alert-warning alert-dismissable">
													<label>We currently need your Elementary Background</label>
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
														<br>
														<input type="hidden" ng-model="elementaryList.elementary_id">
														<input type="text" class="form-control" placeholder="Name of the School..." ng-model="elementaryList.school_name_elementary">
							                            <br>
							                            <input type="text" class="form-control" placeholder="Address of the School..." ng-model="elementaryList.school_address_elementary">
							                            <br>
							                            <!-- <input type="text" class="form-control" placeholder="Year Graduated..." bs-datepicker ng-model="elementaryList.year_graduated_elementary"> -->
							                            <select ng-model="elementaryList.year_graduated_elementary" class="form-control edit-group" required>
								        					<option ng-repeat="list in yearList" value="{{list.year_name}}" ng-selected="list.year_name == elementaryList.year_graduated_elementary">{{list.year_name}}</option>
								        				</select>
							                            <br>
							                            <textarea class="form-control" placeholder="Awards Received" ng-model="elementaryList.awards_received_elementary"></textarea>
														<br>
														<div class="row">
														  <button type="submit" class="btn btn-theme pull-right">Done</button>
														</div>
													</div>
												</form>
											</div><!-- --/col-md-6 ---->


											<div class="col-md-6 detailed">
												<h4>Elementary</h4>
												<div class="col-md-8 col-md-offset-2 mt">
													<p>School: <strong>{{elementaryList.school_name_elementary | capitalize}}</strong></p>
													<p>Address: <strong>{{elementaryList.school_address_elementary | capitalize}}</strong></p>
													<p>Year Graduated: <strong>{{elementaryList.year_graduated_elementary}}</strong></p>
													<p>Awards Received: <strong>{{elementaryList.awards_received_elementary | capitalize}}</strong></p>
												</div>
											</div><!-- --/col-md-6 ---->
										</div><!-- --/row ---->
									</div><!-- --/tab-pane ---->
									<!-- secondary section -->
									<div id="secondary" class="tab-pane">
										<div class="row">
										<h4><i class="fa fa-angle-right"></i> Updates</h4>
											<div class="col-md-6">
												<div class="alert alert-warning alert-dismissable">
												<form ng-submit="updateSecondary()">
												<label>We currently need your Secondary Background</label>
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													<br>
													<input type="hidden" ng-model="secondaryList.secondary_id">
													<input type="text" class="form-control" placeholder="Name of the School..." ng-model="secondaryList.school_name_secondary">
						                            <br>
						                            <input type="text" class="form-control" placeholder="Address of the School..." ng-model="secondaryList.school_address_secondary">
						                            <br>
						                            <!-- <input type="text" class="form-control" placeholder="Year Graduated..." bs-datepicker ng-model="secondaryList.year_graduated_secondary"> -->
						                            <select ng-model="secondaryList.year_graduated_secondar" class="form-control edit-group" required>
							        					<option ng-repeat="list in yearList" value="{{list.year_name}}" ng-selected="list.year_name == secondaryList.year_graduated_secondar">{{list.year_name}}</option>
							        				</select>
						                            <br>
						                            <textarea class="form-control" placeholder="Awards Received" ng-model="secondaryList.awards_received_secondary"></textarea>
													<br>
													<div class="row">
													  <button type="submit" class="btn btn-theme pull-right">Done</button>
													</div>
												</form>
												</div>
											</div><!-- --/col-md-6 ---->
											
											<div class="col-md-6 detailed">
												<h4>Secondary</h4>
												<div class="col-md-8 col-md-offset-2 mt">
													<p>School: <strong>{{secondaryList.school_name_secondary | capitalize}}</strong></p>
													<p>Address: <strong>{{secondaryList.school_address_secondary | capitalize}}</strong></p>
													<p>Year Graduated: <strong>{{secondaryList.year_graduated_secondary}}</strong></p>
													<p>Awards Received: <strong>{{secondaryList.awards_received_secondary | capitalize}}</strong></p>
												</div>
											</div><!-- --/col-md-6 ---->
										</div><!-- --/row ---->
									</div><!-- --/tab-pane ---->

									<!-- tertiary section -->
									<div id="tertiary" class="tab-pane">
										<div class="row">
										<h4><i class="fa fa-angle-right"></i> Updates</h4>
											<div class="col-md-6" >
												<form ng-repeat="list in tertiaryList">
												<div class="alert alert-warning alert-dismissable">
												<h4></h4>
												<label>We currently need your Tertiary Background</label>
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													<br>	
													<input type="hidden" ng-model="list.teriary_id">
													<select class="form-control" ng-model="list.academic_level">
														<option selected disabled>Academic Level</option>
														<option ng-selected="list.academic_level = 'Graduate'" value="Graduate">Graduate</option>
														<option ng-selected="list.academic_level = 'Post Graduate'" value="Post Graduate">Post Graduate</option>
														<option ng-selected="list.academic_level = 'College Level'" value="College Level">College Level</option>
													</select>
													<br>
													<select class="form-control">
														<option selected disabled ng-model="list.degree_tertiary">Degree of Attainment</option>
														<option ng-cloak ng-repeat="lists in courseList" value="{{lists.course_id}}" ng-selected="list.degree_tertiary == lists.course_id">{{lists.course_name | capitalize}}</option>
													</select>
													<br>
													<label>School Attended</label>
													<!-- <input type="text" class="form-control" placeholder="From..." bs-datepicker ng-model="list.year_from_tertiary"> -->
													<select ng-model="new.year_from_tertiary" class="form-control edit-group" required>
								        				<option ng-repeat="list in yearList" value="{{list.year_name}}" ng-selected="list.year_name == new.year_from_tertiary">{{list.year_name}}</option>
								        			</select>
													To
													<!-- <input type="text" class="form-control" placeholder="To..." bs-datepicker ng-model="list.year_to_tertiary"> -->
						                            <select ng-model="new.year_to_tertiary" class="form-control edit-group" required>
								        				<option ng-repeat="list in yearList"  value="{{list.year_name}}" ng-selected="list.year_name == new.year_to_tertiary">{{list.year_name}}</option>
								        			</select>
						                            <br>
						                            <label>Year Graduated</label>
						                            <!-- <input type="text" class="form-control" placeholder="Year Graduated" bs-datepicker ng-model="list.year_graduated_tertiary"> -->
						                            <select ng-model="new.year_graduated_tertiary" class="form-control edit-group" required>
								        				<option ng-repeat="list in yearList" value="{{list.year_name}}" value="{{list.year_name}}" ng-selected="list.year_name == new.year_graduated_tertiary">{{list.year_name}}</option>
								        			</select>
						                            <br>
						                            <textarea class="form-control" placeholder="Awards Received..." ng-model="list.awards_received_tertiary"></textarea>
						                            <br>
						                            <textarea class="form-control" placeholder="Graduate Tracer..." ng-model="list.thesis_project_tertiary"></textarea>
						                            <br>
													<div class="row">
													  <button type="submit" class="btn btn-theme pull-right" ng-click="updateTertiary(list)">Done</button>
													</div>
												</div>
												</form>
											</div><!-- --/col-md-6 ---->
											
											<div class="col-md-6 detailed">
												<h4>Tertiary</h4>
												<div class="col-md-8 col-md-offset-2 mt" ng-repeat="list in tertiaryList">
													<p>School: <strong>{{list.school_name_tertiary | capitalize}}</strong></p>
													<p>Address: <strong>{{list.school_address_tertiary | capitalize}}</strong></p>
													<p>Academic Level: <strong>{{list.academic_level_tertiary | capitalize}}</strong></p>
													<p>Degree: <strong>{{list.course_name | capitalize}}</strong></p>
													<p>School Attended: <strong>{{list.year_from_tertiary }} to {{list.year_to_tertiary}}</strong></p>
													<p>Year Graduated: <strong>{{list.year_graduated_tertiary }}</strong></p>
													<p>Awards Received: <strong>{{list.awards_received_tertiary | capitalize}}</strong></p>
													<p>Thesis Project: <strong>{{list.thesis_project_tertiary | capitalize}}</strong></p>
												</div>
											</div><!-- --/col-md-6 ---->
										</div><!-- --/row ---->
									</div><!-- --/tab-pane ---->

									<div id="employment" class="tab-pane">
										<div class="row">
										<h4><i class="fa fa-angle-right"></i> Updates</h4>
											<div class="col-md-6">
												<div class="alert alert-warning alert-dismissable">
													<label>Are you presently employed?</label>
													<br>
						                          	<input name="group1" id="yes" type="radio" value="employed" ng-click="yesSurvey()" ng-model="employment.employment_status">
						                          	<label for="yes">Yes</label>
						                          	<input name="group1" id="no" type="radio" value="unemployed" ng-click="noSurvey()" ng-model="employment.employment_status">
						                          	<label for="no">No</label>
												</div>
												
												<div class="alert alert-warning alert-dismissable no-survey">
												<form ng-submit="updateEmployment()">
													<label>Please give us your reason on why you are not employed.</label>
													<br>
													<textarea class="form-control"></textarea>
													<br>
													<div class="row">
													  <button type="submit" class="btn btn-theme pull-right">Done</button>
													</div>
												</form>
												</div>
												
												<div class="alert alert-warning alert-dismissable yes-survey">
												<form ng-submit="updateEmployment()">
												<label>If presently employed, please provide the following present employment details.</label>
													<br>
													<input type="hidden" ng-model="employment.employment_id"> 
						                            <input type="text" ng-model="employment.company_name" placeholder="Company Name" class="form-control" required>
						                            <br>
						                            <input type="text" ng-model="employment.company_address" placeholder="Company Address" class="form-control" required>
						                            <br>
						                            <input type="text" ng-model="employment.company_city" placeholder="City" class="form-control" required>
						                            <br>
						                            <input type="text" ng-model="employment.company_country" placeholder="Country" class="form-control" required>
													<br>
													<label>Company Business Type</label>
													<br>
						                            <input name="group_one" id="Accounting_Finance" type="radio" value="Accounting/Finance" ng-model="employment.company_business_type" required>
						                            <label for="Accounting_Finance">Accounting/Finance</label>
						                            <br>
						                            <input name="group_one" id="Admin_Human Resources" type="radio" value="Admin/Human Resources" ng-model="employment.company_business_type" required>
						                            <label for="Admin_Human Resources">Admin/Human Resources</label>
						                            <br>
						                            <input name="group_one" id="Arts" type="radio" value="Arts/Media/Communications" ng-model="employment.company_business_type" required>
						                            <label for="Arts">Arts/Media/Communications</label>
						                            <br>
						                            <input name="group_one" id="Computer" type="radio" value="Computer/Information Technology" ng-model="employment.company_business_type" required>
						                            <label for="Computer">Computer/Information Technology</label>
						                            <br>
						                            <input name="group_one" id="Education" type="radio" value="Education/Training" ng-model="employment.company_business_type" required>
						                            <label for="Education">Education/Training</label>
						                            <br>
						                            <input name="group_one" id="Engineering" type="radio" value="Engineering" ng-model="employment.company_business_type" required>
						                            <label for="Engineering">Engineering</label>
						                            <br>
						                              <input name="group_one" id="Healthcare" type="radio" value="Healthcare" ng-model="employment.company_business_type" required>
						                              <label for="Healthcare">Healthcare</label>
						                              <br>
						                              <input name="group_one" id="Hotel" type="radio" value="Hotel/Restaurant" ng-model="employment.company_business_type" required>
						                              <label for="Hotel">Hotel/Restaurant</label>
						                              <br>
						                              <input name="group_one" id="Manufacturing" type="radio" value="Manufacturing" ng-model="employment.company_business_type" required>
						                              <label for="Manufacturing">Manufacturing</label>
						                              <br>
						                              <input name="group_one" id="Sales" type="radio" value="Sales/Marketing" ng-model="employment.company_business_type" required>
						                              <label for="Sales">Sales/Marketing</label>
						                              <br>
						                              <input name="group_one" id="Services" type="radio" value="Services" ng-model="employment.company_business_type" required>
						                              <label for="Services">Services</label>
						                              <br>
						                              <label for="self">Others</label>
						                              <input type="text" ng-model="employment.company_business_type" >
						                              <br>
						                              <label>Employment Sector</label>
													<br>
						                              <input name="group_two" id="Self" type="radio" value="Self Employed" ng-model="employment.employment_sector" required>
						                              <label for="Self">Self Employed</label>
						                              <br>
						                              <input name="group_two" id="Private" type="radio" value="Private (Local)" ng-model="employment.employment_sector" required>
						                              <label for="Private">Private (Local)</label>
						                              <br>
						                              <input name="group_two" id="Multi" type="radio" value="Private (Multi-National)" ng-model="employment.employment_sector" required>
						                              <label for="Multi">Private (Multi-National)</label>
						                              <br>
						                              <input name="group_two" id="Government" type="radio" value="Government (Local)" ng-model="employment.employment_sector" required>
						                              <label for="Government">Government (Local)</label>
						                              <br>
						                              <input name="group_two" id="National" type="radio" value="Government (National)" ng-model="employment.employment_sector" required>
						                              <label for="National">Government (National)</label>
						                              <br>
						                              <label>Employment Type</label>
													<br>
						                              <input name="group4" id="Permanent" type="radio" value="Permanent" ng-model="employment.employment_type" required>
						                              <label for="Permanent">Permanent</label>
						                              <br>
						                              <input name="group4" id="Temporary" type="radio" value="Temporary" ng-model="employment.employment_type" required>
						                              <label for="Temporary">Temporary</label>
						                              <br>
						                              <input name="group4" id="Full" type="radio" value="Contractual (Full-time)" ng-model="employment.employment_type" required>
						                              <label for="Full">Contractual (Full-time)</label>
						                              <br>
						                              <input name="group4" id="Part" type="radio" value="Contractual (Part-time)" ng-model="employment.employment_type" required>
						                              <label for="Part">Contractual (Part-time)</label>
						                              <br>
						                              <label>Position/Appointment</label>
													<select class="form-control" style="width: 200px!important;" ng-model="employment.employment_position" required>
						                                <option ng-repeat="special in specialization" value="{{special.obe_id}}">{{ special.obe_name | capitalize }}</option>
						                                <option ng-click="others()">Others</option>
						                             </select>
						                             <br>
						                             <input type="text" ng-model="employment.employment_position" class="form-control others" ng-change="searchOthers()"/>
						                             <br>
						                               <ul>
						                             	<li ng-repeat="list in result" ng-click="getObeValue(list)">{{list.obe_name}}</li>
						                             </ul>
						                             <br>
						                             <label>Employment Salary Rate</label>
													<br>
						                              <input name="group5" id="salary1" type="radio" value="10,000 below" ng-model="employment.employment_salary" required>
						                              <label for="salary1">10,000 below</label>
						                              <br>
						                              <input name="group5" id="salary2" type="radio" value="10,001 - 20,000" ng-model="employment.employment_salary" required>
						                              <label for="salary2">10,001 - 20,000</label>
						                              <br>
						                              <input name="group5" id="salary3" type="radio" value="20,001 - 30,000" ng-model="employment.employment_salary" required>
						                              <label for="salary3">20,001 - 30,000</label>
						                              <br>
						                              <input name="group5" id="salary4" type="radio" value="30,001 - 40,000 " ng-model="employment.employment_salary" required>
						                              <label for="salary4">30,001 - 40,000  </label>
						                              <br>
						                              <input name="group5" id="salary5" type="radio" value="40,001 - 50,000" ng-model="employment.employment_salary" required>
						                              <label for="salary5">40,001 - 50,000</label>
						                              <br>
						                              <input name="group5" id="salary6" type="radio" value="50,001 above" ng-model="employment.employment_salary" required>
						                              <label for="salary6">50,001 above</label>
						                              <br>
						                            <label>Employment Duration</label>
													<br>
													<input type="text" name="startDate" class="form-control" ng-model="employment.employment_duration_from" placeholder="From" bs-datepicker required />
											     	<br>
											     	<input type="text" name="endDate" class="form-control" ng-model="employment.employment_duration_to" placeholder="Until" bs-datepicker required />
											     	<br>
											     	<input type="radio" id="present" value="Present" ng-model="employment.employment_duration_to">
											     	<label for="present" >Present</label>
											     	<br>
													<div class="row">
													  <button type="submit" class="btn btn-theme pull-right">Done</button>
													</div>
													</form>
												</div>
											</div><!-- --/col-md-6 ---->
											<div class="col-md-6 detailed">
												<h4>Employment Record</h4>
												<div class="col-md-12 col-md-offset-0 mt">
													<p>Company Name: <strong>{{employment.company_name | capitalize}}</strong></p>
													<p>Company Address: <strong>{{employment.company_address | capitalize}}</strong></p>
													<p>Company Country: <strong>{{employment.company_country | capitalize}}</strong></p>
													<p>Company City: <strong>{{employment.company_city | capitalize}}</strong></p>
													<p>Company Business Type: <strong>{{employment.company_business_type | capitalize}}</strong></p>
													<p>Employment Sector: <strong>{{employment.employment_sector | capitalize}}</strong></p>
													<p>Employment Type: <strong>{{employment.employment_type | capitalize}}</strong></p>
													<p>Employment Position: <strong>{{employment.employment_position | capitalize}}</strong></p>
													<p>Employment Salary: <strong>{{employment.employment_salary}}</strong></p>
													<p>Employment Status: <strong>{{employment.employment_status | capitalize}}</strong></p>
													<p>Employment Duration: <strong>{{employment.employment_duration_from }} <strong>to</strong> {{employment.employment_duration_to}}</strong></p>
												</div>
											</div><!-- --/col-md-6 ---->
										</div>
									</div>
									<div id="events" class="tab-pane">
										<div class="row">
											<div class="col-md-6">
												<h4><i class="fa fa-angle-right"></i> Events</h4>
												<div class="alert alert-warning alert-dismissable">
													<ul class="list-group">
													  <li class="list-group-item" ng-repeat="list in listEvent" data-toggle="modal" data-target="#event" ng-click="showEvent(list)"><a href>{{list.event_title | capitalize}}</a></li>
													</ul>
												</div>
											</div>
											<div class="col-md-6">
												<h4><i class="fa fa-angle-right"></i> News</h4>
												<div class="alert alert-warning alert-dismissable">
													<ul class="list-group">
													  <li class="list-group-item" ng-repeat="list in listNews" data-toggle="modal" data-target="#news" ng-click="showNews(list)"><a href>{{list.news_title | capitalize}}</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div id="messages" class="tab-pane">
										<div class="row">
											<div class="col-md-6">
												<h4><i class="fa fa-angle-right"></i> Messages List</h4>
												<div class="alert alert-warning alert-dismissable">
													<ul class="list-group">
													  <li class="list-group-item list-group-item-info" ng-repeat="list in messageList" ng-click="viewMessages(list)"><img src="<?php echo base_url('assets/pictures/') ?>/{{list.picture}}" width="50" height="50"><a href> {{list.fname | capitalize}} {{list.mname | capitalize}} {{list.lname | capitalize}} {{list.extention_name | capitalize}}</a><br><a href style="color: red;" ng-click="deleteConvo(list)">Delete</a></li>
													</ul>
												</div>
											</div>
											<div class="col-md-6">
												<h4><i class="fa fa-angle-right"></i> Message Area</h4>
												<div class="alert alert-warning alert-dismissable custom-message">
													<ul class="list-group">
													  <li class="list-group-item" ng-repeat="list in messageView">
													  	<p><img src="<?php echo base_url('assets/pictures') ?>/{{list.picture}}" width="50" height="50">{{list.fname | capitalize}} {{list.mname | capitalize}} {{list.lname | capitalize}} {{list.extention_name | capitalize}} <br><h6>{{list.time | date}}</h6></p>
													  	<h4>{{list.reply}}</h4>
													  	<H6><a href ng-click="deleteMessage(list)">Delete</a></H6>
													  </li>
													</ul>
												</div>
												<form ng-submit="replyMessage()">
												<div class="alert alert-warning alert-dismissable" id="custom-message-show">
													<textarea ng-model="newMessage.message" class="form-control"></textarea>
													<input type="hidden" ng-model="newMessage.conversation_id">
													<input type="hidden" ng-model="newMessage.user_id">
													<div class="row">
														<button type="submit" class="btn btn-theme pull-right edit-group">Send</button>
													</div>
												</div>
												</form>
											</div>
										</div>
									</div>
									</div><!-- --/tab-pane ---->
								</div><!-- /tab-content -->
							
							</div><!-- --/panel-body ---->
							
						</div><!-- /col-lg-12 -->
					</div>
		</section>
	</section>
</section>

<div class="modal fade" id="updateAccount" tabindex="-1" role="dialog" aria-labelledby="Editinfo" aria-hidden="true">
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
	
<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="changePic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="changePic">{{showEventList.event_title | capitalize}}</h4>
      </div>
      <div class="modal-body">
      		<h3>{{showEventList.event_date | date}}</h3>
        	<p>{{showEventList.event_description}}</p>
      </div>
      <div class="modal-body">
        	<h5>Comments</h5>
      </div>
      <div class="modal-body" ng-repeat="list in commentList" ng-mouseover="showOptions(list)">
        	<p style="color: blue;"><img src="<?php echo base_url('assets/pictures/') ?>/{{list.picture}}" width="50" height="50"> {{list.fname | capitalize}} {{list.mname | capitalize}} {{list.lname}} {{list.extention_name}} <br> <h6>{{list.comment_event_date | date}} <a href class="editEventComment_{{list.comment_event_id}}" id="editEvent" ng-click="editEventOpt(list)">Edit</a> <a href class="deleteEventComment_{{list.comment_event_id}}" id="deleteEvent" ng-click="deleteEventOption(list)">Delete</a></h6></p>
        	<h5 style="margin-left: 60px;">{{list.comment_event_details}}</h5>
      </div>
      <div class="modal-body">
      	<form ng-submit="addCommentEvent()">
      		<input type="hidden" ng-model="addComment.event_id">
      		<input type="text" ng-model="addComment.comment_event_details" placeholder="Comment Here and Press Enter..." class="form-control">
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default">Close</button>
      </div>
    </div>
  </div>
</div>

 <div class="modal fade" id="editEventOption" tabindex="-1" role="dialog" aria-labelledby="Editinfo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form ng-submit="updateEventComment()">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="Editinfo">Edit Comment</h4>
      </div>
      <div class="modal-body">
        	<input type="text" ng-model="editEventComment.comment_event_details" class="form-control">
        	<input type="hidden" ng-model="editEventComment.comment_event_id">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Done</button>
      </div>
     </form>
    </div>
  </div>
</div>

<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="Editinfo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form ng-submit="sendMessage()">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="Editinfo">Send a Message</h4>
      </div>
      <div class="modal-body">
    	<input type="text" ng-model="message.nameUser" class="form-control" placeholder="Type the name of the alumni" ng-change="searchUser()">
  		<ul class="list-group user-list">
  			<li style="cursor: pointer" dir-paginate="list in userList | filter: message.nameUser | itemsPerPage: 5" ng-click="userData(list)"><img src="<?php echo base_url('assets/pictures') ?>/{{list.picture}}" width="50" height="50"> {{list.fname | capitalize}} {{list.mname | capitalize}} {{list.lname | capitalize}} {{list.extention_name | capitalize}}</li>
  		</ul>
  		<div class="col-md-12 mb">
	        <div class="row">
	          <dir-pagination-controls></dir-pagination-controls>
	        </div>
	      </div>
  		<input type="hidden" ng-model="message.user_two">
  		<textarea ng-model="message.reply" class="form-control" placeholder="Say something..."></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
     </form>
    </div>
  </div>
</div>
<div class="modal fade" id="news" tabindex="-1" role="dialog" aria-labelledby="changePic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="changePic">{{showNewsList.news_title | capitalize}}</h4>
      </div>
      <div class="modal-body">
      		<h3>{{showNewsList.news_date | date}}</h3>
        	<p>{{showNewsList.news_description}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteEventOption" tabindex="-1" role="dialog" aria-labelledby="Editinfo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="Editinfo">Delete Comment</h4>
      </div>
      <div class="modal-body">
        	<label>Are you sure you want to delete this?</label>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" ng-click="deleteEventComment(deleteEventPrepare)">Yes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="messageSucees" tabindex="-1" role="dialog" aria-labelledby="Editinfo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="Editinfo">Message Prompt</h4>
      </div>
      <div class="modal-body">
        	<label>Message Successfully Sent!</label>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Done</button>
      </div>
    </div>
  </div>
</div>

	<script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-fileupload.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angular.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-sanitize.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-strap.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-strap.tpl.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/graduate.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/graduateFactory.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/graduateDirective.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/graduateController.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/dirPagination.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/loading-bar.js') ?>"></script>

    <script type="text/javascript">
		$(document).ready(function(){

			$('.graduate-page-header').fadeIn(2000, function(){
				$('.gradaute-page-body').fadeIn(2000);
			});
		});
	</script>
</body>
</html>