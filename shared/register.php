<?php

$user_name = $_POST["user_name"];
$user_password = $_POST['password'];
$user_type = $_POST['user_type'];

$encrypted_password = md5($user_password);

//$conn = new mysqli("localhost", "root", "", "test");
include_once "connection.php";

$status = mysqli_query($conn, "insert into user(user_name, password, user_type) values('$user_name', '$encrypted_password', '$user_type')");

if($status){
    echo "Login Successfull";
}
else{
    echo mysqli_error($conn);
}

?>