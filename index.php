<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php
	include "header.php";
	include "crud/connection.php";
	?>

</head>
<body>



	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-100" src="img/1.png" alt="First slide">
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
<div class="container p-4">
	<div class="row">
		<div class="col-12 text-center">
			<h1>Recommended Product</h1>
			<hr class="col-3">
		</div>

		
	</div>
</div>



<section id="gallery">
  <div class="container">
  		<div class="col-12">
			<a href="#" style="color: #000;"><p class="text-right">View More <i class="fas fa-arrow-right"></i> </p></a>
		</div>
		<div class="row">
		<?php


			// $query="SELECT * FROM( SELECT * FROM PRODUCT_HOME  ORDER BY dbms_random.value) WHERE rownum <=1"; 
			$query="SELECT * FROM PRODUCT_HOME where PRODUCT_TYPE = 'Recommended'";
				//$sql = "INSERT INTO PRODUCT_HOME (PRODUCT_ID, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_PRICE) VALUES (:deptno, :dname, :loc)"; 
					$result = oci_parse($conn,$query);
					oci_execute($result);
					while($row = oci_fetch_assoc($result)){ ?>

			<div class="items col-lg-3 col-md-4 col-sm-6 mb-0 mt-4">
				<div class="card shadow bg-white rounded">
					<img src="img/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title"><?php echo $row['PRODUCT_NAME']; ?></h5>
						<p><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: lightgrey;"></i><i class="fas fa-star" style="color: lightgrey;"></i></p>
						<p>Price: £ <?php echo $row['PRODUCT_PRICE']; ?></p>
						<div class="row">
								<div class="col mx-auto">
									<p><a href="#" class="col-12 btn btn-cart btn-md mx-auto" type="Submit">Add to cart</a></p>
								</div>
						</div>
					</div>
				</div>
			</div>
			<?php }?>	

		</div>		
   </div>
</section>  
  
<!---------------------------------------------------------------------------------------->
<div class="jss col-12 text-center p-4">
		<h1>Shop by Traders</h1>
		<hr class="col-1">
</div>

<div class="container">
  <div class="col-12">
  	<div class="row">

    
      <div class="col-lg-2 col-md-4 col-sm-6 mx-auto m-4">
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

</div>
<!---------------------------------------------------------------------------------------->
<div class="container p-4">
	<div class="row">
		<div class="col-12 text-center">
			<h1>Hot Product</h1>
			<hr class="col-1">
		</div>

		
	</div>
</div>

<section id="gallery">
  <div class="container">
  		<div class="col-12">
			<a href="#" style="color: #000;"><p class="text-right">View More <i class="fas fa-arrow-right"></i> </p></a>
		</div>
		<div class="row mb-4">
		<?php


			// $query="SELECT * FROM( SELECT * FROM PRODUCT_HOME  ORDER BY dbms_random.value) WHERE rownum <=1"; 
			$query="SELECT * FROM PRODUCT_HOME where PRODUCT_TYPE = 'Hot'";
				//$sql = "INSERT INTO PRODUCT_HOME (PRODUCT_ID, PRODUCT_IMAGE, PRODUCT_NAME, PRODUCT_PRICE) VALUES (:deptno, :dname, :loc)"; 
					$result = oci_parse($conn,$query);
					oci_execute($result);
					while($row = oci_fetch_assoc($result)){ ?>

			<div class="items col-lg-3 col-md-4 col-sm-6 mb-0 mt-4">
				<div class="card shadow bg-white rounded">
					<img src="img/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title"><?php echo $row['PRODUCT_NAME']; ?></h5>
						<p><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: lightgrey;"></i><i class="fas fa-star" style="color: lightgrey;"></i></p>
						<p>Price: £ <?php echo $row['PRODUCT_PRICE']; ?></p>
						<div class="row">
								<div class="col mx-auto">
									<p><a href="#" class="col-12 btn btn-cart btn-md mx-auto" type="Submit">Add to cart</a></p>
								</div>
						</div>
					</div>
				</div>
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