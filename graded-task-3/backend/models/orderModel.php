<?php

include_once '../helpers/connectToDB.php';


function get_orders($order){
    $conn = connectToDB();
    $data = $conn -> query("SELECT * FROM orders ORDER BY id ".$order);
    return $data -> fetchAll();
}

