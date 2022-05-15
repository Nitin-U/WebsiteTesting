<?php
  include "crud/connection.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
	<title></title>

  <link rel="stylesheet" href="css/manage.css">

	<?php
	include "header.php";
	?>
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
    #exampleFormControlSelect1{
      font-size: 6px;
    }
    }
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

<!-- ------body------ -->
  <h2>Manage Products</h2>
  <?php
    include "sidebar.php";
  ?>
  <div class="main">
    <form action="#">
      <br>
        <label for="pname">Product Name <span>*</span></label><br>
        <input type="text" id="pname" name="pname" required><br>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Product Type<span>*</span></label>
            <select class="form-control form-control-sm" id="exampleFormControlSelect1" placeholder="Choose Type col">
            <option>----Choose Type----</option>
            <option>1</option>
            <option>2</option>
            </select>
        </div>

        <label for="pAmount">Amount<span>*</span></label>
        <input type="text" id="pAmount" name="pAmount" required><br>

        <label for="pDescription">Expiry Date <span>*</span></label><br>
        <input type="date">

        <!-- <div class="row">
			    <div class="col-12 md-5 text-center">
          <button type="button" class="btn btn-white mx-auto col-4" id="abc">Create</button>
			    </div>
		    </div> -->
        <div class="col-md-12"> 
   			    <div class="card-text text-center">
   				    <a class="btn btn-white text-light" id="abc">Create</a> <br/><br/>
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

<!-- -----footer------- -->

  <?php
	  include "footer.php";
  ?>

</body>
</html>