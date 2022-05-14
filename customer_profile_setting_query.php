<!--?php
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

      $_SESSION['passmessage'] = "Profile updated successfully";
      header("Location: customer_profile_setting.php");

    }
    header("Location: customer_password_manage.php");

  }

?-->