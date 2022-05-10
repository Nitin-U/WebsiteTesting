<?php
	//include "crud/connection.php";

	include_once "header.php";
	
	if (isset($_POST['submit'])) 
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		$error = 0;


		if ($error == 0) 

		{

				$query = "Select * from user_master where Username = '".$username."' and Role = '".$role."'";
				
			//$query = "Select * from Register_Customer where Customer_Username = '".$username."'";
			//echo $query;
			//die();
			$result = oci_parse($conn,$query);
	 		oci_execute($result);

			if($row = oci_fetch_assoc($result))
			{
				if (password_verify($password, $row['PASSWORD'])) 
				{
					$_SESSION['username'] = $username;
					$_SESSION['role'] = $row['ROLE'];
 					echo '<script type="text/javascript"> window.location="contact.php";</script>';				
				}
				else 
				{
					$fail="Authentication failed! Wrong Credentials entered";
				}

				
			}
			else 
				{
					$fail="Authentication failed! Wrong Credentials entered";
					
				}

		
		}

	}

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

	<link rel="stylesheet" type="text/css" href="css/alert_fail.css">

</head>
<body>



<!------------------------------------------------------------------------------------------->
<?php
	if (isset($fail)) 
		{?>
			<div class="container" id="login_message_error">
			    <div class="row">
			        <div class="col-md-12">  
			            <div class="alert alert-success-alt alert-dismissable w-75 mx-auto">
			                <span class="glyphicon glyphicon-certificate"></span>
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			                    ×</button><?php echo $fail; 	 	
	}
?>
			            </div>
			        </div>
			    </div>
			</div>


<div class="container py-4 col-lg-6 col-sm-10" id="container-login">
  <div class="border rounded shadow p-3 bg-white rounded">
  	<form class="px-4 py-3" method="POST" id="" role="form" action="">
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
				      <label for="inputPassword" class="col-lg-3 col-md-2 col-sm-12">Password</label>
				      <div class="col-lg-9 col-md-10 col-sm-12"><input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required=""></div>
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