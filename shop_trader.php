<?php
  
  include "crud/connection.php";
  if($_SESSION['role']!='trader')
  {
    header("location: index.php");
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
      color:#fff;
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
  if (isset($_POST['Submitbtn'])) 
  {
    
    $shop = $_POST['name'];
    $type = $_POST['type'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $error = 0;

    if (strlen($shop) < 5) 
    {
      $error_shop = "Shop name must be greater than five characters";
      $error++;
    }
    if ($shop == null) 
    {
      $error_shop = "Please enter shop name";
      $error++;
    }

    if (strlen($type) < 5) 
    {
      $error_type = "Name must be greater than five characters";
      $error++;
    }
    if ($type == null) 
    {
      $error_type = "Please enter shop type";
      $error++;
    }

    if (strlen($address) < 5) 
    {
      $error_address = "Address must exceed five characters";
      $error++;
    }

    if ($address == null) 
    {
      $error_address = "Please enter the address";
      $error++;
    }

    if(!preg_match('/^[0-9]{10}+$/', $phone)) 
    {
      $error_phone=  "Please enter valid mobile number";
      $error++; 
    } 

    if ($phone == null) 
    {
      $error_phone =  "Please enter phone number";
      $error++;
    }

    if ($error == 0) 
    {
        $shop_insert_query = "INSERT INTO SHOP (SHOP_NAME, SHOP, SHOP_ADDRESS, SHOP_PHONE, FK1_USER_ID) VALUES ('$shop', '$type', '$address', '$phone', '". $_SESSION['id'] ."')";

        if($shop_insert_result = oci_parse($conn, $shop_insert_query));
        {
          oci_execute($shop_insert_result);
          $shop = "";
          $type = "";
          $address = "";
          $phone = "";
          $_SESSION['passmessage'] = "Shop added successfully";
        }
        
    }


    }

?>

  <div class="main">
    <form action="#" method="POST">
      <br>
        <label for="Name">Shop Name <span>*</span></label><br>
        <input type="text" id="name" name="name" value="<?php if(isset($shop)) echo $shop ?>"><br>
        <div class="mb-3"><?php if (isset($error_shop)) echo '<div class="error">'.$error_shop.'</div>';?> </div>

        <label for="Name">Shop Type <span>*</span></label><br>
        <input type="text" id="type" name="type" value="<?php if(isset($type)) echo $type ?>"><br>
        <div class="mb-3"><?php if (isset($error_type)) echo '<div class="error">'.$error_type.'</div>';?> </div>

        <label for="Address">Address <span>*</span></label>
        <input type="text" id="address" name="address" value="<?php if(isset($address)) echo $address ?>"><br>
        <div class="mb-3"><?php if (isset($error_address)) echo '<div class="error">'.$error_address.'</div>';?> </div>

        <label for="Phone">Phone <span>*</span></label>
        <input type="text" id="phone" name="phone" value="<?php if(isset($phone)) echo $phone ?>"><br>
        <div class="mb-3"><?php if (isset($error_phone)) echo '<div class="error">'.$error_phone.'</div>';?> </div>

        <div class="col-md-12"> 
   			  <div class="card-text text-center">
   				  <button type="submit" class="btn btn-white" id="abc" name="Submitbtn">Create</button> <br/><br/>
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
    clearMsg();
  ?>

</body>
</html>