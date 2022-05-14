<<<<<<< HEAD
 <?php
    include "crud/connection.php";
  ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link rel="stylesheet" href="css/manage.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

  <?php
  include "header.php";
  ?>

<style>
    @media only screen and (max-width: 600px) {
      a #abc{
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
  <div class="sidenav">
    <a href="trader_profile_setting.php">&nbsp; <i class="fa fa-user" style="color:white;"></i> &nbsp; My Account</a>

    <button class="dropdown-btn">
      &nbsp;<i class="fa fa-shopping-cart" style="color:white;"></i> &nbsp; Products<i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a class="active" href="addProduct.php">Add Products</a>
      <a href="displayProduct.php">Display Products</a>
    </div>
    <a href="shop_trader.php">&nbsp;<i class="fa fa-shop" style="color:white;"></i> &nbsp; Shops</a>
    <a href="discount.php">&nbsp;<i class="fa fa-percent" style="color:white;"></i> &nbsp; Discounts</a>
  </div>

  <?php

  $PRODUCT_ID = $_GET['PRODUCT_ID'];

    if (isset($PRODUCT_ID)) 
    {
      $displayproduct_query = "SELECT * FROM PRODUCT WHERE PRODUCT_ID = " .$PRODUCT_ID;
      $displayproduct_result = oci_parse($conn, $displayproduct_query);
      oci_execute($displayproduct_result);
    }

     while ($row = oci_fetch_assoc($displayproduct_result)) 
      { ?>
        
     

  


  <div class="main">
    <form method="POST" action="amendProduct.php">
      <br>
      <input type="hidden" name="productid" value="<?php echo $row['PRODUCT_ID'] ?>">

        <label for="pname">Product Name <span>*</span></label><br>
        <input type="text" id="pname" name="name" value="<?php echo $row['PRODUCT_NAME']; ?>" required><br>

        <div class="row">
          <div class="form-group col-md-6 col-6">
            <label for="input">Price<span>*</span></label>
            <input type="Price" class="form-control" name="price" value="<?php echo $row['PRODUCT_PRICE']; ?>">
          </div>
          <div class="form-group col-md-6 col-6">
            <label for="input">Discount</label>
            <input type="Discount" class="form-control" name="discount" value="<?php echo $row['PRODUCT_DISCOUNT']; ?>">
          </div>
        </div>

        <!--label for="pType">Product Type <span>*</span></label>
        <input type="text" id="pType" name="pType" required><br-->

        <label for="pDescription">Product Description <span>*</span></label><br>
        <textarea id="message" rows="3" name="proddesc" value=""><?php echo $row['PRODUCT_DESC']; ?></textarea>

        <label for="aInformation">Allergy Information</label><br>
        <textarea id="message" rows="2" name="allergyinfo" value=""><?php echo $row['ALLERGY_INFO']; ?></textarea>

        <div class="row">
          <div class="form-group col-md-6 col-6">
            <label for="input">Minimum Quantity<span>*</span></label>
            <input type="Quantiy" class="form-control" name="minquantity" value="<?php echo $row['MINIMUM_QUANTITY']; ?>">
          </div>
          <div class="form-group col-md-6 col-6">
            <label for="input">Maximum Quantity<span>*</span></label>
            <input type="Quantity" class="form-control" name="maxquantity" value="<?php echo $row['MAXIMUM_QUANTITY']; ?>">
          </div>
        </div>

        <label for="input">Product<span>*</span></label>
        <div class="input-group mb-3">
          <div class="custom-file">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            <input type="file" class="custom-file-input" name="prodimg" id="inputGroupFile01" value="<?php echo $row['PRODUCT_PRICE']; ?>">
          </div>
        </div>

        <label for="input">Rating<span>*</span></label>
        <div class="input-group mb-3">
          <div class="custom-file">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            <input type="file" class="custom-file-input" name="ratimg" id="inputGroupFile01" value="<?php echo $row['PRODUCT_PRICE']; ?>">
          </div>
        </div><br>

        <select id="form_need" class="form-control mb-5" name="shopType"  data-error="Please specify your need." >
                <option value="" selected disabled>--Select Your Category--</option>
                <?php
                  $query_shop = "SELECT * FROM SHOP WHERE FK1_USER_ID =" .$_SESSION['id'];
                  $result = oci_parse($conn, $query_shop);
                  oci_execute($result);

                  while($row = oci_fetch_assoc($result)) { 

                ?>
                  
                  <option value="<?php echo $row['SHOP_ID']; ?>"><?php echo $row['SHOP']; ?></option>
                <?php }?>
                </select>

        <!-- <div class="row">
          <div class="col-12 md-5 text-center">
          <button type="button" class="btn btn-white mx-auto col-4" id="abc">Update Products</button>
          </div>
        </div> -->
        <div class="col-md-12"> 
          <div class="card-text text-center">
            <button class="btn btn-white text-light" id="abc" name="Submitbtn">Update Product</button> <br/><br/>
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
=======
<!DOCTYPE html>
<html>
<head>
	<title></title>

  <link rel="stylesheet" href="css/manage.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

	<?php
	include "header.php";
	?>

<style>
    @media only screen and (max-width: 600px) {
      a #abc{
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
  <div class="sidenav">
    <a href="trader_profile_setting.php">&nbsp; <i class="fa fa-user" style="color:white;"></i> &nbsp; My Account</a>

    <button class="dropdown-btn">
      &nbsp;<i class="fa fa-shopping-cart" style="color:white;"></i> &nbsp; Products<i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a class="active" href="addProduct.php">Add Products</a>
      <a href="updateProduct.php">Update Products</a>
    </div>
    <a href="shop.php">&nbsp;<i class="fa fa-shop" style="color:white;"></i> &nbsp; Shops</a>
    <a href="discount.php">&nbsp;<i class="fa fa-percent" style="color:white;"></i> &nbsp; Discounts</a>
  </div>
  <div class="main">
    <form method="POST" action="amendProduct.php">
      <br>
        <label for="pname">Product Name <span>*</span></label><br>
        <input type="text" id="pname" name="pname" value="<?php echo $name; ?>" required><br>

        <div class="row">
          <div class="form-group col-md-6 col-6">
            <label for="input">Price<span>*</span></label>
            <input type="Price" class="form-control" value="<?php echo $price; ?>">
          </div>
          <div class="form-group col-md-6 col-6">
            <label for="input">Discount</label>
            <input type="Discount" class="form-control">
          </div>
        </div>

        <label for="pType">Product Type <span>*</span></label>
        <input type="text" id="pType" name="pType" required><br>

        <label for="pDescription">Product Description <span>*</span></label><br>
        <textarea id="message" rows="3"></textarea>

        <label for="aInformation">Allergy Information</label><br>
        <textarea id="message" rows="2"></textarea>

        <div class="row">
          <div class="form-group col-md-6 col-6">
            <label for="input">Minimum Quantity<span>*</span></label>
            <input type="Quantiy" class="form-control">
          </div>
          <div class="form-group col-md-6 col-6">
            <label for="input">Maximum Quantity<span>*</span></label>
            <input type="Quantity" class="form-control">
          </div>
        </div>

        <label for="input">Product<span>*</span></label>
        <div class="input-group mb-3">
          <div class="custom-file">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            <input type="file" class="custom-file-input" id="inputGroupFile01">
          </div>
        </div>

        <label for="input">Rating<span>*</span></label>
        <div class="input-group mb-3">
          <div class="custom-file">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            <input type="file" class="custom-file-input" id="inputGroupFile01">
          </div>
        </div><br>

        <!-- <div class="row">
			    <div class="col-12 md-5 text-center">
          <button type="button" class="btn btn-white mx-auto col-4" id="abc">Update Products</button>
			    </div>
		    </div> -->
        <div class="col-md-12"> 
   			  <div class="card-text text-center">
   				  <a class="btn btn-white text-light" id="abc" name="Submitbtn">Update Product</a> <br/><br/>
   			  </div>
   		  </div>
   	    </div>
    </form>
  </div>
  
  <?php

    	//Make connection to database
      $id=$_POST['hidePRODUCT_ID'];

      //Gather data sent from amendProducts.php page
      if(isset($_POST['Submitbtn'])){	
        $name=$_POST['PRODUCT_NAME'];
        $price=$_POST['PRODUCT_PRICE'];
        $image=$_POST['PRODUCT_IMAGE'];
      }

      //Produce an update query to update product record for the id provided
      $query = "Update PRODUCT_HOME set PRODUCT_NAME='$name', PRODUCT_PRICE=$price, PRODUCT_IMAGE='$image' where PRODUCT_ID=$id";

      //run query 
      $result = oci_parse($conn,$query);
      oci_execute($result);

      //Redirect to displayProduct.php page
      header('Location: displayProduct.php');
  ?>

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
>>>>>>> 300642524c8dc9baa901c7756b66fb3027905cfb
</html>