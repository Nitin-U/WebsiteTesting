<?php
  include "crud/connection.php";
  if ($_SESSION['role']!='customer') 
  {
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/customermanage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php
	include "header.php";
	?>

<style>


  </style>

</head>
<body>

<!-- ------body------ -->
  <h2>Edit Profile</h2>
  <?php
    include "sidebar_customer.php";
  ?>

  
  <div class="main">
    <table class="table table-bordered" id="xyz">
        <thead class="thead-dark">
            <tr id="table-color">
                <th scope="col">SN</th>
                <th scope="col">Product Name</th>
                <th scope="col">Rating</th>
                <th scope="col">Comments</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Product 1</td>
                <td></td>
                <td>Good Products</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Product 2</td>
                <td></td>
                <td>Good Products</td>
                <td></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Product 3</td>
                <td></td>
                <td>Good Products</td>
                <td></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Product 3</td>
                <td></td>
                <td>Good Products</td>
                <td></td>
            </tr>

        </tbody>

    </table>
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