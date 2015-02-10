graduate.directive('info', [
		function directive ( ) {
			return {
				"restrict": "A",
				"scope": true,
				"controller": "infoController",		
				"link": function onLink ( scope , element , attributeSet ) {
									
				}
			}
		}
	]);