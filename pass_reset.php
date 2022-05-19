<?php
include "crud/connection.php";


if (isset($_POST['submit'])) 
{
	$email = $_POST['email'];

	$sql = "SELECT * FROM user_master WHERE EMAIL = '$email'";
	$result = oci_parse($conn, $sql);
	oci_execute($result);
	if ($row=oci_fetch_assoc($result)) {
		$token = openssl_random_pseudo_bytes(16);
		$userID = $row['USER_ID'];
//Convert the binary data into hexadecimal representation.
		$token = bin2hex($token);

		$token_query = "INSERT INTO PASSWORD_RESET VALUES ('$token', '$userID')";
		$token_result = oci_parse($conn, $token_query);
		oci_execute($token_result);
		header("Location: pass_reset_email.php?token=$token&id=$userID&email=$email");
	}
	
	else {
		$_SESSION['failmessage']="Email doesnot exist";
	}
}

include "header.php";
?>

<div class="container py-4 col-lg-6 col-sm-10" id="container-login">
	<div class="border rounded shadow p-3 bg-white rounded">
		<form class="px-4 py-3" method="POST" id="" role="form" action="">
			<div class="col-12 text-left pb-4">
				<h1>Forget Password</h1>
			</div>

			<div class="row">
				<div class="col-12">

					<div class="form-group row">
						<label for="staticEmail" class="col-lg-3 col-md-2 col-sm-12">Email</label>
						<div class="col-lg-9 col-md-10 col-sm-12"><input type="email" name="email" class="form-control" id="staticUsername" placeholder="Enter your email address" required=""></div>
					</div>

				</div>
			</div>

			<div class="row">
				<div class="col-12 text-center">
					<button type="submit" name="submit" class="btn col-lg-3 col-md-4 col-sm-6" id="login-btn">SUBMIT</button>

				</form>




			</div>
		</div>


		<?php include "footer.php"; 
			  clearMsg();
		?>