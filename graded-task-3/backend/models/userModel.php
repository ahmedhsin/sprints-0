<?php

include_once '../helpers/connectToDB.php';


function get_users($order){
    $conn = connectToDB();
    $data = $conn -> query("SELECT * FROM users ORDER BY id ".$order);

    return $data -> fetchAll();
}