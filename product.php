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

    <style type="text/css">
        .leftbar {
            padding: 20px 15px;
            border: 2px solid #e4e4e4;
            border-radius: 10px;
            margin-top: 10px;
        }

        .right_side {
            padding: 20px 15px;
            border: 2px solid #e4e4e4;
            border-radius: 10px;
            margin-top: 10px;
        }

        ul.text-left {
            /*padding-left: 0;*/
        }

        li.list-category {
            list-style: none;
        }

        button.btn.btn-go {
            font-size: 18px;
            color: #000;
            background-color: #fff;
            margin-left: 0;

        }

        input[type='number']{
            width: 47%;
        } 

        button.btn.btn-price-sort {
            background-color: #F37F37;
            transition: 0.4s;
            width: 100%;
        }

        button.btn.btn-price-sort:hover {
            color: #fff;
            background-color: #7CC355;
        }

        button.btn.btn-apply {
            color: #fff;
            background-color: #F37F37; 
            transition: 0.6s;
        }

        button.btn.btn-apply:hover {
            color: fff;
            background-color: #000;
        }

        button.btn.btn-reset {
            color: #fff;
            background-color: #7CC355; 
            transition: 0.6s;
        }

        button.btn.btn-reset:hover {
            color: fff;
            background-color: #000;
        }

        .form-control, .btn {
            box-shadow: none !important;
            outline: none !important;
        } 

        @media screen and (max-width: 1280px) {
            input[type='number']{
                width: 46%;
            } 
        }

        @media screen and (max-width: 1077px) {
            input[type='number']{
                width: 45%;
            } 
        }

        @media screen and (max-width: 956px) {
            input[type='number']{
                width: 44%;
            } 
        }

        @media screen and (max-width: 875px) {
            input[type='number']{
                width: 43%;
            } 
        }

        @media screen and (max-width: 816px) {
            input[type='number']{
                width: 42%;
            } 
        }

        @media screen and (max-width: 774px) {
            input[type='number']{
                width: 41%;
            } 
        }

        @media screen and (max-width: 576px) {
            input[type='number']{
                width: 48%;
            } 
        }

        @media screen and (max-width: 444px) {
            input[type='number']{
                width: 47%;
            } 
        }

    </style>

</head>
<body>

    <div class="container-fluid my-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4 col-md-3 col-lg-3">
                    <div class="leftbar">
                        <form action="" method="GET">
                            <h4 class="category"><b>Category</b></h4>
                            <hr>
                            <ul class="text-left">
                                <?php 
                                $traderSql="Select * from user_master where Role='trader'";
                                $traderSql_Result = oci_parse($conn, $traderSql);
                                oci_execute($traderSql_Result);

                                while ($row = oci_fetch_assoc($traderSql_Result)) { ?>
                                    <li class="list-category">
                                        <input class="form-check-input" type="radio" name="catg" id="<?php echo $row['SHOP_TYPE']?>" value= "<?php echo $row['USER_ID']?>" <?php if(isset($_GET['catg']) && $_GET['catg'] == $row['USER_ID']) echo "checked";?>> 
                                        <label class="form-check-label" for="<?php echo $row['SHOP_TYPE']?>"><?php echo $row['SHOP_TYPE']?></label>
                                    </li> 
                                <?php }  ?>
                            </ul>

                            <h4 class="price"><b>Price</b></h4>
                            <hr>

                            <div class="price_input p-2">
                                <div class="col-12">
                                    <input class="number_input" type="number" name="min" placeholder="Min" min="1" max="999" value="<?php if(isset($_GET['min'])) echo $_GET['min'];?>"> - <input class="number_input" type="number" name="max" placeholder="Max" min="1" max="999" value="<?php if(isset($_GET['max'])) echo $_GET['max'];?>">
                                </div>
<!--div class="col-12">
<button class="btn btn-price-sort mt-2">GO</button>
</div-->
</div>

<h4 class="Sort mt-2"><b>Sort</b></h4>
<hr>

<div class="sort">
    <div class="input-group mb-3">
        <select class="custom-select" name="sort_item">
            <option selected> --- Sort by ---</option>
            <option value="priceASC" <?php if (isset($_GET['sort_item']) && $_GET['sort_item'] == "priceASC") { echo "selected"; } ?> >Price [Low - High]</option>
            <option value="priceDSC" <?php if (isset($_GET['sort_item']) && $_GET['sort_item'] == "priceDSC") { echo "selected"; } ?> >Price [High - Low]</option>
            <option value="nameASC" <?php if (isset($_GET['sort_item']) && $_GET['sort_item'] == "nameASC") { echo "selected"; } ?> >Alphabet [A - Z]</option>
            <option value="nameDSC" <?php if (isset($_GET['sort_item']) && $_GET['sort_item'] == "nameDSC") { echo "selected"; } ?> >Alphabet [Z - A]</option>
        </select>
    </div>
    <input type="hidden" name="search" value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">
    <div class="input-group-append">
        <button class="btn btn-apply col-12" type="submit">Apply</button>
    </div>
    <div class="input-group-append">
        <button class="btn btn-reset col-12 mt-2" type="reset" onclick="location.href='product.php';">Reset</button>
    </div>

</div>
</form>
</div>
</div>


