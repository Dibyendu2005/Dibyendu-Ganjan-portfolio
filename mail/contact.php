<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || 
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(500);
    exit();
}

$name    = htmlspecialchars(strip_tags($_POST['name']));
$email   = htmlspecialchars(strip_tags($_POST['email']));
$subject = htmlspecialchars(strip_tags($_POST['subject']));
$message = htmlspecialchars(strip_tags($_POST['message']));

$to = "ganjandip82@gmail.com";

$body = "New Website Contact Message\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Subject: $subject\n\n";
$body .= "Message:\n$message";

$headers  = "From: Website Contact <no-reply@yourdomain.com>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

if(!mail($to, $subject, $body, $headers)){
    http_response_code(500);
}
?>
