login
	.controller('loginCtrl', [
		"$scope",
		"$http",
		"getUrl",
		"getKey",
		function controller($scope, $http, getUrl, getKey){
	$scope.loginUser = function(){

		$http.post(getUrl.url + '/loginctrl/authenticate', $scope.login)
		.success(function onSuccess(response){
			if(response.pos == 1)
			{
				window.location = '/alumni/index.php/homectrl/admin';

			}
			else if(response.pos == 2)
			{
				window.location = '/alumni/index.php/homectrl/graduate';
				
			}
			else if(response.pos == 0)
			{
				console.log('envalid login');
			}
		});
	}

	

	$scope.recover = function recover(){

		console.log($scope.rec);
		$('.recover-loading').show();
		$http.post(getUrl.url + '/recoverCtrl/getRecover', $scope.rec)
		.success(function onSuccess(response){
			console.log(response);
			$scope.recovered(response);
		});
	}

	$scope.recovered = function recovered(respond){
		$('.emailSent').fadeIn(500);
		var generateEmail = function generateEmail ( respond ) {
          return {
              type: 'POST',
              url: 'https://mandrillapp.com/api/1.0/messages/send.json',
              data: {
                key: 'nJvtT8OV5B57QzmMJt5RVw',
                message: {
                    "html": "<p>Hello! this is your username <strong>" + respond.username +"</strong> and your password is <strong>" + respond.password + "</strong></p>",
                    "text": "Tracer message",
                    "subject": "Account Recovery",
                    "from_email": "must.tracer@gmail.com",
                    "from_name": "Tracer Admin",
                    "to": [
                        {
                            "email": respond.email,
                            "name": "Allan",
                            "type": "to"
                        }
                    ],
                }
              },
              success: function ( response ) {
                console.log( response );
                $('.recover-loading').hide();
                $('#succes-emailSent').modal('show');
                $('#forgot').modal('hide');
              },
              error: function ( response ) {
                alert( "Email Sending Failed !!!" );
              }
            }
        };

        var emailData = generateEmail( respond );

        $.ajax( emailData );
	}
	$scope.getCourse = function getCourse(){
		$http.get(getUrl.url + '/listCtrl/getCourseList')
		.success(function onSuccess(response){
			$scope.courseList = response;
		});
	}

	// submit

		$scope.submitReg = function submitReg(){
			console.log($scope.reg);
			$http.post(getUrl.url + '/addCtrl/addRegister', $scope.reg)
			.success(function onSuccess(response){
				if(response.stat == 1)
				{
					$('#signup').modal('hide');
					$('#success-reg').modal('show');
					$scope.reg = "";
				}
				else if(response.stat == 0)
				{
					window.location = '/alumni/index.php/homectrl/graduate';
				}
			});
		}
		$scope.basis = {};
		$scope.elementary = {};
		$scope.secondary = {};
		// add row
		$scope.FormRows = function FormRows(){
			$scope.formsDatas = [{
				name: "Tertiary Profile",
				dataForm: [{academic_level_tertiary: '', degree_tertiary: '', year_from_tertiary: '', year_to_tertiary: '', year_graduated_tertiary: ''}]
			}];
		}
		$scope.FormRows();
		// add row
		$scope.addRow = function addRow(form){

			form.dataForm.push({academic_level_tertiary: '', degree_tertiary: '', year_from_tertiary: '', year_to_tertiary: '', year_graduated_tertiary: ''});

		}
		// remove row
		$scope.removeRow = function removeRow(){
			// $('.newRow').detach();
		}

		// submit data
		$scope.submitData = function submitData(form){
			var Tertiary = [];



			$http.post(getUrl.url + '/addCtrl/addBasic/', $scope.basic)
			.success(function onSuccess(response){
				console.log(response);
				$scope.submitElementary(response);
				$scope.submitSecondary(response);

				for(var x = 0; x < form.dataForm.length; x++)
				{
					Tertiary.push({id: response.stat, degree_tertiary: form.dataForm[x].degree_tertiary, academic_level_tertiary: form.dataForm[x].academic_level_tertiary, year_from_tertiary: form.dataForm[x].year_from_tertiary, year_to_tertiary: form.dataForm[x].year_to_tertiary, year_graduated_tertiary: form.dataForm[x].year_graduated_tertiary, awards_received_tertiary: form.dataForm[x].awards_received_tertiary, thesis_project_tertiary: form.dataForm[x].thesis_project_tertiary});
				}
				$scope.submitTertiary(Tertiary);
			});

		}
		// submit tertiary
		$scope.submitTertiary = function submitTertiary(list){

			for(var x = 0; x < list.length; x++)
			{
				$http.post(getUrl.url + '/addCtrl/addTertiary', list[x])
				.success(function onSuccess(response){
					console.log(response);
					if(response.stat == 1)
					{
						window.location = '/alumni/index.php/homectrl/graduate';
					}
					else if(response.stat == 0)
					{
						console.log('error');
					}
				});
			}

			// call back

		}
		// submit elementary data
		$scope.submitElementary = function submitElementary(response){
			var elementaryData = [];
			elementaryData.push({id: response.stat, school_name_elementary: $scope.elementary.school_name_elementary, school_address_elementary: $scope.elementary.school_address_elementary, year_graduated_elementary: $scope.elementary.year_graduated_elementary, awards_received_elementary: $scope.elementary.awards_received_elementary });

			$http.post(getUrl.url + '/addCtrl/addElementary', elementaryData[0])
			.success(function onSuccess(response){
				console.log(response);
			});
		}
		$scope.submitSecondary = function submitSecondary(response){
			var secondaryData = [];
			console.log(response);
			secondaryData.push({id: response.stat, school_name_secondary: $scope.secondary.school_name_secondary, school_address_secondary: $scope.secondary.school_address_secondary, year_graduated_secondary: $scope.secondary.year_graduated_secondary, awards_received_secondary: $scope.secondary.awards_received_secondary });
		
			$http.post(getUrl.url + '/addCtrl/addSecondary', secondaryData[0])
			.success(function onSuccess(response){
				console.log(response);
			});
		}
		// get list events
		$scope.eventList = function eventList(){
			console.log('events');
			$http.get(getUrl.url + '/listCtrl/eventList')
			.success(function onSuccess(response){
				$scope.listEvent = response;
				console.log($scope.listEvent);
			});
		}
		$scope.showEventDetails = function showEventDetails(event){
			$scope.eventDetails = event; 
		}
	$scope.getCourse();
	$scope.eventList();
	}
]);