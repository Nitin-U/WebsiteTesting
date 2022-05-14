<?php include"crud/connection.php"; ?>
<!DOCTYPE html>
<html>
<body>
	<link rel="stylesheet" href="css/manage.css">

  <style>
    @media only screen and (max-width: 600px) {
	      #abc{
	      font-size: 6px;
	    }
	    h2{
	      font-size: 16px;
	    }
	    a{
	      padding: 0;
	    }
	    }
	    #abc{
	      background-color: #F48037;
	      border-radius: none;
	      transition: 0.4s;
	      margin-bottom: 20px;
	      color:#fff;
	    }
	    #abc:hover{
	      background-color: #7CC355;
	      color: #fff;
	    }
	</style>

	<?php include "header.php"; ?>

	<h2>Manage Products</h2>
	<?php
	    include "sidebar.php";
	?>

	<div class="main">
    <form action="#" method="POST">
      <br>
        <label for="Name">Shop Name <span>*</span></label><br>
        <input type="text" id="name" name="name"><br>

        <label for="Name">Shop Type <span>*</span></label><br>
        <input type="text" id="type" name="type"><br>

        <label for="Address">Address <span>*</span></label>
        <input type="text" id="address" name="address"><br>

        <label for="Phone">Phone <span>*</span></label>
        <input type="text" id="phone" name="phone"><br>

        <div class="col-md-12"> 
   			  <div class="card-text text-center">
   				  <button type="submit" class="btn btn-white" id="abc" name="Submitbtn">Create</button> <br/><br/>
   			  </div>
   		  </div>
   	  </div>
    </form>
  </div>



  	<script>   //dropdown produts 
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
        dropdownContent.style.display = "block";
        }
         });
    }
  </script>

	<?php include "footer.php"; ?>
</body>
</html>