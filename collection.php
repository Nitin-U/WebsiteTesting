<!DOCTYPE html>
<html>
<head>
	<title>Collection Slot</title>

	<?php
	include "header.php";
	?>

    <link rel="stylesheet" href="css/collection.css">
    <style>
        @media only screen and (max-width: 600px) {
            #abc{
                font-size: 10px;
            }
            h2{
                font-size: 16px;
            }
            a{
                padding: 0;
            }
            #main{
                font-size: 12px;
            }
        }
        #abc{
            background-color: #F48037;
            border-radius: none;
            transition: 0.4s;
            margin-bottom: 20px;
            margin-top: 40px;
            color: white;
        }
        #abc:hover{
            background-color: #7CC355;
        }
        #imgg{
            cursor: pointer;
        }
        span{
            color: red;
        }
    </style>
</head>

<body>
<div class="container py-4 col-lg-6 col-sm-10" id="main">
    <form action="#" class="border rounded shadow p-3 mb-4" >
        <div class="col-12 text-center pb-4 pt-3">
			<h1>Collection Slot</h1>
		</div>

        <div class="form-group mb-4 mx-5">
            <label for="name">Collection Date<span> *</span></label>
            <input type="date" class="form-control">
         </div>

        <div class="form-group mb-4 mx-5">
            <label for="exampleFormControlSelect1">Collection Day<span> *</span></label>
            <select class="form-control form-control-default" id="exampleFormControlSelect1">
            <option disabled selected hidden>Choose Day</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>
            </select>
        </div>
        <div class="form-group mb-4 mx-5">
            <label for="exampleFormControlSelect1">Collection Time<span> *</span></label>
            <select class="form-control form-control-default" id="exampleFormControlSelect1" placeholder="choose time">
            <option disabled selected hidden> Choose Time</option>
            <option>10 AM - 13 PM</option>
            <option>13 PM - 16 PM</option>
            <option>16 PM - 19 PM</option>
            </select>
        </div>


        <hr>

        <div class="col-12 text-center pb-4 pt-3">
			<h2>Payment Gateway</h2>
		</div>
        <div class="text-center py-2" id="imgg">
            <img src="img/p.jpg" class="rounded" alt="img">
        </div>

        <div class="col-md-12"> 
   			    <div class="card-text text-center">
   				    <a class="btn btn-white" id="abc">Place Order</a> <br/><br/>
   			    </div>
   		    </div>
   	    </div>
    </form>
</div>

<?php
	include "footer.php";
?>

</body>
</html>