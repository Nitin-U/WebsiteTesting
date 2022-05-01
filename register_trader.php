<?php
	include "crud/connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="css/alert.css">

	<?php
	include "header.php";
	?>

	<style type="">
		
		.error{
			color: red;
			font-style: italic;
		}

		#customer_message{
			margin-top: 20px;
		}

	</style>

<!------------------------------------------------------------------------------------------->
<?php 
	if (isset($_POST['btnSubmit'])) 
	{
		$name=$_POST['Trad_name'];
		$email=$_POST['Trad_Email'];
		$phone=$_POST['Trad_Phone'];
		$username=$_POST['Trad_Username'];
		$password=$_POST['Trad_Password'];
		$confirm_password=$_POST['Trad_Confirm_Password'];
		$type = $_POST['Trad_Type'];
		$shop=$_POST['Trad_Shop'];
		$image=$_POST['Trad_Image'];
		$role = "trader";

		//$file = $_FILES['Trad_Image'];

		$error = 0;


/*------------------Image Validation---------------------->*/

//$filename = $file['img_name'];
//$filepath = $file['tmp_name'];
//$fileerror = $file['error'];


/*------------------Image Validation---------------------->*/

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

		if($email == null) 
		{
			$error_email=  "Please enter your email";
			$error++;
		}

		if(!preg_match('/^[0-9]{10}+$/', $phone)) 
		{
			$error_phone=  "Please enter valid mobile number";
			$error++; 
		} 

		if($phone == null) 
		{
			$error_phone=  "Please enter your mobile number";
			$error++;
		}

		if(strlen($username)<5)
		{
			$error_username =  "Username should be atleast five characters";
			$error++;
		}

		if($username == null) 
		{
			$error_username=  "Please enter your username";
			$error++;
		}

		if(!preg_match('@[A-Z]@', $password)){
		$error_password=  "Password must include an uppercase character";
		$error++;
		}

		if(!preg_match('@[a-z]@', $password)){
		$error_password=  "Password must include a lowercase character";
		$error++;
		}

		if(!preg_match('@[0-9]@', $password)){
		$error_password=  "Password must include a number";
		$error++;
		}

		if(!preg_match('@[^\w]@', $password)){
		$error_password=  "Password must include special character";
		$error++;
		}

		if(strlen($password) < 6){
		$error_password=  "Password must be greater than six characters";
		$error++;
		}

		if($password == null) 
		{
			$error_password=  "Please enter your password";
			$error++;
		}

		if($confirm_password == null) 
		{
			$error_confirm_password=  "No password given";
			$error++;
		}

		if($password != $confirm_password) {
		$error_confirm_password=  "Password does not match";
		$error++;
		}

		if($type == null) 
		{
			$error_type=  "Please select your shop type";
			$error++;
		}

		if($shop == null) 
		{
			$error_shop=  "Please enter your shop name";
			$error++;
		}

		if($image == null) 
		{
			$error_image =  "Please upload your image";
			$error++;
		}

		if ($error == 0) 
		{
			$password = password_hash($password,  
	          PASSWORD_DEFAULT);

			$query = "INSERT INTO Register_Trader(Trader_Name, Trader_Email, Trader_Phone, Trader_Username, Trader_Password, Trader_Type, Trader_Shop, Trader_Image, Trader_Role) VALUES ('$name', '$email', '$phone', '$username', '$password', '$type', '$shop' , '$image', '$role')";
			
			if ($result = oci_parse($conn, $query))
			{
				oci_execute($result);
				$success="Trader Account Registered Successfully! <a href='login.php' style=' text-decoration:none; color:#000; '>Click here to login</a>";
				$name="";
				$email="";
				$phone="";
				$username="";
				$type="";
				$shop="";
				$image="";
			}


			//echo $query;

		}

	

	}

?>

<?php
	if (isset($success)) 
		{?>
			<div class="container" id="customer_message">
			    <div class="row">
			        <div class="col-md-12">  
			            <div class="alert alert-success-alt alert-dismissable w-75 mx-auto">
			                <span class="glyphicon glyphicon-certificate"></span>
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
			                    ×</button><?php echo $success; 	 	
	}
?>
			            </div>
			        </div>
			    </div>
			</div>