<div class="right_side col-sm-8 col-md-9 col-lg-9">
    <div class="sort">
<!--form action="" method="GET">
<div class="input-group mb-3 col-lg-4 col-md-5 col-sm-6">
<select class="custom-select" name="sort_item">
<option selected> --- Sort by ---</option>
<option value="priceASC" <?php if (isset($_GET['sort_item']) && $_GET['sort_item'] == "priceASC") { echo "selected"; } ?> >Price [Low - High]</option>
<option value="priceDSC" <?php if (isset($_GET['sort_item']) && $_GET['sort_item'] == "priceDSC") { echo "selected"; } ?> >Price [High - Low]</option>
<option value="nameASC" <?php if (isset($_GET['sort_item']) && $_GET['sort_item'] == "nameASC") { echo "selected"; } ?> >Alphabet [A - Z]</option>
<option value="nameDSC" <?php if (isset($_GET['sort_item']) && $_GET['sort_item'] == "nameDSC") { echo "selected"; } ?> >Alphabet [Z - A]</option>
</select>
<div class="input-group-append">
<button class="input-group-text btn btn-cart" type="submit">Sort</button>
</div>
</div> 
</form-->

<div class="row">
<!--div class="items col-lg-4 col-md-6 col-sm-6 mb-0 mt-4">
<div class="card">
<img src="img/food/bread.jpg" alt="" class="card-img-top">
<div class="card-body">
<h5 class="card-title cardprodname">Name</h5>
<p>
<i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: lightgrey;"></i><i class="fas fa-star" style="color: lightgrey;"></i>   
</p>
<p class="cardprice">Price: £ 9.99</p>
<div class="row">
<div class="col mx-auto">
<p><a href="#" class="col-12 btn btn-cart btn-md mx-auto" type="Submit">Add to cart</a></p>
</div>
</div>
</div>
</div>
</div-->

<?php
/*$sort_item = "";
if (isset($_GET['sort_item'])) {
if($_GET['sort_item'] == "a-z")
{
$sort_item="ASC";
}
elseif($_GET['sort_item'] == "z-a")
{
$sort_item="DESC";
}
}*/



$query="SELECT * FROM PRODUCT, SHOP, USER_MASTER where SHOP_ID = FK1_SHOP_ID AND USER_ID = FK1_USER_ID";



//$query="SELECT * FROM PRODUCT_HOME where PRODUCT_NAME LIKE '".$search."' ";

$min=0;
$max=999;
if(isset($_GET['min']) && trim($_GET['min'])!=null)
{
    $min=$_GET['min'];
}

if(isset($_GET['min']) && trim($_GET['max'])!=null)
{
    $max=$_GET['max'];
}
$query.=" AND PRODUCT_PRICE > ".$min." AND PRODUCT_PRICE < ".$max;

if(isset($_GET['search']))
{
    $search = $_GET['search'];
//$query.= " AND PRODUCT_NAME LIKE '%".$search."%'";
    $query.= " AND CONCAT(CONCAT(PRODUCT_NAME,SHOP), SHOP_NAME) LIKE '%".$search."%'";
}


if(isset($_GET['catg']))
{
    $catg=$_GET['catg'];
    $query.=" AND FK1_USER_ID = '".$catg."'";
}


if(isset($_GET['sort_item']))
{
    $sort=$_GET['sort_item'];
    if($sort=="priceASC")
    {
        $query.=" ORDER BY PRODUCT_PRICE ASC";
    }
    else if($sort=="priceDSC")
    {
        $query.=" ORDER BY PRODUCT_PRICE DESC";
    }
    else if($sort=="nameASC")
    {
        $query.=" ORDER BY PRODUCT_NAME ASC";
    }
    else if($sort=="nameDSC")
    {
        $query.=" ORDER BY PRODUCT_NAME DESC";
    }
}

//echo $query;
$result = oci_parse($conn,$query);
oci_execute($result);
//echo $_GET["catg"];

while($row = oci_fetch_assoc($result)){ ?>
    <div class="items col-lg-3 col-md-4 col-sm-4 col-xs-6 mb-0 mt-4">
        <form action="addtocart.php" method="POST">
            <div class="card">
                <a href="productdescription.php?id=<?php echo $row['PRODUCT_ID']?>"><img src="img/food/<?php echo $row['PRODUCT_IMAGE']; ?>" alt="" class="card-img-top"> </a>
                <div class="card-body">
                    <h5 class="card-title cardprodname"><?php echo ucwords($row['PRODUCT_NAME']); ?></h5>
                    <p>
                        <!--i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: gold;"></i><i class="fas fa-star" style="color: lightgrey;"></i><i class="fas fa-star" style="color: lightgrey;"></i-->

                            <img src="img/<?php echo $row['PRODUCT_RATING']; ?>" class="ratimg">

                        </p>
                        <p class="cardprice">Price: £ <?php echo $row['PRODUCT_PRICE']; ?></p>
                        <div class="row">
                            <div class="col mx-auto">
                                <a href="addtocart.php?prod=<?php echo $row['PRODUCT_ID']?>" class="col-12 btn btn-cart btn-md mx-auto" name="add-to-cart">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <?php }?>

</div>

</div>

</div>

</div>
</div>

</div>



<?php
include "footer.php";
clearMsg();
?>
</body>
</html>