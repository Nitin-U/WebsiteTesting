<?php

	include "crud/connection.php";
	
	?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>

    <link rel="stylesheet" href="css/style_main.css">
    <!--link rel="stylesheet" href="css/contact_style.css"-->
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <!------------------------------Google Font---------------------------------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Hurricane&family=Licorice&family=Open+Sans:ital,wght@1,300&family=Palette+Mosaic&family=Shizuru&family=Ubuntu&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css2?family=Neonderthaw&display=swap" rel="stylesheet">

	<!------------------------------Google Font---------------------------------------->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/4d186df5f3.js" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	


	<title></title>
	</head>

	<body>
		<div class="container-fluid p-0">
			
		
		<nav class="navbar navbar-expand-lg text-dark col-12 px-0 sticky-top">
				
					<div class="col-12">
					<div class="container-fluid">
						<div class="row">
							<div class="col-3 my-auto text-center">
								<div class="row">
									<div class="col-lg-12 col-md-10 col-sm-10">
					  					<a href="index.php"><img src="img/logo.png" style="height: 40px; width: 45px; "></a>
					  				</div>
								</div>
							</div>


					  	<div class="col-6 mx-auto ">
					  		<div class="row">
					  			<div class="col-lg-12 col-md-10 col-sm-10">
					  				<form class="form py-2" method="GET" action="product.php">
									  	<div class="input-group">
										    <input type="text"  name ="search" value="<?php if(isset($_GET['search'])) {echo $_GET['search']; } ?>" class="form-control" placeholder="Search .  .  .">
										    <div class="input-group-append">
										      <button class="btn btn-light" type="submit" >
										        <i class="fa fa-search"></i>
										      </button>
										    </div>
									  	</div>
									 </form>
					  			</div>
					  		</div>																	
					  	</div>


					  	<div class="col-3 my-auto mr-0">
					  		<div class="text-right">
					  			<div class="row">
					  				<div class="col-6 text-right">
					  					<a href="temp.php"><i class="fas fa-shopping-cart mr-4"></i></a>
					  					
					  				</div>

					  				<div class="col-6 text-left">
					  					<a href=""><i class="fa fa-user ml-2 mr-2"></i></a>
					  				</div>
					  		</div>
					  	</div>
					  	
					</div> 
					</div> 
					

					</div>
		</nav>

		
			<div class="col-12 px-0">
				<nav class="navbar navbar-expand-md navbar-light bg-light p-1">
	  			<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    			<span class="navbar-toggler-icon pt-2"></span>
	  			</button>

				  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				    <ul class="nav-sec navbar-nav mx-auto">
				      <li class="nav-item active mx-auto">
				        <a class="nav-link navbar-brand mr-4" href="index.php">Home <span class="sr-only">(current)</span></a>
				      </li>
				      <li class="nav-item active mx-auto">
				        <a class="nav-link navbar-brand mr-4" href="about.php">About <span class="sr-only">(current)</span></a>
				      </li>
				      <!--li class="nav-item active mx-auto">
				        <a class="nav-link navbar-brand mr-4" href="#">Category <span class="sr-only">(current)</span></a>
				      </li-->
				      <li class="nav-item active mx-auto">
				        <a class="nav-link navbar-brand mr-4" href="shop.php">Shop <span class="sr-only">(current)</span></a>
				      </li>

				      <li class="nav-item active mx-auto">
				        <a class="nav-link navbar-brand mr-4" href="product.php">Product <span class="sr-only">(current)</span></a>
				      </li>

				      	<?php
				      	if (isset($_SESSION['username'])) 
					      {?>

					      <li class="nav-item active mx-auto">
					        <a class="nav-link navbar-brand mr-4" href="">Account <span class="sr-only">(current)</span></a>
					      </li>

					      <li class="nav-item active mx-auto">
					        <a class="nav-link navbar-brand mr-4" href="logout.php">Logout <span class="sr-only">(current)</span></a>
					      </li>

				  		<?php }

				  		else {?>
				      
				      <li class="nav-item active mx-auto">
				        <a class="nav-link navbar-brand mr-4" href="login.php">Login <span class="sr-only">(current)</span></a>
				      </li>
				      <!--li class="nav-item active mx-auto">
				        <a class="nav-link navbar-brand mr-4" href="register_customer.php">Signup <span class="sr-only">(current)</span></a>
				      </li-->

				       <li class="nav-item dropdown mx-auto my-auto">
				        <a class="nav-item navbar-brand mr-4" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
				          Register
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item nav-link" href="register_customer.php">Customer SignUp</a>
				          <a class="dropdown-item nav-link" href="register_trader.php">Trader SignUp</a>
				        </div>  
				      </li>

				      <?php }
      						?>

				      <li class="nav-item active mx-auto">
				        <a class="nav-link navbar-brand mr-4" href="contact.php">Contact <span class="sr-only">(current)</span></a>
				      </li>

				    </ul>
				    
				  </div>
			</nav>
			</div>
		
<!----------------------------------------body------------------------------------------------>

