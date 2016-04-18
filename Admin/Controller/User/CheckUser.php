<?php
include_once("Model/User.php");
$user = new User();
if(isset($_POST['email'],$_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){
        $user-> CheckLoginUser($email,$password);

    }else{
        echo json_encode("you must type both inputs");
    }

}