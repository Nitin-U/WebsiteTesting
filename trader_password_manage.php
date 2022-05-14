<?php
  include "crud/connection.php";
  if ($_SESSION['role']!='trader')
  {
    header("Location: index.php");
  }

  if (isset($_POST['btnSubmit'])) 
  {
    $currentpass = $_POST['currentpass'];
    $newpass = $_POST['newpass'];
    $confirmpass = $_POST['confirmpass'];
    $error = 0;

    if ($currentpass == null) 
    {
      $error_current = "Please enter old password";
      $error++;
    }
    else 
    {
        $select_pass_query = "SELECT * FROM user_master WHERE USER_ID = " . $_SESSION['id'];
        $select_pass_result = oci_parse($conn, $select_pass_query);
        oci_execute($select_pass_result);

        $row = oci_fetch_assoc($select_pass_result);
    
        if (!password_verify($currentpass, $row['PASSWORD']))
          {
            
            $error_current = "Password did not match database";
            $error++;
          } 
    } 
      

    if ($newpass == null) 
    {
      $error_new = "Please enter new password";
       $error++;
    }
    elseif ($currentpass == $newpass) 
    {
      if (password_verify($newpass, $row['PASSWORD']))
          {
            
            $error_new = "New password cannot be old password";
            $error++;
          } 
    }

    if ($confirmpass == null) 
    {
      $error_confirm = "No password given";
       $error++;
    }
    elseif ($confirmpass != $newpass) 
   {
      $error_confirm = "Password didn't match";
       $error++;
   }

    if ($error == 0) 
    {
      
      $newpass = password_hash($newpass,  
            PASSWORD_DEFAULT);

      $update_password_query = "UPDATE user_master SET PASSWORD = '$newpass' WHERE USER_ID = " .$_SESSION['id'];
      $update_password_result = oci_parse($conn, $update_password_query);
      oci_execute($update_password_result);

      $_SESSION['passmessage'] = "Password Updated Successfully";
      header("Location: trader_profile_setting.php");

    }

  }

?>
<!DOCTYPE html>
<html>
<head>
    
	<title></title>

  <link rel="stylesheet" href="css/manage.css">

	<?php
	include "header.php";
	?>
  <style>
    @media only screen and (max-width: 600px) {
      #abc{
      font-size: 6px;
    }
    h2{
      font-size: 16px;
    }
    a{
      padding: 0;
    }
    }
    #abc{
      background-color: #F48037;
      border-radius: none;
      transition: 0.4s;
      margin-bottom: 20px;
    }
    #abc:hover{
      background-color: #7CC355;
      color: #fff;
    }

    .error{
      color: red;
      font-style: italic;
    }

    

  </style>

</head>
<body>

<!-- ------body------ -->
  <h2>Manage Products</h2>
  <?php
    include "sidebar.php";
  ?>
  <div class="main">
    <form action="" method="POST">
      <br>
        <label for="pname">Current Password <span>*</span></label><br>
        <input type="password" id="pcurrent" name="currentpass">
        <div class="mb-3"><?php if (isset($error_current)) echo '<div class="error">'.$error_current.'</div>';?></div>

        <label for="pType">New Password <span>*</span></label>
        <input type="password" id="pnew" name="newpass">
         <div class="mb-3"><?php if (isset($error_new)) echo '<div class="error">'.$error_new.'</div>';?></div>

        <label for="pType">Confirm Password <span>*</span></label>
        <input type="password" id="pconfirm" name="confirmpass">
         <div class="mb-3"><?php if (isset($error_confirm)) echo '<div class="error">'.$error_confirm.'</div>';?></div>

        <!-- <div class="row">
			    <div class="col-12 md-5 text-center">
          <button type="button" class="btn btn-white mx-auto col-4" id="abc">Save Change</button>
			    </div>
		    </div> -->
          <div class="col-md-12"> 
   			    <div class="card-text text-center">
   				    <button type="submit" class="btn btn-white text-light" name="btnSubmit" id="abc">Save Change</button> <br/><br/>
   			    </div>
   		    </div>
   </div>

    </form>
  </div>

  <script>   //dropdown produts 
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
        dropdownContent.style.display = "block";
        }
         });
    }
  </script>

<!-- -----footer------- -->

  <?php
	  include "footer.php";
  ?>

</body>
</html>