 <?php
 include "crud/connection.php";

 if (trim($_SESSION['id'])==null)
 {
  header("Location: " . $_SERVER["HTTP_REFERER"]);
  $_SESSION['failmessage']="You need to be logged in.";
  die();
}
elseif ($_SESSION['role']!='customer') 
{
  $_SESSION['failmessage'] = "You need to be logged in as customer";
  header("Location: " . $_SERVER["HTTP_REFERER"]);
  die();
}


?>

<!DOCTYPE html>
<html>
<head>
  <title></title>

  <?php
  include "header.php";
  ?>


  <link rel="stylesheet" href="css/style_temp.css">

  <style type="text/css">

    #container-cart {
      margin-bottom: 40px;
    }

    .table-heading-text{
      font-size: 17px;
    }


    #cart-item-heading{
      font-size: 17px;
    }

    .stock-heading{
      font-size: 17px;
    }

    strong.price-heading{
      font-size: 17px;
    }

    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button 
    {  

     opacity: 1;

   }

   input.number_input{
    width: 35%;
  }

  .fa-trash{
    color: #F48037;
    transition: .4s;
  }
  .fa-trash:hover {
    color: #1F2130;
    transition: .4s;
  }

  button.btn.btn-update{
    font-size: 13px;
    height: 35px;
    color: #fff;
    background-color: #F48037;
    transition: .4s;
  }

  button.btn.btn-update:hover{
    color: #fff;
    background-color: #1F2130;
  }

  button.btn.btn-apply{
    color: #fff;
    background-color: #F48037;
    transition: .4s;
  }

  button.btn.btn-apply:hover{
    color: #fff;
    background-color: #1F2130;
  }

  button.btn.btn-deleteall{
    color: #fff;
    background-color: #F48037;
    transition: .4s;
  }

  button.btn.btn-deleteall:hover{
    color: #fff;
    background-color: #1F2130;
  }

  button.btn.btn-purchase{
    color: #fff;
    background-color: #F48037;
    border-color: #F48037;
    transition: .4s;
  }

  button.btn.btn-purchase:hover{
    color: #fff;
    background-color: #1F2130;
    border-color: #1F2130;
  }


  .fa-solid.fa-heart{
    font-size: 1.5em;
  }

  .fa.fa-trash{
    font-size: 1.5em;
  }

  @media screen and (max-width: 450px) {
    .table-heading-text{
      font-size: 12px;
    }

  }

  @media screen and (max-width: 768px) {
    #cart-item-heading{
      font-size: 13px;
    }

  }
  @media screen and (max-width: 576px) {
    #cart-item-heading{
      font-size: 13px;
    }

  }
  @media screen and (max-width: 450px) {
    #cart-item-heading{
      font-size: 12px;
    }

  }

  @media screen and (max-width: 768px) {
    .stock-heading{
      font-size: 13px;
    }

  }
  @media screen and (max-width: 576px) {
    .stock-heading{
      font-size: 13px;
    }

  }
  @media screen and (max-width: 450px) {
    .stock-heading{
      font-size: 12px;
    }

  }

  @media screen and (max-width: 450px) {
    strong.price-heading{
      font-size: 12px;
    }

  }

  @media screen and (max-width: 768px) {
    .fa-solid.fa-heart{
      font-size: 1.2em;
    }

    .fa.fa-trash{
      font-size: 1.2em;
    }

  }

  @media screen and (max-width: 576px) {
    .fa-solid.fa-heart{
      font-size: 1em;
    }

    .fa.fa-trash{
      font-size: 1em;
    }

  }

  @media screen and (max-width: 450px) {
    .fa-solid.fa-heart{
      font-size: 0.8em;
    }

    .fa.fa-trash{
      font-size: 0.8em;
    }

  }

  @media screen and (max-width: 768px) {
    input.number_input{
      width: 65%;
    }
  }
  @media (min-width: 576px) and (max-width: 768px){
    input.number_input{
      width: 70%;
    }
  }
  @media screen and (max-width: 450px) {
    input.number_input{
      width: 80%;
    }

  }

</style>

