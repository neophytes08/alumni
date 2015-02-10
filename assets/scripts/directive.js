myadmin
		.directive('list', [
			function directive(){
				return {
					"restrict": "A",
					"scope": true,
					"controller": "listOfGraduate",
					"templateUrl": "/alumni/assets/template/list.html",
					"link": function onlink(scope, element, attributeSet){
						element.addClass("hidden");
						scope.$on('show-list' , 
						function on(){
							element.removeClass("hidden");
							$('.list').addClass('active');
						});

						scope.$on('hide', 
						function on(){
							element.addClass("hidden");
						});	
					}
				}
			}
	])
		.directive('add', [
			function directive(){
				return {
					"restrict": "A",
					"scope": true,
					"controller": "insertGraduate",
					"templateUrl": "/alumni/assets/template/add.html",
					"link": function onlink(scope, element, attributeSet){
						element.addClass("hidden");
						scope.$on('show-add' , 
						function on(){
							element.removeClass("hidden");
							$('.add').addClass('active');
						});

						scope.$on('hide', 
						function on(){
							element.addClass("hidden");
						});	
					}
				}
			}
	])
		.directive('navigator', [
			"$rootScope",
			function directive($rootScope){
				return {
					"restrict": "A",
					"scope": true,
					"link": function onlink(scope, element, attributeSet){

						scope.getDashBoard = function getDashBoard(){
							$rootScope.$broadcast('hide');
							$rootScope.$broadcast('show-dashboard');
						}
						scope.getStatistics = function getStatistics(){
							$rootScope.$broadcast('hide');
							$rootScope.$broadcast('show-statistics');
						}
						scope.getGradList = function getGradList(){
							$rootScope.$broadcast('hide');
							$rootScope.$broadcast('show-list');
						}
						scope.AddGradList = function AddGradList(){
							$rootScope.$broadcast('hide');
							$rootScope.$broadcast('show-add');
						}
						scope.Settings = function Settings(){
							$rootScope.$broadcast('hide');
							$rootScope.$broadcast('show-settings');
						}
						scope.Events = function Events(){
							$rootScope.$broadcast('hide');
							$rootScope.$broadcast('show-events');
						}
					}
				}
			}
	])
		.directive('dashboard', [
			function directive(){
				return {
					"restrict": "A",
					"scope": true,
					"controller": "activitiesController",
					"templateUrl": "/alumni/assets/template/dashboard.html",
					"link": function onLink(scope, element, attributeSet){
						element.addClass("hidden");
						scope.$on('show-dashboard' , 
							function on(){
								element.removeClass("hidden");
								$('.dashboard').addClass('active');
							});

						scope.$on('hide', 
							function on(){
								element.addClass("hidden");
								$('.dashboard').removeClass('active');
							});	
					}
				}
			}
	])
		.directive('statistics', [
			function directive(){
				return {
					"restrict": "A",
					"scope": true,
					"controller": "statisticsController",
					"templateUrl": "/alumni/assets/template/statistical.html",
					"link": function onlink(scope, element, attributeSet){
						element.addClass("hidden");
						scope.$on('show-statistics' , 
							function on(){
								element.removeClass("hidden");
								$('.stat').addClass('active');
							});

						scope.$on('hide', 
							function on(){
								element.addClass("hidden");
								$('.stat').removeClass('active');
							});	
					}
				}
			}
	])
		.directive('settings', [
			function directive(){
				return {
					"restrict": "A",
					"scope": true,
					"controller": "settingsController",
					"templateUrl": "/alumni/assets/template/settings.html",
					"link": function onlink(scope, element, attributeSet){
						element.addClass("hidden");
						scope.$on('show-settings' , 
							function on(){
								element.removeClass("hidden");
								$('.settings').addClass('active');
							});

						scope.$on('hide', 
							function on(){
								element.addClass("hidden");
								$('.settings').removeClass('active');
							});	
					}
				}
			}
		])
		.directive('logs', [
			function directive(){
				return {
					"restrict": "A",
					"scope": true,
					"controller": "logsController",
					"link": function onlink(scope, element, attributeSet){
						
					}
				}
			}
		])
		.directive('activities', [
			function directive(){
				return {
					"restrict": "A",
					"scope": true,
					"controller": "activitiesController",
					"link": function onlink(scope, element, attributeSet){
						
					}
				}
			}
		])
		.directive('events', [
			function directives(){
				return {
					"restrict": "A",
					"scope": true,
					"controller": "eventsController",
					"templateUrl": "/alumni/assets/template/events.html",
					"link": function onlink(scope, element, attributeSet){
						// element.addClass("hidden");
						scope.$on('show-settings' , 
							function on(){
								element.removeClass("hidden");
								$('.events').addClass('active');
							});

						scope.$on('hide', 
							function on(){
								element.addClass("hidden");
								$('.events').removeClass('active');
							});	
					}
				}
			}
		]);
	