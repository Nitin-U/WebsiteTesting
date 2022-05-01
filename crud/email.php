<?php
//gmail : testshop2078@gmail.com
//password: Nepal@123
//https://myaccount.google.com/lesssecureapps
$sender ="trinitemart@gmail.com";
$to = "gpiyusha19@tbc.edu.np";
$cc = "piyugurung2058@gmail.com";
$bcc = "aranika2001@gmail.com";
$subject =" Second Test Email from Localhost";
$message = " Hi this  is test email from  localhost <br>
<p> lorem Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
<br>
but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
";
$headers = "From: My TEST SHOP <" . $sender . ">\n" ;
$headers .= "Cc: " . $cc . "\nBcc: " . $bcc . "\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=utf-8\n";
$headers .= "Return-Path: " . $sender . "\n";
$headers .= "X-Mailer: PHP/" . phpversion();
if(mail($to, $subject, $message,$headers))
{
    echo "Email Sent";
}
else{
    echo "Unable to send Email";
}

/*

Go to C:\xampp\php and open the php.ini file.
Find [mail function] by pressing ctrl + f.
Search and pass the following values:
SMTP=smtp.gmail.com
smtp_port=587
sendmail_from = YourGmailId@gmail.com
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"


Now, go to C:\xampp\sendmail and open the sendmail.ini file.

Find [sendmail] by pressing ctrl + f.
Search and pass the following values
smtp_server=smtp.gmail.com
smtp_port=587 or 25 //use any of them
error_logfile=error.log
debug_logfile=debug.log
auth_username=YourGmailId@gmail.com
auth_password=Your-Gmail-Password
force_sender=YourGmailId@gmail.com(optional)


*/

?>


