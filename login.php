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
<div class="container py-4 col-lg-6 col-sm-10" id="container-login">
  <div class="border rounded shadow p-3 bg-white rounded">
  	<form class="px-4 py-3" id="" role="form">
  		<div class="col-12 text-left pb-4">
			<h1>Sign-In</h1>
		</div>
	    
		<div class="row">
			<div class="col-12">
			
				<div class="form-group row">
				      <label for="staticEmail" class="col-lg-3 col-md-2 col-sm-12">Username</label>
				      <div class="col-lg-9 col-md-10 col-sm-12"><input type="username" class="form-control" id="staticUsername" placeholder="Username" required=""></div>
				</div>

			</div>
		</div>

	    <div class="row">
			<div class="col-12">
			
				<div class="form-group row">
				      <label for="inputPassword" class="col-lg-3 col-md-2 col-sm-12">Password</label>
				      <div class="col-lg-9 col-md-10 col-sm-12"><input type="password" class="form-control" id="inputPassword" placeholder="Password" required=""></div>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-12">
			
				<div class="form-group row">
				      <label for="inputPassword" class="col-lg-3 col-md-2 col-sm-12">Role</label>
				      <div class="col-lg-9 col-md-10 col-sm-12">
				      	
				      	<select id="form_need" name="age" class="form-control"  data-error="Please specify your need." required="">

				      		<option value="">--Select Your Role--</option>
				      		<option value="">Customer</option>
				      		<option value="">Trader</option>
				      		<option value="">Admin</option>

				      	</select>
				      </div>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-12 text-center">
				<button type="submit" class="btn col-lg-3 col-md-4 col-sm-6" id="login-btn">SIGN IN</button>
			</div>
		</div>

	<div class="row">
	  	<div class="col-12 pt-4">
	  		<p class="text-center">Forgot Password?<a href=""> Click here </a></p>
	  	</div>
	</div>

	<div class="row">
	  	<div class="col-12">
	  		<p class="text-center">Don't have an account yet?<a href=""> Register here </a></p>
	  	</div>
	</div>

		</form>

	  
	  

	  </div>
</div>

<?php
	include "footer.php";
?>

</body>
</html>