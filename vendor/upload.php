<?php

session_start();
$user_id = $_SESSION['user_id'];

$pd_name = $_POST['name'];
$pd_price = $_POST['price'];
$pd_details = $_POST['details'];

$desc_file_path = 'C:/xampp/htdocs/images/';
move_uploaded_file($_FILES['image']['tmp_name'], $desc_file_path.$_FILES['image']['name']);
$img_name =  $desc_file_path.$_FILES['image']['name'];
echo $img_name;

include_once "connection.php";

$status = mysqli_query($conn, "insert into product (name, details, price, imgpath, uploaded_by) values('$pd_name', '$pd_details', $pd_price, '$img_name', $user_id)");

if($status){
    echo "Product Uploaded Successfully"; 
    header("location:home.php");
}
else{
    echo "Error in uploading product";
    echo mysqli_error($conn); 
}

?>