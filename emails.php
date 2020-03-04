<?php
$server="localhost";
$user="root";
$password="";
$database="test";
$connection=mysqli_connect($server,$user,$password,$database);
$ask="select * from email ";
$qwery=mysqli_query($connection,$ask);
$result=mysqli_fetch_assoc($qwery);
while($row = mysqli_fetch_assoc($qwery))
{
    $email=$row['email'];
    $name=$row['name'];
    $promocode=$row['promocode'];
    sendEmail($email,$name,$promocode);
}
   require ("PHPMailerAutoload.php");
   function sendEmail($email,$name,$promocode)
   {
   $htmlversion="<p> hi ".$name." your id is ".$promocode." </p>";
   $textverssion="This is the   text verssion";
   $mail = new  PHPMailer();
   $mail->isSMTP();
   $mail->Host="smtp.gmail.com";
   $mail->Port=587;
   $mail->SMTPAuth=true;
   $mail->SMTPSecure='tls';
   $mail->Username="developerpetermwaura@gmail.com";
   $mail->Password="C026-01-0748CS";
   $mail->setFrom('developerpetermwaura@gmail.com',"peter mwaura");
   $mail->addAddress($email);
   $mail->addReplyTo('deceloperpetermwaura@gmail.com');
   $mail->isHTML(true);
   $mail->Subject='DALIAN STORES';
   $mail->Body =$htmlversion;
  
   if(!$mail->send())
  {
      echo "failed";
  }
   
   else
   {
       echo "success";
   }
}