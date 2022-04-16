<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php
	include "header.php";
	?>

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

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticConfirmPassword">Confirm Password*</label>
				      <input type="password" class="form-control" id="staticConfirmPassword" placeholder="Confirm Your Password" required="">
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticAge">Trader Type*</label>
				      <select id="form_need" name="age" class="form-control"  data-error="Please specify your need." required="">

				      		<option value="">--Select Your Category--</option>
				      		<option value="">Greengrocer</option>
				      		<option value="">Fishmonger</option>
				      		<option value="">Butcher</option>
				      		<option value="">Bakery</option>
				      		<option value="">Delicatessen</option>

				      	</select>
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticShop">Shop Name*</label>
				      <input type="text" class="form-control" id="staticShop" placeholder="Enter Your Shop's Name" required="">
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticShop">Choose Profile Image*</label>
				      <input type="file" class="form-control" id="fileUpload" placeholder="Browse" required="" multiple="">
				</div>

			</div>

			

		</div>

	    

		<div class="row">
			<div class="col-12 text-center">
				<button type="submit" class="btn col-lg-3 col-md-4 col-sm-6" id="reg-trad-btn">SIGN UP</button>
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

</head>
<body>



<?php
	include "footer.php";
?>


</body>
</html>