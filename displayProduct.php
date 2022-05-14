<?php
	include "crud/connection.php";
    if($_SESSION['role']!='trader')
      {
        header("location: index.php");
      }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trader display product page</title>
    <link rel="stylesheet" href="css/displayProduct.css">
	<?php
	include "header.php";
	?>

</head>
<style>
    img.image_crud{
        height:75px;
    }
</style>
<body>
    <div class="body">
<div class="body_title">
       Manage Products
    </div>
    <div class="add_product">
        <a class="btn btn-cart btn-md" href="addProduct.php">  Add Product </a>
</div>
    <div class="product_table shadow">
        <table>
            <tr>
                <?php
                    if ($_SESSION['role']!='trader' && $_SESSION['role']!='admin') 
                    {
                        echo "<script> window.location.href = 'index.php' </script>";
                    }
                    elseif ($_SESSION['role']=='trader')
                    {
                        $query="Select * from PRODUCT, SHOP, user_master where SHOP_ID = FK1_SHOP_ID and USER_ID = FK1_USER_ID and USER_ID = ".$_SESSION['id'];

                        
                    }
                    elseif ($_SESSION['role']=='admin')
                    {
                        $query="Select * from PRODUCT";
                    }
                    $result = oci_parse($conn,$query);
                        oci_execute($result);
                    
                    
                ?>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
            while($row = oci_fetch_assoc($result)){
                $id=$row['PRODUCT_ID']; ?>
            <tr class="table_hover">
                <td><?php echo $row['PRODUCT_ID']; ?></td>
                <td><?php echo $row['PRODUCT_NAME']; ?></td>
                <td><?php echo $row['PRODUCT_PRICE']; ?></td>
                <td><img src="img/food/<?php echo $row['PRODUCT_IMAGE']; ?>" class="image_crud"></td>
                <td><a href="updateProduct.php?PRODUCT_ID=<?php echo $row['PRODUCT_ID'] ?>">Update</a></td>
                <td><a href="deleteProduct.php?PRODUCT_ID=<?php echo $row['PRODUCT_ID'] ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
            </tr>
            <?php }?>	

        </table>
    </div>
</div>

<?php
	include "footer.php";
    clearMsg();
?>



</body>
</html>