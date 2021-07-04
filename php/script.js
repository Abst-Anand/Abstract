function getOTP() {
	$(".err").html("").hide();
	var email = $("#email").val();
	var name = $("#name").val();	
	if(name.length !== 0)
	{
	    var input ={
	        "name" : name,
	        "email" : email,
	        "action" : "get_otp"
	    }
	    $("#loading-image").show();
	    $.ajax({
	        
	        url : 'controller.php',
	        type : 'POST',
	        data : input,
	        success : function(response)
	        {
	            $(".container").html(response);
	        },
	        complete : function()
	        {
	            $("#loading-image").hide();
	        }
	        
	    });
	}
	else
	    $("#message1").html("Enter your name").css('color','red');
	
}

function verifyOTP() {
	$(".err").html("").hide();
	$(".success").html("").hide();
	var otp = $("#mobileOtp").val();
	var input = {
		"otp" : otp,
		"action" : "verify_otp"
	};
	if (otp.length == 6 && otp != null) {
		$.ajax({
			url : 'controller.php',
			type : 'POST',
			dataType : "json",
			data : input,
			success : function(response) {
			  
				$("." + response.type).html(response.message)
				$("." + response.type).show();
				$("#frm-mobile-verification").html("").hide();
				
			},
			error : function() {
				alert("Error");
			}
		});
	} else {
		$(".err").html('You have entered wrong OTP.')
		$(".err").show();
	}
}