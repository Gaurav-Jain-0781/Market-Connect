<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .card{
            width: 300px !important;
            display : inline-block !important;
            margin: 20px;
            padding: 10px;
        }
        .price{
            font-size : 24px; 
            color : rgb(30 5 3);
        }
        .order-price{
            font-size : 24px;
            display : flex;
            flex-direction : row; 
            color : rgb(30 5 3);
            justify-content : center;
            align-items : center;
        }
        .price::after{
            content : " Rs.";
        }
        .card-image-top{
            width: 278px;
            border-radius : 10px;
        }
        .order{
            display: flex;
            flex-direction: column;
            margin : 10px !important; 
            padding : 10px;
            justify-content : start;
            align-items : center;
            text-align : center;
            height : 134px;
        }
    </style>
</head>
<body>
        <script>
            function confirmdelete(id){
                res = confirm("Are you sure you want to Remove the Product from Cart ? ");
                if(res){
                    window.location = `delete.php?id=${id}`;
                }
            }
        </script>
</body>
</html>

<?php

include "authguard.php";
include_once "../shared/connection.php";
include "menu.html";

$user_id = $_SESSION['user_id'];

$cursor = mysqli_query($conn, "select * from cart join product on cart.pid = product.pid where user_id = $user_id");

$total = 0;
$row = mysqli_fetch_assoc($cursor);

if($row){
    while($row){
        $id=$row['id'];
        $pid=$row['pid'];
        $name=$row['name'];
        $price=$row['price'];
        $details=$row['details'];
        $path=$row['imgpath'];  
        
        $total = $total + $price;
    
        echo "<div class='card' style='width: 18rem;'>
                <img class='card-image-top' src='http://localhost/images/pd10.png'>
                <div class='card-body'>
                    <h5 class='card-title'>$name</h5>                
                    <div class='card-text mb-2 text-muted'>$details</div>
                    <p class='card-text price'>$price</p>
                </div>
                <div class='d-flex mt-2 justify-content-center'>
                    <button onclick='confirmdelete($id)' class='btn bg-danger text-white'>Remove from Cart</button>
                </div>
        </div>";
        $row = mysqli_fetch_assoc($cursor);

    }
    
    echo "<div class='order'>
        <div class='card-text mb-2 order-price'>
            <p> Total : $total Rs.</p>
        </div>
        <div>
            <a href='placed.php?total={$total}&pid={$pid}'> 
                <button class='btn btn-success'> Place Order </button>
            </a>
        </div>
    </div>";
}
else{
    echo "<h4 class='mt-4 p-4 text-center'> Nothing Added to Cart </h4>";
}

?>