<?php
if(isset($_GET['editCategory'])){
    $editCategoryID = $_GET['editCategory'];
    $getData = "SELECT * FROM categoriess WHERE category_id = '$editCategoryID'";
    $resultData = mysqli_query($con, $getData);
    $row = mysqli_fetch_assoc($resultData);
    $categoryTitle = $row['category_title'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Category <?php echo $categoryTitle ?></h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="categoryTitle" class="form-label">Category Title</label>
            <input type="text" name="categoryTitle" id="categoryTitle" value="<?php echo $categoryTitle ?>" class="form-control" required>
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="editCategory" value="Update Category" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>
<?php
if(isset($_POST['editCategory'])){
    $categoryTitle = $_POST['categoryTitle'];
    $updateCategory = "UPDATE categoriess SET category_title = '$categoryTitle' WHERE category_id = '$editCategoryID'";
    $runUpdate = mysqli_query($con, $updateCategory);
    if($runUpdate){
        echo "<script>alert('Category has been updated successfully')</script>";
        echo "<script>window.open('index.php?viewCategories', '_self')</script>";
    }
}

?>
