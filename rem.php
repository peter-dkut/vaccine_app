<?php
require 'PHPMailerAutoload.php';
               require("connectionfile.php");
               $connection=mysqli_connect($server,$user,$password,$database);
               $unvaccinatedchild="select * from parents where status='unvaccinated' ";
               $unvaccinated=mysqli_query($connection,$unvaccinatedchild);
               while($row = mysqli_fetch_assoc($unvaccinated))

         {
            
			$name=$row['fname'];
			$email = $row['email'];
			$promoCode = $row['number'];
			
			sendEmail($email, $name, $promoCode);
		
        }
		 
	function sendEmail($email, $name, $promoCode){
        $message=$_POST['rem'];
		$mail = new PHPMailer;
		$mail->isSMTP();                                     		 // Set mailer to use SMTP
		$mail->Host="smtp.gmail.com";								// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                                // Enable SMTP authenticati                    // SMTP password
        $mail->Port = 587;    
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';
        $mail->Username="developerpetermwaura@gmail.com";
        $mail->Password="C026-01-0748CS";
        $mail->setFrom('developerpetermwaura@gmail.com',"peter mwaura");                     
		$mail->addAddress($email);               // Name is optional
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject='Vaccination system';
		$mail->Body ="<h3>
		The doctor posted this post $message
	   
		 </h3>";
	

	if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent to User name : '.$name.' Email:  '.$email.'<br><br>';
	}
}

?>