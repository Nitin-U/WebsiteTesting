<?php
  include "crud/connection.php";
  if($_SESSION['role']!='trader')
  {
    header("location: index.php");
  }

  if(isset($_POST['Submitbtn'])){ 
      $name=$_POST['name'];
      $price=$_POST['price'];
      $quantity=$_POST['quantity'];
      $productdescription=$_POST['proddesc'];
      $allergyinformation=$_POST['allergyinfo'];
      $productimage=$_POST['prodimg'];
      
      $stock = "Stock";
      $rating= "4.5star.jpg";
      $error = 0;
    
      if(strlen($name) < 5)
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
      if($quantity == null) 
      {
        $error_quantity=  "Please enter the quantity";
        $error++;
      }
      if(strlen($productdescription) < 10)
      {
        $error_description =  "Product description should be atleast 10 characters";
        $error++;
      }

      if($productdescription == null) 
      {
        $error_description=  "Please enter the product description";
        $error++;
      }
      if(strlen($allergyinformation) < 10)
      {
        $error_allergy =  "Allergy information should be atleast 10 characters";
        $error++;
      }

      if($allergyinformation == null) 
      {
        $error_allergy=  "Please enter the allergy information";
        $error++;
      }

      if($productimage == null) 
      {
        $error_image =  "Please upload your image";
        $error++;
      }

      if(!isset($_POST['shopType'])) 
      {
        $error_type=  "Please select the trader type";
        $error++; 
      }else{
        $shopType = $_POST['shopType'];
      } 

      if ($error == 0) 
      {
        $query="INSERT INTO PRODUCT (PRODUCT_IMAGE, PRODUCT_RATING, PRODUCT_NAME, PRODUCT_DESC, ALLERGY_INFO, PRODUCT_PRICE, QUANTITY, STOCK, FK1_SHOP_ID) values('$productimage', '$rating', '$name', '$productdescription', '$allergyinformation', '$price', '$quantity', '$stock', $shopType)";

        if($result = oci_parse($conn,$query));
        {
          oci_execute($result);
          $name = "";
          $price = "";
          $quantity = "";
          $productdescription = "";
          $allergyinformation = "";
          $productimage = "";
          $shopType = "";
          $_SESSION['passmessage'] = "Product added successfully";
        }
        
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
      color: #fff;
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
    <form action="#" method="POST">
      <br>
        <label for="pname">Product Name <span>*</span></label><br>
        <input type="text" id="name" name="name" value="<?php if(isset($name)) echo $name ?>"><br>
        <div class="mb-3"><?php if (isset($error_pname)) echo '<div class="error">'.$error_pname.'</div>';?> </div>

        <div class="row">
          <div class="form-group col-md-6 col-6">
            <label for="input">Price <span>*</span></label>
            <input type="Price" name="price" class="form-control" value="<?php if(isset($price)) echo $price ?>">
            <div class="mb-3"><?php if (isset($error_price)) echo '<div class="error">'.$error_price.'</div>';?> </div>

          </div>

          <div class="form-group col-md-6 col-6">
            <label for="input">Quantity <span>*</span></label>
            <input type="number" name="quantity" class="form-control" value="<?php if(isset($quantity)) echo $quantity ?>" min="1" max="1000">
            <div class="mb-3"><?php if (isset($error_quantity)) echo '<div class="error">'.$error_quantity.'</div>';?> </div>
          </div>
        </div>

        <!--label for="pType">Product Type <span>*</span></label>
        <input type="text" id="pType" name="prodtype" required><br-->

        <label for="pDescription">Product Description <span>*</span></label><br>
        <textarea id="message" name="proddesc" rows="3"><?php if(isset($productdescription)) echo $productdescription ?></textarea>
        <div class="mb-3"><?php if (isset($error_description)) echo '<div class="error">'.$error_description.'</div>';?> </div>
        <!--div class="mb-3">abc</div-->

        <label for="aInformation">Allergy Information <span>*</span></label><br>
        <textarea id="message" name="allergyinfo" rows="2"><?php if(isset($allergyinformation)) echo $allergyinformation ?></textarea>
        <div class="mb-3"><?php if (isset($error_allergy)) echo '<div class="error">'.$error_allergy.'</div>';?> </div>


        <label for="input">Product <span>*</span></label>
        <div class="input-group mb-3">
          <div class="custom-file">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            <input type="file" name="prodimg" class="custom-file-input" id="inputGroupFile01" value="<?php if(isset($productimage)) echo $productimage ?>">
          </div>
        </div>
        <div class="mb-3"><?php if (isset($error_image)) echo '<div class="error">'.$error_image.'</div>';?> </div>

        <label for="staticAge">Trader Type*</label>
              <select id="form_need" class="form-control mb-3" name="shopType"  data-error="Please specify your need." >
                <option value="" selected disabled>--Select Your Category--</option>
                <?php
                  $query_shop = "SELECT * FROM SHOP WHERE FK1_USER_ID =" .$_SESSION['id'];
                  $result = oci_parse($conn, $query_shop);
                  oci_execute($result);

                  while($row = oci_fetch_assoc($result)) { 

                ?><option value="<?php echo $row['SHOP_ID']; ?>"><?php echo $row['SHOP']; ?></option>
                <?php }?>
                </select>
                <div class="mb-3"><?php if (isset($error_type)) echo '<div class="error">'.$error_type.'</div>';?> </div>

        <!-- <div class="row">
          <div class="col-12 md-5 text-center">
          <button type="button" class="btn-white mx-auto col-4"  id="abc">Add Products</button>
          </div>
        </div> -->
        <div class="col-md-12"> 
          <div class="card-text text-center">
            <button type="submit" class="btn btn-white" id="abc" name="Submitbtn">Add Product</button> <br/><br/>
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