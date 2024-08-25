<?php

class Users
{
    private $conn;
    private $cols = ['id', 'name', 'phone', 'city', 'email', 'type', 'createdAt'];
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function get_user_by_email($email)
    {
        $query = $this->conn->prepare('SELECT * FROM users WHERE email = :email');
        $query->bindParam(':email', $email);
        $query->execute();
        return $query->fetch();
    }

    public function get_users($where = ''){
        $query = $this->conn->prepare('SELECT * FROM users '.$where);
        $query->execute();
        return $query->fetchAll();
    }

    public function get_user_by_id($id)
    {
        $query = $this->conn->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch();
    }
    public function remove_by_id($id)
    {
        $query = $this->conn->prepare('DELETE FROM users WHERE id = :id');
        $query->bindParam(':id', $id);
        return $query->execute();

    }

    public function login($email, $password)
    {
        $user = $this->get_user_by_email($email);
        if ($user) {
            if ($password == $user['password']) {
                return $user;
            }
        }
        return false;
    }

    public function register($name, $phone, $city, $email, $password, $type)
    {
        $query = $this->conn->prepare('INSERT INTO users (name, phone, city, email, password, type) VALUES (:name, :phone, :city, :email, :password, :type)');
        $query->bindParam(':name', $name);
        $query->bindParam(':phone', $phone);
        $query->bindParam(':city', $city);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':type', $type);
        return $query->execute();
    }

    public function get_columns()
    {
        return $this->cols;
    }

    public function get_form_inputs($inner = false, $form='login')
    {
        if ($form == 'login') {
            $inputs = [
                ['name' => 'email', 'type' => 'email', 'hidden' => false, 'value' => ''],
                ['name' => 'password', 'type' => 'password', 'hidden' => false, 'value' => '']
            ];
        } else if($form == 'register') {
            $inputs = [
                ['name' => 'name', 'type' => 'text', 'hidden' => false, 'value' => ''],
                ['name' => 'phone', 'type' => 'text', 'hidden' => false, 'value' => ''],
                ['name' => 'city', 'type' => 'text', 'hidden' => false, 'value' => ''],
                ['name' => 'email', 'type' => 'email', 'hidden' => false, 'value' => ''],
                ['name' => 'password', 'type' => 'password', 'hidden' => false, 'value' => '']
            ];
            if ($inner) {
                $inputs[] = ['name' => 'type', 'type' => 'text', 'hidden' => false, 'value' => 'client'];
            }
        }

        return $inputs;
    }
}