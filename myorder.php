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
  .table.table-bordered{
    margin-bottom: 300px;
  }
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
                <th scope="col">S.N</th>
                <th scope="col">Order_Id</th>
                <th scope="col">Order Date</th>
                <th scope="col">Slot</th>
                <th scope="col">Receipt</th>
                <!-- <th scope="col">Status</th>
                <th scope="col">Action</th> -->
            </tr>
        </thead>
        <tbody>

<?php
  $select_orders = "SELECT * FROM ORDERS WHERE FK1_USER_ID=" .$_SESSION['id'];
  $orders_result = oci_parse($conn, $select_orders);
  oci_execute($orders_result);
  while ($row = oci_fetch_assoc($orders_result)) 
  {
    $date = $row['ORDER_DATE']; 
    $date_time_arr = explode (" ", $date); 
    $time=explode(".", $date_time_arr[1]);
?>

            <tr>
                <th scope="row">1</th>
                <td><?php echo $row['ORDER_ID']; ?></td>
                <td><?php echo $date_time_arr[0]; ?></td>
                <td><?php echo $row['COLLECTION_TIME']; ?><br><?php echo $row['COLLECTION_DAY']; ?></td>
                <td><a href="invoice.php?id=<?php echo $row['ORDER_ID']; ?>" target='_blank' rel='noopener noreferrer'>Click</a></td>
            </tr>

<?php } ?>

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