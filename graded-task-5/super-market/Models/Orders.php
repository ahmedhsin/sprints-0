<?php

class Orders
{
    private $conn;
    private $cols = ['id', 'user_id', 'product_id', 'createdAt', 'price'];
    private $client_cols = ['name', 'price', 'createdAt'];
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function get_orders($where = ''){
        $query = $this->conn->prepare('SELECT * FROM orders '.$where);
        $query->execute();
        return $query->fetchAll();
    }



    public function get_orders_by_user_id($id)
    {
        $sql = 'SELECT products.name, orders.createdAt, orders.price FROM orders INNER JOIN products ON orders.product_id = products.id WHERE orders.user_id = :id';
        $query = $this->conn->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetchAll();
    }

    public function add_order($user_id, $product_id, $price)
    {
        $query = $this->conn->prepare('INSERT INTO orders (user_id, product_id, price) VALUES (:user_id, :product_id, :price)');
        $query->bindParam(':user_id', $user_id);
        $query->bindParam(':product_id', $product_id);
        $query->bindParam(':price', $price);
        return $query->execute();
    }

    public function get_columns()
    {
        return $this->cols;
    }

    public function change_columns()
    {
        $this->cols = $this->client_cols;
    }
}