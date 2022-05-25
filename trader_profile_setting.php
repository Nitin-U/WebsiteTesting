<?php include "crud/connection.php"; 
  if ($_SESSION['role']!='trader')
  {
    header("Location: index.php");
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

  <?php
  
    if (isset($_POST['SubmitChange'])) 
    {
      $fullname = $_POST['name'];
      $username = $_POST['username'];
      $phone = $_POST['phone'];
      $image = $_POST['image'];
      $error = 0;

      if(strlen($fullname)<3)
      {
        $error_name =  "Full name should be atleast three characters";
        $error++;
      }
      if($fullname == null) 
      {
        $error_name=  "Name must not be empty";
        $error++;
      }
      if(strlen($username)<5)
      {
        $error_username =  "Username should be atleast five characters";
        $error++;
      }
      if($username =="") 
      {
        $error_username=  "Username must not be empty";
        $error++;
      }
      if(!preg_match('/^[0-9]{10}+$/', $phone)) 
      {
        $error_phone=  "Please enter valid mobile number";
        $error++; 
      } 
      if($phone == "") 
      {
        $error_phone=  "Phone number must not be empty";
        $error++; 
      }

      if ($error == 0) 
      {
        if (trim($image!=null)) 
        {
          $profile_update_query = "UPDATE user_master SET NAME = '".$fullname."', USERNAME = '".$username."', PHONE = '".$phone."', SHOP_IMAGE = '".$image."' WHERE USER_ID = " . $_SESSION['id'];
        }
        else
        {
          $profile_update_query = "UPDATE user_master SET NAME = '".$fullname."', USERNAME = '".$username."', PHONE = '".$phone."' WHERE USER_ID = " . $_SESSION['id'];
        }
        
        $profile_update_result = oci_parse($conn, $profile_update_query);
        oci_execute($profile_update_result);
        $_SESSION['passmessage'] = "Profile updated successfully";
      }
    }


    $getid_query = "Select * from user_master where USER_ID = " . $_SESSION['id'];
    $id_result = oci_parse($conn, $getid_query);
    oci_execute($id_result);

    while ($row = oci_fetch_assoc($id_result)) 
    {
   
  ?>

  <div class="main">
    <form action="" method="POST">
        <img src="img/<?php echo $row['SHOP_IMAGE']; ?>" width="140" height="120" style=" display: block; margin: 0 auto 20px auto; border-radius: 50%; ">
        <label for="pname">Full Name <span>*</span></label><br>
        <input type="text" id="tname" name="name" value="<?php echo $row['NAME'] ?>"><br>
        <div class="mb-2"><?php if (isset($error_name)) echo '<div class="error">'.$error_name.'</div>';?> </div>

        <label for="pType">User Name <span>*</span></label>
        <input type="text" id="tuser" name="username" value="<?php echo $row['USERNAME'] ?>"><br>
        <div class="mb-2"><?php if (isset($error_username)) echo '<div class="error">'.$error_username.'</div>';?> </div>

        <label for="pType">Phone <span>*</span></label>
        <input type="text" id="tphone" name="phone" value="<?php echo $row['PHONE'] ?>"><br>
        <div class="mb-2"><?php if (isset($error_phone)) echo '<div class="error">'.$error_phone.'</div>';?> </div>

        <label for="pType">Email <span>*</span></label>
        <input type="text" id="temail" name="email" value="<?php echo $row['EMAIL'] ?>" disabled><br>
        <div class="mb-2"></div>

        <label for="pType">Shop Type <span>*</span></label>
        <input type="text" id="tshop" name="shoptype" value="<?php echo $row['SHOP_TYPE'] ?>" disabled><br>
        <div class="mb-4"></div>

        <label for="pType">Choose Image <span>*</span></label>
        <div class="custom-file mb-3">
            <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
            <label class="custom-file-label" for="inputGroupFile01">Browse</label>
          </div>
          <div class="mb-4"></div>

        <p>Change Password? <a href="trader_password_manage.php">Click Here </a></p>

        <!-- <div class="row">
			    <div class="col-12 md-5 text-center">
          <button type="button" class="btn btn-white mx-auto col-4" id="abc">Save Change</button>
			    </div>
		    </div> -->
        <div class="col-md-12"> 
   			    <div class="card-text text-center">
   				    <button type="submit" class="btn btn-white text-light" id="abc" name="SubmitChange">Save Change</button> <br/><br/>
   			    </div>
   		    </div>
   	    </div>

      <?php } ?>
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
    clearMsg();
  ?>

</body>
</html>