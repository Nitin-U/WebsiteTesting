<?php
include "crud/connection.php";
?>
<!doctype html>
<html lang="en">
<head>

  <title>Product Description</title>
  <?php include "header.php"; ?>
  <?php 
  $id=$_GET['id'];
  $query="SELECT * FROM PRODUCT where PRODUCT_ID = ".$id;
  $result = oci_parse($conn,$query);
  oci_execute($result);
  $row = oci_fetch_assoc($result);
  $image = $row['PRODUCT_IMAGE'];

    $wishlist_product="SELECT * FROM WISHLIST WHERE FK1_PRODUCT_ID = $id AND FK2_USER_ID =" .$_SESSION['id'];
    $wishlist_Presult = oci_parse($conn, $wishlist_product);
    oci_execute($wishlist_Presult);
    $heart="heart-white";
    if($wishRow=oci_fetch_assoc($wishlist_Presult))
    {
      $heart="heart-red";
    }
  ?>

  <style>
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
    img.PRODUCT_IMAGE{
      object-fit:cover;
      object-position: center;
      width:500px;
      height:450px;

    }
    hr.head1 {
      border-top: 4px solid #343A40;
      width: 15%;
      border-radius: 2px;
      margin-bottom: 70px;
    }
    hr.head2 {
      border-top: 4px solid #343A40;
      width: 15%;
      border-radius: 2px;
      margin-bottom: 70px;
    }
    input.number_input{
      width: 10%;
    }
    .heart-red{
      font-size: 50px;
      color: #DB1F64;
    }
    .heart-white
    {
      font-size: 50px;
      color: #fff;
      text-shadow: 0 0 3px #FF0000, 0 0 5px #DB1F64;
    }
    /*div.zoom {
      background-image: url(<?php echo '$image'?>);
      }*/
      div.zoom img:hover {
        opacity: 0;
      }
      div.zoom img {
        cursor: zoom-in;
        transition: opacity 0.5s;
        display: block;
        width: 100%;
      }
    </style>

  </head>


  <body>
    <div class="container mt-5">
      
      <div class="row shadow-none p-3 bg-light rounded">
        <div class="zoom col-md-6 p-0" style="background-image: url(<?php echo "'img/food/".$image."'"?>)" onmousemove="zoom(event)" id="zoomImg">
          <img class="PRODUCT_IMAGE" src="img/food/<?php echo $row['PRODUCT_IMAGE'] ?>">
        </div>


        <div class="col-md-6 shadow-none p-3 bg-light rounded">
          <div class="row mx-3 mb-5">
            <h1><?php echo ucwords($row['PRODUCT_NAME']) ?></h1>
            <hr style="color: black;">
          </div>
          <div class="row mx-3">
            <h3 class="text-warning"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></h3>
          </div>
          <!--hr-->
          <div class="row mx-3">
            <h2>£ <?php echo $row['PRODUCT_PRICE']; ?></h2>
          </div>
          <div class="mx-3 text-justify">
            <p><?php echo $row['PRODUCT_DESC']; ?></p>
          </div>
          <!--div class="mx-3">
            <label>Quantity</label>
            <input class="number_input" type="number" name="quantity" value="1" min="1" max="20">
          </div-->
          <div class="container mx-3 col-12">
            <div class="row">
              <a href="addtocart.php?prod=<?php echo $row['PRODUCT_ID']; ?>&" type="submit" name="update" class="btn btn-cart col-10 mt-3" id="update-btn" style="padding: 15px;">Add to Cart</a>
              <a href="wishlist_query.php?id=<?php echo $row['PRODUCT_ID']; ?>"><i class="fa-solid fa-heart <?php echo $heart; ?> col-2 mt-3"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>


    <div class="container" id="headings-padding">
      <div class="row">
        <div class="col-12 text-center">
          <h1>Top Reviews</h1>
          <hr class="head1">
        </div>
      </div>
    </div>

    <div class="container mb-5">
      <div class="row mb-5 mx-3">
        <div class="media">
          <img class="mr-3" src="img/dummy.png" width="140" height="120" alt="Generic placeholder image">
          <div class="media-body">
            <h5 class="mt-0">Very nice product. <span class="text-warning"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span></h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>
      </div>

      <div class="row mb-5 mx-3">
        <div class="media"> <img class="mr-3" src="img/dummy.png" width="140" height="120" alt="Generic placeholder image">
          <div class="media-body">
            <h5 class="mt-0">Best product best material.<span class="text-warning"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </span></h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </div>
        </div>
      </div>
    </div>


    <div class="container" id="headings-padding">
      <div class="row">
        <div class="col-12 text-center">
          <h1>Give Review</h1>
          <hr class="head2">
        </div>
      </div>
    </div>

    <div class="container shadow-none p-3 mb-5 bg-light rounded">
      <div class="row mb-2 mt-2 mx-3">
        <h2> Post Your Own Reviews</h2>
      </div>


      <form>
        <div class="form-group mx-3">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group mx-3">
          <label for="exampleInputPassword1">Review</label>
          <textarea type="text" class="form-control" id="exampleInputtextarea" placeholder="Write a review" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-cart mx-3" id="abc">Submit</button>
      </form>
    </div>



    <?php include "footer.php";
    clearMsg();
    ?>
    <script type="text/javascript">
      function zoom(e){
        var zoomer = document.getElementById('zoomImg');
        e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
        e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
        x = offsetX/zoomer.offsetWidth*100
        y = offsetY/zoomer.offsetHeight*100
        zoomer.style.backgroundPosition = x + '%' + y + '%';
        zoomer.style.backgroundRepeat="no-repeat";
        zoomer.style.backgroundSize = "1000px";
      }
    </script>


  </body>
  </html>