<?php
  include "crud/connection.php";
?>

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="description.css">
<title>Product Description</title>
<?php include "header.php"; ?>
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
</style>
</head>
<body>
<div class="container mt-5">
  <div class="row">
    <div class="col-md-6 ">
      <img class="d-block w-100" src="img/food/banana.jpg" alt="Second slide">
    </div>
    <div class="col-md-6">
      <div class="row mx-3">
        <h1>Food 1</h1>
      </div>
      <div class="row mx-3">
        <h2><i class="fa-solid fa-sterling-sign"></i> 800</h2>
        <!-- &nbsp; &nbsp;
        <h4><del>1000</del></h4> -->
        <!-- &nbsp; &nbsp;
        <h4 class="text-success">20% off</h4> -->
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

      </div>
      <div class="row mx-3">
        <h3 class="text-warning"><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i></h3>
      </div>
<!--       
      <div class="row mt-4 mx-3">
      	<h4>Seller: &nbsp; &nbsp;</h4>
      	<p style="font-size: 18px">abc trader </p>
      </div> -->
      
      
    </div>
  </div>
</div>


<!-- <div class="container ">
    <div class="row mt-5 mx-3">
   	    <h2>Similar Products</h2>
    </div>
   
    <div class="row mt-5 mx-3">
   	    <div class="col-md-3">
   		    <div class="card">
   			    <img class="card-img-top img-fluid" src="img/food1.jpg">
   			    <div class="card-title">
   				    <h4>Food 1</h4>
   			    </div> 
   			    <div class="card-text text-center">
   				    <a class="btn btn-white text-light" id="abc">Add To Cart</a> <br/><br/>
   			    </div>
   		    </div>
   	    </div>
   	
   	
   	    <div class="col-md-3">
   		    <div class="card">
   			    <img class="card-img-top img-fluid" src="img/food1.jpg">
   			    <div class="card-title">
   				    <h4>Food 1</h4>
   			    </div> 
   			    <div class="card-text text-center">
   				    <a class="btn btn-white text-light" id="abc">Add To Cart</a> <br/><br/>
   			    </div>
   		    </div>
   	    </div>
   	
   	
   	    <div class="col-md-3">
   		    <div class="card">
   			    <img class="card-img-top img-fluid" src="img/food1.jpg">
   			    <div class="card-title">
   				    <h4>Food 1</h4>
   			    </div> 
   			    <div class="card-text text-center">
   				    <a class="btn btn-white text-light" id="abc">Add To Cart</a> <br/><br/>
   			    </div>
   		    </div>
   	    </div>
   	
        <div class="col-md-3">
   		    <div class="card">
   			    <img class="card-img-top img-fluid" src="img/food1.jpg">
   			    <div class="card-title">
   				    <h4>Food 1</h4>
   			    </div> 
   			    <div class="card-text text-center">
   				    <a class="btn btn-white text-light" id="abc">Add To Cart</a> <br/><br/>
   			    </div>
   		    </div>
   	    </div>
   </div>
   
   
</div> -->


<div class="container mt-5 mb-5">
	<div class="row mx-3">
		<h2>Ratings & Reviews</h2>
	</div>
	
	<div class="row mt-3 mb-5 mx-3">
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
  <!-- </div> -->
	
	<div class="row mb-2 mt-5 mx-3">
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
    <button type="submit" class="btn btn-light mx-3" id="abc">Submit</button>
  </form>
	
</div>

<?php include "footer.php"; ?>

















<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>