<?php

include_once './helpers/db_connection.php';

/*
queries:

SELECT * FROM users 

SELECT * FROM users ORDER BY id asc

SELECT * FROM users ORDER BY id desc

SELECT * FROM users WHERE email='nour@gmail.com' and password='nour'

SELECT * FROM users WHERE type='client' or type='admin'


*/

function get_users($where = ''){
    $conn = connectToDB();
    $data = $conn -> query("SELECT * FROM users ".$where);
    return $data -> fetchAll();
}

function get_specific_user($email,$password){
    $conn = connectToDB();
    $data = $conn ->query("SELECT * FROM users WHERE email='".$email."' and password='".$password."'");
    return $data -> fetch();
}

function register($username, $email, $password, $phone) {
    $conn = connectToDB();

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email OR name = :username");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return false;
    } else {

        $sql = "INSERT INTO users (name, email, password, phone, type) VALUES (:username, :email, :password, :phone, 'client')";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();

        return true;
    }
}