<?php
session_start();
// include_once 'helpers/validate.php';
// $conn=connectToDB();
// phpinfo();

include_once 'guard/check_user_login.php';
check_login();
// var_dump($_SESSION);



include_once 'models/usersModel.php';
$data = get_users();
$employee_access = ['name','email','phone','type'];
/*
if($_SERVER['REQUEST_METHOD']=='POST'){

    $filter = 'Where 1=1';
    if ($_POST['type'] != '') {
        $filter = $filter.' '.'and type="'.$_POST['type'].'"';
    }
    if ($_POST['name-filter'] != ''){
        $filter = $filter.' and '."name like '%".$_POST['name-filter']."%'";
    }
    var_dump($filter);
    $data = get_users($filter);

}
*/
if($_SERVER['REQUEST_METHOD']=='POST'){
    $filter = 'where 1 = 1';
    if ($_POST['type'] != '') {
        $filter = $filter.' and '.'type="'.$_POST['type'].'"';
    }
    $data = get_users($filter);
}
$title = 'Home';
include_once 'template/header.php';
?>
    <div class="container">

        <form method="POST" class="m-auto pt-5">
            <div class="row gap-2 flex-column">
                <select name="type" id="" class="col-3">
                    <option value="">All</option>
                    <option value="client">Client</option>
                    <option value="admin">Admin</option>
                </select>
                <input type="text" name="name-filter" class=" col-3" placeholder='enter name'>
                <button type="submit" class="btn btn-sm btn-outline-success mb-3 col-3">
                    Submit
                </button>
            </div>
        </form>
        <br>
        <?php //include_once 'layout/form.php' ?>
        <br>
        <?php if(isset($data) && sizeof($data) > 0) { ?>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <td>Username</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Type</td>
                <td>Control</td>
            </thead>
            <tbody>
                <?php
                foreach($data as $user){
                    echo '<tr>';
                    foreach($employee_access as $access){
                        echo '<td>'.$user[$access].'</td>';
                    }
                    echo '<td><button class="btn btn-primary">edit</button><button class="btn btn-danger">delete</button></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <?php } else {
            echo '<p class="alert alert-danger text-center m-3">There is no data</p>';
            }?> 
    </div>

<?php
include_once 'template/footer.php';
?>