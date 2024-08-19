<?php

include_once '../helpers/connectToDB.php';


function get_products($order){
    $conn = connectToDB();
    $data = $conn -> query("SELECT * FROM products ORDER BY id ".$order);
    return $data -> fetchAll();
}

