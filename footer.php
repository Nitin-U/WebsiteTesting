<!----------------------------------------footer------------------------------------------------>
<link rel="stylesheet" type="text/css" href="css/alert_fail.css">
<?php
  if (isset($_SESSION['failmessage'])) 
    {?>
      <div class="container-fluid" id="login_message_error">
          <div class="alertmessage">
              <div class="col-12">  
                  <div class="alert alert-fail-alt alert-dismissable">
                      <span class="glyphicon glyphicon-certificate"></span>
                      <button type="button" class="close ml-2" data-dismiss="alert" aria-hidden="true">
                          ×</button><?php echo $_SESSION['failmessage'];     
  }
?>
                  </div>
              </div>
          </div>
      </div>

<?php
  if (isset($_SESSION['passmessage'])) 
    {?>
      <div class="container-fluid" id="login_message_error">
          <div class="alertmessage">
              <div class="col-12">  
                  <div class="alert alert-success-alt alert-dismissable">
                      <span class="glyphicon glyphicon-certificate"></span>
                      <button type="button" class="close ml-2" data-dismiss="alert" aria-hidden="true">
                          ×</button><?php echo $_SESSION['passmessage'];     
  }
      
?>
                  </div>
              </div>
          </div>
      </div>
   
<!-- Footer -->
<footer class="page-footer font-small text-light pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-3 mt-md-0 mt-3">

        <!-- Content -->
        <p><img src="img/TMART.png" style="width: 70%; height: 60%;" class="footer-image-logo"></p>
        <h4 class="Logo-neon">

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Trinit-E-Mart</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!" class="footitem-fir text-decoration-none">About Us</a>
          </li>
          <li>
            <a href="#!" class="footitem-fir text-decoration-none">Terms & Conditions</a>
          </li>
          <li>
            <a href="#!" class="footitem-fir text-decoration-none">Contact Us</a>
          </li>
          <li>
            <a href="#!" class="footitem-fir text-decoration-none">Privacy Policy</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Categories</h5>

        <ul class="list-unstyled">
          <li>
            <a href="#!" class="footitem-sec text-decoration-none">Butchers</a>
          </li>
          <li>
            <a href="#!" class="footitem-sec text-decoration-none">Greengrocers</a>
          </li>
          <li>
            <a href="#!" class="footitem-sec text-decoration-none">Fishmongers</a>
          </li>
          <li>
            <a href="#!" class="footitem-sec text-decoration-none">Bakery</a>
          </li>
          <li>
            <a href="#!" class="footitem-sec text-decoration-none">Delicatessan</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase mb-2">Links</h5>

        
          <!-- Facebook -->
          <a class="fb-ic">
            <a href=""><i class="fab fa-facebook-f fa-lg white-text mr-2"> </i></a>
          </a>

          <a class="ins-ic">
            <a href=""><i class="fab fa-instagram fa-lg white-text mr-2"> </i></a>
          </a>

          <a class="gplus-ic">
            <a href=""><i class="fab fa-google-plus-g fa-lg white-text mr-2"> </i></a>
          </a>
          
          <a class="li-ic">
            <a href=""><i class="fab fa-linkedin-in fa-lg white-text mr-2"> </i></a>
          </a>

          <a class="tw-ic">
            <a href=""><i class="fab fa-twitter fa-lg white-text mr-2"> </i></a>
          </a>

          
        

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center bg-light text-dark py-1">© 2020 Copyright:
    <a href="/" class="footitem-thir text-decoration-none"> Trinit-E-Mart@gmail.com</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<?php
    function clearMsg()
    {
      $_SESSION['passmessage']=null;
      $_SESSION['failmessage']=null;  
    }  
      
?>