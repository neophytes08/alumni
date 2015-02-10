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
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
</head>
<body info ng-controller="dateCtrl">

<section id="container" >
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
							<div class="right-divider hidden-sm hidden-xs">
								<h4 ng-cloak>{{countedMy.countMySurvey}} out of {{countedSurvey.countSurvey}}</h4>
								<h6>Survey Answered</h6>
								<div class="row">
								
								</div>
							</div>
						</div><!-- --/col-md-4 ---->
						
						<div class="col-md-4 profile-text">
							<h3 ng-cloak>{{infoList.fname | capitalize}} {{infoList.mname | capitalize}} {{infoList.lname | capitalize}} {{infoList.extention_name}}</h3>
							<h6>Currently log in as {{infoList.username}}, {{date | date}}</h6>
							<p class="survey-exist" ng-cloak>Hello {{infoList.username}}! Survey is currently active this time.</p>
							<p class="survey-notexist" ng-cloak>Hello {{infoList.username}}! There is no survey at this time.</p>
							<br>
							<p><button class="btn btn-theme"><i class="fa fa-envelope"></i> Send Message to Admin</button></p>
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
												  <input name="gender" id="genderMale" type="radio" value="Male" ng-model="infoList.gender" ng-checked="infoList.gender = 'Male'">
						                          <label for="genderMale">Male</label>
						                          <br>
						                          <input name="gender" id="genderFemale" type="radio" value="Female" ng-model="infoList.gender" ng-checked="infoList.gender = 'Female'">
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
											</div><!-- --/col-md-6 ---->
											
											<div class="col-md-6 detailed">
												<h4>My Information</h4>
												<div class="row mt mb">
													<div class="activity-panel">
														<h5>Basic Information</h5>
														<p>Name: <strong>{{infoList.fname | capitalize}} {{infoList.mname | capitalize}} {{infoList.lname | capitalize}} {{infoList.extention_name}}</strong></p>
														<p>Birthday: <strong>{{infoList.birthdate | date}}</strong></p>
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
							                            <input type="text" class="form-control" placeholder="Year Graduated..." bs-datepicker ng-model="elementaryList.year_graduated_elementary">
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
													<p>Year Graduated: <strong>{{elementaryList.year_graduated_elementary | date}}</strong></p>
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
						                            <input type="text" class="form-control" placeholder="Year Graduated..." bs-datepicker ng-model="secondaryList.year_graduated_secondary">
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
													<p>Year Graduated: <strong>{{secondaryList.year_graduated_secondary | date}}</strong></p>
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
													<input type="text" class="form-control" placeholder="From..." bs-datepicker ng-model="list.year_from_tertiary">
													To
													<input type="text" class="form-control" placeholder="To..." bs-datepicker ng-model="list.year_to_tertiary">
						                            <br>
						                            <input type="text" class="form-control" placeholder="Year Graduated" bs-datepicker ng-model="list.year_graduated_tertiary">
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
													<p>School Attended: <strong>{{list.year_from_tertiary | date}} to {{list.year_to_tertiary | date}}</strong></p>
													<p>Year Graduated: <strong>{{list.year_graduated_tertiary | date }}</strong></p>
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
													<input type="text" name="startDate" class="form-control" ng-model="employment.employment_duration_from" placeholder="From" bs-datepicker ng-required="true" />
											     	<br>
											     	<input type="text" name="endDate" class="form-control" ng-model="employment.employment_duration_to" placeholder="Until" bs-datepicker/>
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
													<p>Employment Duration: <strong>{{employment.employment_duration_from | date}} <strong>to</strong> {{employment.employment_duration_to | date}}</strong></p>
												</div>
											</div><!-- --/col-md-6 ---->
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

 <div class="modal fade" id="survey-noti" tabindex="-1" role="dialog" aria-labelledby="Editinfo" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="Editinfo">Hello Graduate!</h4>
      </div>
      <div class="modal-body">
        <p style="text-indent: 20px!important;">Please complete this Graduate Tracer Study questionnaire as accurately and frankly as possible by filling and checking the box corressponding to your response. Your answer will be used for research purposes in order to assesss graduate employability and eventually, improve course offerings of your alma mater, the Mindanao University of Science and Technology (MUST). Your answers to this survey will be treated with strictest confidentiality.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" ng-click="takeSurvey()">Take Survey</button>
      </div>
    </div>
  </div>
</div>
 <div class="modal fade" id="changePic" tabindex="-1" role="dialog" aria-labelledby="changePic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="changePic">Change Profile Picture</h4>
      </div>
      <div class="modal-body">
        	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Upload</button>
      </div>
    </div>
  </div>
