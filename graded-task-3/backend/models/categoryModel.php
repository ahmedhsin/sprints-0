<?php

include_once '../helpers/connectToDB.php';


function get_categories($order){
    $conn = connectToDB();
    $data = $conn -> query("SELECT * FROM categories ORDER BY id ".$order);
    return $data -> fetchAll();
}

