<?php
if(isset($_GET['deleteCategory'])){
    $deleteID = $_GET['deleteCategory'];
    $deleteQuery = "DELETE FROM categoriess WHERE category_id = '$deleteID'";
    $resultQuery = mysqli_query($con, $deleteQuery);
    if($resultQuery){
        echo "<script>alert('Category has been deleted successfully')</script>";
        echo "<script>window.open('index.php?viewCategories', '_self')</script>";
    }
}
?>