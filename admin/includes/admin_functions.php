<?php

    include_once ("../../includes/connection.php");

    function checkForQueryError($connection){
        if(mysqli_errno($connection)){
            die(mysqli_error($connection));
        }
    }

    function insertIntoTable($table_name, $column_list, $values){

        global $connection;
        $query = "INSERT INTO {$table_name}({$column_list}) VALUES ({$values})";
        mysqli_query($connection, $query);
        checkForQueryError($connection);
    }


    function deleteFromTable($table_name, $condition){
        global $connection;
        $query = "DELETE FROM $table_name WHERE $condition";
        mysqli_query($connection, $query);
        checkForQueryError($connection);
    }


?>