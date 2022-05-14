<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php

	//include "crud/connection.php";
	include "header.php";
	//session_destroy();

	if (isset($_POST['add-to-cart'])) 
	{
		$product_name = $_POST['product_name'];
		$product_price = $_POST['product_price'];
		$product_image = $_POST['product_image'];
		$product_quantity = 1;

		$sql = "SELECT * FROM cart WHERE NAME = '$product_name'";
		$result2 = oci_parse($conn,$sql);
		oci_execute($result2);
		$cart=oci_fetch_assoc($result2);
		if($cart)
		{  
			//$message[] = 'product already added to cart';
			$update= "Update cart SET QUANTITY = QUANTITY + 1 where NAME='$product_name'";
			//echo $update;
			//die();
			$result4 = oci_parse($conn,$update);
			oci_execute($result4);
			echo "<script>alert('".$product_name." quantity added by 1');</script>"; 

		}
		else 
		{
			$insert_product = "INSERT INTO CART (Name, Price, Image, Quantity) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity')";
			$result3 = oci_parse($conn,$insert_product);
			oci_execute($result3);
			//echo $insert_product;

			$message[] = 'product added to cart';
			echo "<script>alert('product added to cart');</script>"; 

		}


	}
	
	?>

	<link rel="stylesheet" type="text/css" href="css/trader_style.css">

	<style>
		hr.head1 {
  			border-top: 4px solid #343A40;
			width: 25%;
			border-radius: 2px;
		}

		hr.head2 {
  			border-top: 4px solid #343A40;
			width: 12%;
			border-radius: 2px;
		}
		hr.head3 {
  			border-top: 4px solid #343A40;
			width: 12%;
			border-radius: 2px;
		}
	</style>

</head>
<body>



	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-100 " src="img/1.png" alt="First slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="img/2.png" alt="Second slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="img/3.png" alt="Third slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="img/4.png" alt="4th slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="img/5.png" alt="5th slide">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>

<!------------------------------------------------------------------------------------>


 
<!------------------------------------------------------------------------------------>
<div class="container" id="headings-padding">
	<div class="row">
		<div class="col-12 text-center">
			<h1>Recommended Product</h1>
			<hr class="head1">
		</div>

		
	</div>
</div>



<section id="gallery">
  <div class="container">
  		<div class="col-12 m-0 p-0">
			<div class="col-6 ml-auto m-0 p-0">
					<div class="col-lg-3 col-md-6 ml-auto m-0 p-0">
						<a href="#" style="color: #000;"><p class="view-container text-right">View More <i class="fas fa-arrow-right"></i> </p></a>
					</div>	
			</div>
		</div>
		<div class="row">
		<?php


			// $query="SELECT * FROM( SELECT * FROM PRODUCT_HOME  ORDER BY dbms_random.value) WHERE rownum <=1"; 
			$query="SELECT * FROM PRODUCT where DISPLAY_TYPE = 'Recommended'";
				//$sql = "INSERT INTO PRODUCT_HOME (PRODUCT_ID, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_PRICE) VALUES (:deptno, :dname, :loc)"; 
					$result = oci_parse($conn,$query);
					oci_execute($result);
					while($row = oci_fetch_assoc($result)){ ?>

			<div class="items col-lg-3 col-md-4 col-sm-4 col-xs-4 mb-0 mt-4">
				<form action="" method="POST">
					<div class="card shadow bg-white rounded">
						<a href="productpage.php?id=<?php echo $row['PRODUCT_ID']?>"><img src="img/food/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="" class="card-img-top"> </a>
						<div class="card-body">
							<h5 class="card-title cardprodname"><?php echo $row['PRODUCT_NAME']; ?></h5>
							<p>
								<!--i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: lightgrey;"></i><i class="fas fa-star" style="color: lightgrey;"></i-->
									
									<img src="img/<?php echo $row['PRODUCT_RATING']; ?>" class="ratimg">

									
							</p>
							<p class="cardprice">Price: £ <?php echo $row['PRODUCT_PRICE']; ?></p>

							<input type="hidden" name="product_image" value=" <?php echo $row['PRODUCT_IMAGE']; ?> ">
							<input type="hidden" name="product_name" value=" <?php echo $row['PRODUCT_NAME']; ?> ">
							<input type="hidden" name="product_price" value=" <?php echo $row['PRODUCT_PRICE']; ?> ">

							<div class="row">
								<div class="col mx-auto">
									<button type="submit" class="col-12 btn btn-cart btn-md mx-auto" name="add-to-cart">Add to cart</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<?php }?>	

		</div>		
   </div>
</section>  
  
<!---------------------------------------------------------------------------------------->
<!--div class="jss col-12 text-center" id="headings-padding">
		<h1>Shop by Traders</h1>
		<hr class="col-1">
</div>

