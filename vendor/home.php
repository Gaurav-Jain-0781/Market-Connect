<?php

include_once "authguard.php";
include_once "menu.html";

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

    <h3 class="mt-2 text-center">Hello Vendor</h3>

    <div class="d-flex justify-content-center align-item-center vh-85 flex-row">
        <form action="upload.php" class="bg-success p-4" method="POST" enctype="multipart/form-data">
            <div class="text-white text-center mb-4">
                <h4>Upload Products</h4>   
            </div>
            <input type="text" placeholder="Product Name" name="name" class="form-control mt-2">
            <input type="price" placeholder="Price" name="price" class="form-control mt-2">
            <textarea name="details" placeholder="Description" cols="20" rows="5" class="form-control mt-2"></textarea>
            <input type="file" name="image" class="form-control mt-2">
            <div class="text-center">
                <button class="btn btn-warning mt-2 justify-content-center">Upload</button>
            </div>
        </form>
    </div>

</body>
</html>