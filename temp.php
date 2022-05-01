<?php
include "header.php";
?>
<link rel="stylesheet" href="css/style_temp.css">

<style type="text/css">
  .table-heading-text{
    font-size: 17px;
  }


  #cart-item-heading{
    font-size: 17px;
  }

  .stock-heading{
    font-size: 17px;
  }

  strong.price-heading{
    font-size: 17px;
  }

  input[type=number]::-webkit-inner-spin-button, 
  input[type=number]::-webkit-outer-spin-button 
  {  

     opacity: 1;

  }

  input.number_input{
    width: 25%;
  }

  button.btn.btn-update{
    font-size: 13px;
    height: 35px;
    color: #fff;
    background-color: #F48037;
    transition: .4s;
  }

   button.btn.btn-update:hover{
      color: #fff;
    background-color: #7CC355;
  }


  .fa-solid.fa-heart{
      font-size: 1.5em;
  }

  .fa.fa-trash{
      font-size: 1.5em;
  }

  @media screen and (max-width: 450px) {
    .table-heading-text{
      font-size: 12px;
    }

  }

  @media screen and (max-width: 768px) {
    #cart-item-heading{
      font-size: 13px;
    }

  }
   @media screen and (max-width: 576px) {
    #cart-item-heading{
      font-size: 13px;
    }

  }
  @media screen and (max-width: 450px) {
    #cart-item-heading{
      font-size: 12px;
    }

  }

  @media screen and (max-width: 768px) {
    .stock-heading{
      font-size: 13px;
    }

  }
  @media screen and (max-width: 576px) {
    .stock-heading{
      font-size: 13px;
    }

  }
  @media screen and (max-width: 450px) {
    .stock-heading{
      font-size: 12px;
    }

  }

  @media screen and (max-width: 450px) {
    strong.price-heading{
      font-size: 12px;
    }

  }

  @media screen and (max-width: 768px) {
    .fa-solid.fa-heart{
        font-size: 1.2em;
    }

    .fa.fa-trash{
        font-size: 1.2em;
    }

    }

  @media screen and (max-width: 576px) {
    .fa-solid.fa-heart{
        font-size: 1em;
    }

    .fa.fa-trash{
        font-size: 1em;
    }

    }

  @media screen and (max-width: 450px) {
    .fa-solid.fa-heart{
        font-size: 0.8em;
    }

    .fa.fa-trash{
        font-size: 0.8em;
    }

    }

  @media screen and (max-width: 768px) {
    input.number_input{
      width: 65%;
    }
  }
  @media (min-width: 576px) and (max-width: 768px){
    input.number_input{
        width: 70%;
      }
  }
  @media screen and (max-width: 450px) {
      input.number_input{
        width: 80%;
      }

  }

