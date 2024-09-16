<?php
if(isset($_GET['editProduct'])){
    $editID = $_GET['editProduct'];
    $getData = "SELECT * FROM productss WHERE product_id = '$editID'";
    $resultData = mysqli_query($con, $getData);
    $row = mysqli_fetch_assoc($resultData);
    $productTitle = $row['product_title'];
    $productDesc = $row['product_desc'];
    $productKeywords = $row['product_keywords'];
    $productCategory = $row['category_id'];
    $productBrand = $row['brand_id'];
    $productImage1 = $row['product_image1'];
    $productImage2 = $row['product_image2'];
    $productImage3 = $row['product_image3'];
    $productPrice = $row['product_price'];

}   
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="productTitle" class="form-label">Product Title</label>
            <input type="text" name="productTitle" id="productTitle" value="<?php echo $productTitle ?>" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="productDesc" class="form-label">Product Description</label>
            <input type="text" name="productDesc" id="productDesc" value="<?php echo $productDesc ?>" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="productKeywords" class="form-label">Product Keywords</label>
            <input type="text" name="productKeywords" id="productKeywords" value="<?php echo $productKeywords ?>" class="form-control" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <select class="form-select" name="productCategory" id="productCategory">
                <option value="productCategory">Select Category</option>
                <?php
                $querySelectCategories = "SELECT * FROM categoriess";
                $resultQuery = mysqli_query($con, $querySelectCategories);
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $categoryID = $row['category_id'];
                    $categoryTitle = $row['category_title'];
                    echo "<option value='$categoryID'>$categoryTitle</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <select class="form-select" name="productBrand" id="productBrand">
                <option value="productBrand">Select Team</option>
                <?php
                $querySelectBrands = "SELECT * FROM brandss";
                $resultQuery = mysqli_query($con, $querySelectBrands);
                while($row = mysqli_fetch_assoc($resultQuery)){
                    $brandID = $row['brand_id'];
                    $brandTitle = $row['brand_title'];
                    echo "<option value='$brandID'>$brandTitle</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="productImage1" class="form-label">Product Image 1 </label>
            <div class="d-flex">
            <input type="file" name="productImage1" id="productImage1" class="form-control w-90 m-auto" required>
            <img src="./product_images/<?php echo $productImage1 ?>" alt="" class="editImage">
            </div> 
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="productImage2" class="form-label">Product Image 2</label>
            <div class="d-flex">
            <input type="file" name="productImage2" id="productImage2" class="form-control w-90 m-auto" required>
            <img src="./product_images/<?php echo $productImage2 ?>" alt="" class="editImage">
            </div> 
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="productImage3" class="form-label">Product Image 3</label>
            <div class="d-flex">
            <input type="file" name="productImage3" id="productImage3" class="form-control w-90 m-auto" required>
            <img src="./product_images/<?php echo $productImage3 ?>" alt="" class="editImage">
            </div> 
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="productPrice" class="form-label">Product Price</label>
            <input type="text" name="productPrice" id="productPrice" value="<?php echo $productPrice ?>" class="form-control" required>
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="editProduct" value="Update Product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>
<?php

if(isset($_POST['editProduct'])){

    $productTitle = $_POST['productTitle'];
    $productDesc = $_POST['productDesc'];
    $productKeywords = $_POST['productKeywords'];
    $productCategory = $_POST['productCategory'];
    $productBrand = $_POST['productBrand'];
    $productPrice = $_POST['productPrice'];

    $productImage1 = $_FILES['productImage1']['name'];
    $productImage2 = $_FILES['productImage2']['name'];
    $productImage3 = $_FILES['productImage3']['name'];

    $temp_productImage1 = $_FILES['productImage1']['tmp_name'];
    $temp_productImage2 = $_FILES['productImage2']['tmp_name'];
    $temp_productImage3 = $_FILES['productImage3']['tmp_name'];

    if($productTitle=='' or $productDesc=='' or $productKeywords=='' or $productCategory=='' or $productBrand=='' or $productPrice=='' or $productImage1=='' or $productImage2=='' or $productImage3==''){
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
        exit();
    }else{
        move_uploaded_file($temp_productImage1, "./product_images/$productImage1");
        move_uploaded_file($temp_productImage2, "./product_images/$productImage2");
        move_uploaded_file($temp_productImage3, "./product_images/$productImage3");

        $updateProduct = "update productss set product_title='$productTitle', product_desc='$productDesc', product_keywords='$productKeywords', category_id='$productCategory', brand_id='$productBrand', product_image1='$productImage1', product_image2='$productImage2', product_image3='$productImage3', product_price='$productPrice', date = NOW() WHERE product_id='$editID'";
        $resultUpdate = mysqli_query($con, $updateProduct);
        if($resultUpdate){
            echo "<script>alert('Product has been updated successfully')</script>";
            echo "<script>window.open('index.php?viewProducts', '_self')</script>";
        }
    }
}

?>