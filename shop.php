<?php
	include "crud/connection.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php  
		include "header.php";
	?>

	<link rel="stylesheet" type="text/css" href="css/trader_style.css">

	<style type="text/css">
		hr.head1 {
  			border-top: 4px solid #343A40;
			width: 10%;
			border-radius: 2px;
		}

	</style>

</head>
<body>
	<div class="container-fluid">
		<div class="col-12 text-center mt-4">
			<h1>Our Traders</h1>
			<hr class="head1">
		</div>

		<div class="col-12 my-5">
			<div class="row">

				<?php 

					$query="SELECT * FROM user_master WHERE ROLE = 'trader'";
					$result = oci_parse($conn,$query);
					oci_execute($result);
					while($row = oci_fetch_assoc($result))

					{ 
				?>


				<div class="col-lg-6 col-md-4 col-sm-3 mx-auto py-3">
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

        		<?php }?>

			</div>
		</div>


	</div>



	<?php  
		include "footer.php";
	?>
</body>
</html>