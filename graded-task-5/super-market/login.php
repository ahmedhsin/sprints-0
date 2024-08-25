<?php
global $users, $notify_handler, $guard_handler, $form_handler;
include_once 'init.php';
$title = 'Login';
$guard_handler->validate('');
include_once 'templates/header.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = $users->login($email, $password);
    if($user){
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['type'] = $user['type'];
        header('Location: index.php');
        exit();
    }else{
        $notify_handler->set_msg('Invalid email or password', 'danger');
    }
}
?>

<section class="signin">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-8 col-md-8 col-lg-6">
                <?php
                $notify_handler->display_msg();
                ?>
                <?php $form_handler->create_form($users->get_form_inputs(false, 'login'), 'Sign In', '', 'post');?>
                <p>Don't have an account yet? <a href="register.php" class="text-decoration-none">Sign Up</a></p>
            </div>
        </div>
    </div>
</section>



<?php
include_once 'templates/footer.php';

?>