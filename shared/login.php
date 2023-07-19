<?php

session_start();
$_SESSION["login_status"] = false;

$user_name = $_POST['user_name'];
$user_password = $_POST['password'];
$encrypted_password = md5($user_password);
echo "$encrypted_password";

//$conn = new mysqli("localhost", "root", "", "test");
include_once "connection.php";

$matched_cursor = mysqli_query($conn, "select * from user where user_name = '$user_name' and password = '$encrypted_password'");

$matched_users = mysqli_num_rows($matched_cursor);

if($matched_users == 0){
    echo "Invalid Login";
}
else{
    echo "Login Successfull";
    $row = mysqli_fetch_assoc($matched_cursor);
    $user_type = $row['user_type'];
    $user_name = $row['user_name'];
    $user_id = $row['user_id'];

    if($user_type == "vendor"){
        $_SESSION["login_status"] = true;
        $_SESSION["user_name"] = $user_name;
        $_SESSION["user_type"] = $user_type;
        $_SESSION["user_id"] = $user_id;
        header("location:home.php");
    }
    else if ($user_type == "customer"){
        $_SESSION["login_status"] = true;
        $_SESSION["user_name"] = $user_name;
        $_SESSION["user_type"] = $user_type;
        header("location:menu.html");
    }
}

?>