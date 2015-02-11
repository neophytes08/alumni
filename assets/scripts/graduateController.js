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
			// event list
			$scope.eventList = function eventList(){
				console.log('events');
				$http.get(getUrl.url + '/listCtrl/eventList')
				.success(function onSuccess(response){
					$scope.listEvent = response;
				});
			}
			// show evet
			$scope.showEventList = {}
			$scope.addComment = {};
			$scope.showEvent = function showEvent(list){
				$scope.showEventList = list
				$scope.addComment.event_id = list.event_id;
				$http.get(getUrl.url + '/listCtrl/listEventComment/' + list.event_id)
				.success(function onSuccess(response){
					console.log(response);
					$scope.commentList = response;
				});
			}
			// add comment event
			$scope.addCommentEvent = function addCommentEvent(){
				console.log($scope.addComment);

				$http.post(getUrl.url + '/addCtrl/addCommentEvent', $scope.addComment)
				.success(function onSuccess(response){
					$scope.commentList = response;
					$scope.addComment.comment_event_details = ""; 
				})
			}
			// show options
			$scope.showOptions = function showOptions(list){
				// console.log(list);
				var id = $('.user_id').attr('data-user');
				console.log(id);

				if(id == list.user_id)
				{
					console.log('options');
					$('.editEventComment_' + list.comment_event_id).show();
					$('.deleteEventComment_' + list.comment_event_id).show();
				}
				else
				{
					console.log('none');
					$('.editEventComment_' + list.comment_event_id).hide();
					$('.deleteEventComment_' + list.comment_event_id).hide();
				}
			}
			// edit event comment
			$scope.editEventOpt = function editEventOpt(list){
				$scope.editEventComment = list;
				console.log(list);
				$('#editEventOption').modal('show');
			}
			// update event comment
			$scope.updateEventComment = function updateEventComment(){

				console.log($scope.editEventComment);

				$http.post(getUrl.url + '/updateCtrl/updateEventComment', $scope.editEventComment)
				.success(function onSuccess(response){
					$scope.commentList = response;
					$('#editEventOption').modal('hide');
				})
			}
			// delete prompt
			$scope.deleteEventOption = function deleteEventOption(list){
				$scope.deleteEventPrepare = list;
				$('#deleteEventOption').modal('show');
			}
			// delete comment
			$scope.deleteEventComment = function deleteEventComment(list){

				$http.get(getUrl.url + '/deleteCtrl/deleteEventComment/' + list.comment_event_id);
				$scope.commentList.splice($scope.commentList.indexOf(list),1);
				$('#deleteEventOption').modal('hide');

			}

			// get news
			$scope.newsList = function newsList(){

				$http.get(getUrl.url + '/listCtrl/newsList')
				.success(function onSuccess(response){
					$scope.listNews = response;
				});
			}
			// show news
			$scope.showNews = function showNews(list){
				$scope.showNewsList = list
			}
			$scope.message = {};
			// search user
			$scope.searchUser = function searchUser(){
				$http.get(getUrl.url + '/listCtrl/getUsers')
				.success(function onSuccess(response){
					$scope.userList = response;
					console.log(response);
				});
			}
			// get users
			$scope.getUsers = function getUsers(){
				$http.get(getUrl.url + '/listCtrl/getUsers')
				.success(function onSuccess(response){
					$scope.userList = response;
				});
			}
			// user data for messaage
			$scope.userData = function userData(list){
				$scope.message.nameUser = list.fname + ' ' + list.mname + ' ' + list.lname + ' ' + list.extention_name;
				$scope.message.user_two = list.user_id;
			}
			// get message list
			$scope.messageDataList = function messageList(){

				$http.get(getUrl.url + '/listCtrl/messageList/')
				.success(function onSuccess(response){
					$scope.messageList = response;
				});
			}
			// send message
			$scope.sendMessage = function sendMessage(){
				console.log($scope.message);

				$http.post(getUrl.url + '/addCtrl/addMessage/', $scope.message)
				.success(function onSuccess(response){
					console.log(response);
					$('#messageSucees').modal('show');
					$('#message').modal('hide');
					$scope.message = "";
					$scope.messageDataList();
				});
			}
			// view message
			$scope.viewMessages = function viewMessages(list){

				$http.get(getUrl.url + '/listCtrl/messageSpecificList/' + list.conversation_id)
				.success(function onSuccess(response){
					$scope.messageView = response;
					$scope.newMessage = response[0];
					$('#custom-message-show').show(500);
				});
			}
			// reply
			$scope.replyMessage = function replyMessage(){
				console.log($scope.newMessage);

				$http.post(getUrl.url + '/addCtrl/replyData', $scope.newMessage)
				.success(function onSuccess(response){
					console.log(response);
					$scope.messageView = response;
					$scope.newMessage = response[0];
				});
			}
			// delete message
			$scope.deleteMessage = function deleteMessage(list){
				$http.get(getUrl.url + '/deleteCtrl/deleteMessage/' + list.cr_id);
				$scope.messageView.splice($scope.messageView.indexOf(list),1);
			}
			// delete convo
			$scope.deleteConvo = function deleteConvo(list){
				$http.get(getUrl.url + '/deleteCtrl/deleteConvo/' + list.conversation_id);
				$scope.messageList.splice($scope.messageList.indexOf(list),1);
			}
			$scope.messageDataList();
			$scope.newsList();
			$scope.eventList();
			$scope.countSurvey();
			$scope.getEmployment();
			// $scope.year();
			$scope.getUser();
			// $scope.updateProfileTrigger();
			// $scope.getPokeSurvey();
			$scope.getCourse();
		}
	]);