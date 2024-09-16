<?php
include("../includes/connect.php");
if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_categories'];
    $product_brand = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    // image names
    $productImage1 = $_FILES['productImage1']['name'];
    $productImage2 = $_FILES['productImage2']['name'];
    $productImage3 = $_FILES['productImage3']['name'];
    // image temp names
    $temp_image1 = $_FILES['productImage1']['tmp_name'];
    $temp_image2 = $_FILES['productImage2']['tmp_name'];
    $temp_image3 = $_FILES['productImage3']['tmp_name'];

    // upload images to its folder
    move_uploaded_file($temp_image1,"product_images/$productImage1");
    move_uploaded_file($temp_image2,"product_images/$productImage2");
    move_uploaded_file($temp_image3,"product_images/$productImage3");
    // insert query
    $insert_products="insert into `productss` (product_title,product_desc,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3, product_price,date,status) values ('$product_title','$product_desc','$product_keywords','$product_category','$product_brand','$productImage1','$productImage2','$productImage3','$product_price',NOW(),'$product_status')";
    $result_query=mysqli_query($con,$insert_products);
    if($result_query){
    echo "<script>alert('Product has been inserted!')</script>";
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>
     <!-- bootstrap css link !-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome css link !-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css link !-->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <body class="bg-light">
        <div class="container mt-3">
            <h1 class="text-center">Insert Products</h1>
            <!-- form start !-->
            <form action="" method="post" enctype="multipart/form-data">
                <!-- tile !-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="form-label">Product Title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
                </div>
                <!-- description !-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_desc" class="form-label">Product Description</label>
                    <input type="text" name="product_desc" id="product_desc" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
                </div>
                <!-- keywords !-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="form-label">Product Keywords</label>
                    <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
                </div>
                <!-- categories !-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_categories" id="" class="form-select">
                        <option value="">Select a Category</option>
                        <?php
                        $get_categories = "select * from categoriess";
                        $run_categories = mysqli_query($con,$get_categories);
                        while($row_categories = mysqli_fetch_array($run_categories)){
                            $category_title = $row_categories['category_title'];
                            $category_id = $row_categories['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                        ?>
                        </select>
                </div>
                <!-- brands !-->
                <div class="form-outline mb-6 w-50 m-auto">
                    <select name="product_brands" id="" class="form-select">
                        <option value="">Select a Brand</option>
                        <?php
                        $get_brands = "select * from brandss";
                        $run_brands = mysqli_query($con,$get_brands);
                        while($row_brands = mysqli_fetch_array($run_brands)){
                            $brand_title = $row_brands['brand_title'];
                            $brand_id = $row_brands['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                        ?>
                        </select>
                </div>
                <!-- Image 1 !-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="productImage1" class="form-label">Product Image 1</label>
                    <input type="file" name="productImage1" id="productImage1" class="form-control" required="required">
                </div>
                <!-- Image 2 !-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="productImage2" class="form-label">Product Image 2</label>
                    <input type="file" name="productImage2" id="productImage2" class="form-control" required="required">
                </div>
                <!-- Image 3 !-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="productImage3" class="form-label">Product Image 3</label>
                    <input type="file" name="productImage3" id="productImage3" class="form-control" required="required">
                </div>

                 <!-- price !-->
                 <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="form-label">Product Price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
                </div>

                <!-- Submit !-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
                </div>


            </form>
        </div>
    </body>





<!-- bootstrap js link !-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>