<style type="text/css">
	.error{
      color: red;
      font-style: italic;
    }
</style>
<?php
	include "crud/connection.php";
	if(isset($_GET['token']) && isset($_GET['id']))
	{
	$token=$_GET['token'];
	$id=$_GET['id'];
	$sql="Select * from PASSWORD_RESET where TOKEN='$token' and FK1_USER_ID=$id";
	// echo $sql;
	// die();
	$result=oci_parse($conn, $sql);
	oci_execute($result);
	if(!oci_fetch_assoc($result))
	{
		$_SESSION['failmessage']="Invalid token";
		header('Location: index.php');
	}
}
else
{
	header('Location: index.php');
	
}
if(isset($_POST['submit']))
{
	$newpass=$_POST['newpass'];
	$conpass=$_POST['conpass'];
	$error = 0;

	if ($newpass == null) 
	{
		$error_newpass = "Please enter your new password";
		$error++;
	}
	if ($conpass != $newpass) 
	{
		$error_conpass = "Password did not match";
		$error++;
	}

	if($error==0)
	{
		$newpass = password_hash($newpass,  
	          PASSWORD_DEFAULT);
		$pass_update_query = "UPDATE user_master set PASSWORD= '$newpass' where USER_ID= $id";
		$passResult=oci_parse($conn, $pass_update_query);
		oci_execute($passResult);
		$_SESSION['passmessage']="Password changed successfully";
		header('Location: login.php');
	}
	// else
	// {
	// 	$_SESSION['failmessage']="New password and confirm password donot match";
	// }

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
						<label for="staticEmail" class="col-lg-3 col-md-2 col-sm-12">New Password</label>
						<div class="col-lg-9 col-md-10 col-sm-12"><input type="text" name="newpass" class="form-control" id="staticUsername" placeholder="Enter new password">
							<?php if (isset($error_newpass)) echo '<div class="error mt-2">'.$error_newpass.'</div>';?>
						</div>
					</div>

					<div class="form-group row">
						<label for="staticEmail" class="col-lg-3 col-md-2 col-sm-12">Confirm Password</label>
						<div class="col-lg-9 col-md-10 col-sm-12"><input type="text" name="conpass" class="form-control" id="staticUsername" placeholder="Confirm new password">
							<?php if (isset($error_conpass)) echo '<div class="error mt-2 mb-2">'.$error_conpass.'</div>';?>
						</div>
					</div>
					<!-- <input type="hidden" name="id" value ="<?php echo $_GET['id']?>"> -->

				</div>
			</div>

			<div class="row">
				<div class="col-12 text-center">
					<button type="submit" name="submit" class="btn col-lg-3 col-md-4 col-sm-6" id="login-btn">SUBMIT</button>

				</form>




			</div>
		</div>


<?php include "footer.php" ?>