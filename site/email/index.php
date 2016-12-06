<?php
 if(isset($_POST['submit']))
 {
    $name = $_POST['name'];
	$email = $_POST['email'];
	$query = $_POST['message'];
	$email_from = $name.'<'.$email.'>';

 $to="contact@easywaitingroom.be";
 $subject="Enquiry!";
 $headers  = 'MIME-Version: 1.0' . "\r\n";
 $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 $headers .= "From: ".$email_from."\r\n";
 $message="

 		 Name:
		 $name
         <br>
 		 Email-Id:
		 $email
         <br>
 		 Message:
		 $query

   ";
	if(mail($to,$subject,$message,$headers))
		header("Location:../contact.php?msg=Message envoyé! Merci de nous avoir contacté.");
	else
		header("Location:../contact.php?msg=Erreur lors de l'envoi du message!");
        echo $to;
        echo $subject;
        echo $message;
        echo$headers;
		//contact:-your-email@your-domain.com
 }
?>