<div class="container col-lg-6 pt-2 pb-4 col-md-8 col-sm-10" id="container-register">
  <div class="border rounded shadow p-3 bg-white rounded">
  	<form class="px-4 py-3" method="POST" action="" id="" role="form">
  		<div class="col-12 text-left pb-4">
			<h1>Create account</h1>
		</div>
	    
		<div class="row">
			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticName">Full Name*</label>
				      <input type="name" class="form-control" name="Trad_name" id="staticName" placeholder="FullName" value="<?php if(isset($name)) echo $name ?>">

				      <?php if (isset($error_name)) echo '<div class="error">'.$error_name.'</div>';?>
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticEmail">Email Address*</label>
				      <input type="text" class="form-control" name="Trad_Email" id="staticEmail" placeholder="Xyz@gmail.com" value="<?php if(isset($email)) echo $email ?>">
				      <?php if (isset($error_email)) echo '<div class="error">'.$error_email.'</div>';?>
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticNumber">Mobile Number*</label>
				      <input type="text-center" class="form-control" name="Trad_Phone" id="staticText" placeholder="+977 98xxxxxxx" value="<?php if(isset($phone)) echo $phone ?>">
				      <?php if (isset($error_phone)) echo '<div class="error">'.$error_phone.'</div>';?>
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticUsername">Username*</label>
				      <input type="username" class="form-control" name="Trad_Username" id="staticUsername" placeholder="Username" value="<?php if(isset($username)) echo $username ?>">
				      <?php if (isset($error_username)) echo '<div class="error">'.$error_username.'</div>';?>
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticPassword">Password*</label>
				      <input type="password" class="form-control" name="Trad_Password" id="staticPassword" placeholder="Password" value="">
				      <?php if (isset($error_password)) echo '<div class="error">'.$error_password.'</div>';?>
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticConfirmPassword">Confirm Password*</label>
				      <input type="password" class="form-control" name="Trad_Confirm_Password" id="staticConfirmPassword" placeholder="Confirm Your Password" value="">
				      <?php if (isset($error_confirm_password)) echo '<div class="error">'.$error_confirm_password.'</div>';?>
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticAge">Trader Type*</label>
				      <select id="form_need" class="form-control" name="Trad_Type"  data-error="Please specify your need." >

				      		<option value="">--Select Your Category--</option>
				      		<option <?php if( isset($type) && $type == "Greengrocer") echo "selected"?>>Greengrocer</option>
				      		<option <?php if( isset($type) && $type == "Fishmonger") echo "selected"?>>Fishmonger</option>
				      		<option <?php if( isset($type) && $type == "Butcher") echo "selected"?>>Butcher</option>
				      		<option <?php if( isset($type) && $type == "Bakery") echo "selected"?>>Bakery</option>
				      		<option <?php if( isset($type) && $type == "Delicatessen") echo "selected"?>>Delicatessen</option>

				      	</select>
				      	<?php if (isset($error_type)) echo '<div class="error">'.$error_type.'</div>';?>
				</div>

			</div>

			<div class="col-12">
			
				<div class="form-group">
				      <label for="staticShop">Shop Name*</label>
				      <input type="text" class="form-control" name="Trad_Shop" id="staticShop" placeholder="Enter Your Shop's Name" value="<?php if(isset($shop)) echo $shop ?>">
				      <?php if (isset($error_shop)) echo '<div class="error">'.$error_shop.'</div>';?>
				</div>
				

			</div>

			<div class="col-12">
			
				<!--div class="form-group">
				      <label for="staticShop">Choose Profile Image*</label>
				      <input type="file" class="form-control" id="fileUpload" placeholder="Browse" required="" multiple="">
				</div-->

				<form action="/action_page.php">
			    <p>Choose Profile Image*</p>
			    <div class="custom-file mb-3">
			      <input type="file" class="custom-file-input" id="customFile" name="Trad_Image" value="<?php if(isset($image)) echo $image ?>" accept="image/*">
			      <label class="custom-file-label" for="customFile">Choose Image</label>
			      <?php if (isset($error_image)) echo '<div class="error">'.$error_image.'</div>';?>
			    </div>

			</div>

			

		</div>

	    

		<div class="row">
			<div class="col-12 text-center">
				<button type="submit" name="btnSubmit" class="btn col-lg-3 col-md-4 col-sm-6" id="reg-trad-btn">SIGN UP</button>
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