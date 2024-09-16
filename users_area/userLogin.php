<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- bootstrap css link !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome css link !-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    body{
        overflow-x: hidden;
    }
</style>
<body>
    
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="userName" class="form-label">Username</label>
                        <input type="text" id="userName" class="form-control" name="userName" placeholder="Enter your Username" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" id="userPassword" class="form-control" name="userPassword" placeholder="Enter your Password" required>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="userLogin">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
                        <a href="userRegist.php" class="text-danger"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

<?php

if(isset($_POST['userLogin'])){
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    if($userName == "" || $userPassword == ""){
        echo "<script>alert('Please fill all the fields')</script>";
    }else{
        $query = "SELECT * FROM user_table WHERE username = '$userName'";
        $result_query = mysqli_query($con, $query);
        $row_count = mysqli_num_rows($result_query);
        $row_data = mysqli_fetch_assoc($result_query);
        $userIP = getIPAddress();

        // cart item
        $query = "SELECT * FROM cart_details WHERE ip_address = '$userIP'";
        $result_queryCart = mysqli_query($con, $query);
        $row_countCart = mysqli_num_rows($result_queryCart);
        if($row_count > 0){
            $_SESSION['userName'] = $userName;
            if(password_verify($userPassword, $row_data['user_password'])){
                if($row_count == 1 and $row_countCart==0){
                    $_SESSION['userName'] = $userName;
                    echo "<script>alert('Login Successfull')</script>";
                    echo "<script>window.open('../index.php','_self')</script>";
                }else{
                    $_SESSION['userName'] = $userName;
                    echo "<script>alert('Login Successfull')</script>";
                    echo "<script>window.open('payment.php','_self')</script>";
                }
            }else{
                echo "<script>alert('Invalid Username or Password')</script>";
            }    
        }   
    }
}


?>