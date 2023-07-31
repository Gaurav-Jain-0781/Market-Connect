<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Orders</title>
</head>
<body>
    <script>
        function confirmdelivered(pid){
            res = confirm("Are you sure you have delivered this order");
            if(res){
                window.location = `delivered.php?pid=${pid}`;
            }
        }
    </script>
</body>
</html>

<?php

include "authguard.php";
include "menu.html";
include_once "../shared/connection.php";

$id = $_SESSION['user_id']; 

$cursor = mysqli_query($conn, "select * from purchase where vendor_id=$id");
$row = mysqli_fetch_assoc($cursor);

if($row){
    echo "<h4 class='mt-2 p-2 text-center text-info'>Orders Found </h4>"; 
    while($row){
        $pid=$row['pid'];
        $date=$row['date'];
        $total=$row['total']; 
        $status=$row['status'];
        
        $name_cursor = mysqli_query($conn, "select name from product where pid=$pid");
        $name_row = mysqli_fetch_assoc($name_cursor);
        $name = $name_row['name'];
    
        echo "<div class='container mt-5'>
            <div class='card'>
                <div class='card-header'>
                    <h3>Order History</h3>
                </div>
                <div class='card-body'>
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Item Name</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Delivery Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$pid</td>
                                <td>$date</td>
                                <td>$name</td>
                                <td>$total</td>
                                <td>$status</td>
                                <td>";
                                if($status === "On going"){
                                    echo "<buttton onclick='confirmdelivered($pid)'class='btn btn-success'>Mark as Delivered</button>";
                                }
                                else{
                                    echo "Delivered by Vendor";
                                }
                            echo "</td>
                            </tr>
                        </tbody>
                    </table>
                </div>      
            </div>
        </div>";

        $row = mysqli_fetch_assoc($cursor);
    }
}
else{
    echo "<h4 class='mt-2 p-2 text-info text-center'>No Orders Currently</h4>";
}

?>