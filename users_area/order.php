<?php include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $userID = $_GET['user_id'];    
}

// getting total items and total price of all items

$getIPAddress = getIPAddress();
$totalPrice = 0;
$cartQuery = "SELECT * FROM cart_details WHERE ip_address = '$getIPAddress'";
$cartResult = mysqli_query($con, $cartQuery);
$invoiceNumber = mt_rand();
$status = 'Pending';
$cartCount = mysqli_num_rows($cartResult);
while($cartRow = mysqli_fetch_assoc($cartResult)){
    $productID = $cartRow['product_id'];
    $selectProducts = "SELECT * FROM productss WHERE product_id = '$productID'";
    $productResult = mysqli_query($con, $selectProducts);
    while($rowProductPrice=mysqli_fetch_assoc($productResult)){
        $productPrice = array($rowProductPrice['product_price']);
        $productValues = array_sum($productPrice);
        $totalPrice += $productValues;
    }
}

// getting quantity from cart

$getCart = "SELECT * FROM cart_details";
$cartResult = mysqli_query($con, $getCart);
$getItemsQuantity = mysqli_fetch_array($cartResult);
$quantity = $getItemsQuantity['quantity'];
if($quantity == 0){
    $quantity = 1;
    $subtotal = $totalPrice;
}else{
    $quantity = $quantity;
    $subtotal = $totalPrice * $quantity;
}

$insertOrder = "INSERT INTO user_orders (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ('$userID', '$subtotal', '$invoiceNumber', '$cartCount', NOW(), '$status')";
$runOrder = mysqli_query($con, $insertOrder);
if($runOrder){
    echo "<script>alert('Order has been placed successfully!')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}

// order pending 

$insertPendingOrder = "INSERT INTO orders_pending (user_id, invoice_number, product_id, quantity, order_status) VALUES ('$userID', '$invoiceNumber', '$productID', '$quantity', '$status')";
$runPendingOrder = mysqli_query($con, $insertPendingOrder);
if($runPendingOrder){
    echo "<script>alert('Order has been placed successfully!')</script>";
    echo "<script>window.open('profile.php', '_self')</script>";
}

// deleting items from cart after order placed

$deleteItemCart = "DELETE FROM cart_details WHERE ip_address = '$getIPAddress'";
$runDeleteItems = mysqli_query($con, $deleteItemCart);

?>
