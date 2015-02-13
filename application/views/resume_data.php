<html ng-app="login">
<head>
	<title> Information Details</title>
	<link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">
</head>
<style type="text/css">
	/*custom font*/
/*@import url(http://fonts.googleapis.com/css?family=Montserrat);*/

/*basic reset*/
* {margin: 0; padding: 0;}

html {
	/*Image only BG fallback*/
	/*background = gradient + image pattern combo*/
	

}

body {
	font-family: montserrat, arial, verdana;
	background-color: transparent;
	background: url(../../assets/img/bg-resume.jpg) no-repeat center center;
    background-size: 100%;
    background-attachment: fixed!important;
}
/*form styles*/
#msform {
	width: 500px;
	margin: 50px auto;
	text-align: center;
	position: relative;
}
#msform fieldset {
	background: white;
	border: 0 none;
	border-radius: 3px;
	box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
	padding: 20px 30px;
	
	box-sizing: border-box;
	width: 80%;
	margin: 0 10%;
	
	/*stacking fieldsets above each other*/
	position: absolute;
}
/*Hide all except first fieldset*/
#msform fieldset:not(:first-of-type) {
	display: none;
}
/*inputs*/
#msform input, #msform textarea, #msform select {
	padding: 15px;
	border: 1px solid #ccc;
	border-radius: 3px;
	margin-bottom: 10px;
	width: 100%;
	box-sizing: border-box;
	font-family: montserrat;
	color: #2C3E50;
	font-size: 13px;
}
/*buttons*/
#msform .action-button {
	width: 100px;
	background: #1A1851;
	font-weight: bold;
	color: white;
	border: 0 none;
	border-radius: 1px;
	cursor: pointer;
	padding: 10px 5px;
	margin: 10px 5px;
}
#msform .action-button:hover, #msform .action-button:focus {
	box-shadow: 0 0 0 2px white, 0 0 0 3px #FCB316;
}
/*headings*/
.fs-title {
	font-size: 15px;
	text-transform: uppercase;
	color: #2C3E50;
	margin-bottom: 10px;
}
.fs-subtitle {
	font-weight: normal;
	font-size: 13px;
	color: #666;
	margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
	margin-bottom: 30px;
	overflow: hidden;
	/*CSS counters to number the steps*/
	counter-reset: step;
}
#progressbar li {
	list-style-type: none;
	color: white;
	text-transform: uppercase;
	font-size: 9px;
	width: auto;
	float: left;
	position: relative;
}
#progressbar li:before {
	content: counter(step);
	counter-increment: step;
	width: 100px;
	line-height: 20px;
	display: block;
	font-size: 10px;
	color: #333;
	background: white;
	border-radius: 3px;
	margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
	content: '';
	width: 100%;
	height: 2px;
	background: white;
	position: absolute;
	left: -50%;
	top: 9px;
	z-index: -1; /*put it behind the numbers*/
}
#progressbar li:first-child:after {
	/*connector not needed before the first step*/
	content: none; 
}
/*marking active/completed steps green*/
/*The number of the step and the connector before it = green*/
#progressbar li.active:before,  #progressbar li.active:after{
	background: #27AE60;
	color: white;
}

</style>
<body ng-controller="dateCtrl" login>
	<!-- multistep form -->
