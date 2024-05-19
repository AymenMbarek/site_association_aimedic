<?php

$EmailTo = "info@radiustheme.com";
$Subject = "New Message Received";

$errorMSG = $Body = null;
$name = $email = $message = null;
 
// NAME
if (empty($_POST["name"])) {
    $errorMSG .= "Name is required ";
} else {
    $name = $_POST["name"];
}
 
// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// PHONE
if (empty($_POST["subject"])) {
    $errorMSG .= "Subject is required ";
    $Subject = '';
} else {
    $Subject = $_POST["subject"];
}
 
// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}
 
// prepare email body text
$Body .= "Name: ". $name . "\n";
$Body .= "Email: ". $email ."\n";
$Body .= "Body: ". $message ."\n";
 
// send email
if($name && $email && $Subject && $message){
	$success = mail($EmailTo, $Subject, $Body, "From:".$email);
}else{
	$success = false;
}

if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
} 