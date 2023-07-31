<?php

include "authguard.php";
include_once "../shared/connection.php";

$pid = $_GET['pid'];

$status = mysqli_query($conn, "update purchase set status='Delivered' where pid=$pid");

if($status){
    echo "Product Delivered Successfully";
    header("location:order.php");
}
else{
    echo "Error in product delivery";
    echo mysqli_error($conn);
}

?>