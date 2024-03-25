<?php
    $db_host = 'localhost';
    $db_name = 'id21375115_db_project';
    $db_user = 'id21375115_user';
    $db_password = 'Flukeflixk3_';

    header('Content-Type: application/json');

    try{
        $db =new PDO("mysql:host=${db_host}; dbname=${db_name}",$db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>