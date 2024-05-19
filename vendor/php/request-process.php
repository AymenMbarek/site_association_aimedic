<?php

$EmailTo = "info@radiustheme.com";
$Subject = "New Message Received";

$errorMSG = $Body = null;
$name = $email = $phone = $select = null;
 
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
if (empty($_POST["phone"])) {
    $errorMSG .= "Phone is required ";
} else {
    $phone = $_POST["phone"];
}
 
// MESSAGE
if (empty($_POST["select"])) {
    $errorMSG .= "Select is required ";
} else {
    $select = $_POST["select"];
}
 
// prepare email body text
$Body .= "Name: " . $name . "\n";
$Body .= "Email: " . $email . "\n";
$Body .= "Phone: " . $phone . "\n";
$Body .= "Discuss: " . $select ."\n";
 
// send email
if($name && $email && $phone){
	$success = mail($EmailTo, $Subject, $Body, "From:".$email);
}else{
	$success = false;
}

if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong !";
    } else {
        echo $errorMSG;
    }
} 