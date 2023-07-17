<?php

$user_name = $_POST['user_name'];
$user_password = $_POST['password'];
$encrypted_password = md5($user_password);
echo "$encrypted_password";

//$conn = new mysqli("localhost", "root", "", "test");
include_once "connection.php";

$matched_cursor = mysqli_query($conn, "select * from user where user_name = '$user_name' and password = '$user_password'");

$matched_users = mysqli_num_rows($matched_cursor);

if($matched_users == 0){
    echo "Invalid Login";
}
else{
    echo "Login Successfull";
    header("Location: https://www.google.com");
    exit();
}

?>