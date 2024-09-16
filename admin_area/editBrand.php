<?php
if(isset($_GET['editBrand'])){
    $editBrandID = $_GET['editBrand'];
    $getData = "SELECT * FROM brandss WHERE brand_id = '$editBrandID'";
    $resultData = mysqli_query($con, $getData);
    $row = mysqli_fetch_assoc($resultData);
    $brandTitle = $row['brand_title'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="brandTitle" class="form-label">Brand Title</label>
            <input type="text" name="brandTitle" id="brandTitle" value="<?php echo $brandTitle ?>" class="form-control" required>
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="editBrand" value="Update Brand" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>
<?php
if(isset($_POST['editBrand'])){
    $brandTitle = $_POST['brandTitle'];
    $updateBrand = "UPDATE brandss SET brand_title = '$brandTitle' WHERE brand_id = '$editBrandID'";
    $runUpdate = mysqli_query($con, $updateBrand);
    if($runUpdate){
        echo "<script>alert('Brand has been updated successfully')</script>";
        echo "<script>window.open('index.php?viewBrands', '_self')</script>";
    }
}

?>
