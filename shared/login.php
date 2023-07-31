<?php

session_start();
$_SESSION["login_status"] = false;

$user_name = $_POST['user_name'];
$user_password = $_POST['password'];
$encrypted_password = md5($user_password);

include_once "connection.php";

$matched_cursor = mysqli_query($conn, "select * from user where user_name = '$user_name' and password = '$encrypted_password'");

$matched_users = mysqli_num_rows($matched_cursor);

if($matched_users == 0){
    echo "Invalid Login";
}
else{
    $row = mysqli_fetch_assoc($matched_cursor);
    $user_type = $row['user_type'];
    $user_name = $row['user_name'];
    $user_id = $row['user_id'];

    if($user_type == "vendor"){
        $_SESSION["login_status"] = true;
        $_SESSION["user_name"] = $user_name;
        $_SESSION["user_type"] = $user_type;
        $_SESSION["user_id"] = $user_id;
        header("location:../vendor/home.php");
    }
    else if ($user_type == "customer"){
        $_SESSION["login_status"] = true;
        $_SESSION["user_name"] = $user_name;
        $_SESSION["user_type"] = $user_type;
        $_SESSION["user_id"] = $user_id;
        header("location:../customer/home.php");
    }
}
?>