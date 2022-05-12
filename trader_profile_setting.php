<?php include "crud/connection.php"; ?>
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

      $profile_update_query = "UPDATE user_master SET NAME = '".$fullname."', USERNAME = '".$username."', PHONE = '".$phone."', SHOP_IMAGE = '".$image."' WHERE USER_ID = " . $_SESSION['id'];
      //echo $profile_update_query;
      //die();
      $profile_update_result = oci_parse($conn, $profile_update_query);
      oci_execute($profile_update_result);
    }


    $getid_query = "Select * from user_master where USER_ID = " . $_SESSION['id'];
    $id_result = oci_parse($conn, $getid_query);
    oci_execute($id_result);

    while ($row = oci_fetch_assoc($id_result)) 
    {
   
  ?>

  <div class="main">
    <form action="#" method="POST">
        <img src="img/<?php echo $row['SHOP_IMAGE']; ?>" width="140" height="120" style=" display: block; margin: 0 auto 20px auto; border-radius: 50%; ">
        <label for="pname">Full Name <span>*</span></label><br>
        <input type="text" id="tname" name="name" value="<?php echo $row['NAME'] ?>" required><br>

        <label for="pType">User Name <span>*</span></label>
        <input type="text" id="tuser" name="username" value="<?php echo $row['USERNAME'] ?>" required><br>

        <label for="pType">Phone <span>*</span></label>
        <input type="text" id="tphone" name="phone" value="<?php echo $row['PHONE'] ?>" required><br>

        <label for="pType">Email <span>*</span></label>
        <input type="text" id="temail" name="email" value="<?php echo $row['EMAIL'] ?>" disabled><br>

        <label for="pType">Shop Type <span>*</span></label>
        <input type="text" id="tshop" name="shoptype" value="<?php echo $row['SHOP_TYPE'] ?>" disabled><br>

        <div class="custom-file mt-2 mb-3">
            <input type="file" class="custom-file-input" name="image" id="inputGroupFile01">
            <label class="custom-file-label" for="inputGroupFile01">Browse</label>
          </div>

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
  ?>

</body>
</html>