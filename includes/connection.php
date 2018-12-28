<?php

    include_once ("config.php");
    $connection =mysqli_connect(HOST, USERNAME, PASSWORD,  DB_NAME);
    if($connection){
//        echo "Connection established successfully";
    }
    else{
        die(mysqli_error($connection));
    }
?>