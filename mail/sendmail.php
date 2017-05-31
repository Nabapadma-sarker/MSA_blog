<span>Message successfully submitted!</span>
<?php 

if($_POST["msg"] == "" || $_POST["name"] == ""){
	echo "<p>Please press the back button and fill in all fields</p>";
} else {
	// then send the form to your email

$ToEmail = 'marcel@web40.com.br'; 
$EmailSubject = 'Website Contact Form - Contact Page'; 
$mailheader = "From: ".$_POST["email"]."\r\n"; 
$mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
$mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$MESSAGE_BODY = "Name: ".$_POST["name"]."<br>"; 
$MESSAGE_BODY .= "Email: ".$_POST["email"]."<br>"; 
$MESSAGE_BODY .= "Phone: ".$_POST["phone"]."<br>"; 
$MESSAGE_BODY .= "Message: ".nl2br($_POST["msg"]).""; 
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 

}

?>