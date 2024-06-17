$(function(){
	$("#regBtn").click(function(){
		$.post(
			'login/register_user', 
			{
				'email': $("#email_reg").val(),
				'username': $("#username_reg").val(),
				'password': $("#password_reg").val()
			}, 
			function(resp) {
				var res=$.parseJSON(resp);
				if(res.status==1){
					alert("You have been succesfully registered, you can Log in now.");
				}else{
					alert(res.data);
				}

			}
		);

	});
});