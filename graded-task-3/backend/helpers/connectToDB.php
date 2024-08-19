<?php

function connectToDB()
{
    $info = 'mysql:host=localhost;dbname=ecommerce';
    $user = 'root';
    $pass = '';
    $con = new PDO($info, $user, $pass);
    $con-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $con;
}