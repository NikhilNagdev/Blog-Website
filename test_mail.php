<?php

    $to = "nnagdev58@gmail.com";
    $subject = "TEST MAIL";

    $message = "<b>This is message</b>";
    $message .= "<b>This is message</b>";

    $header = "From:ht@sl.com\r\n";
    $header .= "CC:abc@gmail.com\r\n";
    $header .= "MIME-version: 1.0\r\n";
    $header .= "Content-Type: text/html\r\n";

    if(mail($to, $subject, $message, $header)){
        echo "Sent";
    }
    else{
        echo "Error";
    }

?>