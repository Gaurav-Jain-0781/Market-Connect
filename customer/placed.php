<?php

include "authguard.php";
include "menu.html";
include_once "../shared/connection.php";

$pid = $_GET['pid'];

$query_vendor = mysqli_query($conn, "select uploaded_by, name, pid from product where pid = $pid");
$vendor_row = mysqli_fetch_assoc($query_vendor);
$vendor_id = $vendor_row['uploaded_by'];
$pid = $vendor_row['pid'];
$name = $vendor_row['name'];
$customer_id = $_SESSION['user_id'];
$total = $_GET['total'];

$status = mysqli_query($conn, "insert into purchase(vendor_id, customer_id, pid, name, total) values($vendor_id, $customer_id, $pid, '$name', $total)");

if($status){
    echo "<h4>Order Placed<h4>";
    $cart_status = mysqli_query($conn, "delete from cart where user_id = $customer_id");
    if($cart_status){
        header("location:order.php?customer_id={$customer_id}");
    }
    else{
        echo "Error in cart Updation";
        echo mysqli_error($conn);
    }
}
else{
    echo "Error in Placing Order";
    echo mysqli_error($conn);
}

?>