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
      width: 25%;
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
      background-color: #7CC355;
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
                    $update_query = "Update cart SET QUANTITY = ".$_POST['update_quantity']." WHERE ID = ". $_POST['product_Id']; 
                     $update_result = oci_parse($conn,$update_query);
                    oci_execute($update_result); 
                  }
                  $select_cart = "SELECT * FROM cart";
                  $sub_total= 0;

                  $result = oci_parse($conn,$select_cart);
                  oci_execute($result);

                  while($row = oci_fetch_assoc($result)){ ?>
                    
                <tr>
                  <th scope="row" class="border-0 col-5">
                    <div class="p-2">
                      <img src="img/food/<?php echo trim($row['IMAGE']); ?>" style="width: 70px; height: 70px;" alt="" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle" id="cart-item-heading"><?php echo $row['NAME']; ?></a></h5><span class="text-muted stock-heading font-weight-normal font-italic d-block">Stock: Status</span>
                        <input type="hidden" name="product_Id" value="<?php echo $row['ID']; ?>">
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle col-2"><strong class="price-heading">$<?php echo $row['PRICE']; ?></strong></td>
                  <form action="" method="POST">

                  <input type="hidden" name="product_Id" value="<?php echo $row['ID']; ?>">
                  <td class="border-0 align-middle col-3"><input class="number_input mr-2 mb-2" type="number" name="update_quantity" value="<?php echo $row['QUANTITY']; ?>" min="1" max="20"><button type="submit" name="update" class="btn btn-update" id="update-btn">Update</button></td>
                  </form>
                  <td class="border-0 align-middle col-2">
                    <strong class="price-heading">$
                    <?php 
                    $total = $row['PRICE'] * $row['QUANTITY'];
                    echo $total; 
                    $sub_total = $sub_total + $total;
                    ?>
                    </strong>
                  </td>
                  <td class="border-0 align-middle col-2">
                      <div class="col-12">
                        <div class="row">
                          <div class="col-6">
                            <a href="#" class="text-dark">
                              <i class="fa-solid fa-heart mr-4"></i>
                            </a>
                          </div>
                          <div class="col-6">
                            <a href="delete.php?ID=<?php echo $row['ID'] ?>" onclick="return confirm('Are you sure you want to delete?')" class="text-dark">
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
                        <dd class="text-right text-danger ml-3">- $ ? ? ?</dd>
                    </dl>
                    
                    <hr> 

                    <dl class="dlist-align">
                        <dt>Grand Total:</dt>
                        <dd class="text-right text-dark b ml-3"><strong>$ <?php echo $sub_total; ?></strong></dd>
                    </dl>

                    <a href="#" class="btn btn-dark btn-square btn-main" data-abc="true"> Delete All </a> <a href="#" class="btn btn-out btn-dark btn-square btn-main mt-2" data-abc="true">Purchase</a>
                </div>
            </div>
        </aside>

      </div>

      

    </div>
  </div>
</div>

<?php
  include "footer.php";
?>

</body>
</html>