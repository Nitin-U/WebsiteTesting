<!DOCTYPE html>
<html>
<head>
	<title></title>

	<?php
	include "header.php";
	?>

    <style type="text/css">
        hr.head1 {
            border-top: 4px solid #343A40;
            width: 10%;
            border-radius: 2px;
            margin-bottom: 35px; 
        }
    </style>

</head>
<body>


<div class="container pt-4 pb-4 col-lg-5 col-md-6 col-sm-10" id="container-contact">
  <div class="border rounded shadow p-3 bg-white rounded">
    <form onsubmit="sendEmail(); reset(); return false;" class="px-4 py-3" id="" role="form">
        <div class="col-12 text-left pb-4">
            <h1> <b> CONTACT US </b> </h1>
        </div>
        
        <div class="row">
            <div class="col-12">
            
                <div class="form-group">
                      <input type="name" class="form-control for-contact p-4" name="name" id="name" placeholder="Your Name" required="">
                </div>

            </div>

            <div class="col-12">
            
                <div class="form-group">
                      <input type="name" class="form-control for-contact p-4" name="email" id="email" placeholder="Your Email Address" required="">
                </div>

            </div>

            <div class="col-12">
            
                <div class="form-group">
                      <input type="name" class="form-control for-contact p-4" name="phone" id="phone" placeholder="Your Mobile No" required="">
                </div>

            </div>

            <div class="col-12">
            
                <div class="form-group">
                      <textarea class="form-control for-contact p-4" name="message" id="message" rows="3" placeholder="How can we help you?" required=""></textarea>
                </div>

            </div>

        </div>

        

        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" name="submit" class="btn col-lg-3 col-md-4 col-sm-6 btn-lg" id="contact-btn">Submit</button>
            </div>
        </div>

        </form>

      </div>
</div>

<script src="https://smtpjs.com/v3/smtp.js"></script>
<script>
        function sendEmail(){
            Email.send({
                Host : "smtp.gmail.com",
                Username : "trinitemart@gmail.com",
                Password : "trinit@2022",
                To : 'trinitemart@gmail.com',
                From : document.getElementById("email").value,
                Subject : "New Contact Form Enquiry",
                Body : "Name: " + document.getElementById("name").value
                    + "<br> Email: " + document.getElementById("email").value
                    + "<br> Mobile No: " + document.getElementById("phone").value
                    + "<br> Message: " + document.getElementById("message").value
            }).then(
            message => alert("Message Sent Successfully")
            );
        }
    </script>
    
<div class="container" id="container-map">
          <div class="col-12 text-center pb-4">
            <h1> <b> Map </b> </h1>
            <hr class="head1">
        </div>
<div class="container-fluid">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d52651.889051288475!2d-1.729092158520017!3d53.722674135156836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487bde00f5c1a0c9%3A0x8317bd1bad19c4b2!2sCleckheaton%2C%20UK!5e0!3m2!1sen!2snp!4v1650874062721!5m2!1sen!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded shadow bg-white rounded"></iframe>
</div>
</div>


<?php
	include "footer.php";
?>


</body>
</html>