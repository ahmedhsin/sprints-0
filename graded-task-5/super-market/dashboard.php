<?php
global $users, $notify_handler, $products, $guard_handler, $orders, $form_handler;
include_once 'init.php';
$guard_handler->validate('admin');

$table_handler = null;
$data = null;
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if (isset($_GET['model'])){
        if ($_GET['model'] == 'users'){
            $title = 'Users';
            $table_handler = new TableHandler($users);
            $data = $users->get_users();
        }elseif ($_GET['model'] == 'products'){
            $title = 'Products';
            $table_handler = new TableHandler($products);
            $data = $products->get_products();

        }elseif ($_GET['model'] == 'orders'){
            $title = 'Orders';
            $table_handler = new TableHandler($orders);
            $data = $orders->get_orders();
        }else{
            header('Location: dashboard.php?model=users');
            exit();
        }
    }else{
        header('Location: dashboard.php?model=users');
        exit();
    }
}

include_once 'templates/header.php';
if (count($data) == 0){
    $notify_handler->set_msg('No data found', 'warning');
}
?>


    <!--start of dashboard section-->
    <section class="">
        <div class="container">
            <?php $notify_handler->display_msg(); ?>
            <div class="row">
                <div class="col table-responsive"  >
                    <table class="table table-striped">
                        <thead>
                            <?php $table_handler->table_header(); ?>
                        </thead>
                        <tbody class="align-middle">
                            <?php $table_handler->table_body($data); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="add-item bg-primary text-white" id="btn1" data-bs-toggle="modal" data-bs-target="#exampleModal">Add</div>
    </section>
    <!-- Modal -->
    <?php if($title == 'Users') {
        $form_handler->create_form_model('add-user', 'exampleModal', $users->get_form_inputs($inner=true, 'register'), 'register.php', 'post');
    }else if($title =='Products') {
        $form_handler->create_form_model('add-product', 'exampleModal', $products->get_form_inputs($inner=true), 'request-handler.php?model=products', 'post');
    }?>

<?php
include_once 'templates/footer.php';

?>