</div>

 <div class="modal fade" id="updateProfile" tabindex="-1" role="dialog" aria-labelledby="updateProfile" aria-hidden="true">
  <div class="modal-dialog large-modal">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="updateProfile">Please update your profile to be able to use your Account.</h4>
      </div>
      <form role="form" class="form-horizontal" ng-submit="updateProfileInfo()">
      <div class="modal-body">
        	<div class="row">
        	<div class="col-lg-8 col-lg-offset-2 detailed">
			<h4 class="mb personal">Personal Information </h4>
			<div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">First Name</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="c-name" class="form-control" type="text" ng-model="updateInfo.fname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Middle Name</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="lives-in" class="form-control" type="text" ng-model="updateInfo.mname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last Name</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="country" class="form-control" type="text" ng-model="updateInfo.lname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Extention Name</label>
                    <div class="col-lg-6">
                         <select class="disabled form-control" style="width: 200px!important;" ng-model="updateInfo.extention_name">
			                <option value=" " ng-selected="updateInfo.extention_name == ' '"></option>
			                <option value="Sr" ng-selected="updateInfo.extention_name == 'Sr'">Sr.</option>
			                <option value="Jr" ng-selected="updateInfo.extention_name == 'Jr'">Jr.</option>
			              </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Gender</label>
                    <div class="col-lg-6">
                        <div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" id="optionsRadios1" ng-model="updateInfo.gender" value="Male">
						    Male
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" id="optionsRadios2" ng-model="updateInfo.gender" value="Female">
						    Female
						  </label>
						</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Citizenship</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="country" class="form-control" type="text" ng-model="updateInfo.citizenship">
                    </div>
                </div>
                <div class="form-group" ng-class="{'has-error': datepickerForm.date.$invalid}">
                	<label class="col-lg-3 control-label">Birthday</label>
               		<div class="col-lg-6">
			        	<input type="text" class="form-control edit-group" bs-datepicker style="width: 158px!important;" placeholder="Birthday" ng-model="updateInfo.birthdate" required>
			     	 </div>
                </div>
            </div>
		</div>
		
		<div class="col-lg-8 col-lg-offset-2 detailed mt">
			<h4 class="mb contact">Contact Information </h4>
			<div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Street</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="addr1" class="form-control" type="text" ng-model="updateInfo.street">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Barangay</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="addr2" class="form-control" type="text" ng-model="updateInfo.barangay">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">City</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="phone" class="form-control" type="text" ng-model="updateInfo.city">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Province</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="cell" class="form-control" type="text" ng-model="updateInfo.province">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="email" class="form-control" type="text" ng-model="updateInfo.email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Mobile</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="skype" class="form-control" type="text" ng-model="updateInfo.mobile_no">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Telephone</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="skype" class="form-control" type="text" ng-model="updateInfo.tele_no">
                    </div>
                </div>
            </div>
		</div><!-- --/col-lg-8 ---->
		<div class="col-lg-8 col-lg-offset-2 detailed mt">
			<h4 class="mb elementary">Elementary </h4>
			<div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">School</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="addr1" class="form-control" type="text" ng-model="updateInfo.school_name_elementary">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Address</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="addr2" class="form-control" type="text" ng-model="updateInfo.school_address_elementary">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Year Graduated</label>
                    <div class="col-lg-6">
                    	<input type="text" class="form-control edit-group" bs-datepicker ng-model="updateInfo.year_graduated_elementary" required>
			     	</div>
			     	<!-- <select ng-model="updateInfo.year_graduated_elementary" class="form-control edit-group" style="width: 250px!important;">
			     		<option ng-cloak ng-repeat="list in yearList" ng-selected="updateInfo.year_graduated_elementary == list.year_name" value="{{list.year_name}}">{{list.year_name}}</option>
			     	</select> -->
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Awards Received</label>
                    <div class="col-lg-6">
                        <textarea class="form-control" ng-model="updateInfo.awards_received_elementary"></textarea>
                    </div>
                </div>
            </div>
		</div>
		<div class="col-lg-8 col-lg-offset-2 detailed mt">
			<h4 class="mb secondary">Secondary </h4>
			<div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">School</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="addr1" class="form-control" type="text" ng-model="updateInfo.school_name_secondary">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Address</label>
                    <div class="col-lg-6">
                        <input placeholder=" " id="addr2" class="form-control" type="text" ng-model="updateInfo.school_address_secondary">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Year Graduated</label>
			       	<div class="col-lg-6">
			       		<input type="text" class="form-control edit-group" bs-datepicker ng-model="updateInfo.year_graduated_secondary" required>
			     	</div>
			     	<!-- <select ng-model="updateInfo.year_graduated_secondary" class="form-control edit-group" style="width: 250px!important;">
			     		<option ng-cloak ng-repeat="list in yearList" ng-selected="updateInfo.year_graduated_secondary == list.year_name" value="{{list.year_name}}">{{list.year_name}}</option>
			     	</select> -->
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Awards Received</label>
                    <div class="col-lg-6">
                        <textarea class="form-control" ng-model="updateInfo.awards_received_secondary"></textarea>
                    </div>
                </div>
            </div>
		</div>
		<div class="col-lg-8 col-lg-offset-2 detailed mt">
			<h4 class="mb tertiary">Tertiary </h4>
			<div>
          		<div class="form-group">
                    <label class="col-lg-3 control-label">Academic Level</label>
                    <select ng-model="updateInfo.academic_level_tertiary" class="form-control" style="width: 230px!important;">
                    	<option ng-selected="updateInfo.academic_level_tertiary == 'Vocational'" value="Vocational">Vocational</option>
                    	<option ng-selected="updateInfo.academic_level_tertiary == 'College'" value="College">College</option>
                    	<option ng-selected="updateInfo.academic_level_tertiary == 'Graduate'" value="Graduate">Graduate</option>
                    	<option ng-selected="updateInfo.academic_level_tertiary == 'Post Graduate'" value="Post Graduate">Post Graduate</option>
                    </select>
                 </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Degree</label>
		        	<select ng-model="updateInfo.degree_tertiary" class="form-control" style="width: 250px!important;">
		        		<option ng-repeat="list in courseList" value="{{list.course_id}}">{{list.course_name | capitalize}}</option>
		        	</select>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">From Year</label>
                    <div class="col-lg-6">
                    	<input type="text" class="form-control edit-group" bs-datepicker ng-model="updateInfo.year_from_tertiary" required>
			     	</div>
			     	<!-- <select ng-model="updateInfo.year_from_tertiary" class="form-control edit-group" style="width: 250px!important;">
			     		<option ng-cloak ng-repeat="list in yearList" ng-selected="updateInfo.year_from_tertiary == list.year_name" value="{{list.year_name}}">{{list.year_name}}</option>
			     	</select> -->
			    </div>
			    <div class="form-group">
			     	<label class="col-lg-3 control-label">To Year</label>
			     	<div class="col-lg-6">
			     		<input type="text" class="form-control edit-group" bs-datepicker ng-model="updateInfo.year_to_tertiary" required>
			     	</div>
			     	<!-- <select ng-model="updateInfo.year_to_tertiary" class="form-control edit-group" style="width: 250px!important;">
			     		<option ng-cloak ng-repeat="list in yearList" ng-selected="updateInfo.year_to_tertiary == list.year_name" value="{{list.year_name}}">{{list.year_name}}</option>
			     	</select> -->
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Year Graduated</label>
                    <div class="col-lg-6">
                    	<input type="text" class="form-control edit-group" bs-datepicker ng-model="updateInfo.year_graduated_tertiary" required>
			     	</div>
			     	<!-- <select ng-model="updateInfo.year_graduated_tertiary" class="form-control edit-group" style="width: 250px!important;">
			     		<option ng-cloak ng-repeat="list in yearList" ng-selected="updateInfo.year_graduated_tertiary == list.year_name" value="{{list.year_name}}">{{list.year_name}}</option>
			     	</select> -->
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Awards Received</label>
			     	<textarea ng-model="updateInfo.awards_received_tertiary" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Thesis Project</label>
			     		<textarea ng-model="updateInfo.thesis_project_tertiary" class="form-control"></textarea>
                </div>
            </div>
		</div>
	</div>
  </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div> 


    <script src="<?php echo base_url('assets/js/bootstrap-fileupload.js') ?>"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url('assets/js/jquery.dcjqaccordion.2.7.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angular.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/loading-bar.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-sanitize.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-strap.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/angularstrap/angular-strap.tpl.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/graduate.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/graduateFactory.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/graduateDirective.js') ?>"></script>
    <script src="<?php echo base_url('assets/scripts/graduateController.js') ?>"></script>
    <script type="text/javascript">
		$(document).ready(function(){

			$('.graduate-page-header').fadeIn(2000, function(){
				$('.gradaute-page-body').fadeIn(2000);
			});
		});
	</script>
</body>
</html>