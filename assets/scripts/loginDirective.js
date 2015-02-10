login.directive('login', [
	function directive ( ) {
		return {
			"restrict": "A",
			"scope": true,
			"controller": "loginCtrl",		
			"link": function onLink ( scope , element , attributeSet ) {
								
			}
		}
	}
]);