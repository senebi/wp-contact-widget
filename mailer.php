<?php
//Check $_POST
if($_SERVER["REQUEST_METHOD"]=="POST"){
	//Get & Sanitize $_POST values
	$name=strip_tags(trim($_POST["name"]));
	$email=filter_var(trim($_POST["email"]),FILTER_SANITIZE_EMAIL);
	$message=trim($_POST["message"]);
	
	//Hidden values
	$recipient=$_POST["recipient"];
	$subject=$_POST["subject"];
	
	//Simple validation
	if(empty($name) || empty($message) || empty($email)){
		//Set a 400 (bad request) response code and exit
		http_response_code(400);
		echo "Please check your form fields.";
		exit;
	}
	
	//Build message
	$message="Name: ".$name."\n";
	$message.="E-mail: ".$email."\n\n";
	$message.="Message: \n".$message."\n";
	
	//Build headers
	$headers="From: ".$name." <".$email.">";
	
	//Send e-mail
	if(mail($recipient, $subject, $message, $headers)){
		//Set 200 response (success)
		http_response_code(200);
		echo "Thank you! Your message has been sent.";
	}
	else{
		//Set 500 response (internal server error)
		http_response_code(500);
		echo "Error: There was a problem sending your message.";
	}
}
else{
	//Set 403 response (forbidden)
	http_response_code(403);
	echo "There was a problem with your submission, please try again.";
}
?>