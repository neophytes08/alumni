graduate
	.factory('getUrl',[
		function factory(){
			return {
				url: '/alumni/index.php',
				header: {
					headers: {
						'Content-Type' : 'application/x-www-form-urlencoded'
					}
				}
			}
		}
]);