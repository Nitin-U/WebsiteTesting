<?php 
include "crud/connection.php";
if(!isset($_GET['id']))
{
    header('Location: index.php');
}
$id=$_GET['id'];
$select_orders = "SELECT * FROM ORDERS WHERE ORDER_ID= '$id' AND FK1_USER_ID=". $_SESSION['id'];
$orders_result = oci_parse($conn, $select_orders);
oci_execute($orders_result);
$row = oci_fetch_assoc($orders_result);
if(!$row)
{
    header('Location:index.php');
}

?>

<title>invoice</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
<link rel='stylesheet' type='text/css' media='screen' href='css/invoice.css'>
<script src="https://kit.fontawesome.com/4d186df5f3.js" crossorigin="anonymous"></script>   


<body>
    <?php //echo $row['ORDER_DATE']; 
    $date = $row['ORDER_DATE']; 
    
    $date_time_arr = explode (" ", $date); 
    $time=explode(".", $date_time_arr[1]);
    //print_r($time);
    //$discount = 0;
    $discount = $row['DISCOUNT'];

    ?>

    <div class="main_container">
        <div class="header_container">
            <div class="logo">
                <img src="img/logo.png" style="width: 100px;">
            </div>
            <div class="invoice_1">
                <div class="invoice_title">
                    <h3>INVOICE</h3>

                    <span class="invoice_number"> No : <?php echo $row['ORDER_ID']?></span> 
                </div>
                <br>
            </div>
        </div>
        <div class="customer_details">
            <span><?php echo $_SESSION['username']; ?></span>

            <span>Date Issued : <?php echo $date_time_arr[0]." ".$time[0].":".$time[1].":".$time[2]; ?></span>

            <span>Collection Slot : <?php echo $row['COLLECTION_DAY']; ?>, <?php echo $row['COLLECTION_TIME']; ?></span>
        </div>

        <div class="invoice_table shadow">
            <table>
                <tr>
                    <th>ITEMS</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>SUBTOTAL</th>
                </tr>

                <?php


                $select_order_product = "SELECT * FROM ORDER_PRODUCT WHERE FK1_ORDER_ID= '$id'";
                $product_result = oci_parse($conn, $select_order_product);
                oci_execute($product_result);
                $total = 0;

                while ($prod = oci_fetch_assoc($product_result))

                {
                    $subtotal = $prod['PRODUCT_PRICE'] * $prod['QUANTITY'];
                    $total+=$subtotal;
                ?>   

                <tr class="table_hover">
                <td><?php echo $prod['PRODUCT_NAME']; ?></td>
                <td>$<?php echo $prod['PRODUCT_PRICE']; ?></td>
                <td><?php echo $prod['QUANTITY']; ?></td>
                <td>$ <?php echo $subtotal; ?> </td>

            </tr>
                <?php } ?>
                <tr class="table_hover" style="border-top: 1px solid black ">
                    <td colspan="2"></td>
                    <td><b>Total: </b></td>
                    <td>$ <?php echo $total; ?></td>
                </tr>
                <tr class="table_hover">
                    <td colspan="2"></td>
                    <td><b>Discount: </b></td>
                    <td>$ <?php echo $discount; ?></td>
                </tr>

        </table>
        
    </div>
    <div class="footer_container">
        <div>
            <b>INVOICE TOTAL</b>
            <h2>$ <?php echo $total - $discount; ?> </h2>
        </div>
        <div>
            <div class="footer_inner">
                <span><b>PAYMENT GATEWAY</b></span>
                <span><img src="img/PayPal.png" style="width: 80px;"></span>
                <span>Verified Payment <i class="fa-solid fa-circle-check" style="color: #57B2F2 "></i></span>
            </div>

        </div>
    </div>
    <!-- <div class="payment_method">
        <div>PAYMENT GATEWAY</div>
        <div class="paypal">PAYPAL</div>
    </div> -->
</div>
</body>
