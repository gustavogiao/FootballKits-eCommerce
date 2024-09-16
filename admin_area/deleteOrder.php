<?php

if(isset($_GET['deleteOrder'])){
    $deleteID = $_GET['deleteOrder'];
    $deleteQuery = "DELETE FROM user_orders WHERE order_id = '$deleteID'";
    $resultQuery = mysqli_query($con, $deleteQuery);
    if($resultQuery){
        echo "<script>alert('Order has been deleted successfully')</script>";
        echo "<script>window.open('index.php?listOrders', '_self')</script>";
    }
}


?>