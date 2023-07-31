<?php

include_once "authguard.php";
include_once "menu.html";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .card{
            width: 300px !important;
            display : inline-block !important;
            margin: 10px;
            padding: 10px;
        }
        .price{
            font-size : 24px;
            color : rgb(30 5 3);
        }
        .price::after{
            content : " Rs.";
        }
        .card-image-top{
            width: 278px;
            border-radius : 10px;
        }
    </style>
</head>
<body>
</body>
</html>

<?php

include_once "../shared/connection.php";

$cursor = mysqli_query($conn, "select * from product");


while($row = mysqli_fetch_assoc($cursor)){
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];
    $path=$row['imgpath'];    

    echo "<div class='card' style='width: 18rem;'>
            <img class='card-image-top' src='http://localhost/images/pd10.png'>
            <div class='card-body'>
                <h5 class='card-title'>$name</h5>                
                <div class='card-text mb-2 text-muted'>$details</div>
                <p class='card-text price'>$price</p>
            </div>
            <div class='d-flex mt-2 justify-content-center'>
                <a href='cart.php?pid=$pid'>
                    <button class='btn bg-success text-white'>Add to Cart</button>
                </a>
            </div>
    </div>";

}
?>