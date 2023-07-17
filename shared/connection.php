<?php

$conn = new mysqli("localhost", "root", "", "test");
if($conn->error){
    echo "Error in SQL connection";
    die;
}

?>