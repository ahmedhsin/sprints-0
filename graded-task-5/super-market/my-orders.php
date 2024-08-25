<?php
global $users, $notify_handler, $products, $guard_handler, $orders, $form_handler;
include_once 'init.php';
$guard_handler->validate('client');

$table_handler = null;
$data = null;
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $title = 'Orders';
    $orders->change_columns();
    $table_handler = new TableHandler($orders);
    $data = $orders->get_orders_by_user_id($_SESSION['user_id']);
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
                        <?php $table_handler->table_header(false); ?>
                        </thead>
                        <tbody class="align-middle">
                        <?php $table_handler->table_body($data, false); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>


<?php
include_once 'templates/footer.php';

?>