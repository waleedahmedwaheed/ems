<?php include_once('conn/db.php'); ?>
<!DOCTYPE html>
<html>
<head>
		<title>EMS - Register</title>
		
		<?php include("scripts.php"); ?>
		
		<!--/ styles -->
		
		<!--[if lt IE 9]><script src="js/html5.js"></script><![endif]-->
		
		<script>

$(document).ready(function (e) {
$("#userForm").on('submit',(function(e) {
e.preventDefault();
$('#response').show();
$("#loader").show();
$.ajax({
url: "reg_save.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$("#loader").hide();
$('#userForm')[0].reset();
$("#response").html(data);
}
});

}));
});


</script>
<script type="text/javascript">
window.onload = function () {
	document.getElementById("password1").onchange = validatePassword;
	document.getElementById("password2").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("password2").value;
var pass1=document.getElementById("password1").value;
if(pass1!=pass2)
	document.getElementById("password2").setCustomValidity("Passwords Don't Match");
else
	document.getElementById("password2").setCustomValidity('');	 
//empty string means no validation error
}
</script>

<script type="text/javascript">
function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}

    </script>
	
	</head>
	
	<body>
		<div class="page">

			<?php include("header.php"); ?>
			
			

			<!-- page title -->
			<section class="page-title">
				<div class="grid-row clearfix">
					<h1>My Account </h1>
					
					<nav class="bread-crumbs">
						<a href="index.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;
						<a href="#">Register</a>
					</nav>
				</div>
			</section>
			<!--/ page title -->
			
			<!-- page content -->
			<main class="page-content">
				
				
				<div class="grid-row">
					<div class="grid-col grid-col-9">
						<!-- feedback -->
						<article class="feedback">
							<div class="widget-title">Get in touch with us and you'll be able to </div>
										
							<p>
							Speed your way through the checkout and 
							track your orders easily with 
							keep a record of all your purchases
							</p>
							
							<form method="post" id="userForm">
								<fieldset>
									<div class="clearfix">
										<div class="input">
											<label>Email *</label>
											<input type="email" name="email" required onKeyPress="return AvoidSpace(event)">
										</div>
									</div>
									<div class="clearfix">
										<div class="input">
											<label>Password *</label>
											<input type="password" name="password" id="password1" required onKeyPress="return AvoidSpace(event)">
										</div>
									</div>
									<div class="clearfix">
										<div class="input">
											<label>Confirm Password *</label>
											<input type="password" name="cpassword" id="password2" required onKeyPress="return AvoidSpace(event)">
										</div>
									</div>
									
									
											
											<button type="submit" class="button" value="Submit" style="float:left;">Regsiter</button>
										
				<span id="response" > </span>
           
									
								</fieldset>
							</form>							
						</article>
						<!--/ feedback -->
					</div>
					
					
				</div>
			</main>
			<!--/ page content -->
		<?php include('footer.php'); ?>

		</div>
	</body>
</html>