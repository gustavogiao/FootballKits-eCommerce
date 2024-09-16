<?php include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!-- bootstrap css link !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    img{
        width: 90%;
        margin: auto;
        display: block;
    }
</style>
<body>
    <?php 
        $userIP = getIPAddress();
        $getUser = "SELECT * FROM user_table WHERE user_ip = '$userIP'";
        $runUser = mysqli_query($con, $getUser);
        $rowUser = mysqli_fetch_array($runUser);
        $userID = $rowUser['user_id'];
    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content align-items-center mt-5">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank" ><img src="../img/paypalUPI.jpg" alt=""></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $userID ?>"><h2 class="text-center">Pay Offline</h2></a>
            </div>
        </div>
    </div>
</body>
</html>