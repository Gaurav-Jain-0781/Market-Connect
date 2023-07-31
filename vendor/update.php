<?php

include "authguard.php";
include_once "../shared/connection.php";

$pid = $_GET['pid'];
$pd_name = $_POST['name'];
$pd_price = $_POST['price'];
$pd_details = $_POST['details'];

$desc_file_path = 'C:/xampp/htdocs/images/';
move_uploaded_file($_FILES['image']['tmp_name'], $desc_file_path.$_FILES['image']['name']);
$img_name =  $desc_file_path.$_FILES['image']['name'];

$status = mysqli_query($conn, "UPDATE product SET name='$pd_name', price=$pd_price, details='$pd_details' WHERE pid=$pid");

if($status){
    echo "Product Updated Successfully"; 
    header("location:view.php");
}
else{
    echo "Error in uploading product";
    echo mysqli_error($conn); 
}

?>