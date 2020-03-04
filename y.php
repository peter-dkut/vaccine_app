<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dalian login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icons/dalian.jpeg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

<?php

if(isset($_POST['signup']) )
{
   
   //sending an OTP message to the client    
   $otp=rand(10000,20000);
   $usermail=$_POST['email'];
   $fname=$_POST['fname'];
   require ("PHPMailerAutoload.php");
   $mail = new  PHPMailer();
   $mail->isSMTP();
   $mail->Host="smtp.gmail.com";
   $mail->Port=587;
   $mail->SMTPAuth=true;
   $mail->SMTPSecure='tls';
   $mail->Username="developerpetermwaura@gmail.com";
   $mail->Password="C026-01-0748CS";
   $mail->setFrom('developerpetermwaura@gmail.com',"peter mwaura");
   $mail->addAddress($usermail);
   $mail->addReplyTo('deceloperpetermwaura@gmail.com');
   $mail->isHTML(true);
   $mail->Subject='DALIAN STORES';
   $mail->Body ="<h3>
   YOUR VERIFICATION CODE IS $otp
  
    </h3>";
    //push otp and email into database
    
    $surname=$_POST['surname'];
    $username=$_POST['username'];
    $pass=$_POST['pass'];
    $phonenumber=$_POST['phonenumber'];
    $fname=$_POST['fname'];

  
   require("clientconn.php");
   $sql="insert into client(email,otp,fname,surname,username,phonenumber,pass) values ('$usermail','$otp','$fname','$surname','$username','$phonenumber','$pass')";
   mysqli_query($connection,$sql);
   if(!$mail->send())
   {?>
    <div class="col ">
    <div class="card-header text-center" style="background-color:green">
    FAILED TO SEND VERIFICATION CODE PLEASE TRY AGAIN
    </div>
    </div> 
    <?php require('t.php') ?>
    <?php
   }
   else
   {
       ?>
           <div class="row justify-content-center border-0 my-5" id="register">
             
           <div class="col-lg-3 col-sm-4 ">
           <div class="card-header text-center" style="background-color:green">
           A VERIFICATION CODE HAS BEEN SENT TO YOUR EMAIL
           </div>
           <div class="card">
           <div class="card-header">
           <h5>PLEASE CONFIRM YOUR EMAIL</h5>
           </div>
           <div class="form-control">
           <form method="post"  >
           <input class="form-control my-4" type="email" placeholder="<?php  echo $usermail ?>  " value="<?php  echo $usermail ?> " name="email2" >
           <input type="number" class="form-control" name="otp"  autocomplete="off" maxlength="6" placeholder="ENTER YOUR VERIFICATION CODE">
          
           <div class="container-login100-form-btn my-5">
						<button class="login100-form-btn" name="submitotp" >
							SUBMIT VERIFICATION
						</button>
					</div>
           </form>
           
           </div>
           </div>
       </div>
       </div>
       <?php



   }?>

<?php
}
?>
<?php

if(isset($_POST['submitotp']))

{
    $emailofuser=$_POST['email2'];
    $otpconfirmation=$_POST['otp'];
    require("clientconn.php");
    $ask="select *  from   client  where  email='$emailofuser' and otp='$otpconfirmation'";
    $asked=mysqli_query($connection,$ask);
    $row=mysqli_fetch_assoc($asked);
    if($emailofuser==$row['email'] &&  $otpconfirmation==$row['otp'])
    {
        $emailed=$row['email'];
        $otpd=$row['otp'];
        $fnamed= $row['fname'];
        $surnamed= $row['surname'];
        $usernamed=$row['username'];
        $passwordd=$row['pass'];
        $phoned=$row['phonenumber'];
        $sql4="insert into confirmed(email,otp,fname,surname,username,phonenumber,pass) values ('$emailed','$otpd','$fnamed','$surnamed','$usernamed','$phoned','$passwordd')";
       if(mysqli_query($connection,$sql4)) 
       {
           ?>
            <div class="row justify-content-center">
            <div class="col-lg-6">
            <div class="card">
            <div class="card-header text-center">
            ACCOUNT SUCCESSFULLY CREADTED
          
            </div>
            <?php require('jk.php'); ?>
            </div>
            </div>
            </div>

           <?php
       }
    }
    else{
        ?>
        <div class="row justify-content-center">
        <div class="col-lg-6">
        <div class="card">
        <div class="card-header bg-info text-center">
        INCORRECT VERIFICATION <br> PLEASE TRY AGAIN
      
        </div>
        <?php require('t.php'); ?>
        </div>
        </div>
        </div>
<?php
    } 
}




?>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
    <!DOCTYPE html>
<html lang="en">

