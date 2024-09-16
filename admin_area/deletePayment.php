<?php

if(isset($_GET['deletePayment'])){
    $deleteID = $_GET['deletePayment'];
    $deleteQuery = "DELETE FROM user_payments WHERE payment_id = '$deleteID'";
    $resultQuery = mysqli_query($con, $deleteQuery);
    if($resultQuery){
        echo "<script>alert('Payment has been deleted successfully')</script>";
        echo "<script>window.open('index.php?listPayments', '_self')</script>";
    }
}

?>