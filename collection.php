<?php
include "crud/connection.php";
if ($_SESSION['role']!='customer') 
{
    header("Location: index.php");
}

?>
<?php
$grandTotal = $_SESSION['grandTotal'];

?>
   <?php
    // if (isset($choosetime)) == $_POST['chooseTime'];
    // echo $choosetime; 
    date_default_timezone_set('Asia/Kathmandu');
    $date_day = date('l');
    $date_time = date('G');
    $date_dayCount = date('w');
    // echo $date_day;
    // echo $date_time;
    // echo $date_dayCount;

    // $date_day = date('l');    
    // $date_dayCount = 6;    
    // $date_time = 20;
    // echo $date_dayCount;
    // echo $date_time;

    if (isset($_POST['btnApply'])) 
    {

        if (isset($_POST['chooseday']) && isset($_POST['choosetime']) && isset($_POST['chooseweek']))
        {
            $chooseday = $_POST['chooseday'];
            $_SESSION['chooseday'] = $_POST['chooseday'];
            $chooseweek =$_POST['chooseweek'];
            $choosetime = $_POST['choosetime'];
            $availableTime=array(10,13,16);
            $count=0;
            // if($date_dayCount==6)
            // {
            //     $date_dayCount=5;
            // }
            if($chooseweek=='thisWeek')
            {
                if($chooseday<=$date_dayCount)
                {
                    if($date_dayCount>=5)
                    {
                        $_SESSION['failmessage'] = "Please choose collection slot of next week";
                        $count++;

                    }
                    else{
                        $_SESSION['failmessage'] = "Please choose slot 24hrs ahead";
                        $count++;
                    }
                    
                }
                else if($chooseday>$date_dayCount)
                {
                    if($date_dayCount==4 && $date_time>16)
                    {
                        $_SESSION['failmessage']="Choose collection slot of next week";
                        $count++;
                    }
                    else

                    {
                        if($chooseday-$date_dayCount==1)
                        {
                            if($date_time>=10 && $date_time<13)
                            {
                                $availableTime=array(13,16);
                            }
                            else if($date_time>=13 && $date_time<16)
                            {
                                $availableTime=array(16);
                            }
                            else
                            {
                                $availableTime=array(0);
                            }
                        }
                    }
                }
                if(!in_array($choosetime, $availableTime))
                {

                    $_SESSION['failmessage']="Please choose slot 24hrs ahead";
                    $count++;
                } 
            }
            if($count==0)
            {
                $_SESSION['passmessage']='Slot selection successful';
                $pay=1;

                if ($chooseday == 3) 
                {
                    $chooseday = 'Wednesday';
                }
                if ($chooseday == 4) 
                {
                    $chooseday = 'Thursday';
                }
                if ($chooseday == 5)
                {
                    $chooseday = 'Friday';
                }

                if ($choosetime == 10) 
                {
                    $choosetime = '10 AM - 13 PM';
                }
                if ($choosetime == 13) 
                {
                    $choosetime = '13 PM - 16 PM';
                }
                if ($choosetime == 16)
                {
                    $choosetime = '16 PM - 19 PM';
                }

                setcookie("chooseweek", $chooseweek, time()+30*24*60*60);
                setcookie("choosetime", $choosetime, time()+30*24*60*60);
                setcookie("chooseday", $chooseday, time()+30*24*60*60);
                setcookie("grandtotal", $grandTotal, time()+30*24*60*60);
            }

            




            // if ($date_dayCount >= 5) 
            // {
            //     $_SESSION['failmessage'] = "Only next week slot available";
            // }
            
            // if($date_dayCount < 5)
            // {
            //     if ($date_dayCount==$_POST['chooseday'] && $_POST['choosetime'] <= 10) 
            //     {
            //         $_SESSION['failmessage'] = "Choose from 13-16PM onwards of nextday";
            //     }
            //     elseif ($date_dayCount==$_POST['chooseday'] && $_POST['choosetime'] <= 13) 
            //     {
            //         $_SESSION['failmessage'] = "Choose from 16-19PM onwards of nextday";
            //     }
            //     elseif ($date_dayCount==$_POST['chooseday'] && $_POST['choosetime'] <= 16) 
            //     {
            //         $_SESSION['failmessage'] = "Choose any slot from day after tommorrow";
            //     }
            //     else
            //     {
            //         $_SESSION['passmessage'] = "Slot choosen successfully";
            //     }

            // }

            
        }

        else {
            $_SESSION['failmessage'] = "Please choose all slots";
        }


        

    }

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

