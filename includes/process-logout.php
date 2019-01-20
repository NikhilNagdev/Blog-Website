<?php
/**
 * Created by PhpStorm.
 * User: Aarti
 * Date: 1/20/2019
 * Time: 8:47 PM
 */

    session_start();
    $_SESSION['user_id'] = null;
    $_SESSION['role'] = null;
    session_unset();
    header("Location: ../index.php");

?>