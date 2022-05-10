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

<!------------------------------------------------------------------------------------>
<div class="container" id="headings-padding">
	<div class="row">
		<div class="col-12 text-center">
			<h1>Delicatessen Products</h1>
			<hr class="head1">
		</div>

		
	</div>
</div>



<section id="gallery">
<div class="container mb-5">
		<div class="row">
		<?php


			// $query="SELECT * FROM( SELECT * FROM PRODUCT_HOME  ORDER BY dbms_random.value) WHERE rownum <=1"; 
			$query="SELECT * FROM PRODUCT, SHOP where SHOP_ID = FK1_SHOP_ID AND SHOP_NAME = 'Delicatessen'";
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
  

<?php
	include "footer.php";
?>



</body>
</html>