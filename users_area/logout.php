<?php
session_start();
if(isset($_SESSION['userName'])){
    session_destroy();
    echo "<script>window.open('../index.php','_self')</script>";
}
?>