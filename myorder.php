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
    
	<title></title>

  <link rel="stylesheet" href="css/customermanage.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php
	include "header.php";
	?>

<style>
  #threadd{
    background-color: orange;
  }

</style>

</head>
<body>

<!-- ------body------ -->
  <h2>Edit Profile</h2>
  <?php
    include "sidebar_customer.php";
  ?>
  <div class="main">
    <table class="table table-bordered mt-10" id="xyz">
        <thead class="thead-dark" id="threadd">
            <tr>
                <th scope="col">Order</th>
                <th scope="col">Date</th>
                <th scope="col">Items</th>
                <th scope="col">Collection SLot</th>
                <th scope="col">Amount</th>
                <!-- <th scope="col">Status</th>
                <th scope="col">Action</th> -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>yyyy/mm/dd</td>
                <td>10</td>
                <td>yyyy/mm/dd <br> Sunday</td>
                <td>10.00</td>
                <!-- <td>paid</td>
                <td>..</td> -->
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>yyyy/mm/dd</td>
                <td>10</td>
                <td>yyyy/mm/dd <br> Sunday</td>
                <td>10.00</td>
                <!-- <td>paid</td>
                <td>..</td> -->
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>yyyy/mm/dd</td>
                <td>10</td>
                <td>yyyy/mm/dd <br> Sunday</td>
                <td>10.00</td>
                <!-- <td>paid</td>
                <td>..</td> -->
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