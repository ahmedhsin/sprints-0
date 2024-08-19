<?php
session_start();
include_once 'models/usersModel.php';
include_once 'guard/check_user_login.php';

// var_dump($_SESSION);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // var_dump($_POST);
    $data_check = get_specific_user($_POST['email'],$_POST['password']);
    if(is_array($data_check)){
        $_SESSION['id'] = $data_check['id'];
        $_SESSION['email'] = $data_check['email'];
        $_SESSION['name'] = $data_check['name'];
        header('location:index.php');
    }
}




$title='Login';
include_once 'template/header.php';
?>

<div class="login p-5">
    <div class="container">
        <h2 class="text-center mb-3">Login</h2>
        <?php
        if(isset($data_check)){
            if($data_check == false){
                echo '<div class="alert alert-danger text-center">Email or Password is incorrect</div>';
            }
        }
        ?>
        <form method="POST" class="m-auto pt-2 p-4" style="max-width: 500px;">
            <div class="field mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="field mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="field mb-3">
                <input type="submit" class="btn btn-success form-control">
            </div>
        </form>
    </div>
</div>


<?php
include_once 'template/footer.php';
?>