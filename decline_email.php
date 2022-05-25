<?php
include('smtp/PHPMailerAutoload.php');
$html='

<style>
	h1.heading{
		font-size: 20px;
		color: black;
	}
	p.parag1{
		font-size: 12px;
		color: red;
	}
</style>
<div class = "container">
	<h1 class="heading">Trinit-E-Mart</h1>
	<p class="parag1"><b><i>Hi, this is the management of Trinit-E-Mart. This email is to inform you that your application to become a trader has been declined. Your application did not meet our terms and conditions. Better luck next time. Cheers and have a good day.</i><b><p>
	<p><a href="#">You donot need to reply to this email</a></p>
</div>

';


smtp_mailer($_GET['email'],'subject',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "trinitemart@gmail.com";
	$mail->Password = "trinit@2022";
	$mail->SetFrom("trinitemart@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		header("Location: manageTrader.php");
	}
}
?>