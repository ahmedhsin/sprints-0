<?php
session_start();
include_once 'models/usersModel.php';
include_once 'guard/check_user_login.php';

// var_dump($_SESSION);
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // var_dump($_POST);
    $data_check = register($_POST['username'],$_POST['email'],$_POST['password'],$_POST['phone']);
    // header('location:index.php');
    if (isset($data_check)){
        // var_dump($data_check);
    }
    
}




$title='Register';
include_once 'template/header.php';
?>

<div class="login p-5">
    <div class="container">
        <h2 class="text-center mb-3">Register</h2>
        <?php
        if(isset($data_check)){
            if($data_check == false){
                echo '<div class="alert alert-danger text-center">User already exists</div>';
            }else{
                echo '<div class="alert alert-success text-center">User registered successfully</div>';
            }
        }
        ?>
        <form method="POST" class="m-auto pt-2 p-4" style="max-width: 500px;">
            <div class="field mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="field mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="field mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="field mb-3">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" required>
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