<?php
include("includes/connect.php");
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
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: 100$/-</a>
        </li>
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- second child !-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
<ul class="navbar-nav me-auto">
    <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
</ul>
</nav>
<!-- third child !-->
<div class="bg-light">
    <h3 class="text-center">Welcome to our Jersey Store</h3>
    <p class="text-center">Where you can get all over the football jerseys</p>
</div>
<!--forth child !-->
<div class="row">
    <div class="col-md-10">
        <!-- all products !-->
        <div class="row">
            <div class="col-md-4 mb-4">
            <div class="card">
  <img src="img/acmilan0607away.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">AC Milan - 06/07 - Away Kit</h5>
    <p class="card-text"></p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>
  </div>
</div>
            </div> 
            <div class="col-md-4 mb-4" ><div class="card">
  <img src="img/unitedretro1998princ.webp" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Manchester United - 97/98 - Home Kit</h5>
    <p class="card-text"></p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>
  </div>
</div></div> 
            <div class="col-md-4 mb-4"><div class="card">
  <img src="img/intermilan9798.webp" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Inter Milan - 97/98 - Home Kit</h5>
    <p class="card-text"></p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>
  </div>
</div>
</div>
<div class="col-md-4 mb-4"><div class="card">
  <img src="img/holanda1.webp" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Netherlands - 88/89 - Home Kit</h5>
    <p class="card-text"></p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>
  </div>
</div>
</div>
<div class="col-md-4 mb-4"><div class="card">
  <img src="img/barcelona9295.webp" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">FC Barcelona - 92/95 - Home Kit</h5>
    <p class="card-text"></p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>
  </div>
</div>
</div>
<div class="col-md-4 mb-4"><div class="card">
  <img src="img/sporting0103.webp" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Sporting - 01/03 - Home Kit</h5>
    <p class="card-text"></p>
    <a href="#" class="btn btn-info">Add to Cart</a>
    <a href="#" class="btn btn-secondary">View More</a>
  </div>
</div>
</div></div>

        
    </div>
    

    <div class="col-md-2 bg-secondary p-0 ">
        <!-- brands to be displayed !-->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Brands</h4></a>
            </li>
            <?php
            $select_brands="Select * from `brands`";
            $result_brands=mysqli_query($con,$select_brands);

            while($row_data = mysqli_fetch_assoc($result_brands)){
              $brand_title = $row_data['brand_title'];
              $brand_id = $row_data['brand_id'];
              echo "<li class='nav-item'>
                <a href='index.php?brand=$brand_title' class='nav-link text-light'>$brand_title</a>";
            }
            ?>         
        </ul>

        <!-- categories to be displayed !-->

        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            </li>
            <?php
            $select_categories="Select * from `categories`";
            $result_categories=mysqli_query($con,$select_categories);

            while($row_data = mysqli_fetch_assoc($result_categories)){
              $category_title = $row_data['category_title'];
              $category_id = $row_data['category_id'];
              echo "<li class='nav-item'>
                <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>";
            }
            ?>  
        </ul>
        
        


    </div>
    
</div>











    <!-- last child !-->
    <div class="bg-info p-3 text-center">
        <p>All rights reserved © Designed by Gustavo Gião - 2023</p>
    </div>
    </div>








    <!-- bootstrap js link !-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>