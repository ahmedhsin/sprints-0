<?php
global $notify_handler, $guard_handler, $products, $orders, $users;
include_once 'init.php';
$title = 'add-product';
//$guard_handler->validate('');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_GET['model'] == 'products' && $_SESSION['type'] == 'admin'){
        $target_dir = "assets/";
        $file_name = rand(1000, 1000000) . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $file_name;
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $count = $_POST['count'];
        $admin_id = $_SESSION['user_id'];
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $product = $products->add_product($name, $count, $price, $file_name, $description, $admin_id);
        if ($product) {
            $notify_handler->set_msg('Product registered successfully', 'success');
        }
        header('Location: dashboard.php?model=products');
    } else if($_GET['model'] == 'orders' && $_SESSION['type'] == 'client'){
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];
        $price = $_POST['product_price'];
        $order = $orders->add_order($user_id, $product_id, $price);
        if ($order) {
            $notify_handler->set_msg('Order registered successfully', 'success');
        }
        header('Location: index.php');
    }
}else if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if ($_GET['model'] == 'users'){
        if ($_GET['action'] == 'delete'){
            $id = $_GET['id'];
            $users->remove_by_id($id);
            header('Location: dashboard.php?model=users');
        }
    }else if($_GET['model'] == 'products'){
        if ($_GET['action'] == 'delete'){
            $id = $_GET['id'];
            $products->remove_by_id($id);
            header('Location: dashboard.php?model=products');
        }
    }else if($_GET['model'] == 'orders'){
        if ($_GET['action'] == 'delete'){
            $id = $_GET['id'];
            $orders->remove_by_id($id);
            header('Location: dashboard.php?model=orders');
        }
    }else{
        header('Location', 'index.php');
    }
}