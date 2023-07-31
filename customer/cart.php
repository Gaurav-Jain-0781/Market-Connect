<?php

include "authguard.php";
include_once "../shared/connection.php";

$pid = $_GET['pid'];
$user_id = $_SESSION['user_id'];

$status = mysqli_query($conn, "insert into cart(pid, user_id) values($pid, $user_id)");

if($status){
    echo "Product added to cart";
    header("location:view.php");
}
else{
    echo "Error in inserting into cart";
    mysqli_error($conn);
}

?>