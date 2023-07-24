<?php

include_once "connection.php";

$pid = $_GET['pid'];

$status = mysqli_query($conn, "delete from product where pid=$pid");

if($status){
    header("location:view.php");
}
else{
    echo mysqli_error($status);
}

?>