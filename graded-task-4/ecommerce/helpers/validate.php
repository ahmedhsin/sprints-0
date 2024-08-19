<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $type = $_FILES['image']['type'];
    $image_extention= strstr($_FILES['image']['type'],'/');
    $image_extention = str_replace('/','',$image_extention);

    if(!(str_contains($type,'image'))){
        $image_error='file uploaded is not image';
    }else{
        $image_name=rand(0,9999999).rand(0,999999).'_profile.'.$image_extention;
        move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.$image_name);
    }
    $username=$_POST['username'];
    $email=$_POST['email'];
    $skill=$_POST['skill'];

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_error='email is not valid';
    }
    if(empty($_POST['username'])){
        $username_error = 'username should not be empty';
    }
    if(empty($_POST['email'])){
        $email_error = 'email should not be empty';
    }
    if(empty($_POST['skill'])){
        $skill_error = 'skill should not be empty';
    }
}
?>