<?php

session_start();
if(!isset($_SESSION["login_status"])){
    echo "Illegal Attempt";
    die;
}
if($_SESSION["login_status"] == false){
    echo "Unauthorized Attempt";
    die;
}
if($_SESSION["user_type"]!="customer"){
    echo "No permsssion to access resource";
    die;
}

$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];

echo "<div class='d-flex justify-content-around bg-secondary text-white'>
    <h4>$user_name</h4>
    <h4>$user_type</h4>
    <h4>$user_id<h4>
</div>"

?>