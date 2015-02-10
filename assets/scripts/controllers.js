myadmin
		.controller('listOfGraduate', [
			"$scope",
			"$http",
			"getUrl",
			function controller($scope, $http, getUrl){
				// get list
				$scope.list = function list()
				{
					$http.get(getUrl.url + '/listCtrl/getGraduateList')
					.success(function onSuccess(response){
						console.log(response);
						$scope.graduateList = response;
						
					});
				}

				// get info
				$scope.getGraduateInfo = function getGraduateInfo(list){
					console.log(list);
					$http.get(getUrl.url + '/listCtrl/getGraduateInfo/' + list.user_id)
					.success(function onSuccess(response){
						$scope.graduateInfoList = response;
					});

				}
				// personal
				$scope.getGradPersonal = function getGradPersonal(list){
					$http.get(getUrl.url + '/listCtrl/getGradPersonal/' + list.user_id)
					.success(function onSuccess(response){
						console.log(response);
						$scope.personalList = response;
					});
				}
				// elementary
				$scope.getElementary = function getElementary(list){

					// console.log(list);
					$http.get(getUrl.url + '/listCtrl/getElementary/' + list.user_id)
					.success(function onSuccess(response){
						console.log(response);
						$scope.elementaryList = response;
					});
				}
				// secondary
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
				// get employment
				$scope.getEmployment = function getEmployment(list){
					console.log(list);
					$http.get(getUrl.url + '/listCtrl/getEmploymentRecord/' + list.user_id)
					.success(function onSuccess(response){
						console.log(response)
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
				// ger year list
				$scope.year = function year(){
					$http.get(getUrl.url + '/listCtrl/getYear')
					.success(function onSuccess(response){
						$scope.yearList = response;
					});
				} 
				// get course list
				$scope.getCourse = function getCourse(){
					$http.get(getUrl.url + '/listCtrl/getCourseList')
					.success(function onSuccess(response){
						console.log(response);
						$scope.courseList = response;
					});
				}
				// delete prompt
				$scope.deleteUser = function deleteUser(list){
					$('#deleteUser').modal('show');
					$scope.forDelete = list;
				}
				// delete list
				$scope.deleteGrad = function deleteGrad(list){
					console.log(list);
					$('.success').fadeIn(400).delay(3000).fadeOut(400);
					$http.get(getUrl.url + '/deleteCtrl/deleteUser/' + list.user_id)
					.success(function onSuccess(response){
						$scope.graduateList.splice($scope.graduateList.indexOf(list),1);
					});
				}
				$scope.$on( "show-list" , 
					function onReceive(){
						$scope.list();
						$scope.getCourse();
						$scope.year();
				});				
			}

	])
		.controller('insertGraduate', [
			"$scope",
			"$http",
			"getUrl",
			function controller($scope, $http, getUrl){

				// insert gradaute info
				$scope.new = {};
				$scope.saveData = function saveData(){

					console.log($scope.new);
					$http.post(getUrl.url + '/addCtrl/addNewGradData', $scope.new)
					.success(function onSuccess(response){
						console.log(response);
						if(response.stat === 0)
						{
							$scope.list();
							$('.success').fadeIn(400).delay(3000).fadeOut(400);
						}
						else
						{
							$('.exist').fadeIn(400).delay(3000).fadeOut(400);
						}
					});
				}
				// graduate specific
				$scope.graduateCateg = function graduateCateg(){
					
					
					if($scope.new.academic_level_tertiary == 'Graduate')
					{
						console.log('graduate');
						$('#academic-specific').show(500);
					}
				}
				// clear fields
				$scope.ClearFields = function ClearFields(){
					$scope.new = "";
				}
				// get course
				$scope.loadCourse = function loadCourse(){

					$http.get(getUrl.url + '/listCtrl/getCourseList')
					.success(function onSuccess(response){
						$scope.courseList = response;
					});
				}
				// refresh list
				$scope.list = function list()
				{
					$http.get(getUrl.url + '/listCtrl/getGraduateList')
					.success(function onSuccess(response){
						
						$scope.graduateList = response;
						
						console.log($scope.graduateList);
					});
				}
				// load year list
				$scope.year = function year(){
					$http.get(getUrl.url + '/listCtrl/getYear')
						.success(function onSuccess(response){
							$scope.yearList = response;
						});
				} 

				$scope.tabOne = function tabOne(){
					console.log('click');
					$('.checkout-bar li').removeClass();
			        $('.tab_one').addClass("active");
			        $('.tab_two, .tab_three, .tab_zero').prevAll().addClass("visited");
				}


				
				
				$scope.$on( "show-add" , 
					function onReceive ( ) {
						$scope.loadCourse();
						// $scope.year();
					});
			}
		])
		.controller('activitiesController', [
			"$scope",
			"$http",
			"getUrl",
			"getKey",
			function controller($scope, $http, getUrl, getKey){
				
				console.log('activities');

				$scope.getPending = function getPending(){

					$http.get(getUrl.url + '/listCtrl/listPending')
					.success(function onSuccess(response){
						$scope.pendingList = response;
					});
				}

				// check pending
				
				// save to database
				$scope.grantPending = function grantPending(list){
					console.log(list);
					$('.load-accepted_' + list.user_id).show();
					$http.post(getUrl.url + '/addCtrl/grantPending', list)
					.success(function onSuccess(response){
						console.log(response);
						if(response.stat == 1)
						{
							alert('This person already exist in the database!');
						}
						else
						{
							$scope.pendingList.splice($scope.pendingList.indexOf(list),1);
							// $scope.sendConfirmation(response.stat);
							$('.load-accepted_' + list.user_id).hide();
							$scope.getPending();
						}
					});
				}

				// send confirmation email
				$scope.sendConfirmation = function sendConfirmation(list){
					console.log(list);

					var sendMails = function sendMails ( mail ) {
			          return {
			              type: 'POST',
			              url: 'https://mandrillapp.com/api/1.0/messages/send.json',
			              data: {
			                key: getKey.key,
			                message: {
			                    "html": "<p>Congratulations! Your request for Graduate Tracer Account has been granted. <br> This account will serve as your profile for the survey here in Mindanao University of Science and Technology. <br> This is your Username: <strong> " + mail.username + " </strong> and your Password: <strong> " + mail.password + " </strong>. <br> Thank you for having been interested to join this community. God Bless!</p>",
			                    "text": "Tracer message",
			                    "subject": "Graduate Tracer Survey",
			                    "from_email": "must.tracer@gmail.com",
			                    "from_name": "Tracer Admin",
			                    "to": [
			                        {
			                            "email": mail.email,
			                            "name": mail.email,
			                            "type": "to"
			                        }
			                    ],
			                }
			              },
			              success: function(response) {
			              	console.log(response)
			              },
			              error: function (response) {
			                alert( "Email Sending Failed !!!" );
			              }
			            }
			        };

			        
			        	var emailData = sendMails(list);
			        	console.log(list);
    					$.ajax(emailData);
				}

				$scope.informRequest = function informRequest(list){
					var Informnail = function Informnail ( mail ) {
			          return {
			              type: 'POST',
			              url: 'https://mandrillapp.com/api/1.0/messages/send.json',
			              data: {
			                key: getKey.key,
			                message: {
			                    "html": "<p>Good day " + mail.fname + " " + mail.mname + " " + mail.lname + " " +mail.extention_name + "! <br>Sorry but we didnt find you in our database with degree " + mail.course + ". <br> Please review your information so that you can have you account for Graduate Tracer. <br> Thank you and God Bless!</p>",
			                    "text": "Tracer message",
			                    "subject": "Graduate Tracer Survey",
			                    "from_email": "must.tracer@gmail.com",
			                    "from_name": "Tracer Admin",
			                    "to": [
			                        {
			                            "email": mail.email,
			                            "name": mail.email,
			                            "type": "to"
			                        }
			                    ],
			                }
			              },
			              success: function(response) {
			              	console.log(response)
			              },
			              error: function (response) {
			                alert( "Email Sending Failed !!!" );
			              }
			            }
			        };

			        
			        	var emailData = Informnail(list);
			        	console.log(list);
    					$.ajax(emailData);

    					$scope.deletPending(list);
				}

				// delete pending
				$scope.deletPending = function deletPending(list){
					$http.get(getUrl.url + '/deleteCtrl/deletPending/' + list.pending_id)
					.success(function onSuccess(response){
						$scope.getPending();
					});
				}
				// status option
				$scope.stat = {};
				$scope.statusOpt = function statusOpt(list){
					console.log(list);
					$('.load-accepted_' + list.user_id).show();

					if($scope.stat.option == 'active')
					{
						console.log('active');
						$http.get(getUrl.url + '/listCtrl/statusOptActivate/' + list.user_id)
						.success(function onSuccess(response){
							$('.load-accepted_' + list.user_id).hide();
							$scope.getPending();
						});
					}
					else if($scope.stat.option == 'block')
					{
						console.log('block');
						$http.get(getUrl.url + '/listCtrl/statusOptBlock/' + list.user_id)
						.success(function onSuccess(response){
							$('.load-accepted_' + list.user_id).hide();
							$scope.getPending();
						});
						
					}
					else if($scope.stat.option == 'deactivate')
					{
						console.log('deactivate');

						$http.get(getUrl.url + '/listCtrl/statusOptDeactivate/' + list.user_id)
						.success(function onSuccess(response){
							$('.load-accepted_' + list.user_id).hide();
							$scope.getPending();
						});
					}
					
				}
				// $scope.getPending();
			}

		])
		.controller('statisticsController', [
			"$scope",
			"$http",
			"getUrl",
			function controller($scope, $http, getUrl){

				console.log('settings');
				// get course
				$scope.getCourseWithDepartment = function getCourseWithDepartment(){

					$http.get(getUrl.url + '/listCtrl/getCourseWithDepartment')
					.success(function onSuccess(response){
						$scope.courseList = response;
					});
				}
				// get year
				$scope.year = function year(){
					$http.get(getUrl.url + '/listCtrl/getYear')
					.success(function onSuccess(response){
						$scope.yearList = response;
					});
				}
				// get survey data
				$scope.pie = {};
				$scope.pieData = {};
				$scope.barData = {};
				$scope.lineData = {};
				$scope.generate = function generate(){


					if($scope.surveyData.year || $scope.surveyData.course)
					{
						$http.post(getUrl.url + '/surveyCtrl/getGenerate/', $scope.surveyData)
						.success(function onSuccess(response){
							
							if(response == 0)
							{
								$scope.year_data = 0;
								$scope.unemployed = 0;
								$scope.employed = 0;
								$('.error').fadeIn(2000);
								$('.stat-box').fadeOut(500);
							}
							else
							{
								// $scope.year_data = response.year;
								// $scope.unemployed = response.unemployed.unemployedCount;
								// $scope.employed = response.employed.employedCount;
								// $scope.pie = response.pieResult;
								// console.log(response);
								$scope.bar = response.barResult;
								// console.log($scope.bar);
								$scope.viewBarAll = response.barResult;
								$scope.titleBar = response.barResult.course;
								// $scope.titleBar = barTitle[0].course;
								$('.error').fadeOut(2000);
								$('.stat-box').fadeIn(500);
								$('.fullViewBar').fadeIn(1000);
								$scope.tableChart(response.barResult);
								$scope.lineData = angular.fromJson(response.lineResult);
								$scope.barData = angular.fromJson(response.barResult)
								$scope.pieData = angular.fromJson(response.pieResult);
								$scope.pieChart($scope.pieData);
								$scope.barGraph($scope.barData);
								$scope.lineChart($scope.lineData);
								$('.success-stat').fadeIn(400).delay(3000).fadeOut(400);
							}
						});
					}
					else
					{

					}

					
				}
				// line chart
				$scope.lineChart = function lineChart(list){
					console.log(list.length);

					var line = [];
					for(counter = 0; counter < list.length; counter++)
					{
						line.push({year: list[counter].year, value: parseInt(list[counter].employed)});
					}

					console.log(line);
					
					 	var chart;
			            var graph;

			            var chartData = line;
		            console.log(chartData);
		            // var chartData = [
		            //     {
		            //         "year": "2013",
		            //         "value": 50
		            //     }
		            //     // {
		            //     //     "year": "2014",
		            //     //     "value": 12
		            //     // }
		            //     ];
			    // AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.marginTop = 0;
                chart.marginRight = 0;
                chart.dataProvider = chartData;
                chart.categoryField = "year";
                chart.dataDateFormat = "YYYY";
                chart.balloon.cornerRadius = 6;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.parseDates = true; // as our data is date-based, we set parseDates to true
                categoryAxis.minPeriod = "YYYY"; // our data is yearly, so we set minPeriod to YYYY
                categoryAxis.dashLength = 1;
                categoryAxis.minorGridEnabled = true;
                categoryAxis.axisColor = "#DADADA";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                valueAxis.dashLength = 1;
                valueAxis.inside = true;
                chart.addValueAxis(valueAxis);

                // GRAPH
                graph = new AmCharts.AmGraph();
                graph.lineColor = "#b6d278";
                graph.negativeLineColor = "#487dac"; // this line makes the graph to change color when it drops below 0
                graph.bullet = "round";
                graph.bulletSize = 8;
                graph.bulletBorderColor = "#FFFFFF";

                graph.bulletBorderThickness = 2;
                graph.bulletBorderAlpha = 1;
                graph.connect = false; // this makes the graph not to connect data points if data is missing
                graph.lineThickness = 2;
                graph.valueField = "value";
                graph.balloonText = "[[category]]<br><b><span style='font-size:14px;'>[[value]] Employed Graduates</span></b>";
                chart.addGraph(graph);

                // CURSOR
                var chartCursor = new AmCharts.ChartCursor();
                chartCursor.cursorAlpha = 0;
                chartCursor.cursorPosition = "mouse";
                chartCursor.categoryBalloonDateFormat = "YYYY";
                chartCursor.graphBulletSize = 2;
                chart.addChartCursor(chartCursor);

                chart.creditsPosition = "bottom-right";

                // WRITE
                chart.write("lineGraph");
            // });
				}
				// pie chart 
				$scope.pieChart = function pieChart(list){

					var pie = [];

					for(var counter = 0; counter < list.length; counter++)
					{
						// pie.push({"country": list[counter].obe_answer, "litres": parseInt(list[counter].obe_count)});
						pie.push({y: parseInt(list[counter].obe_count), legendText: list[counter].obe_name, indexLabel: list[counter].obe_name});
					}
					console.log(pie);

					var chart_pie = new CanvasJS.Chart("chartContainer_pie",
					    {
					      title:{
					        text: "Related Subjects for Jobs Taken"
					      },
					       data: [
					      {
					         type: "pie",
					       showInLegend: true,
					       dataPoints: pie
					     }
					     ]
					   });

					chart_pie.render();
				}
				// table chart
				$scope.tableList = {year: 'no data', employed: 'no data', unemployed: 'no data'};
				$scope.tableChart = function tableChart(list){
					console.log(list);
					var barList = list;

					$http.post(getUrl.url + '/surveyCtrl/getAllSurveyYear', barList)
					 .success(function onSuccess(response){
					 	console.log(response);
					 	$('.table_title').fadeIn(500);
					 	$scope.tableList = response;
					 });

				}
				// view all
				$scope.barResultAll = {};
				$scope.viewAllBar = function viewAllBar(list){

					var barGet = list;

					console.log(barGet);
					 $http.post(getUrl.url + '/surveyCtrl/getAllSurveyYear', barGet)
					 .success(function onSuccess(response){
					 	console.log(response);

					 	$scope.barResultAll = angular.fromJson(response)
					 	$scope.barGraphAll($scope.barResultAll);
					 });
				}

				$scope.barGraphAll = function barGraphAll(list){

					console.log(list.length);
					  var bar = [];

					  for(var counter = 0; counter < list.length; counter++)
					  {
					  	bar.push([list[counter].year, parseInt(list[counter].employed), parseInt(list[counter].unemployed)])
					  }
						
						console.log(bar);

					  // var myData = new Array(['Asia', 437, 520], ['Europe', 322, 390], ['North America', 233, 286], ['Latin America', 110, 162], ['Africa', 34, 49], ['Middle East', 20, 31], ['Aus/Oceania', 19, 22]);
					  // var myData = new Array(bar);
					  var myChart = new JSChart('bar', 'bar');
					  myChart.setDataArray(bar);
					  myChart.setTitle('Employemnt and Unemployment Records for ' + list[0].course);
					  myChart.setTitleColor('#8E8E8E');
					  myChart.setAxisNameX('');
					  myChart.setAxisNameY('');
					  myChart.setAxisNameFontSize(16);
					  myChart.setAxisNameColor('#999');
					  myChart.setAxisValuesAngle(30);
					  myChart.setAxisValuesColor('#777');
					  myChart.setAxisColor('#B5B5B5');
					  myChart.setAxisWidth(1);
					  myChart.setBarValuesColor('#2F6D99');
					  myChart.setAxisPaddingTop(60);
					  myChart.setAxisPaddingBottom(60);
					  myChart.setAxisPaddingLeft(45);
					  myChart.setTitleFontSize(11);
					  myChart.setBarColor('#2D6B96', 1);
					  myChart.setBarColor('#9CCEF0', 2);
					  myChart.setBarBorderWidth(0);
					  myChart.setBarSpacingRatio(50);
					  myChart.setBarOpacity(0.9);
					  myChart.setFlagRadius(6);
					  myChart.setTooltipPosition('nw');
					  myChart.setTooltipOffset(3);
					  myChart.setLegendShow(true);
					  myChart.setLegendPosition('right top');
					  myChart.setLegendForBar(1, 'Employed');
					  myChart.setLegendForBar(2, 'Unemployed');
					  myChart.setSize(940, 320);
					  myChart.setGridColor('#C6C6C6');
					  myChart.draw();
				}
			
				// graph
				$scope.barGraph = function graph(list){


				  console.log(list.length);
				  var bar = [];

				 bar.push(list.year, parseInt(list.employed), parseInt(list.unemployed))
					
				console.log(bar);

				  // var myData = new Array(['Asia', 437, 520], ['Europe', 322, 390], ['North America', 233, 286], ['Latin America', 110, 162], ['Africa', 34, 49], ['Middle East', 20, 31], ['Aus/Oceania', 19, 22]);
				  var myData = new Array(bar);
				  var myChart = new JSChart('bar', 'bar');
				  myChart.setDataArray(myData);
				  myChart.setTitle('Employemnt and Unemployment Records for ' + list.course);
				  myChart.setTitleColor('#8E8E8E');
				  myChart.setAxisNameX('');
				  myChart.setAxisNameY('');
				  myChart.setAxisNameFontSize(16);
				  myChart.setAxisNameColor('#999');
				  myChart.setAxisValuesAngle(30);
				  myChart.setAxisValuesColor('#777');
				  myChart.setAxisColor('#B5B5B5');
				  myChart.setAxisWidth(1);
				  myChart.setBarValuesColor('#2F6D99');
				  myChart.setAxisPaddingTop(60);
				  myChart.setAxisPaddingBottom(60);
				  myChart.setAxisPaddingLeft(45);
				  myChart.setTitleFontSize(11);
				  myChart.setBarColor('#2D6B96', 1);
				  myChart.setBarColor('#9CCEF0', 2);
				  myChart.setBarBorderWidth(0);
				  myChart.setBarSpacingRatio(50);
				  myChart.setBarOpacity(0.9);
				  myChart.setFlagRadius(6);
				  myChart.setTooltipPosition('nw');
				  myChart.setTooltipOffset(3);
				  myChart.setLegendShow(true);
				  myChart.setLegendPosition('right top');
				  myChart.setLegendForBar(1, 'Employed');
				  myChart.setLegendForBar(2, 'Unemployed');
				  myChart.setSize(940, 320);
				  myChart.setGridColor('#C6C6C6');
				  myChart.draw();
			}

				// $scope.$on("show-statistics", 
					// function onReceive() {
						$scope.year();
						$scope.getCourseWithDepartment();
				// });
			}
				
		])
		.controller('settingsController', [
			"$scope",
			"$http",
			"getUrl",
			"getKey",
			function controller($scope, $http, getUrl, getKey){

				

				$scope.getDepartmentList = function getDepartmentList(){
					$http.get(getUrl.url + '/listCtrl/getDepartmentList')
					.success(function onSuccess(response){
						$scope.departmentList = response;
					});
				}
				// add department
				$scope.AddDepartment = function AddDepartment(){
					$http.post(getUrl.url + '/addCtrl/addDepartment', $scope.addDept)
					.success(function onSuccess(response){
						if(response.stat === 1)
						{
							$('.exist').fadeIn(400).delay(3000).fadeOut(400);
						}
						else if(response.stat === 2)
						{
							$scope.getDepartmentList();
							$scope.addDept = "";
							$('.options-department').fadeOut(500);
						}
						else
						{
							$scope.getDepartmentList();
							$scope.addDept = "";
							$('.options-department').fadeOut(500);
						}
						
					});
				}
				// delete department prompt
				$scope.deleteDeptPrompt = function deleteDeptPrompt(list){
					$scope.prompDeleteDeptList = list;
					$('#deleteDepartment').modal('show');
				}
				$scope.cancelDeleteDept = function cancelDeleteDept(){
					$('.options-department').fadeOut(500);
				}
				// delete department
				$scope.deleteDept = function deleteDept(list){
					$http.post(getUrl.url + '/deleteCtrl/deleteDept/' + list.department_id);
					$scope.departmentList.splice($scope.departmentList.indexOf(list),1);
					$('#deleteDepartment').modal('hide');
				}
				// edit department
				$scope.editDept = function editDept(list){
					$scope.addDept = list;
					$('.options-department').fadeIn(1000);
				}
				// add prompt
				$scope.addDeptartment = function addDept(){
					$('.options-department').fadeIn(1000);
				}
				// load course only
				$scope.loadCourse = function loadCourse(){

					$http.get(getUrl.url + '/listCtrl/getCourseList')
					.success(function onSuccess(response){
						$scope.courseList = response;
					});
				}
				// get course 
				$scope.addcourse = {};
				$scope.getCourse = function getCourse(list){
					$scope.departmentTitle = list.department_name;
					console.log(list);
					$http.get(getUrl.url + '/listCtrl/getCourse/' + list.department_id)
					.success(function onSuccess(response){
						console.log(response);
						$scope.courseList = response;
						$scope.addcourse.department_id = list.department_id;
						$('#course').modal('show');
					});
				}
				// add course option
				$scope.addCourseOption = function addCourseOption(){
					$('.options-course').fadeIn(500);
				}
				// cancel course
				$scope.cancelDeleteCourse = function cancelDeleteCourse(){
					$('.options-course').fadeOut(500);
					$scope.addcourse.course_id = "";
				}
				// add course
				$scope.AddCourse = function AddCourse(){

					// console.log($scope.addcourse);
					var course = [];

					if($scope.addcourse.course_id)
					{
						
						$http.post(getUrl.url + '/addCtrl/addCourse', $scope.addcourse)
						.success(function onSuccess(response){
							if(response.stat === 1)
							{
								$scope.addcourse = "";
								$('.options-course').fadeOut(500);
							}
							else
							{
								$('.exist').fadeIn(400).delay(3000).fadeOut(400);
							}
						});
						console.log('update');
					}
					else
					{
						var course = {course_id: 0, course_name: $scope.addcourse.course_name, department_id: $scope.addcourse.department_id};

						console.log(course);
						$http.post(getUrl.url + '/addCtrl/addCourse', course)
						.success(function onSuccess(response){
							if(response.stat === 0)
							{
								$('.exist').fadeIn(400).delay(3000).fadeOut(400);
							}
							else
							{
								$scope.courseList = response.stat;
								$scope.addcourse.course_name = "";
								$('.options-course').fadeOut(500);
								
							}
						});
					}
					
					
				}
				// delete course prompt
				$scope.deleteCoursePrompt = function deleteCoursePrompt(list){
					$scope.deleteCourseList = list;
					$('#deleteCourse').modal('show');
				}
				// cancel delete course
				$scope.cancelDeleteCourse = function cancelDeleteCourse(){
					$('.options-course').fadeOut(500);
				}
				// delete course
				$scope.deleteCourse = function deleteCourse(list){
					$http.post(getUrl.url + '/deleteCtrl/deleteCourse/' + list.course_id);
					$scope.courseList.splice($scope.courseList.indexOf(list),1);
					$('#deleteCourse').modal('hide');
				}
				// edit course
				$scope.editCourse = function editCourse(list){
					$scope.addcourse = list;
					$('.options-course').fadeIn(500);
				}
				// get year list
				$scope.year = function year(){
					$http.get(getUrl.url + '/listCtrl/getYear')
					.success(function onSuccess(response){
						$scope.yearList = response;
					});
				}
				// get survey
				$scope.getSurvey = function getSurvey(){
					$http.get(getUrl.url + '/listCtrl/getSurvey/')
					.success(function onSuccess(response){
						$scope.surveyList = response;
					});
				}
				// update survey
				$scope.updatePromptSurvey = function updatePromptSurvey(list){
					$scope.survey = list;
						$('.options-survey').fadeIn(500);
				}
				// submit update survey
				$scope.submitSurvey = function submitSurvey(){
					$http.post(getUrl.url + '/addCtrl/addSurvey', $scope.survey)
					.success(function onSuccess(response){
						if(response.stat == 0)
						{
							$('.exist').fadeIn(400).delay(3000).fadeOut(400);
						}
						else
						{
							$scope.getSurvey();
							$('.options-survey').fadeOut(500);
							$('.success').fadeIn(400).delay(3000).fadeOut(400);
						}
					});
				}
				// add survey option
				$scope.addSurveyOption = function addSurveyOption(){
					$('.options-survey').fadeIn(500);
				}
				// cancel delete prompt
				$scope.cancelDeleteSurveyPrompt = function cancelDeleteSurveyPrompt(){
					$('.options-survey').fadeOut(500);
				}
				// delete survey prompt
				$scope.deleteSurveyPrompt = function deleteSurveyPrompt(list){
					$scope.deleteSurveyList = list;
					$('#deleteSurvey').modal('show');
				}
				// delete survey

				$scope.deleteSurvey = function deleteSurvey(list){
					$http.post(getUrl.url + '/deleteCtrl/deleteSurvey/' + list.survey_id)
					.success(function onSuccess(response){
						$scope.surveyList.splice($scope.surveyList.indexOf(list),1);
						$('#deleteSurvey').modal('hide');
					});
				}
				// change survey stat

				$scope.changeSurveyStat = function changeSurveyStat(list){
					if(list.survey_status == "deactivate")
					{
						$http.post(getUrl.url + '/addCtrl/activateSurvey/' + list.survey_id)
						.success(function onSuccess(){
							$scope.getSurvey();
							$('.activated').fadeIn(400).delay(3000).fadeOut(400);
						});
					}
					else if(list.survey_status == "activate")
					{
						$http.post(getUrl.url + '/addCtrl/deactivateSurvey/' + list.survey_id)
							.success(function onSuccess(){
								$scope.getSurvey();
								$('.deactivated').fadeIn(400).delay(3000).fadeOut(400);
							});
					}
				}
				// get users
				$scope.getUsers = function getUsers(){
					$http.get(getUrl.url + '/listCtrl/getUsers')
					.success(function onSuccess(response){
						$scope.userList = response;
					});
				}
				// add user container
				$scope.addUserCont = function addUserCont(){
					$('.options-adduser').fadeIn(500);
				}
				// cancel add user
				$scope.cancelUser = function cancelUser(){
					$scope.add.user_id = "";
					$scope.add.username = "";
					$scope.add.password = "";
					$scope.add.fname = "";
					$scope.add.mname = "";
					$scope.add.lname = "";
					$scope.add.email = "";
					$scope.add.degree_tertiary = "";
					$('.options-adduser').fadeOut(500);
				}
				// add user
				$scope.addUser = function addUser(){
					console.log($scope.add);
					$http.post(getUrl.url + '/addCtrl/addUser', $scope.add)
					.success(function onSuccess(response){
						if(response.stat === 3)
						{
							$scope.getUsers();
							$scope.add.username = "";
							$scope.add.fname = "";
							$scope.add.mname = "";
							$scope.add.lname = "";
							$scope.add.email = "";
							$('.success').fadeIn(400).delay(3000).fadeOut(400);
							$('.options-adduser').fadeOut(500);

						}
						else if(response.stat === 2)
						{
							$scope.getUsers();
							$scope.add.username = "";
							$scope.add.fname = "";
							$scope.add.mname = "";
							$scope.add.lname = "";
							$scope.add.email = "";
							$('.success').fadeIn(400).delay(3000).fadeOut(400);
							$('.options-adduser').fadeOut(500);
						}
						else if(response.stat === 1)
						{
							$('.exist').fadeIn(400).delay(3000).fadeOut(400);
						}
					});
				}
				// delete user prompt
				$scope.deleteUserPrompt = function deleteUserPrompt(list){
					$scope.prompDeleteUserList = list;
					$('#deleteUserPrompt').modal('show');
				}
				// delete user
				$scope.deleteUsers = {};
				$scope.deleteUser = function deleteUser(list){
					$http.get(getUrl.url + '/deleteCtrl/deleteUser/' + list.user_id);
					$scope.userList.splice($scope.userList.indexOf(list),1);
					$('.success').fadeIn(400).delay(3000).fadeOut(400);
					$('#deleteUserPrompt').modal('hide');
				}
				// edit user
				$scope.editUser = function editUser(list){
					$scope.add = list;
					$('.options-adduser').fadeIn(500);
				}

				// Show seach box
				$scope.showUserSearch = function showUserSearch(){
					$('.searchUser').fadeToggle(1000);
				}
				// search user
				$scope.searchUserInfo = function searchUserInfo(){
					console.log($scope.keyword);
					// $http.post(getUrl.url + '/listCtrl/searchUser/', $scope.keyword)
					// .success(function onSuccess(response){
					// 	$scope.userList = response;
					// });
				}
				$scope.obe = {};
				// get obe specialization
				$scope.getObe = function getObe(list){

					$('#obe').modal('show');

					$http.get(getUrl.url + '/listCtrl/getObe/' + list.course_id)
					.success(function onSuccess(response){
						$scope.obeList = response;
						$scope.obe.course_id = list.course_id;
					});
				}
				// add obe specialization
				$scope.submitObe = function submitObe(){
					if($scope.obe.obe_id)
					{
						$http.post(getUrl.url + '/addCtrl/addObe', $scope.obe)
						.success(function onSuccess(response){
							if(response.stat === 1)
							{
								$('.exist').fadeIn(400).delay(3000).fadeOut(400);
							}
							else
							{
								$('.options-obe').fadeOut(500);
								$scope.obe.obe_name = "";
							}
						});
						console.log('update');
					}
					else
					{
						var obe = {obe_id: 0, obe_name: $scope.obe.obe_name, course_id: $scope.obe.course_id};
						console.log(obe);
						$http.post(getUrl.url + '/addCtrl/addObe', obe)
						.success(function onSuccess(response){
							if(response.stat === 1)
							{
								$('.exist').fadeIn(400).delay(3000).fadeOut(400);
							}
							else
							{
								$scope.getObe(response.stat);
								$('.options-obe').fadeOut(500);
								$scope.obe.obe_name = "";
							}
						});
					}
					
				}
				// cancel update
				$scope.cancelObe = function cancelObe(){
					$('.options-obe').fadeOut(500);
					$scope.obe.obe_id = "";
				}
				// add prompt obe
				$scope.addPromptObe = function addPromptObe(){
					$('.options-obe').fadeIn(500);
				}
				// edit obe
				$scope.editObe = function editObe(list){
					console.log(list);
					$scope.obe = list;
					$('.options-obe').fadeIn(500);
				}
				// delete prompt obe
				$scope.deletePromptObe = function deletePromptObe(list){
					console.log(list);
					$scope.deleteObeList = list;
					$('#deleteObe').modal('show');
				}
				// delete obe
				$scope.deleteObe = function deleteObe(list){

					$http.get(getUrl.url + '/deleteCtrl/deleteObe/' + list.obe_id);
					$scope.obeList.splice($scope.obeList.indexOf(list),1);
					$('#deleteObe').modal('hide');
				}

				// mail section
				// user mail
				$scope.forSendEmails = {};
				$scope.mailUser = function mailUser(){
					$http.get(getUrl.url + '/listCtrl/getEmails')
					.success(function onSuccess(response){
						console.log(response);
						$scope.sentEmails = response.sent.length;
						$scope.unsentEmails = response.unsent.length;
						$scope.forSendEmails = response.unsent;
						$scope.countedMails = response.allMails;
					});
				}

				// survey mail
				$scope.mailSurvey = function mailSurvey(){
					$http.get(getUrl.url + '/listCtrl/getSurveyForNotication')
					.success(function onSuccess(response){
						$scope.activeSurvey = response;
					});
				}
				// send survey notification
				$scope.sendSurveyNotification = function sendSurveyNotification(list){
					$http.get(getUrl.url + '/listCtrl/getEmailsForSurveyNotification/' + list.course_id)
					.success(function onSuccess(response){
						$scope.sendSUrveyEmails(response);
					});
				}

				// send survey emails
				$scope.countSent = 0;
				$scope.sendSUrveyEmails = function sendSUrveyEmails(mails){
					if(mails.length == 0)
					{
						$('#surveyPrompt').modal('show');
					}
					else
					{
						
						var sendSurveyMails = function sendSurveyMails ( mails ) {
					          return {
					              type: 'POST',
					              url: 'https://mandrillapp.com/api/1.0/messages/send.json',
					              data: {
					                key: getKey.key,
					                message: {
					                    "html": "<p>Hello! Survey for this year is active. Please have a time to answer the survey. </strong>. <br> You can also access it via <strong> <a href='http://localhost/tracer/'>Graduate Tracer Home Page</a></strong></p>",
					                    "text": "Tracer message",
					                    "subject": "Graduate Tracer Survey",
					                    "from_email": "must.tracer@gmail.com",
					                    "from_name": "Tracer Admin",
					                    "to": [
					                        {
					                            "email": mails.email,
					                            "name": mails.email,
					                            "type": "to"
					                        }
					                    ],
					                }
					              },
					              success: function(response) {
					                $scope.countSent++;
					                
					              },
					              error: function (response) {
					                alert( "Email Sending Failed !!!" );
					              }
					            }
					        };

					        var emailLenght = mails.length;
					        $scope.countEmails = emailLenght;
					        for(var x = 0; x < emailLenght; x++){
					        	var emailData = sendSurveyMails( mails[x] );

					        	// console.log(mails[x]);
	        					$.ajax( emailData );
					        }
					}
					
				
				}
				// send emails
				$scope.sendEmails = function sendEmails(){

					console.log('Click');
					if($scope.forSendEmails.length == 0)
					{
						$('#surveyPrompt').modal('show');
					}
					else
					{
						
						var sendAccountEmails = function sendAccountEmails ( mail ) {
					          return {
					              type: 'POST',
					              url: 'https://mandrillapp.com/api/1.0/messages/send.json',
					              data: {
					                key: getKey.key,
					                message: {
					                    "html": "<p>Hello! This is you account for Graduate tracer, this will serve as your profile for the survey here in Mindanao University of Science and Technology. <br> This is your Username: <strong> " + mail.username + " </strong> and your Password: <strong> " + mail.password + " </strong>. <br> You can also test it out via <strong> <a href='http://localhost/tracer/'>Graduate Tracer Home Page</a></strong></p>",
					                    "text": "Tracer message",
					                    "subject": "Graduate Tracer Graduate's Account",
					                    "from_email": "must.tracer@gmail.com",
					                    "from_name": "Tracer Admin",
					                    "to": [
					                        {
					                            "email": mail.email,
					                            "name": mail.email,
					                            "type": "to"
					                        }
					                    ],
					                }
					              },
					              success: function(response) {
					                $scope.countSentEmails++;
					                $http.get(getUrl.url + '/updateCtrl/updateAccountEmail/' + mail.user_id)
					                .success(function onSuccess(response){
					                	console.log(response);
					                	$scope.mailUser();
					                });
					              },
					              error: function (response) {
					                alert( "Email Sending Failed !!!" );
					              }
					            }
					        };

					        var emailLenght = $scope.forSendEmails.length;
					        $scope.countEmail = emailLenght;
					        for(var x = 0; x < emailLenght; x++){
					        	var emailData = sendAccountEmails( $scope.forSendEmails[x] );

					        	// console.log($scope.countSentEmails++);
	        					$.ajax( emailData );
					        }
					       
						}
					}
				$scope.$on("show-settings" , 
					function onReceive(){
						$scope.mailUser();
						$scope.mailSurvey();
						$scope.getDepartmentList();
						$scope.year();
						$scope.getSurvey();
						$scope.getUsers();
						$scope.loadCourse();
					});
			}
		])
		.controller('logsController',[
			"$scope",
			"$http",
			"getUrl",
			function controller($scope, $http, getUrl){

				$scope.showLogs = function showLogs(){
					console.log('logs');
					$('.loader-admin').show();
					$http.get(getUrl.url + '/listCtrl/getLogs')
					.success(function onSuccess(response){
						$scope.logList = response;
					});
				}
				// create admin
				$scope.addAdmin = function addAdmin(){
					console.log($scope.add);
					$http.post(getUrl.url + '/addCtrl/addNewAdmin', $scope.add)
					.success(function onSuccess(response){
						if(response.stat === 1)
						{
							toast('Admin already exist!', 3000);
						}
						else
						{
							toast('New admin added!', 3000);
							$scope.add = "";
							$scope.get();
						}
					});
				}
				// get admin
				$scope.get = function get(){

					$http.get(getUrl.url + '/listCtrl/getAdminList')
					.success(function onSuccess(response){
						$scope.List = response;
					});
				}
				// delete admin
				$scope.deleteAdmin = function deleteAdmin(list){
					console.log(list);
					$http.post(getUrl.url + '/deleteCtrl/deleteAdmin/' + list.user_id)
					.success(function onSuccess(response){
						if(response.stat === 1)
						{
							toast('Admin deleted!', 3000);
							$scope.List.splice($scope.List.indexOf(list),1);
						}
						else
						{
							toast('You dont have previlidge to delete an admin user!', 3000, 'delete-prompt');
						}
					});
				}

				// admin info
				$scope.adminInfo = function adminInfo(){
					$('.loader-admin').show();
					$http.get(getUrl.url + '/listCtrl/adminInfo')
					.success(function onSuccess(response){
						$('.loader-admin').hide();
						$scope.admin = response;
					});
				}
				// $scope.showLogs();
				// $scope.adminInfo();
			}
		])
		.controller('eventsController',[
			"$scope",
			"$http",
			"getUrl",
			function controller($scope, $http, getUrl){

			$scope.events = {};
			$scope.eventList = function eventList(){
				console.log('events');
				$http.get(getUrl.url + '/listCtrl/eventList')
				.success(function onSuccess(response){
					$scope.listEvent = response;
				});
			}
			// add event
			$scope.addEvent = function addEvent(){
				console.log($scope.events);
				$http.post(getUrl.url + '/addCtrl/addEvent/', $scope.events)
				.success(function onSuccess(response){
					console.log(response);
					$scope.events = {};
					$scope.eventList();
				});
			}
			// edit event
			$scope.editEvent = function editEvent(list){
				console.log(list);
				$scope.edit = list;
			}
			// update
			$scope.updateEvent = function updateEvent(){
				console.log($scope.edit);
				$http.post(getUrl.url + '/updateCtrl/updateEvent/', $scope.edit)
				.success(function onSuccess(response){
					console.log(response);
					$('#editEvent').modal('hide');
				});
			}
			// delete event prompt
			$scope.deletePrompt = function deletePrompt(list){
				console.log(list);
				$scope.deleteEventData = list;
			}
			// delete event 
			$scope.deleteEvent = function deleteEvent(list){

				$http.get(getUrl.url + '/deleteCtrl/deleteEvent/' + list.event_id)
				.success(function onSuccess(response){
					$scope.listEvent.splice($scope.listEvent.indexOf(list),1);
					$('#deleteEvent').modal('hide');
				});
			}
			$scope.eventList();
		}
		]);