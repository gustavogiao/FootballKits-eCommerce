<?php

// getting products

function getProducts(){
    global $con;

    // condition to check isset or not
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
    $select_query = "Select * from `productss` order by rand() LIMIT 0,4";
          $result_query = mysqli_query($con,$select_query);
          while($row = mysqli_fetch_assoc($result_query)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_desc = $row['product_desc'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-4'>
                <div class='card'>
                      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                      <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_desc</p>
                      <p class='card-text'>Price: $product_price/-</p>
                      <a href='index.php?addToCart=$product_id' class='btn btn-info'>Add to Cart</a>
                      <a href='productDetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                      </div>
        </div>
      </div>";
          }
}
}
}

// getting all products

function getAllProducts(){
  global $con;

    // condition to check isset or not
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
    $select_query = "Select * from `productss` order by rand()";
          $result_query = mysqli_query($con,$select_query);
          while($row = mysqli_fetch_assoc($result_query)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_desc = $row['product_desc'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-4'>
                <div class='card'>
                      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                      <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_desc</p>
                      <p class='card-text'>Price: $product_price/-</p>
                      <a href='index.php?addToCart=$product_id' class='btn btn-info'>Add to Cart</a>
                      <a href='productDetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                      </div>
        </div>
      </div>";
          }
}
}
}



// getting unique categories

