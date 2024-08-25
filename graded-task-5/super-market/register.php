<?php
global $users, $notify_handler, $guard_handler, $form_handler;
include_once 'init.php';
$title = 'Login';
$guard_handler->validate('');
include_once 'templates/header.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    if (!isset($_POST['type'])){
        $type = 'client';
    }
    $user = $users->register($name, $phone, $city, $email, $password, $type);
    if($user) {
        $notify_handler->set_msg('User registered successfully', 'success');
    }
}
?>
    <section class="signup">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8 col-md-8 col-lg-6">
                    <?php
                        $notify_handler->display_msg();
                    ?>
                    <?php $form_handler->create_form($users->get_form_inputs(false, 'register'), 'Sign Up', '', 'post');?>
                        <p>
                            Already have an account?
                            <a href="login.php" class="text-decoration-none">Sign In</a>
                        </p>
                </div>
            </div>
        </div>
    </section>


<?php
include_once 'templates/footer.php';

?>