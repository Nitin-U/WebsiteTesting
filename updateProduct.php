 <?php
    include "crud/connection.php";
    if($_SESSION['role']!='trader')
  {
    header("location: index.php");
  }

    if(isset($_POST['Submitbtn'])){ 
      $name=$_POST['name'];
      $price=$_POST['price'];
      $discount=$_POST['discount'];
      $productdescription=$_POST['proddesc'];
      $allergyinformation=$_POST['allergyinfo'];
      $minimumquantity=$_POST['minquantity'];
      $maximumquantity=$_POST['maxquantity'];
      $productimage=$_POST['prodimg'];
      $rating=$_POST['ratimg'];
      $shopType = isset($_POST['shopType']);
      $error = 0;

      if(strlen($name)<5)
      {
        $error_pname =  "Product name should be atleast six characters";
        $error++;
      }

      if($name == null) 
      {
        $error_pname=  "Please enter your the product name first";
        $error++;
      }
      if (!preg_match("/^[0-9]+(\.[0-9]{2})?$/", $price)) {
        $error_price=  "Please enter the numbers only";
        $error++; 
      }
      if($price == null) 
      {
        $error_price=  "Please enter the price";
        $error++;
      }
      if(strlen($productdescription)<10)
      {
        $error_description =  "Product description should be atleast 10 characters";
        $error++;
      }

      if($productdescription == null) 
      {
        $error_description=  "Please enter the product description";
        $error++;
      }
      if(strlen($allergyinformation)<10)
      {
        $error_allergy =  "Allergy information should be atleast 10 characters";
        $error++;
      }

      if($allergyinformation == null) 
      {
        $error_allergy=  "Please enter the allergy information";
        $error++;
      }
      if (!preg_match("/^[0-9]+(\.[0-9]{2})?$/", $minimumquantity)) {
        $error_minimum=  "Please enter the numbers only"; 
        $error++;
      }
      if($minimumquantity == null) 
      {
        $error_minimum=  "Please enter the minimum quantity";
        $error++;
      }
      if (!preg_match("/^[0-9]+(\.[0-9]{2})?$/", $maximumquantity)) {
        $error_maximum=  "Please enter the numbers only"; 
        $error++;
      }
      if($maximumquantity == null) 
      {
        $error_maximum=  "Please enter the maximum quantity";
        $error++;
      }
      if($productimage == null) 
      {
        $error_image =  "Please upload your image";
        $error++;
      }
      if($rating == null) 
      {
        $error_image =  "Please upload your image";
        $error++;
      }

      if($shopType == null) 
      {
        $error_type=  "Please select the trader type";
        $error++; 
      } 

      if ($error == 0) 
      {
        
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
        <input type="text" id="pname" name="name" value="<?php echo $row['PRODUCT_NAME']; ?>"><br>

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
                <option value="" disabled>--Select Your Category--</option>
                <?php
                  $query_shop = "SELECT * FROM SHOP WHERE FK1_USER_ID =" .$_SESSION['id'];
                  $result = oci_parse($conn, $query_shop);
                  oci_execute($result);

                  while($rowP = oci_fetch_assoc($result)) { 

                ?>
                  
                  <option value="<?php echo $rowP['SHOP_ID']; ?>" <?php if($row['FK1_SHOP_ID']==$rowP['SHOP_ID']) echo 'selected'?>><?php echo $rowP['SHOP']; ?></option>
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
</html>