<?php
function handelRequest($model)
{
    $order = 'ASC';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if ($_POST['order']){
            $order = $_POST['order'];
        }
    }
    switch($model){
        case "users":
            return ['data' => get_users($order), 'order' => $order, 'cols' => ["id", "name", "email", "createdAt"]];
        case "products":
            return ['data' => get_products($order), 'order' => $order, 'cols' => ["id", "name", "count", "price"]];
        case "orders":
            return ['data' => get_orders($order), 'order' => $order, 'cols' => ["id", "user_id", "product_id", "createdAt"]];
        case "categories":
            return ['data' => get_categories($order), 'order' => $order, 'cols' => ["id", "name", "product_count"]];
        default:
            return [];
    }
}