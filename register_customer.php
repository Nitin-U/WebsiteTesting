<?php
include "crud/connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/alert.css">

	<style type="">
		
		.error{
			color: red;
			font-style: italic;
		}

		#customer_message{
			margin-top: 20px;
		}


	</style>



</head>
<body>

	<!------------------------------------------------------------------------------------------->
	<?php 
	if (isset($_POST['btnSubmit'])) 
	{
		$name=$_POST['Cname'];
		$email=$_POST['CEmail'];
		$phone=$_POST['CPhone'];
		$age=$_POST['Cage'];
		if (isset($_POST['CGender']))
		{
			$gender=$_POST['CGender'];
		}
		$username=$_POST['CUsername'];
		$password=$_POST['CPass'];
		$password_confirm=$_POST['CPassCon'];
		$role = "customer";
		$status = "Not Verified";
		$error = 0;

		if(strlen($name)<5)
		{
			$error_name =  "Fullname should be atleast six characters";
			$error++;
		}

		if($name == null) 
		{
			$error_name=  "Please enter your fullname first";
			$error++;
		}

		if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
		{
			$error_email= "Please enter a valid email, like yourname@abc.com";
			$error++;
		}

		if($email == "") 
		{
			$error_email=  "Please enter your email";
			$error++; 
		} 

		if(!preg_match('/^[0-9]{10}+$/', $phone)) 
		{
			$error_phone=  "Please enter valid mobile number";
			$error++; 
		} 

		if($phone == "") 
		{
			$error_phone=  "Please enter your mobile number";
			$error++; 
		} 

		if($age == "") 
		{
			$error_age=  "Please select you age";
			$error++; 
		} 

		if(strlen($username)<5)
		{
			$error_username =  "Username should be atleast five characters";
			$error++;
		}

		if($username =="") 
		{
			$error_username=  "Please enter your username";
			$error++;
		}

		if(!isset($gender))
		{ 
			$error_gender = "No gender selected"; 
			$error++;
		}

		if(!preg_match('@[A-Z]@', $password)){
			$error_passwd=  "Password must include an uppercase character";
			$error++;
		}

		if(!preg_match('@[a-z]@', $password)){
			$error_passwd=  "Password must include a lowercase character";
			$error++;
		}

		if(!preg_match('@[0-9]@', $password)){
			$error_passwd=  "Password must include a number";
			$error++;
		}

		if(!preg_match('@[^\w]@', $password)){
			$error_passwd=  "Password must include special character";
			$error++;
		}

		if(strlen($password) < 6){
			$error_passwd=  "Password must be greater than six characters";
			$error++;
		}

		if($password == ""){
			$error_passwd=  "Please enter password";
			$error++;
		}

		if($password_confirm == ""){
			$error_passwdConfirm=  "No password given";
			$error++;
		}

		if($password != $password_confirm) {
			$error_passwdConfirm=  "Password does not match";
			$error++;
		}


		if ($error == 0) 
		{
			$password = password_hash($password,  
				PASSWORD_DEFAULT);
			

			//$query = "INSERT INTO Register_Customer(Customer_Name, Customer_Email, Customer_Phone, Customer_Age, Customer_Gender, Customer_Username, Customer_Pass, Customer_Role) VALUES ('$name', '$email', '$phone', '$age', '$gender', '$username', '$password', '$role')";

			$query = "INSERT INTO user_master(Name, Email, Phone, Age, Gender, Username, Password, Role, Status) VALUES ('$name', '$email', '$phone', '$age', '$gender', '$username', '$password', '$role', '$status')";

			//mysqli_query($connect, $query);
			
			if ($result = oci_parse($conn, $query));
			{
				oci_execute($result);
				

				//$_SESSION['passmessage'] = "Account Registration Successful, click to <a href='login.php'>verify</a>";

				$select_email = "SELECT * FROM user_master where EMAIL = '$email'";
				$email_result = oci_parse($conn, $select_email);
				oci_execute($email_result);
			//echo $select_email;
			//die();

				if ($row = oci_fetch_assoc($email_result)) 
				{
					$token = openssl_random_pseudo_bytes(16);
					$userID = $row['USER_ID'];
					$token = bin2hex($token);

					$token_query = "INSERT INTO PASSWORD_RESET VALUES ('$token', '$userID')";
					$token_result = oci_parse($conn, $token_query);
					oci_execute($token_result);
					header("Location: customer_verify_email.php?token=$token&id=$userID&email=$email");
				}

				$name="";
				$email="";
				$phone="";
				$age="";
				$gender="";
				$username="";
				$role = "";
				$_SESSION['passmessage'] = "Account Registration Successful";
			}
			//echo $query;
		}

	}

	include "header.php";

	?>


	<div class="container col-lg-6 pt-2 pb-4 col-md-8 col-sm-10" id="container-register">
		<div class="border rounded shadow p-3 bg-white rounded">
			<form class="px-4 py-3" id="" method="POST" action="" role="form">
				<div class="col-12 text-left pb-4">
					<h1>Create account</h1>
				</div>

				<div class="row">
					<div class="col-12">

						<div class="form-group">
							<label for="staticName">Full Name*</label>
							<input type="name" class="form-control" id="staticName" name="Cname" placeholder="FullName" value="<?php if(isset($name)) echo $name ?>">

							<?php if (isset($error_name)) echo '<div class="error">'.$error_name.'</div>';?> 

						</div>

					</div>

					<div class="col-12">

						<div class="form-group">
							<label for="staticEmail">Email Address*</label>
							<input type="text" class="form-control" id="staticEmail" name="CEmail" placeholder="Xyz@gmail.com" value="<?php if(isset($email)) echo $email ?>">

							<?php if (isset($error_email)) echo '<div class="error">'.$error_email.'</div>';?> 

						</div>

					</div>

					<div class="col-12">

						<div class="form-group">
							<label for="staticNumber">Mobile Number*</label>
							<input type="text-center" class="form-control" id="staticText" name="CPhone" placeholder="+977 98xxxxxxx" value="<?php if(isset($phone)) echo $phone ?>">

							<?php if (isset($error_phone)) echo '<div class="error">'.$error_phone.'</div>';?>

						</div>

					</div>

					<div class="col-12">

						<div class="form-group">
							<label for="staticAge">Age*</label>
							<select id="form_need" name="Cage" class="form-control"  data-error="Please specify your need." >

								<option value="">--Select Your Age--</option>
								<option <?php if( isset($age) && $age == "Under 18") echo "selected"?> >Under 18</option>
								<option <?php if( isset($age) && $age == "18-24") echo "selected"?> >18-24</option>
								<option <?php if( isset($age) && $age == "24-30") echo "selected"?> >24-30</option>
								<option <?php if( isset($age) && $age == "Above 30") echo "selected"?> >Above 30</option>

							</select>

							<?php if (isset($error_age)) echo '<div class="error">'.$error_age.'</div>';?>

						</div>
					<!--div class="form-group">
					      <label for="staticEmail">Age*</label>
					      <input type="number" class="form-control" id="staticEmail" name="Cage" placeholder="" required="">
					  </div-->

					</div>

					<div class="col-12 pb-2">
						<label for="staticGender">Gender*</label>
						<div class="col-12 text-center">
							<div class="form-check form-check-inline col-3">
								<input class="form-check-input" type="radio" name="CGender" id="inlineRadio1" value= "Male" <?php if(isset($gender) && $gender == "Male") echo "checked" ?> > 
								<label class="form-check-label" for="inlineRadio1">Male</label>
							</div>
							<div class="form-check form-check-inline col-3">
								<input class="form-check-input" type="radio" name="CGender" id="inlineRadio2" value="Female" <?php if(isset($gender) && $gender == "Female") echo "checked" ?> >
								<label class="form-check-label" for="inlineRadio2">Female</label>
							</div>
							<div class="form-check form-check-inline col-3">
								<input class="form-check-input" type="radio" name="CGender" id="inlineRadio2" value="Rather Not Specify" <?php if(isset($gender) && $gender == "Rather Not Specify") echo "checked" ?> >
								<label class="form-check-label" for="inlineRadio2">Rather Not Specify</label>
							</div>

							<?php if (isset($error_gender)) echo '<div class="error text-left">'.$error_gender.'</div>';?>
						</div>

					</div>

					<div class="col-12">

						<div class="form-group">
							<label for="staticUsername">Username*</label>
							<input type="username" class="form-control" name="CUsername" id="staticUsername" placeholder="Username" value="<?php if(isset($username)) echo $username ?>">

							<?php if (isset($error_username)) echo '<div class="error">'.$error_username.'</div>';?>

						</div>

					</div>

					<div class="col-12">

						<div class="form-group">
							<label for="staticPassword">Password*</label>
							<input type="password" class="form-control" name="CPass" id="staticPassword" placeholder="Password" value="">

							<?php if (isset($error_passwd)) echo '<div class="error">'.$error_passwd.'</div>';?>

						</div>



					</div>

					<div class="col-12">

						<div class="form-group">
							<label for="staticPassword">Confirm Password*</label>
							<input type="password" class="form-control" name="CPassCon" id="staticPassword" placeholder="Confirm Password" value="">

							<?php if (isset($error_passwdConfirm)) echo '<div class="error">'.$error_passwdConfirm.'</div>';?>

						</div>



					</div>

				</div>



				<div class="row">
					<div class="col-12 text-center">
						<button type="submit" name="btnSubmit" class="btn col-lg-3 col-md-4 col-sm-6" id="reg-cus-btn">SIGN UP</button>
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
	clearMsg();
	?>


</body>
</html>