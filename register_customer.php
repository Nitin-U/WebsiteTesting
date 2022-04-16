<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php
	include "header.php";
	?>

</head>
<body>

<!------------------------------------------------------------------------------------------->
<div class="container pt-4 pb-4 col-lg-6 col-md-8 col-sm-10" id="container-register">
  <div class="border rounded shadow p-3 bg-white rounded">
  	<form class="px-4 py-3" id="" role="form">
  		<div class="col-12 text-left pb-4">
			<h1>Create account</h1>
		</div>
	    
		<div class="row">
			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticName">Full Name*</label>
				      <input type="name" class="form-control" id="staticName" placeholder="FullName" required="">
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticEmail">Email Address*</label>
				      <input type="Email" class="form-control" id="staticEmail" placeholder="Xyz@gmail.com" required="">
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticNumber">Mobile Number*</label>
				      <input type="text-center" class="form-control" id="staticText" placeholder="+977 98xxxxxxx" required="">
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticAge">Age*</label>
				      <select id="form_need" name="age" class="form-control"  data-error="Please specify your need." required="">

				      		<option value="">--Select Your Age--</option>
				      		<option value="">Under 18</option>
				      		<option value="">18-24</option>
				      		<option value="">24-30</option>
				      		<option value="">Above 30</option>

				      	</select>
				</div>

			</div>

			<div class="col-12 pb-2">
				<label for="staticGender">Gender*</label>
				<div class="col-12 text-center">
					<div class="form-check form-check-inline col-3">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
					  <label class="form-check-label" for="inlineRadio1">Male</label>
					</div>
					<div class="form-check form-check-inline col-3">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
					  <label class="form-check-label" for="inlineRadio2">Female</label>
					</div>
					<div class="form-check form-check-inline col-3">
					  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
					  <label class="form-check-label" for="inlineRadio2">Rather Not Specify</label>
					</div>
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticUsername">Username*</label>
				      <input type="username" class="form-control" id="staticUsername" placeholder="Username" required="">
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticPassword">Password*</label>
				      <input type="password" class="form-control" id="staticPassword" placeholder="Password" required="">
				</div>

			</div>

		</div>

	    

		<div class="row">
			<div class="col-12 text-center">
				<button type="submit" class="btn col-lg-3 col-md-4 col-sm-6" id="reg-cus-btn">SIGN UP</button>
			</div>
		</div>

	<div class="row">
	  	<div class="col-12 pt-4">
	  		<p class="text-center">By clicking “SIGN UP”, I agree to Trinit-E-mart’s 
			Terms of Use and Privacy Policy</p>
	  	</div>
	</div>

	<div class="row">
	  	<div class="col-12">
	  		<p class="text-center">Already have an account?<a href="">  Sign-In </a></p>
	  	</div>
	</div>

		</form>

	  
	  

	  </div>
</div>
<!------------------------------------------------------------------------------------------->


<?php
	include "footer.php";
?>


</body>
</html>