<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 2/9/2019
 * Time: 8:09 PM
 */

include_once ("../../includes/functions.php");

if(isset($_POST['reset'])){

    $token  = $_POST['token'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password === $confirm_password){

        $result = getAllUsers("token = '$token'");
            $email = $result[0]['email'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE users SET password = '$hashed_password', token = '' WHERE email = '$email'";
            mysqli_query($connection, $query);

            header("Location: ../../index.php");

    }else{
        header("Location: ../reset.php?token=$token");
    }
}

?>