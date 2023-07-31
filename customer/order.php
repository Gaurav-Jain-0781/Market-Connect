<?php

include "authguard.php";
include "menu.html";
include_once "../shared/connection.php";

$customer_id = $_SESSION['user_id'];

$cursor = mysqli_query($conn, "select * from purchase where customer_id=$customer_id");

while($row = mysqli_fetch_assoc($cursor)){
    $pid=$row['id'];
    $date=$row['date'];
    $total=$row['total'];
    $status=$row['status']; 

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
                                <th>Total Amount</th>
                                <th>Status<th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>$pid</td>
                                <td>$date</td>
                                <td>$total</td>
                                <td>$status</td>
                            </tr>
                        </tbody>
                    </table>
                </div>      
            </div>
        </div>";
    }
?>