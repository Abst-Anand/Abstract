<!DOCTYPE html>
<html>
<head>
<title>Email verification form in php using otp</title>
<link href="OTP.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>  function getOTP() {
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
	$(".err").html("otp-verification.php").hide();
	$(".success").html("otp-verification.php").hide();
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
				$("#frm-mobile-verification").html("otp-verification.php").hide();
				
			},
			error : function() {
				alert("Error");
			}
		});
	} else {
		$(".err").html('You have entered wrong OTP.')
		$(".err").show();
	}
}</script>

</head>
<body>

	<div class="container w3-card">
		<div class="err"></div>
		<form id="mobile-number-verification">
			<div class="mobile-heading">Email Verification</div>
			<div class="mobile-row">
				<input type="text" id="name" class="mobile-input" placeholder="Enter your name">
				<br>
				<div id="message1"></div>
				<br>
				<input type="email" id="email" class="mobile-input" placeholder="Enter your email-id">
				<div id="message2"></div>
			</div>
			<div id="loading-image"><img src="/image/ajax-loader.gif" alt="ajax loader"></div>
			<input type="button" class="mobileSubmit" id="enter" disabled="true" value="Get OTP" onClick="getOTP();">
		</form>
		<script>
		    $('#email').on('keyup',function(){
  		            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  		            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  		            var email = $("#email").val();
  		            if(email.match(mailformat)){
  		                $('#message2').html('valid').css('color','green');
  		                $("#enter").prop('disabled',false);
  		            }
  		            else
  		                $('#message2').html('Invalid Email').css('color','red');
  		                
  		        }
  		        );
		</script>
	</div>
	</body>
</html>
