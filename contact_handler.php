<?php
   $name           = $_Post['name'];
   $visitor_email  = $_Post['email'];
   $message        = $_Post['message'];
   
   $email_from     ="roshan9095@yahoo.com";
   
   $email_subject  ="Response from website";
   
	
   $to            ="roshangame0@gmail.com";
 
   $headers		  ="From: $email_from";
   
  $body= "$name <br> $message <br><br> $visitor_email <br> ";

 if(mail($to,$email_subject,$header))
 
	 echo "<h1>E-mail sent successfully</h1>";
 
 else
   echo "Failed"; 
?>  