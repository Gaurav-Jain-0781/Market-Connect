<?php

include "authguard.php";
include_once "../shared/connection.php";

$id = $_GET['id'];

$status = mysqli_query($conn, "delete from cart where id=$id");

if($status){
    header("location:view.php");
}
else{
    echo mysqli_error($status);
}

?>