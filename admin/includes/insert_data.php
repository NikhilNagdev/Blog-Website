<?php

include_once("admin_functions.php");

function convertToString($cat_title){
    return "'".$cat_title."'";
}


if(isset($_POST['add_category'])){
    $cat_title = $_POST['cat_title'];
    $cat_title = convertToString($cat_title);
    insertIntoTable("categories", "cat_title", "{$cat_title}");
    header("Location: ../categories.php");
}


?>