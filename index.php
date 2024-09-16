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
    <title>eCommerce Website</title>
    <!-- bootstrap css link !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome css link !-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css link !-->
    <link rel="stylesheet" href="style.css">
</head>
<style>
body{
  overflow-x: hidden;
}
</style>
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
        <?php
        if(isset($_SESSION['userName'])){
          echo "<li class='nav-item'><a class='nav-link' href='./users_area/profile.php'>My Profile</a></li>";
        }else{
          echo "<li class='nav-item'><a class='nav-link' href='./users_area/userRegist.php'>Regist</a></li>";
        }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php getCartItem(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php getTotalPrice(); ?>$/-</a>
        </li> 
      </ul>
      <form class="d-flex" role="search" action="searchProduct.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchData">
         <input type="submit" value="Search" class="btn btn-outline-light" name="searchDataProduct">
      </form>
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
    <li class="nav-item">
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
<!--forth child !-->
<div class="row px-1">
    <div class="col-md-10">
        <!-- all products !-->
          <div class="row">
      <!-- fetching products -->
          <?php
          // calling getProducts function
          getProducts();
          getUniqueCategories();
          getUniqueBrands();
          // $ip = getIPAddress();  
          // echo 'User Real IP Address - '.$ip;
          ?>
<!-- row end -->
</div>
<!-- column end -->
</div>
    <div class="col-md-2 bg-secondary p-0 ">
        <!-- brands to be displayed !-->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Brands</h4></a>
            </li>
            <?php
            // calling getBrands function
            getBrands();
            ?>         
        </ul>

        <!-- categories to be displayed !-->

        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            </li>
            <?php
            // calling getCategories function
            getCategories();
            ?>  
        </ul>
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