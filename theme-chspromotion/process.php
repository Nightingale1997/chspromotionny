<?php
 
    $to = "info@chspromotion.se"; 
    $from = $_REQUEST['email']; 
    $name = $_REQUEST['name']; 
    $headers = "Från: $from"; 
    $subject = "Meddelande från Hemsidan"; 
 
    $fields = array(); 
    $fields{"name"} = "Namn/Företag"; 
    $fields{"email"} = "E-Post"; 
    $fields{"phone"} = "Telefonnummer"; 
    $fields{"message"} = "Meddelande";
 
    $body = "Meddelande från Hemsidan:\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }
 
    $send = mail($to, $subject, $body, $headers);
 
?>