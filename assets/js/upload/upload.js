$(function() {
	$('#upload_file').submit(function(e) {
		e.preventDefault();
		$.ajaxFileUpload({
			url 			:'./update_picture/', 
			secureuri		:false,
			fileElementId	:'userfile',
			dataType		: 'json',
			success	: function (data, status)
			{
				// if(data.status != 'error')
				// {
				// 	$('#files').html('<p>Reloading files...</p>');
				// 	refresh_files();
				// 	$('#title').val('');
				// }
				alert(data.msg);
			}
		});
		return false;
	});
});