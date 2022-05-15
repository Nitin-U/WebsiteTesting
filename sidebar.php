<div class="sidenav">
    <a class="<?php if($_SERVER['PHP_SELF'] == '/Website/trader_profile_setting.php') echo 'active'?>" href="trader_profile_setting.php">&nbsp; <i class="fa fa-user" style="color:white;"></i> &nbsp; My Profile</a>

    <button class="dropdown-btn">
      &nbsp;<i class="fa fa-shopping-cart" style="color:white;"></i> &nbsp; Products<i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a class="<?php if($_SERVER['PHP_SELF'] == '/Website/addProduct.php') echo 'active'?>" href="addProduct.php">Add Products</a>
      <!--a href="manageShop.php">Manage Shop</a-->
      <a href="displayProduct.php">Display Products</a>
    </div>
    <a class="<?php if($_SERVER['PHP_SELF'] == '/Website/shop_trader.php') echo 'active'?>" href="shop_trader.php">&nbsp;<i class="fa fa-shop" style="color:white;"></i> &nbsp; Shops</a>
    <a class="<?php if($_SERVER['PHP_SELF'] == '/Website/discount.php') echo 'active'?>" href="discount.php">&nbsp;<i class="fa fa-percent" style="color:white;"></i> &nbsp; Discounts</a>
  </div>