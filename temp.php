<?php
include "header.php";
?>
<link rel="stylesheet" href="css/style_temp.css">

                               

                                <body oncontextmenu='return false' class='snippet-body'>
                                <div class="container" id="container-cart">
    <div class="row">
        <aside class="col-lg-9 mb-3">
            <div class="card" id="card-cart">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted" id="text-muted-cart">
                            <tr class="small text-uppercase">
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>

                                    <div class="col text-left m-0 p-0">
                                        Trader's Name ->
                                    </div>

                                    <figure class="itemside align-items-center" id="itemside-items">
                                        <div class="aside"><img src="img/food4.jpg" class="img-sm" id="img-sm-cart"></div>
                                        <figcaption class="info ml-2"> <a href="#" class="title text-dark" data-abc="true">Item 1</a>
                                            <p class="text-muted small" id="text-muted-cart">Stock Status</p>
                                        </figcaption>
                                    </figure>
                                </td>
                                
                                <td>
                                    <div class="price-wrap"> <var class="price mt-3 mb-2">$10.00</var> <small class="text-muted" id="text-muted-cart"> <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip" data-abc="true"> 
                                        <i class="fa fa-heart"></i>
                                    </a> 
                                    <a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip" data-abc="true"> 
                                        <i class="fa-solid fa-trash"></i>
                                    </a>  </small> </div>
                                </td>

                                <td> <select class="form-control mt-3">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select> </td>
                            </tr>
                        </tbody>


                    </table>
                </div>
            </div>
        </aside>
        <aside class="col-lg-3">
            <div class="card" id="card-cart">
                <div class="card-body">
                    <dl class="dlist-align">
                        <dt>Total price:</dt>
                        <dd class="text-right ml-3">$69.97</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Discount:</dt>
                        <dd class="text-right text-danger ml-3">- $10.00</dd>
                    </dl>
                    
                    <hr> 

                    <dl class="dlist-align">
                        <dt>Total:</dt>
                        <dd class="text-right text-dark b ml-3"><strong>$59.97</strong></dd>
                    </dl>

                    <a href="#" class="btn btn-primary btn-square btn-main" data-abc="true"> Make Purchase </a> <a href="#" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</a>
                </div>
            </div>
        </aside>
    </div>
</div>
</body>                                