<?php
if(isset($_GET['deleteBrand'])){
    $deleteID = $_GET['deleteBrand'];
    $deleteQuery = "DELETE FROM brandss WHERE brand_id = '$deleteID'";
    $resultQuery = mysqli_query($con, $deleteQuery);
    if($resultQuery){
        echo "<script>alert('Brand has been deleted successfully')</script>";
        echo "<script>window.open('index.php?viewBrands', '_self')</script>";
    }
}
?>