<div class="container">
  <div class="col-12">
  	<div class="row">

  		
    
      <div class="col-lg-2 col-md-4 col-sm-6 mx-auto m-4" id="show_bg_2">
        <a href="/news/athletes/katy-whittaker-6701"><img class="d-block mx-auto img-fluid" src="img/Grocery.png"></a>
      </div>

      <div class="col-lg-2 col-md-4 col-sm-6 mx-auto m-4">
        <a href="/news/athletes/katy-whittaker-6701"><img class="d-block mx-auto img-fluid" src="img/Meat.png"></a>
      </div>

      <div class="col-lg-2 col-md-4 col-sm-6 mx-auto m-4">
        <a href="/news/athletes/katy-whittaker-6701"><img class="d-block mx-auto img-fluid" src="img/delicatessen.png"></a>
      </div>

      <div class="col-lg-2 col-md-4 col-sm-6 mx-auto m-4">
        <a href="/news/athletes/katy-whittaker-6701"><img class="d-block mx-auto img-fluid" src="img/bakery.png"></a>
      </div>

      <div class="col-lg-2 col-md-4 col-sm-6 mx-auto m-4">
        <a href="/news/athletes/katy-whittaker-6701"><img class="d-block mx-auto img-fluid" src="img/fish.png"></a>
      </div>






    </div>
      
      
    </div>

</div-->


<div class="jss col-12 text-center" id="headings-padding">
		<h1>Shop by Traders</h1>
		<hr class="head2">
</div>
<div class="container">
    <div class="row pt-4">
        <div class="col-lg-2 col-md-4 col-sm-6 mx-auto ">
            <div class="box">
                <img src="img/Meat.png">
                <div class="box-content">
                    <div class="inner-content">
                        <h3 class="title">Butcher</h3>
                        <span class="post">Cleckhudderfax</span>
                        <ul class="icon">
                            <li><a href="#"><i class="fa-solid fa-circle-info"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 mx-auto">
            <div class="box">
                <img src="img/delicatessen.png">
                <div class="box-content">
                    <div class="inner-content">
                        <h3 class="title">Delicatessen</h3>
                        <span class="post">Cleckhudderfax</span>
                        <ul class="icon">
                            <li><a href="#"><i class="fa-solid fa-circle-info"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 mx-auto">
            <div class="box">
                <img src="img/Fish.png">
                <div class="box-content">
                    <div class="inner-content">
                        <h3 class="title">FishMonger</h3>
                        <span class="post">Cleckhudderfax</span>
                        <ul class="icon">
                            <li><a href="#"><i class="fa-solid fa-circle-info"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 mx-auto">
            <div class="box">
                <img src="img/Grocery.png">
                <div class="box-content">
                    <div class="inner-content">
                        <h3 class="title">GreenGrocer</h3>
                        <span class="post">Cleckhudderfax</span>
                        <ul class="icon">
                            <li><a href="#"><i class="fa-solid fa-circle-info"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-4 col-sm-6 mx-auto">
            <div class="box">
                <img src="img/bakery.png">
                <div class="box-content">
                    <div class="inner-content">
                        <h3 class="title">Bakery</h3>
                        <span class="post">Cleckhudderfax</span>
                        <ul class="icon">
                            <li><a href="#"><i class="fa-solid fa-circle-info"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>

<!---------------------------------------------------------------------------------------->
<div class="container" id="headings-padding">
	<div class="row">
		<div class="col-12 text-center">
			<h1>Hot Product</h1>
			<hr class="head3">
		</div>

		
	</div>
</div>

<section id="gallery">
  <div class="container">
  		<div class="col-12 m-0 p-0">
			<div class="col-6 ml-auto m-0 p-0">
					<div class="col-3 ml-auto m-0 p-0">
						<a href="#" style="color: #000;"><p class="view-container text-right">View More <i class="fas fa-arrow-right"></i> </p></a>
					</div>	
			</div>
		</div>
		<div class="row mb-4">
		<?php


			// $query="SELECT * FROM( SELECT * FROM PRODUCT_HOME  ORDER BY dbms_random.value) WHERE rownum <=1"; 
			$query="SELECT * FROM PRODUCT where DISPLAY_TYPE = 'Hot'";
				//$sql = "INSERT INTO PRODUCT_HOME (PRODUCT_ID, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_PRICE) VALUES (:deptno, :dname, :loc)"; 
					$result = oci_parse($conn,$query);
					oci_execute($result);
					while($row = oci_fetch_assoc($result)){ ?>

			<div class="items col-lg-3 col-md-4 col-sm-4 col-xs-6 mb-0 mt-4">
				<form action="" method="POST">
					<div class="card shadow bg-white rounded">
					<a href="productpage.php?id=<?php echo $row['PRODUCT_ID']?>"><img src="img/food/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="" class="card-img-top"> </a>
						<div class="card-body">
							<h5 class="card-title cardprodname"><?php echo $row['PRODUCT_NAME']; ?></h5>
							<p>
								<!--i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: lightgrey;"></i><i class="fas fa-star" style="color: lightgrey;"></i-->

								<img src="img/<?php echo $row['PRODUCT_RATING']; ?>" class="ratimg">

							</p>
							<p class="cardprice">Price: £ <?php echo $row['PRODUCT_PRICE']; ?></p>

							<input type="hidden" name="product_image" value=" <?php echo $row['PRODUCT_IMAGE']; ?> ">
							<input type="hidden" name="product_name" value=" <?php echo $row['PRODUCT_NAME']; ?> ">
							<input type="hidden" name="product_price" value=" <?php echo $row['PRODUCT_PRICE']; ?> ">
							<div class="row">
								<div class="col mx-auto">
									<button type="submit" class="col-12 btn btn-cart btn-md mx-auto" name="add-to-cart">Add to cart</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<?php }?>	

		</div>		
   </div>
</section>  

<?php
	include "footer.php";
?>



</body>
</html>