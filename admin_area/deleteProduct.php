<?php
if(isset($_GET['deleteProduct'])){
    $deleteID = $_GET['deleteProduct'];
    $deleteQuery = "DELETE FROM productss WHERE product_id = '$deleteID'";
    $resultQuery = mysqli_query($con, $deleteQuery);
    if($resultQuery){
        echo "<script>alert('Product has been deleted successfully')</script>";
        echo "<script>window.open('index.php?viewProducts', '_self')</script>";
    }
}
?>