<?php

if(isset($_GET['deleteUser'])){
    $deleteUserID = $_GET['deleteUser'];
    $deleteUser = "DELETE FROM user_table WHERE user_id='$deleteUserID'";
    $resultDeleteUser = mysqli_query($con, $deleteUser);
    if($resultDeleteUser){
        echo "<script>alert('User has been deleted successfully!')</script>";
        echo "<script>window.open('index.php?listUsers','_self')</script>";
    } else {
        echo "<script>alert('Failed to delete user!')</script>";
    }
}


?>