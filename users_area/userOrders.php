<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css link !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome css link !-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>My Orders</title>
</head>
<body>
<?php
$userName = $_SESSION['userName'];
$querySelect = "SELECT * FROM user_table WHERE username = '$userName'";
$runQuery = mysqli_query($con, $querySelect);
$row = mysqli_fetch_assoc($runQuery);
$userID = $row['user_id'];
?>
<h3 class="text-success">All My Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
    <tr>
        <th>SI no</th>
        <th>Order Number</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
    $queryOrdersSelect = "SELECT * FROM user_orders WHERE user_id = '$userID'";
    $runOrdersQuery = mysqli_query($con, $queryOrdersSelect);
    $orderNumber = 1;
    while($row = mysqli_fetch_assoc($runOrdersQuery)){
        $orderID = $row['order_id'];
        $orderAmount = $row['amount_due'];
        $orderProducts = $row['total_products'];
        $orderInvoice = $row['invoice_number'];
        $orderDate = $row['order_date'];
        $orderStatus = $row['order_status'];
        if($orderStatus == 'Pending'){
            $orderStatus = "<span class='text-danger'>Incomplete</span>";
        }else{
            $orderStatus = "<span class='text-success'>Complete</span>";
        }
        ?>
        <tr>
            <td><?php echo $orderNumber; ?></td>
            <td><?php echo $orderID; ?></td>
            <td><?php echo $orderAmount; ?></td>
            <td><?php echo $orderProducts; ?></td>
            <td><?php echo $orderInvoice; ?></td>
            <td><?php echo $orderDate; ?></td>
            <td><?php echo $orderStatus; ?></td>
            <?php
            if($orderStatus=='Complete'){
                echo "<td><a href='confirmPayment.php?orderID=$orderID' class='text-dark'>Paid</a></td>";
            }else{
                echo "<td><a href='confirmPayment.php?orderID=$orderID' class='text-dark'>Confirm</a></td>";
            }   
            ?>
        </tr>
        <?php
        $orderNumber++;
    }
    ?>
    </tbody>
</table>
</body>
</html>