</head>
<body>                               

  <div class="pt-5">
    <div class="container" id="container-cart">
      <div class="row">
        <div class="col-lg-9">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="table-heading-text p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="table-heading-text py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="table-heading-text py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="table-heading-text py-2 text-uppercase">Total</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="table-heading-text py-2 text-uppercase">Manage</div>
                  </th>
                </tr>
              </thead>
              <tbody>

                <?php 
                if (isset($_POST['update'])) 
                {
                  $quantityQuery = "select sum(quantity) as QUANTITYTOTAL from cart WHERE FK1_USER_ID=" .$_SESSION['id'];
                  $quantityResult = oci_parse($conn,$quantityQuery);
                  oci_execute($quantityResult);
                  $quantityTotal = oci_fetch_assoc($quantityResult);
                  
                  
                  
                  $prodQuery= "select quantity from cart WHERE ID = ".$_POST['cart_Id']." AND FK1_USER_ID = " .$_SESSION['id'];
                    // echo $prodQuery;
                    // die();
                  $prodResult = oci_parse($conn,$prodQuery);
                  oci_execute($prodResult);
                  $prodQuantity = oci_fetch_assoc($prodResult);
                  $quantityChange = $_POST['update_quantity']-$prodQuantity['QUANTITY'];
                  $quantityFinal = $quantityTotal['QUANTITYTOTAL']+$quantityChange;
                    // echo $quantityFinal;
                    // die();
                  
                  
                  if($quantityFinal>20)
                  {
                    $_SESSION['failmessage']="Product quantity cannot exceed 20";
                  }
                  else
                  {
                    $update_query = "Update cart SET QUANTITY = ".$_POST['update_quantity']." WHERE ID = ". $_POST['cart_Id']. "AND FK1_USER_ID =" .$_SESSION['id']; 
                    $update_result = oci_parse($conn,$update_query);
                    oci_execute($update_result); 
                    $_SESSION['passmessage'] = "Cart updated successfully";
                  }
                  
                }
                  //$cart_id = isset($_SESSION['id']);
                $select_cart = "SELECT * FROM cart WHERE FK1_USER_ID=" .$_SESSION['id'];
                $sub_total= 0;

                $result = oci_parse($conn,$select_cart);
                oci_execute($result);

                while($row = oci_fetch_assoc($result)){
                  $productQuery = "Select * from product where PRODUCT_ID= ".$row['FK2_PRODUCT_ID'];
                  $productResult = oci_parse($conn,$productQuery);
                  oci_execute($productResult);
                  $prodRow=oci_fetch_assoc($productResult);
                  ?>
                  
                  <tr>
                    <th scope="row" class="border-0 col-5">
                      <div class="p-2">
                        <img src="img/food/<?php echo trim($prodRow['PRODUCT_IMAGE']); ?>" style="width: 70px; height: 70px;" alt="" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                          <h5 class="mb-0"> <a href="productdescription.php?id=<?php echo $prodRow['PRODUCT_ID'];?>" class="text-dark d-inline-block align-middle" id="cart-item-heading"><?php echo $prodRow['PRODUCT_NAME']; ?></a></h5><span class="text-muted stock-heading font-weight-normal font-italic d-block">Stock: Status</span>
                        </div>
                      </div>
                    </th>
                    <td class="border-0 align-middle col-2"><strong class="price-heading">$<?php echo $prodRow['PRODUCT_PRICE']; ?></strong></td>
                    <form action="" method="POST">

                      <input type="hidden" name="cart_Id" value="<?php echo $row['ID']; ?>">
                      <td class="border-0 align-middle col-3"><input class="number_input mr-2 mb-2" type="number" name="update_quantity" value="<?php echo $row['QUANTITY']; ?>" min="1" max="20"><button type="submit" name="update" class="btn btn-update" id="update-btn">Update</button></td>
                    </form>
                    <td class="border-0 align-middle col-2">
                      <strong class="price-heading">$
                        <?php 
                        $total = $prodRow['PRODUCT_PRICE'] * $row['QUANTITY'];
                        echo $total; 
                        $sub_total = $sub_total + $total;
                        ?>
                      </strong>
                    </td>
                    <td class="border-0 align-middle col-2">
                      <div class="col-12">
                        <div class="row">
                          <!-- <div class="col-6">
                            <a href="#" class="text-dark">
                              <i class="fa-solid fa-heart mr-4"></i>
                            </a>
                          </div> -->
                          <div class="col-6">
                            <a href="delete.php?ID=<?php echo $row['ID'] ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="text-dark">
                              <i class="fa fa-trash"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                      
                      
                    </td>
                  </tr>

                <?php }?>
                

              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>

        <aside class="col-lg-3">
          <div class="card" id="card-cart">
            <div class="card-body">
              <dl class="dlist-align">
                <dt>Sub Total:</dt>
                <dd class="text-right ml-3"><strong>$ <?php echo $sub_total; ?></strong></dd>
              </dl>
              <dl class="dlist-align">
                <dt>Discount:</dt>
                <dd class="text-right text-danger ml-3">-<?php if (isset($_SESSION['discount'])) {
                  echo "$ ".$_SESSION['discount'];
                  $discount= $_SESSION['discount'];
                }
                else
                {
                  echo "$ ? ? ?";
                  $discount = 0;
                }

                ?> </dd>
              </dl>

              <form action="coupon.php" method="POST">
                <div class="form-group">
                  <div class="input-group"> <input type="text" class="form-control coupon" name="coupon" placeholder="Coupon code"> <span class="input-group-append"> <button class="btn btn-apply coupon">Apply</button> </span> </div>
                </div>
              </form>
              
              <hr> 

              <dl class="dlist-align">
                <dt>Grand Total:</dt>
                <?php $grandTotal = $sub_total - $discount;?>
                <dd class="text-right text-dark b ml-3"><strong>$ <?php echo $grandTotal ?></strong></dd>
              </dl>
              <?php $_SESSION['grandTotal'] = $grandTotal;?>
              <form action="delete.php" method="POST">

                <button type="submit" href="#" class="btn btn-deleteall btn-main" data-abc="true" name="deleteBtn" onclick="return confirm('Are you sure you want empty whole cart?')"> Delete All </button> 

              </form> 

              <form action="collection.php" method="POST">
                <input type="hidden" name="grandtotal" value="<?php echo $grandTotal; ?>">

                <button href="#" type="submit" class="btn btn-out btn-dark btn-purchase btn-main mt-2" data-abc="true">Proceed</button>
              </form>
              <!-- <div class="mt-2" id="paypal-payment-button">
                
              </div> -->
            </div>
          </div>
        </aside>

      </div>

      

    </div>
  </div>
</div>

<!-- <script src="https://www.paypal.com/sdk/js?client-id=AVeL3KJl8bu1X3Mw_1Zxoq2lFarEcVcXEO9lGHHeETHJYxvw0xLk4q40fJNjBikcB9_zoguwGjxmNpSC&disable-funding=credit,card"></script>
<script type="text/javascript">
  const total = <?php echo $grandTotal;?>
</script>
<script src="js/paypal.js"></script> -->

<?php
include "footer.php";
clearMsg();
?>

</body>
</html>