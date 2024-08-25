<?php

class Products
{
    private $conn;
    private $cols = ['id', 'name', 'count', 'price', 'image', 'description', 'admin_id' , 'createdAt'];

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function get_products($where = ''){
        $query = $this->conn->prepare('SELECT * FROM products '.$where);
        $query->execute();
        return $query->fetchAll();
    }

    public function get_product_by_id($id)
    {
        $query = $this->conn->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch();
    }

    public function remove_by_id($id)
    {
        $query = $this->conn->prepare('DELETE FROM products WHERE id = :id');
        $query->bindParam(':id', $id);
        return $query->execute();
    }
    public function add_product($name, $count, $price, $image, $description, $admin_id)
    {
        $query = $this->conn->prepare('INSERT INTO products (name, count, price, image, description, admin_id) VALUES (:name, :count, :price, :image, :description, :admin_id)');
        $query->bindParam(':name', $name);
        $query->bindParam(':count', $count);
        $query->bindParam(':price', $price);
        $query->bindParam(':image', $image);
        $query->bindParam(':description', $description);
        $query->bindParam(':admin_id', $admin_id);
        return $query->execute();
    }

    public function get_columns()
    {
        return $this->cols;
    }

    public function get_form_inputs($inner=false)
    {
        $inputs = [
            ['name' => 'name', 'type' => 'text', 'hidden' => false, 'value' => ''],
            ['name' => 'description', 'type' => 'text', 'hidden' => false, 'value' => ''],
            ['name' => 'price', 'type' => 'number', 'hidden' => false, 'value' => ''],
            ['name' => 'count', 'type' => 'number', 'hidden' => false, 'value' => ''],
            ['name' => 'image', 'type' => 'file', 'hidden' => false, 'value' => ''],
        ];

        return $inputs;
    }
}