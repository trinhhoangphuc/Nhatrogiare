$(document).ready(function(){
	
	//Login to user pages
	$("#login").on("click", function(){
		$email = $("#email").val();
		$pass = $("#password").val();
		$('#errorEmail').addClass("hidden").text("");
		$('#errorPass').addClass("hidden").text("");
		$('#errorLogin').addClass("hidden").text("");
		$.ajax({
			type: 'POST',
			url: 'postLoginUser',
			data: { 'email': $email, 'password': $pass },
			headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			success: function(data) {
				if(data.error == true){
					if(data.message.email != undefined)
						$('#errorEmail').removeClass("hidden").text(data.message.email[0]);
					if(data.message.password != undefined)
						$('#errorPass').removeClass("hidden").text(data.message.password[0]);
					if(data.message.errorlogin != undefined)
						$('#errorLogin').removeClass("hidden").text(data.message.errorlogin[0]);
				}else{
					location.reload();
				}
			}, error: function() {
				console.log("ERROR! Can't to login");
			}
		});
	});
	// end login

	//Logout user pages
    $("#logout").on("click", function(){
      $.ajax({
          type: 'POST',
          url: 'postLogoutUser',
          data: {},
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data) {
           if(data.message == true)
            location.reload();
        }, error: function() {
          console.log("loi");
        }
      });
    });
    //End Logout

    //Logout user pages
    $("#logout2").on("click", function(){
      $.ajax({
          type: 'POST',
          url: 'postLogoutUser',
          data: {},
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          success: function(data) {
           if(data.message == true)
            location.reload();
        }, error: function() {
          console.log("loi");
        }
      });
    });
    //End Logout

    
});