function getUniqueCategories(){
  global $con;

  // condition to check isset or not
  if(isset($_GET['category'])){
  $category_id = $_GET['category'];  
  $select_query = "Select * from `productss` where category_id = '$category_id'";
        $result_query = mysqli_query($con,$select_query);
        $numOfRows = mysqli_num_rows($result_query);
        if($numOfRows == 0){
          echo "<h2 class='text-center text-danger'>No Products Found</h2>";
        }
        while($row = mysqli_fetch_assoc($result_query)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_desc = $row['product_desc'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          echo "<div class='col-md-4 mb-4'>
              <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_desc</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?addToCart=$product_id' class='btn btn-info'>Add to Cart</a>
                    <a href='productDetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
      </div>
    </div>";
        }
}
}

// getting unique categories

function getUniqueBrands(){
  global $con;
  // condition to check isset or not
  if(isset($_GET['brand'])){
  $brand_id = $_GET['brand'];  
  $select_query = "Select * from `productss` where brand_id = '$brand_id'";
        $result_query = mysqli_query($con,$select_query);
        $numOfRows = mysqli_num_rows($result_query);
        if($numOfRows == 0){
          echo "<h2 class='text-center text-danger'>This brand is not available for service</h2>";
        }
        while($row = mysqli_fetch_assoc($result_query)){
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_desc = $row['product_desc'];
          $product_image1 = $row['product_image1'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          echo "<div class='col-md-4 mb-4'>
              <div class='card'>
                    <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_desc</p>
                    <p class='card-text'>Price: $product_price/-</p>
                    <a href='index.php?addToCart=$product_id' class='btn btn-info'>Add to Cart</a>
                    <a href='productDetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                    </div>
      </div>
    </div>";
        }
}
}

function getBrands(){
    global $con;
    $select_brands="Select * from `brandss`";
            $result_brands=mysqli_query($con,$select_brands);

            while($row_data = mysqli_fetch_assoc($result_brands)){
              $brand_title = $row_data['brand_title'];
              $brand_id = $row_data['brand_id'];
              echo "<li class='nav-item'>
                <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>";
            }
}

function getCategories(){
    global $con;
    $select_categories="Select * from `categoriess`";
            $result_categories=mysqli_query($con,$select_categories);

            while($row_data = mysqli_fetch_assoc($result_categories)){
              $category_title = $row_data['category_title'];
              $category_id = $row_data['category_id'];
              echo "<li class='nav-item'>
                <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>";
            }
}


// get searching products

function searchProducts(){
  global $con;
    if(isset($_GET['searchDataProduct'])){
      $userSearch = $_GET['searchData'];
      $search_query = "Select * from `productss` where product_keywords like '%$userSearch%'";
          $result_query = mysqli_query($con,$search_query);
          $numOfRows = mysqli_num_rows($result_query);
          if($numOfRows == 0){
            echo "<h2 class='text-center text-danger'>No Products Found</h2>";
          }
          while($row = mysqli_fetch_assoc($result_query)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_desc = $row['product_desc'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-4'>
                <div class='card'>
                      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                      <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_desc</p>
                      <p class='card-text'>Price: $product_price/-</p>
                      <a href='index.php?addToCart=$product_id' class='btn btn-info'>Add to Cart</a>
                      <a href='productDetails.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
                      </div>
        </div>
      </div>";
          }
}
}

// view details function

function viewDetails(){

  global $con;

    // condition to check isset or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
        $product_id = $_GET['product_id'];
        $select_query = "Select * from `productss` where product_id = $product_id";
          $result_query = mysqli_query($con,$select_query);
          while($row = mysqli_fetch_assoc($result_query)){
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_desc = $row['product_desc'];
            $product_image1 = $row['product_image1'];
            $product_image2 = $row['product_image2'];
            $product_image3 = $row['product_image3'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-4'>
                <div class='card'>
                      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
                      <div class='card-body'>
                      <h5 class='card-title'>$product_title</h5>
                      <p class='card-text'>$product_desc</p>
                      <p class='card-text'>Price: $product_price/-</p>
                      <a href='index.php?addToCart=$product_id' class='btn btn-info'>Add to Cart</a>
                      <a href='index.php' class='btn btn-secondary'>Go Home</a>
                      </div>
        </div>
      </div>
      <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>
                            Related Products
                        </h4>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                    </div>
                    <div class='col-md-6'>
                    <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                    </div>
                </div>
            </div>";
          }
}
}
}
}


// get ip address function

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

// cart function

function cart(){
  
  if(isset($_GET['addToCart'])){
    global $con;
    $ip = getIPAddress();
    $product_id = $_GET['addToCart'];
    $check_query = "Select * from `cart_details` where ip_address = '$ip' AND product_id = '$product_id'";
    $result_query = mysqli_query($con,$check_query);
    $numOfRows = mysqli_num_rows($result_query);
    if($numOfRows > 0){
      echo "<script>alert('Product is already added in the cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
  }else{
    $insert_query = "Insert into `cart_details` (product_id,ip_address,quantity) values ('$product_id','$ip',1)";
    $result_query = mysqli_query($con,$insert_query);
    if($result_query){
      echo "<script>alert('Product is added in the cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }

}
}

// function to get cart item numbers

function getCartItem(){
  global $con;
  $ip = getIPAddress();
  $select_query = "Select * from `cart_details` where ip_address = '$ip'";
  $result_query = mysqli_query($con,$select_query);
  $numOfRows = mysqli_num_rows($result_query);
  echo $numOfRows;
}

// function to get total price

function getTotalPrice(){
  global $con;
  $ip = getIPAddress();
  $total = 0;
  $select_query = "Select * from `cart_details` where ip_address = '$ip'";
  $result_query = mysqli_query($con,$select_query);
  while($row = mysqli_fetch_assoc($result_query)){
    $product_id = $row['product_id'];
    $quantity = $row['quantity'];
    $select_product = "Select * from `productss` where product_id = '$product_id'";
    $result_product = mysqli_query($con,$select_product);
    while($row_product = mysqli_fetch_assoc($result_product)){
      $product_price = $row_product['product_price'];
      $product_price = $product_price * $quantity;
      $total += $product_price;
    }
  }
  echo $total;
}

// get User order details

function getUserOrderDetails(){
  global $con;
  $userName = $_SESSION['userName'];
  $selectUser = "Select * from `user_table` where username = '$userName'";
  $resultUser = mysqli_query($con,$selectUser);
  while($rowUser = mysqli_fetch_array($resultUser)){
    $userID = $rowUser['user_id'];
    if(!isset($_GET['editAccount'])){
      if(!isset($_GET['myOrders'])){
        if(!isset($_GET['deleteAccount'])){
          $selectUserOrder = "Select * from `user_orders` where user_id = '$userID' and order_status = 'Pending'";
          $resultUserOrder = mysqli_query($con,$selectUserOrder);
          $rowUserOrder = mysqli_num_rows($resultUserOrder);
          if($rowUserOrder>0){
            echo "<h3 class='text-center text-success my-3'>You have <span class='text-danger'>$rowUserOrder</span> pending orders</h3>
            <p class='text-center'><a href='profile.php?myOrders' class='btn btn-secondary'>View Orders</a></p>";
          }else{
            echo "<h3 class='text-center text-danger my-3'>You have no pending orders</h3>
            <p class='text-center'><a href='../index.php' class='btn btn-secondary'>Explore Products</a></p>";
          }
        }
      }
    }
  }
  



}





?>