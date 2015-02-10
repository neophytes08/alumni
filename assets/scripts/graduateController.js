graduate
	.controller('infoController',[
		"$scope",
		"$http",
		"getUrl",
		function controller($scope, $http, getUrl){
			
			$scope.editGraduateWholeInfo = {};
			
			$scope.hideSurvey = function hideSurvey(){
				$('.survey-box').fadeOut(500);
			}

			$scope.takeSurvey = function takeSurvey(){
					console.log('take');
					$('.survey-box').fadeIn(500);
				// });
			}
			// get course name
			$scope.getCourse = function getCourse(){

				$http.get(getUrl.url + '/listCtrl/getCourseList')
				.success(function onSuccess(response){
					$scope.courseList = response;
				});
			}
			// submit survey
			$scope.SubmitSurvey = function SubmitSurvey(){
				console.log($scope.employment);

				// $http.post(getUrl.url + '/surveyCtrl/SubmitSurvey', $scope.survey)
				// .success(function onSuccess(response){
				// 	console.log(response);
				// 	$('.survey-box').hide(500);
				// 	$('.survey-list').show();
				// 	$('.submit-box-yes').fadeOut(500);
				// 	$('.submit-box-no').fadeOut(500);
				// 	$('.survey-done').fadeIn(500);
				// });
			}
			// getSurvey
			$scope.getPokeSurvey = function getPokeSurvey(){
				$http.get(getUrl.url + '/listCtrl/getPokeSurvey')
				.success(function onSuccess(response){
					console.log(response);
					if(response.stat == 0)
					{
						$('.survey-exist').fadeIn(1000);
						$('.survey-list').show();
					}
					else if(response.stat == 1)
					{
						$('.survey-notexist').fadeIn(1000);
						$('.survey-list').hide();
					}
				});
			}
			// edit profile
			$scope.infos = {};
			$scope.editProf = function editProf(list){
				console.log(list);
				$scope.infos = list;
				$scope.year();
			}
			// profile update trigger
			$scope.updateProfileTrigger = function updateProfileTrigger(){

				$http.get(getUrl.url + '/listCtrl/updateProfileTrigger/')
				.success(function onSuccess(response){
					if(response.stat === 1)
					{

						$scope.getUser
						$scope.year();
						$('#updateProfile').modal('show');
					}
				});
			}
			// gert whole information
			$scope.getUser = function getUser(){

				$http.get(getUrl.url + '/listCtrl/getGraduateWholeSpecificInfo/')
					.success(function onSuccess(response){
						$scope.infoList = response;
					});
			}
			// get year
			$scope.year = function year(){
				$http.get(getUrl.url + '/listCtrl/getYear')
				.success(function onSuccess(response){
					$scope.yearList = response;
				});
			}
			// update profile info
			$scope.updateInfo = {};
			$scope.employment = {};
			$scope.employment.employment_id = 0;
			$scope.updateProfileInfo = function updateProfileInfo(){

				console.log($scope.updateInfo);
				$http.post(getUrl.url + '/updateCtrl/updateProfileInfo', $scope.updateInfo)
				.success(function onSuccess(response){
					if(response == true)
					{
						// $scope.getUser();
						// $('#updateProfile').modal('hide');
					}
				});
			}
			// update employment
			$scope.updateEmployment = function updateEmployment(){
				
				console.log($scope.employment);

				$http.post(getUrl.url + '/updateCtrl/updateEmployment', $scope.employment)
				.success(function onSuccess(response){

				});

			}
			// search
			$scope.searchOthers = function searchOthers(){
				console.log($scope.employment.employment_position);

				$http.post(getUrl.url + '/listCtrl/listOthers', $scope.employment)
				.success(function onSuccess(response){
					console.log(response)
					$scope.result = response;
				})
			}
			// get obe name
			$scope.getObeValue = function getObeValue(list){
				console.log(list);

				$scope.employment.employment_position = list.obe_name;
			}
			// yes survey
			$scope.yesSurvey = function yesSurvey(){
				$http.get(getUrl.url + '/listCtrl/getSpecialization/')
				.success(function onSuccess(response){
					console.log(response.special);
					console.log(response.survey);
					$scope.specialization = response.special;
					// $scope.survey.survey_id = response.survey;
					$('.yes-survey').fadeIn(500);
					$('.no-survey').fadeOut(500);
					$('.submit-box-yes').fadeIn(500);
					$('.submit-box-no').fadeOut(500);
				});
			}
			// no survey
			$scope.noSurvey = function noSurvey(){
				$http.get(getUrl.url + '/listCtrl/getSpecialization/')
				.success(function onSuccess(response){
					console.log(response.special);
					console.log(response.survey);
					$scope.specialization = response.special;
					// $scope.survey.survey_id = response.survey;
					$('.yes-survey').fadeOut(500);
					$('.no-survey').fadeIn(500);
					$('.submit-box-no').fadeIn(500);
					$('.submit-box-yes').fadeOut(500);
				});
			}
			// others
			$scope.others = function others(){
				$('.others').fadeIn(500);
			}
			// get employment
			$scope.getEmployment = function getEmployment(){
				$http.get(getUrl.url + '/listCtrl/getEmployment')
				.success(function onSuccess(response){
					if(response == 0)
					{
						// toast('No employment record yet!', 3000);
					}
					else
					{
						$scope.employment = response;
					}
				});
			}
			// get
			// get elementary
			$scope.getElementary = function getElementary(list){

				// console.log(list);
				$http.get(getUrl.url + '/listCtrl/getElementary/' + list.user_id)
				.success(function onSuccess(response){
					console.log(response);
					$scope.elementaryList = response;
				});
			}
			// get secondary
			$scope.getSecondary = function getSecondary(list){
				$http.get(getUrl.url + '/listCtrl/getSecondary/' + list.user_id)
				.success(function onSuccess(response){
					console.log(response);
					$scope.secondaryList = response;
				});
			}
			// get tertiary
			$scope.getTertiary = function getTertiary(list){
				$http.get(getUrl.url + '/listCtrl/getTertiary/' + list.user_id)
				.success(function onSuccess(response){
					console.log(response);
					$scope.tertiaryList = response;
				});
			}
			// updates
			$scope.updateUser = function updateUser(){
				$('.user-loading').show();
				$('.user-check').fadeOut(500);
				$http.post(getUrl.url + '/updateCtrl/updateUserInfo', $scope.user)
				.success(function onSuccess(response){
					console.log(response);
					$('.userInfo').slideUp(500);
					$('.user-loading').fadeOut();
					$('.user-check').fadeIn(500);
				});
			}
			$scope.updatePersonal = function updatePersonal(){
				$http.post(getUrl.url + '/updateCtrl/updatePersonalInfo', $scope.infoList)
				.success(function onSuccess(response){
					console.log(response);
					$scope.getUser();
				});
			}
			$scope.updateElementary = function updateElementary(){
				console.log($scope.elementaryList);
				$http.post(getUrl.url + '/updateCtrl/updateElementary', $scope.elementaryList)
				.success(function onSuccess(response){
					console.log(response);
					$scope.getElementary(response);
				});
			}
			$scope.updateSecondary = function updateSecondary(){
				console.log($scope.secondaryList);
	
				$http.post(getUrl.url + '/updateCtrl/updateSecondary', $scope.secondaryList)
				.success(function onSuccess(response){
					console.log(response);
				});
			}
			$scope.updateTertiary = function updateTertiary(list){
				console.log(list);
				$http.post(getUrl.url + '/updateCtrl/updateTertiary', list)
				.success(function onSuccess(response){
					console.log(response);
				});
			}
			// animations
			$scope.showUser = function showUser(){
				$('.userInfo').slideToggle(500);
				$http.get(getUrl.url + '/listCtrl/getUserAccount')
				.success(function onSuccess(response){
					$scope.user = response;
				});
			}
			$scope.showPersonal = function personal(){
				$('.personalInfo').slideToggle(500);
			}
			$scope.showContact = function contactInfo(){
				$('.contactInfo').slideToggle(500);
			}
			$scope.showElementary = function showElementary(){
				$('.elementaryInfo').slideToggle(500);
			}
			$scope.showSecondary = function showSecondary(){
				$('.secondaryInfo').slideToggle(500);
			}
			$scope.showTertiary = function showTertiary(){
				$('.tertiaryInfo').slideToggle(500);
			}

			// survey count answer
			$scope.countSurvey = function countSurvey(){

				$http.get(getUrl.url + '/surveyCtrl/getSurveyCount')
				.success(function onSuccess(response){
					console.log(response);

					$scope.countedSurvey = response.countedSurvey;
					$scope.countedMy = response.countedMySurvey;
				});
			}
			// 
			$scope.countSurvey();
			$scope.getEmployment();
			// $scope.year();
			$scope.getUser();
			// $scope.updateProfileTrigger();
			// $scope.getPokeSurvey();
			$scope.getCourse();
		}
	]);