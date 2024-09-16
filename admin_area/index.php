<?php
include("../includes/connect.php");
include("../functions/common_function.php");
session_start();

// Check if the admin is logged in
if(!isset($_SESSION['username'])){
    echo "<script>alert('You need to login first.')</script>";
    echo "<script>window.open('adminLogin.php','_self')</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome css link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css link -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .footer{
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        body{
            overflow-x: hidden;
        }
        .editImage{
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../img/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                    <?php
                        if(isset($_SESSION['username'])){
                            echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome: ".$_SESSION['username']."</a></li>";
                        }else{
                            echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                        }
                    ?>  
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center flex-column p-3">
                <div class="text-center">
                    <a href=""><img src="../img/Amorim2.jpg" alt="" class="admin-img"></a>
                    <p class="text-light text-center"><?php echo $_SESSION['username'] ?></p>
                </div>
                <div class="button-container d-flex flex-wrap justify-content-center">
                    <a href="insertProduct.php" class="nav-link text-light bg-info m-1 btn">Insert Products</a>
                    <a href="index.php?viewProducts" class="nav-link text-light bg-info m-1 btn">View Products</a>
                    <a href="index.php?insert_category" class="nav-link text-light bg-info m-1 btn">Insert Categories</a>
                    <a href="index.php?viewCategories" class="nav-link text-light bg-info m-1 btn">View Categories</a>
                    <a href="index.php?insert_brand" class="nav-link text-light bg-info m-1 btn">Insert Brands</a>
                    <a href="index.php?viewBrands" class="nav-link text-light bg-info m-1 btn">View Brands</a>
                    <a href="index.php?listOrders" class="nav-link text-light bg-info m-1 btn">All Orders</a>
                    <a href="index.php?listPayments" class="nav-link text-light bg-info m-1 btn">All Payments</a>
                    <a href="index.php?listUsers" class="nav-link text-light bg-info m-1 btn">List Users</a>
                    <a href="index.php?logout" class="nav-link text-light bg-info m-1 btn">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- fourth child -->
    <div class="container my-3">
        <?php 
        if(isset($_GET['insert_category'])){
            include("insertCategories.php");
        }
        if(isset($_GET['insert_brand'])){
            include("insertBrands.php");
        }
        if(isset($_GET['viewProducts'])){
            include("viewProducts.php");
        }
        if(isset($_GET['editProduct'])){
            include("editProduct.php");
        }
        if(isset($_GET['deleteProduct'])){
            include("deleteProduct.php");
        }
        if(isset($_GET['viewCategories'])){
            include("viewCategories.php");
        }
        if(isset($_GET['viewBrands'])){
            include("viewBrands.php");
        }
        if(isset($_GET['editCategory'])){
            include("editCategory.php");
        }
        if(isset($_GET['editBrand'])){
            include("editBrand.php");
        }
        if(isset($_GET['deleteCategory'])){
            include("deleteCategory.php");
        }
        if(isset($_GET['deleteBrand'])){
            include("deleteBrand.php");
        }
        if(isset($_GET['listOrders'])){
            include("listOrders.php");
        }
        if(isset($_GET['deleteOrder'])){
            include("deleteOrder.php");
        }
        if(isset($_GET['listPayments'])){
            include("listPayments.php");
        }
        if(isset($_GET['deletePayment'])){
            include("deletePayment.php");
        }
        if(isset($_GET['listUsers'])){
            include("listUsers.php");
        }
        if(isset($_GET['deleteUser'])){
            include("deleteUser.php");
        }
        if(isset($_GET['logout'])){
            include("logout.php");
        }
        ?>
    </div>

<!-- last child -->

<!-- bootstrap js link -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
