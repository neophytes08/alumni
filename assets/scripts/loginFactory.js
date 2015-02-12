login
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
	])
		.factory('getKey', [
			function factory(){
				return {
					key: '6jrVjP0mJJbZVpxVKszWAQ'
				}
			}
		]);