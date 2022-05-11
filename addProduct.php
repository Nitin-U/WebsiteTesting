<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
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
    <form action="#">
      <br>
        <label for="pname">Product Name <span>*</span></label><br>
        <input type="text" id="pname" name="pname" required><br>

        <div class="row">
          <div class="form-group col-md-6 col-6">
            <label for="input">Price<span>*</span></label>
            <input type="Price" class="form-control">
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
          <button type="button" class="btn btn-white mx-auto col-4"  id="abc">Add Products</button>
			    </div>
		    </div> -->
        <div class="col-md-12"> 
   			  <div class="card-text text-center">
   				  <a class="btn btn-white text-light" id="abc" name="Submitbtn">Add Product</a> <br/><br/>
   			  </div>
   		  </div>
   	  </div>
    </form>
  </div>

  <?php
    
    //Gather from $_POST[]all the data submitted and store in variables
    if(isset($_POST['Submitbtn'])){	
      $name=$_POST['pname'];
      $price=$_POST['PRODUCT_PRICE'];
      $image=$_POST['PRODUCT_IMAGE'];
    }
    //Construct INSERT query using variables holding data gathered
    $query="INSERT INTO PRODUCT_HOME (PRODUCT_NAME, PRODUCT_PRICE, PRODUCT_IMAGE) values('$name', '$price', '$image')";
  
    //run $query
    $result = oci_parse($conn,$query);
    oci_execute($result);
    
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
</html>