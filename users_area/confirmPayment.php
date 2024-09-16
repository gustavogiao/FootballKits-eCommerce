<?php
include("../includes/connect.php");
session_start();
if(isset($_GET['orderID'])){
    $orderID = $_GET['orderID'];
    $selectDate = "SELECT * FROM user_orders WHERE order_id = '$orderID'";
    $resultSelect = mysqli_query($con, $selectDate);
    $row = mysqli_fetch_assoc($resultSelect);
    $invoiceNumber = $row['invoice_number'];
    $orderAmount = $row['amount_due'];
}

if(isset($_POST['confirmPayment'])){
    $invoiceNumber = $_POST['invoiceNumber'];
    $orderAmount = $_POST['amount'];
    $paymentMode = $_POST['paymentMode'];
    $insertQuery = "INSERT INTO user_payments(order_id, invoice_number, amount, payment_mode) VALUES('$orderID', '$invoiceNumber', '$orderAmount', '$paymentMode')";
    $runInsertQuery = mysqli_query($con, $insertQuery);
    if($runInsertQuery){
        echo "<h3 class='text-center text-success'>Payment Successful</h3>";
        echo "<script>window.open('profile.php?myOrders.php', '_self')</script>";

    }
    $updateQuery = "UPDATE user_orders SET order_status = 'Complete' WHERE order_id = '$orderID'";
    $runUpdateQuery = mysqli_query($con, $updateQuery);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap css link !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome css link !-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class = "bg-secondary">
    <div class="container my-5">
        <form action="" method="post">
            <h1 class="text-center text-light">Confirm Payment</h1>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoiceNumber" value="<?php echo $invoiceNumber?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="amount" class="form-label text-light">Amount Due</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $orderAmount; ?>" readonly>
            </div> 
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="paymentMode" class="form-select w-50 m-auto">
                    <option>Select Payment Mode</option>
                    <option>UPI</option>
                    <option>NetBanking</option>
                    <option>Paypal</option>
                    <option>Cash on Delivery</option>
                    <option>Pay Offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirmPayment">
            </div> 
        </form>
    </div>
    
</body>
</html>

