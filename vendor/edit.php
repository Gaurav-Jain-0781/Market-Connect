<?php

include "authguard.php";
include_once "../shared/connection.php";
include "menu.html";

$pid = $_GET['pid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    <div class="mt-5 d-flex justify-content-center align-item-center vh-85 flex-row">
        <form action="update.php?pid=<?php echo $pid; ?>" class="bg-success p-4" method="POST" enctype="multipart/form-data">
            <div class="text-white text-center mb-4">
                <h4>Edit Products</h4>   
            </div>
            <input id="name" type="text" placeholder="Product Name" name="name" class="form-control mt-2">
            <input id="price" type="price" placeholder="Price" name="price" class="form-control mt-2">
            <textarea id="details" name="details" placeholder="Description" cols="20" rows="5" class="form-control mt-2"></textarea>
            <input type="file" name="image" class="form-control mt-2">
            <div class="text-center">
                <button class="btn btn-warning mt-3 justify-content-center">Edit</button>
            </div>
        </form>
    </div>

    <script>
        function edit(name, price, details){
            document.getElementById('name').value = name;
            document.getElementById('price').value = price;
            document.getElementById('details').textContent = details;
        }
    </script>

</body>
</html>

<?php

$cursor = mysqli_query($conn, "select * from product where pid=$pid");

$row = mysqli_fetch_assoc($cursor);

$name = $row['name'];
$price = $row['price'];
$details = $row['details'];

if($cursor){
    echo"<script>
            edit('$name', '$price', '$details');
        </script>";
}
else{
    echo "Product not Found";
    echo mysqli_error($conn);
}

?>