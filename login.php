<?php
	include "crud/connection.php";
	include_once "header.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="">
		
		.error{
			color: red;
			/*color: #9A2A2A;*/
			font-style: italic;
		}

		#login_message_error{
			margin-top: 20px;
		}


	</style>

	

</head>
<body>


<!------------------------------------------------------------------------------------------->


<div class="container py-4 col-lg-6 col-sm-10" id="container-login">
  <div class="border rounded shadow p-3 bg-white rounded">
  	<form class="px-4 py-3" method="POST" id="" role="form" action="loginprocess.php">
  		<div class="col-12 text-left pb-4">
			<h1>Sign-In</h1>
		</div>
	    
		<div class="row">
			<div class="col-12">
			
				<div class="form-group row">
				      <label for="staticEmail" class="col-lg-3 col-md-2 col-sm-12">Username</label>
				      <div class="col-lg-9 col-md-10 col-sm-12"><input type="username" name="username" class="form-control" id="staticUsername" placeholder="Username" required=""></div>
				</div>

			</div>
		</div>

	    <div class="row">
			<div class="col-12">
			
				<div class="form-group row">
					 <div class="input-group">
				      <label for="inputPassword" class="col-lg-3 col-md-2 col-sm-12">Password</label>
				      <div class="col-lg-9 col-md-10 col-sm-12">
				      	<!--div class="row">
				      		<div class="col-10 mr-0 pr-0 w-100">
				      		<input type="password" name="password" class="form-control" id="password" placeholder="Password" required=""/>
				      	</div>

				      	<div class="input-group-append col-1 m-0 p-0">
				      	<span class="input-group-text"><i class="fa-solid fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i></span>
				      </div>
				      	</div-->
				      	<div class="input-group">
						  <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="">
						  <div class="input-group-append">
						    <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-eye-slash" id="togglePassword" style="cursor: pointer;"></i></span>
						  </div>
						</div>
				      </div>
				      
				      </div>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-12">
			
				<div class="form-group row">
				      <label for="inputPassword" class="col-lg-3 col-md-2 col-sm-12">Role</label>
				      <div class="col-lg-9 col-md-10 col-sm-12">
				      	
				      	<select id="form_need" name="role" class="form-control"  data-error="Please specify your need." required="">

				      		<option value="">--Select Your Role--</option>
				      		<option value="customer">Customer</option>
				      		<option value="trader">Trader</option>
				      		<option value="admin">Admin</option>

				      	</select>
				      </div>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-12 text-center">
				<button type="submit" name="submit" class="btn col-lg-3 col-md-4 col-sm-6" id="login-btn">SIGN IN</button>
			</div>
		</div>

	<div class="row">
	  	<div class="col-12 pt-4">
	  		<p class="text-center">Forgot Password?<a href=""> Click here </a></p>
	  	</div>
	</div>

	<div class="row">
	  	<div class="col-12">
	  		<p class="text-center">Don't have an account yet?<a href="register_customer.php"> Register here </a></p>
	  		<p class="text-center">Want to add your shop?<a href="register_trader.php"> Register here </a></p>
	  	</div>
	</div>

		</form>

	  
	  

	  </div>
</div>

<?php
	include "footer.php";
	clearMsg();
?>

<script type="text/javascript" src="js/pass_view.js"></script>
</body>
</html>