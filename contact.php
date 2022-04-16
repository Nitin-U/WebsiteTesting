<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php
	include "header.php";
	?>

</head>
<body>


<div class="container pt-4 pb-4 col-lg-5 col-md-6 col-sm-10" id="container-contact">
  <div class="border rounded shadow p-3 bg-white rounded">
    <form class="px-4 py-3" id="" role="form">
        <div class="col-12 text-left pb-4">
            <h1> <b> CONTACT US </b> </h1>
        </div>
        
        <div class="row">
            <div class="col-12">
            
                <div class="form-group">
                      <input type="name" class="form-control p-4" id="contact-textfields" placeholder="Your Name" required="">
                </div>

            </div>

            <div class="col-12">
            
                <div class="form-group">
                      <input type="name" class="form-control p-4" id="contact-textfields" placeholder="Your Email Address" required="">
                </div>

            </div>

            <div class="col-12">
            
                <div class="form-group">
                      <input type="name" class="form-control p-4" id="contact-textfields" placeholder="Your Mobile No" required="">
                </div>

            </div>

            <div class="col-12">
            
                <div class="form-group">
                      <textarea class="form-control p-4" id="contact-textfields" rows="3" placeholder="How can we help you?" required=""></textarea>
                </div>

            </div>

        </div>

        

        <div class="row">
            <div class="col-12 text-center">
                <button type="message" class="btn col-lg-3 col-md-4 col-sm-6 btn-lg" id="contact-btn">Submit</button>
            </div>
        </div>

        </form>

      </div>
</div>

<div class="container" id="container-map">
          <div class="col-12 text-center pb-4">
            <h1> <b> Map </b> </h1>
        </div>
<div class="container-fluid">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9031.871940167566!2d85.31816138548379!3d27.689083498189028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19b19295555f%3A0xabfe5f4b310f97de!2sThe%20British%20College%2C%20Kathmandu!5e0!3m2!1sen!2snp!4v1649693513283!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded shadow bg-white rounded"></iframe>
</div>
</div>


<?php
	include "footer.php";
?>


</body>
</html>