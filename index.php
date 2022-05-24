<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php

	include "crud/connection.php";
	include "header.php";
	//session_destroy();

	
	
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
						<a href="product.php" style="color: #000;"><p class="view-container text-right">View More <i class="fas fa-arrow-right"></i> </p></a>
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
						<form action="addtocart.php" method="POST">
							<div class="card shadow bg-white rounded">
								<a href="productdescription.php?id=<?php echo $row['PRODUCT_ID']?>"><img src="img/food/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="" class="card-img-top"> </a>
								<div class="card-body">
									<h5 class="card-title cardprodname"><?php echo ucwords($row['PRODUCT_NAME']); ?></h5>
									<p>
										<!--i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: lightgrey;"></i><i class="fas fa-star" style="color: lightgrey;"></i-->
											
											<img src="img/<?php echo $row['PRODUCT_RATING']; ?>" class="ratimg">

											
										</p>
										<p class="cardprice">Price: £ <?php echo $row['PRODUCT_PRICE']; ?></p>
										<div class="row">
											<div class="col mx-auto">
												<a href="addtocart.php?prod=<?php echo $row['PRODUCT_ID']?>"class="col-12 btn btn-cart btn-md mx-auto" name="add-to-cart">Add to cart</a>
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

<div class="jss col-12 text-center" id="headings-padding">
	<h1>Shop by Traders</h1>
	<hr class="head2">
</div>
<div class="container">
	<div class="row pt-4">
		<?php 

		$query="SELECT * FROM user_master WHERE ROLE = 'trader'";
		$result = oci_parse($conn,$query);
		oci_execute($result);
		while($row = oci_fetch_assoc($result))
		{ 
			?>
			<div class="col-lg-2 col-md-4 col-sm-6 mx-lg-auto ">
				<div class="box">
					<img src="img/<?php echo $row['SHOP_IMAGE'] ?>">
					<div class="box-content">
						<div class="inner-content">
							<h3 class="title"><?php echo $row['NAME']; ?></h3>
							<span class="post">Cleckhudderfax</span>
							<ul class="icon">
								<li><a href="product.php?catg=<?php echo $row['USER_ID']?>"><i class="fa-solid fa-circle-info"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>	
		<?php } ?>	
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
					<a href="product.php" style="color: #000;"><p class="view-container text-right">View More <i class="fas fa-arrow-right"></i> </p></a>
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
					<form action="addtocart.php" method="POST">
						<div class="card shadow bg-white rounded">
							<a href="productdescription.php?id=<?php echo $row['PRODUCT_ID']?>"><img src="img/food/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="" class="card-img-top"> </a>
							<div class="card-body">
								<h5 class="card-title cardprodname"><?php echo ucwords($row['PRODUCT_NAME']); ?></h5>
								<p>
									<!--i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: lightgrey;"></i><i class="fas fa-star" style="color: lightgrey;"></i-->

										<img src="img/<?php echo $row['PRODUCT_RATING']; ?>" class="ratimg">

									</p>
									<p class="cardprice">Price: £ <?php echo $row['PRODUCT_PRICE']; ?></p>
									<div class="row">
										<div class="col mx-auto">
											<a href="addtocart.php?prod=<?php echo $row['PRODUCT_ID']?>" class="col-12 btn btn-cart btn-md mx-auto" name="add-to-cart">Add to cart</a>
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
	clearMsg();
	?>



</body>
</html>