<body>
    <div class="container py-5 col-lg-6 col-sm-10" id="main">
        <form action="" method="POST" class="border rounded shadow p-3 mb-4" >
            <div class="col-12 text-center pb-4 pt-3">
                <h1>Collection Slot</h1>
            </div>

            <!-- <div class="form-group mb-4 mx-5">
                <label for="name">Choose Date<span> *</span></label>
                <input type="date" name="chooseDate" class="form-control">
            </div> -->

            <div class="form-group mb-4 mx-5">
                <label for="exampleFormControlSelect1">Choose Week<span> *</span></label>
                <select class="form-control form-control-default" name="chooseweek" id="exampleFormControlSelect1">
                    <option disabled selected hidden>--Choose Week--</option>
                    <option value="thisWeek">This Week</option>
                    <option value="nextWeek">Next Week</option>
                </select>
            </div>

            <div class="form-group mb-4 mx-5" id="daySelect">
                <label for="exampleFormControlSelect1">Choose Day<span> *</span></label>
                <select class="form-control form-control-default" name="chooseday" id="exampleFormControlSelect1">
                    <option disabled selected hidden>--Choose Day--</option>
                    <option value="3">Wednesday</option>
                    <option value="4">Thursday</option>
                    <option value="5">Friday</option>
                </select>
            </div>

            <div class="form-group mb-4 mx-5">
                <label for="exampleFormControlSelect1">Collection Time<span> *</span></label>
                <select class="form-control form-control-default" name="choosetime" id="exampleFormControlSelect1" placeholder="choose time">
                    <option disabled selected hidden>--Choose Time--</option>
                    <option value="10">10 AM - 13 PM</option>
                    <option value="13">13 PM - 16 PM</option>
                    <option value="16">16 PM - 19 PM</option>
                </select>
            </div>

            <div class="col-12 text-center">
                <button name="btnApply" type="submit" class="btn btn-cart" style="padding: 10px; width: 100px;">Apply</button>
            </div>

            <hr>

            <div class="col-12 text-center mb-4 pt-3">
                <h1>Payment Gateway</h1>
            </div>
            <div class="text-center py-2" id="imgg">
                <img src="img/PayPal.png" style=" width: 60%; " class="rounded p-3" alt="img">
            </div>

            <div class="col-md-12"> 
                <div class="mt-2" id="paypal-payment-button" style="<?php if(!isset($pay)) echo 'pointer-events: none; opacity: 75%'?>">

                </div>
            </div>
        </div>
    </form>
</div>



<script src="https://www.paypal.com/sdk/js?client-id=AVeL3KJl8bu1X3Mw_1Zxoq2lFarEcVcXEO9lGHHeETHJYxvw0xLk4q40fJNjBikcB9_zoguwGjxmNpSC&disable-funding=credit,card"></script>
<script type="text/javascript">

    const total = <?php echo $grandTotal;?>
</script>
<script type="text/javascript">

    const total2 = <?php echo $grandTotal2;?>
</script>
<script src="js/paypal.js"></script>


<!-- <script type="text/javascript">
    function handleChange(e) {
  let innerText = e.target[e.target.options.selectedIndex].innerText;
  let value = e.target.value;
  const d=new Date();
  let dayNo = d.getDay();
  const day = document.getElementById('daySelect');
  if(value=='thisWeek' && dayNo<5)
  {
    day.classList.replace('d-none','d-block');
    day.classList.replace('d-block','d-none');

  }     
  else if(value=='nextWeek')
  {
    day.classList.replace('d-none','d-block');
  }
}
</script> -->

<?php
include "footer.php";
clearMsg();
?>

</body>