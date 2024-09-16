<?php
include("includes/connect.php");
include("functions/common_function.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Kits - Cart Details</title>
    <!-- bootstrap css link !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome css link !-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css link !-->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <!--navbar start !-->
    <div class="container-fluid p-0">
        <!-- first child !-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="img/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="displayAll.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users_area/userRegist.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php getCartItem(); ?></sup></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- calling cart function !-->
        <?php cart(); ?>
        <!-- second child !-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <?php
      if(isset($_SESSION['userName'])){
      echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome: ".$_SESSION['userName']."</a></li>";
      }else{
      echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
      }
    ?>
                <?php
      if(!isset($_SESSION['userName'])){
        echo "<li class='nav-item'><a class='nav-link' href='./users_area/userLogin.php'>Login</a></li>";
      }else{
        echo "<li class='nav-item'><a class='nav-link' href='./users_area/logout.php'>Logout</a></li>";
      }
    ?> 
            </ul>
        </nav>
        <!-- third child !-->
        <div class="bg-light">
            <h3 class="text-center">Welcome to our Jersey Store</h3>
            <p class="text-center">Where you can get all over the football jerseys</p>
        </div>

        <!-- fourth child table !-->
        <div class="container">
            <div class="row">
                <?php 
                $ip = getIPAddress();
                $total_price = 0;
                $select_query = "SELECT * FROM `cart_details` WHERE ip_address = '$ip'";
                $result_query = mysqli_query($con, $select_query);
                $result_count = mysqli_num_rows($result_query);

                if($result_count == 0) {
                    echo "<h2 class='text-center'>Cart is Empty</h2>";
                } else {
                ?>
                <form action="" method="post">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan="2">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- fetching products !-->
                            <?php 
                            while($row = mysqli_fetch_assoc($result_query)) {
                                $product_id = $row['product_id'];
                                $select_product = "SELECT * FROM `productss` WHERE product_id = '$product_id'";
                                $result_product = mysqli_query($con, $select_product);
                                while($row_product = mysqli_fetch_assoc($result_product)) {
                                    $product_price = $row_product['product_price'];
                                    $product_title = $row_product['product_title'];
                                    $product_image1 = $row_product['product_image1'];
                                    $product_quantity = $row['quantity'];
                                    $product_total_price = $product_price * $product_quantity;
                                    $total_price += $product_price * $product_quantity;
                            ?>
                            <tr>
                                <td><?php echo $product_title ?></td>
                                <td><img src="./img/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                                <td><input type="number" name="qty[<?php echo $product_id; ?>]" class="form-input w-50" value="<?php echo $product_quantity; ?>"></td>
                                <td><?php echo $product_total_price ?>$</td>
                                <td><input type="checkbox" name="remove[<?php echo $product_id; ?>]"></td>
                                <td>
                                    <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3" name="updateCart">
                                    <input type="submit" value="Remove" class="bg-info px-3 py-2 border-0 mx-3" name="removeCart">
                                </td>
                            </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                    <!-- subtotal !-->
                    <div class="d-flex mb-5">
                        <h4 class="px-3">Subtotal:<strong class="text-info"><?php echo $total_price ?>$</strong></h4>
                        <a href="index.php" class="bg-info px-3 py-2 border-0 mx-3 btn btn-info">Continue Shopping</a>
                        <a href="./users_area/checkout.php" class="bg-secondary px-3 py-2 border-0 btn btn-info">Checkout</a>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>

        <!-- last child !-->
        <!-- include !-->
        <?php include("./includes/footer.php"); ?> 
    </div>

    <!-- bootstrap js link !-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['updateCart'])) {
    foreach($_POST['qty'] as $product_id => $qty) {
        $update_query = "UPDATE `cart_details` SET quantity = '$qty' WHERE ip_address = '$ip' AND product_id = '$product_id'";
        $result_update = mysqli_query($con, $update_query);
    }
    // Refresh the page to reflect changes
    echo "<script>window.open('cart.php','_self')</script>";
}

if(isset($_POST['removeCart'])) {
    foreach($_POST['remove'] as $product_id => $value) {
        $delete_query = "DELETE FROM `cart_details` WHERE ip_address = '$ip' AND product_id = '$product_id'";
        $result_delete = mysqli_query($con, $delete_query);
    }
    // Refresh the page to reflect changes
    echo "<script>window.open('cart.php','_self')</script>";
}
?>