<div id="msform">
	<div>
		<a href="<?php echo base_url('index.php/loginctrl') ?>" class="btn btn-danger" style="margin-bottom: 20px;">Cancel Signup</a>
	</div>
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Personal Information</li>
		<li>Elementary Background</li>
		<li>Secondary Background</li>
		<li>Tertiary Background</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Give us your Personal Information</h2>
		<h3 class="fs-subtitle">This is step 1</h3>
		<input type="text" placeholder="First Name" ng-model="basic.fname"/>
		<input type="text" placeholder="Middle Name" ng-model="basic.mname"/>
		<input type="text" placeholder="Last Name" ng-model="basic.lname"/>
		<select ng-model="update.extention_name">
			<option selected disabled>Extention Name</option>
			<option value="Sr">Sr.</option>
			<option value="Jr">Jr.</option>
		</select>
		<input type="text" placeholder="Birdate" ng-model="basic.birthdate" bs-datepicker/>
		<div style="float: left;">
		<label for="male">Male</label>
		<input type="radio" id="male" value="Male" ng-model="basic.gender">
		<br>
		<label for="female">Female</label>
		<input type="radio" id="female" value="Female" ng-model="basic.gender">
		</div>
		<input type="text" placeholder="Street" ng-model="basic.street"/>
		<input type="text" placeholder="Barangay" ng-model="basic.barangay"/>
		<input type="text" placeholder="City" ng-model="basic.city"/>
		<input type="text" placeholder="Province" ng-model="basic.province"/>
		<input type="text" placeholder="Mobile No." ng-model="basic.mobile_no"/>
		<input type="text" placeholder="Telephone No." ng-model="basic.tele_no"/>
		<input type="email" placeholder="Email Address" ng-model="basic.email"/>
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Elementary Profile</h2>
		<h3 class="fs-subtitle">This information is highly NEEDED</h3>
		<input type="text" placeholder="School Name" ng-model="elementary.school_name_elementary"/>
		<input type="text" placeholder="School Address" ng-model="elementary.school_address_elementary"/>
		<br>
		<label>Year Graduated</label>
		<br>
		<select ng-model="tertiary.year_graduated_elementary" class="form-control">
			<option ng-repeat="list in yearList" value="{{list.year_name}}">{{list.year_name | capitalize}}</option>
		</select>
		<input type="text" placeholder="Awards Received" ng-model="elementary.awards_received_elementary"/>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Secondary Profile</h2>
		<h3 class="fs-subtitle">This information is highly NEEDED</h3>
		<input type="text" placeholder="School Name" ng-model="secondary.school_name_secondary"/>
		<input type="text" placeholder="School Address" ng-model="secondary.school_address_secondary"/>
		<br>
		<label>Year Graduated</label>
			<select ng-model="tertiary.year_graduated_secondary" class="form-control">
				<option ng-repeat="list in yearList" value="{{list.year_name}}">{{list.year_name | capitalize}}</option>
			</select>
		</br>
		<input type="text" placeholder="Awards Received" ng-model="secondary.awards_received_secondary"/>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
	<form ng-repeat="forms in formsDatas">
		<h2 class="fs-title" ng-cloak>{{forms.name}}</h2>
		<h3 class="fs-subtitle">This much very important information</h3>
		<div class="formRepeats" ng-repeat="tertiary in forms.dataForm">
		<select ng-model="tertiary.academic_level_tertiary" class="degree_data">
			<option selected disabled>Academic Level</option>
			<option value="Vocational">Vocational</option>
			<option value="College">College</option>
			<option value="Graduate">Graduate</option>
			<option value="Post Graduate">Post Graduate</option>
		</select>
		<select ng-model="tertiary.degree_tertiary" class="degree_data">
			<option selected disabled> Degree </option>
			<option ng-repeat="list in courseList" value="{{list.course_id}}">{{list.course_name | capitalize}}</option>
		</select>
		<div class="input-year">
			<label>Year Started</label>
			<br>
			<select ng-model="tertiary.year_from_tertiary" class="form-control">
				<option ng-repeat="list in yearList" value="{{list.year_name}}">{{list.year_name | capitalize}}</option>
			</select>
			<br>
			<label>Year Ended</label>
			<select ng-model="tertiary.year_to_tertiary" class="form-control">
				<option ng-repeat="list in yearList" value="{{list.year_name}}">{{list.year_name | capitalize}}</option>
			</select>
			<br>
			<label>Year Graduated</label>
			<select ng-model="tertiary.year_graduated_tertiary" class="form-control">
				<option ng-repeat="list in yearList" value="{{list.year_name}}">{{list.year_name | capitalize}}</option>
			</select>
		</div>
		<input type="text" placeholder="Awards Received" ng-model="tertiary.awards_received_tertiary" class="degree_data">
		<input type="text" placeholder="Thesis Project" ng-model="tertiary.thesis_project_tertiary" class="degree_data">
		</div>
		<input type="button" name="add-row" class="add-row action-button" ng-click="addRow(forms)" value="Add Row"/>
		<input type="button" name="submit" class="submit action-button" ng-click="submitData(forms)" value="Submit"/>
	</form>
		<input type="button" name="previous" class="previous action-button" value="Previous"/>
	</fieldset>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js') ?>" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="<?php echo base_url('assets/js/jquery.easing.min.js') ?>" type="text/javascript"></script>
<!-- angular -->

<script type="text/javascript" src="<?php echo base_url('assets/js/angular.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/dirPagination.js') ?>"></script>
<script src="<?php echo base_url('assets/js/angularstrap/angular-sanitize.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/angularstrap/angular-strap.js') ?>"></script>
<script src="<?php echo base_url('assets/js/angularstrap/angular-strap.tpl.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/login.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/loginFactory.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/loginDirective.js') ?>"></script>
<script src="<?php echo base_url('assets/scripts/loginController.js') ?>"></script>

<script type="text/javascript">
	$(document).ready(function(){
		//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})

	})
</script>	
</body>
</html>