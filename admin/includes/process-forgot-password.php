<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 2/9/2019
 * Time: 7:47 PM
 */

include_once ("admin_connection.php");
if(isset($_POST['forgot_password'])){
    $email = $_POST['email'];
    $query = "SELECT * FROM users WHERE email = '{$email}'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) == 1){
        $length = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($length));
        $query = "UPDATE users set token = '{$token}' WHERE email = '{$email}'";
        $result = mysqli_query($connection, $query);

        //TO SEND MAIL


        $to = $email;
        $subject = "Reset Password";

        $message = "To reset your password please click the above link<br>";
        $message .= "<a href = 'http://localhost/php-basics/blog-website/admin/reset.php?token={$token}'>http://localhost/php-basics/blog-website/admin/reset.php?token={$token}</a>";

        $header = "From:noreply@cms.com\r\n";
        $header .= "MIME-version: 1.0\r\n";
        $header .= "Content-Type: text/html\r\n";

        if(mail($to, $subject, $message, $header)){
            echo "Sent";
        }
        else{
            echo "Error";
        }
    }
}

?>