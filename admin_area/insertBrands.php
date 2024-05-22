<?php
include("../includes/connect.php");
if(isset($_POST['insert_brand'])){
    $brand_title = $_POST['brand_title'];
    // select data from database
    $select_query = "select * from brands where brand_title='$brand_title'";
    $resultSelect = mysqli_query($con,$select_query);
    $number = mysqli_num_rows($resultSelect);
    if($number > 0){
        echo "<script>alert('Brand already exists!')</script>";
        echo "<script>window.open('index.php?insert_brand','_self')</script>";
        exit();
    }
    $insert_brand = "insert into brands (brand_title) values ('$brand_title')";
    $result = mysqli_query($con,$insert_brand);
    if($result){
        echo "<script>alert('Brand has been inserted!')</script>";
        echo "<script>window.open('index.php?insert_brand','_self')</script>";
    }
    else{
        echo "<script>alert('Brand has not been inserted!')</script>";
    }
}
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brand" aria-label="Brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_brand" value="Insert Brands">
</div>
</form>