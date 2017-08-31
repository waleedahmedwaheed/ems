<!DOCTYPE html>
<html>
<head>
		<title>EMS - Register</title>
		
		

		<?php include("scripts.php"); ?>
		
		
		<script>

$(document).ready(function (e) {
$("#userForm").on('submit',(function(e) {
e.preventDefault();
$('#response').show();

$.ajax({
url: "login-exec.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
//$('#loading').hide();
//$('#userForm')[0].reset();
$("#response").html(data);
}
});

}));
});


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
						<a href="#">Login</a>
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
							<div class="widget-title">Get in touch with us </div>
										
							<p>
							Hello, Welcome to your account
							</p>
							
							<form method="post" id="userForm">
								<fieldset>
									<div class="clearfix">
										<div class="input">
											<label>Email *</label>
											<input type="email" name="email" required>
										</div>
									</div>
									<div class="clearfix">
										<div class="input">
											<label>Password *</label>
											<input type="password" name="password" required>
										</div>
									</div>
											
											<button type="submit" class="button" value="Submit" style="float:left;">Login</button>
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