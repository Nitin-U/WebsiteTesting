<?php
  include "crud/connection.php";
  if ($_SESSION['role']!='customer') 
  {
    header("Location: index.php");
  }

?>
<!DOCTYPE html>
<html>
<head>
    
	<title></title>

  <link rel="stylesheet" href="css/manage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php
	include "header.php";
	?>

<style>
    @media only screen and (max-width: 600px) {
    #abc{
      font-size: 8px;
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

<?php
  if (isset($_POST['btnSubmit'])) 
  {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $error = 0;

    if ($name == null) 
    {
      $error_name = "Name must not be empty";
      $error++;
    }

    if ($username == null) 
    {
      $error_username = "Username must not be empty";
      $error++;
    }

    if ($phone == null) 
    {
      $error_phone = "Phone number must not be empty";
      $error++;
    }

    if ($age == null) 
    {
      $error_age = "Please select the age";
      $error++;
    }

    if ($error == 0) 
    {
      
      $update_customerdata = "UPDATE user_master SET NAME = '".$name."', USERNAME = '".$username."', PHONE = '".$phone."', AGE = '".$age."' WHERE USER_ID = " .$_SESSION['id'];
      $updatecustomer_data_result = oci_parse($conn, $update_customerdata);
      oci_execute($updatecustomer_data_result);

      $_SESSION['passmessage'] = "Profile updated successfully";

    }

    

  }

?>

<?php
  $fetch_userdata_query = "SELECT * FROM user_master WHERE USER_ID = " .$_SESSION['id'];
  $userdata_result = oci_parse($conn, $fetch_userdata_query);
    oci_execute($userdata_result);

    while ($row = oci_fetch_assoc($userdata_result)) 
    {

?>

<!-- ------body------ -->
  <h2>Edit Profile</h2>
  <?php
    include "sidebar_customer.php";
  ?>
  <div class="main">
    <form action="" method="POST">
      <br>
        <label for="pname">Full Name <span>*</span></label><br>
        <input type="text" id="cname" value="<?php echo $row['NAME']; ?>" name="name"><br>
        <div class="mb-2"><?php if (isset($error_name)) echo '<div class="error">'.$error_name.'</div>';?></div>

        <label for="pname">User Name <span>*</span></label><br>
        <input type="text" id="cusername" value="<?php echo $row['USERNAME']; ?>" name="username"><br>
        <div class="mb-2"><?php if (isset($error_username)) echo '<div class="error">'.$error_username.'</div>';?></div>

        <label for="pType">Mobile No <span>*</span></label>
        <input type="text" id="cphone" value="<?php echo $row['PHONE']; ?>" name="phone"><br>
        <div class="mb-2"><?php if (isset($error_phone)) echo '<div class="error">'.$error_phone.'</div>';?></div>


        <label for="pType">Age <span>*</span></label>
        <select id="form_need" name="age" class="form-control"  data-error="Please specify your need." >

                    <option value="">--Select Your Age--</option>
                    <option <?php if( isset($row['AGE']) && $row['AGE'] == "Under 18") echo "selected"?> >Under 18</option>
                    <option <?php if( isset($row['AGE']) && $row['AGE'] == "18-24") echo "selected"?> >18-24</option>
                    <option <?php if( isset($row['AGE']) && $row['AGE'] == "24-30") echo "selected"?> >24-30</option>
                    <option <?php if( isset($row['AGE']) && $row['AGE'] == "Above 30") echo "selected"?> >Above 30</option>

                  </select><br>   
        <div class="mb-2"><?php if (isset($error_age)) echo '<div class="error">'.$error_age.'</div>';?></div>

        <label for="pType">Email Address <span>*</span></label>
        <input type="text" id="cemail" value="<?php echo $row['EMAIL']; ?>" name="email" disabled=""><br>
        <div class="mb-2"></div>

        <label for="pType">Gender <span>*</span></label>
        <input type="text" id="cgender" value="<?php echo $row['GENDER']; ?>" name="gender" disabled=""><br>
        <div class="mb-4"></div>


        <p>Change Password? <a href="customer_password_manage.php">Click Here </a></p>

        <!-- <div class="row">
			    <div class="col-12 md-5 text-center">
          <button type="button" class="btn btn-white mx-auto col-4" id="abc">Save Chnage</button>
			    </div>
		    </div> -->
        <div class="col-md-12"> 
   			    <div class="card-text text-center">
   				    <button value="submit" class="btn btn-white text-light" name="btnSubmit" id="abc">Save Change</button> <br/><br/>
   			    </div>
   		    </div>
   	    </div>
    </form>
  </div>

<?php } ?>

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