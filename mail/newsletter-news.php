<?php

$to = "marcel@web40.com.br";

if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
	//Write to file
	$file = 'emails-news.txt';

	file_put_contents($file, $_POST['email'] . ';', FILE_APPEND | LOCK_EX);
	    
	// Send e-mail 
	$headers = "From: " . $to . "\r\n";
	     
	$subject = "New subscription - News";
	$body = "New user subscription for News Page: " . $_POST['email'];
	     
	if (mail($to, $subject, $body, $headers, "-f " . $to))
	{
		echo '';
	}
	     
	else
	{
		echo 'There was a problem. Please try again.';  
	}    

}

else
{
	echo 'Your e-mail is not valid. Please try again.';  
}



echo 'Thank you for subscribing!';