</style>

                               

                                <!--body oncontextmenu='return false' class='snippet-body'>
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

                                <td> <label for="quantity"></label>
  <input type="number" id="quantity" name="quantity" min="1" max="5">           </td>
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
</body-->                                

  <div class="pt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-9">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="table-heading-text p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="table-heading-text py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="table-heading-text py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="table-heading-text py-2 text-uppercase">Manage</div>
                  </th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <th scope="row" class="border-0 col-5">
                    <div class="p-2">
                      <img src="img/food/bread.jpg" style="width: 70px; height: 70px;" alt="" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle" id="cart-item-heading">Bread</a></h5><span class="text-muted stock-heading font-weight-normal font-italic d-block">Stock: Status</span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle col-2"><strong class="price-heading">$79.00</strong></td>
                  <td class="border-0 align-middle col-3"><input class="number_input mr-2 mb-2" type="number" name="" value="1" min="1" max="20"><button type="submit" name="submit" class="btn btn-update" id="update-btn">Update</button></td>
                  <td class="border-0 align-middle col-2"><a href="#" class="text-dark"><i class="fa-solid fa-heart mr-4"></i><i class="fa fa-trash"></i></a></td>
                </tr>

                <tr>
                  <th scope="row" class="border-0 col-5">
                    <div class="p-2">
                      <img src="img/food/bread.jpg" style="width: 70px; height: 70px;" alt="" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle" id="cart-item-heading">Bread</a></h5><span class="text-muted stock-heading font-weight-normal font-italic d-block">Stock: Status</span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle col-2"><strong class="price-heading">$79.00</strong></td>
                  <td class="border-0 align-middle col-3"><input class="number_input mr-2 mb-2" type="number" name="" value="1" min="1" max="20"><button type="submit" name="submit" class="btn btn-update" id="update-btn">Update</button></td>
                  <td class="border-0 align-middle col-2"><a href="#" class="text-dark"><i class="fa-solid fa-heart mr-4"></i><i class="fa fa-trash"></i></a></td>
                </tr>

                <tr>
                  <th scope="row" class="border-0 col-5">
                    <div class="p-2">
                      <img src="img/food/bread.jpg" style="width: 70px; height: 70px;" alt="" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle" id="cart-item-heading">Bread</a></h5><span class="text-muted stock-heading font-weight-normal font-italic d-block">Stock: Status</span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle col-2"><strong class="price-heading">$79.00</strong></td>
                  <td class="border-0 align-middle col-3"><input class="number_input mr-2 mb-2" type="number" name="" value="1" min="1" max="20"><button type="submit" name="submit" class="btn btn-update" id="update-btn">Update</button></td>
                  <td class="border-0 align-middle col-2"><a href="#" class="text-dark"><i class="fa-solid fa-heart mr-4"></i><i class="fa fa-trash"></i></a></td>
                </tr>
                <!--tr>
                  <th scope="row">
                    <div class="p-2">
                      <img src="img/food/pies.jpg" style="width: 70px; height: 70px;" alt="" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"><a href="#" class="text-dark d-inline-block" id="cart-heading">Bread</a></h5><span class="text-muted font-weight-normal font-italic">Stock: Status</span>
                      </div>
                    </div>
                  </th>
                  <td class="align-middle"><strong>$79.00</strong></td>
                  <td class="align-middle"><input class="number_input w-25 mr-2" type="number" name="" value="1" max="20"><button type="submit" name="submit" class="btn btn-update" id="update-btn">Update</button></td>
                  <td class="align-middle"><a href="#" class="text-dark"><i class="fa-solid fa-heart mr-4"></i><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    <div class="p-2">
                      <img src="https://bootstrapious.com/i/snippets/sn-cart/product-3.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block" id="cart-heading">Bread</a></h5><span class="text-muted font-weight-normal font-italic">Stock: Status</span>
                      </div>
                    </div>
                    <td class="align-middle"><strong>$79.00</strong></td>
                    <td class="align-middle"><input class="number_input w-25 mr-2" type="number" name="" value="1" max="20"><button type="submit" name="submit" class="btn btn-update" id="update-btn">Update</button></td>
                    <td class="align-middle"><a href="#" class="text-dark"><i class="fa-solid fa-heart mr-4"></i><i class="fa fa-trash"></i></a>
                    </td>
                </tr-->
              </tbody>
            </table>
          </div>
          <!-- End -->
        </div>

        <aside class="col-lg-3">
            <div class="card" id="card-cart">
                <div class="card-body">
                    <dl class="dlist-align">
                        <dt>Total price:</dt>
                        <dd class="text-right ml-3">$79.99</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Discount:</dt>
                        <dd class="text-right text-danger ml-3">- $10.00</dd>
                    </dl>
                    
                    <hr> 

                    <dl class="dlist-align">
                        <dt>Total:</dt>
                        <dd class="text-right text-dark b ml-3"><strong>$69.99</strong></dd>
                    </dl>

                    <a href="#" class="btn btn-dark btn-square btn-main" data-abc="true"> Delete All </a> <a href="#" class="btn btn-out btn-dark btn-square btn-main mt-2" data-abc="true">Purchase</a>
                </div>
            </div>
        </aside>

      </div>

      

    </div>
  </div>
</div>