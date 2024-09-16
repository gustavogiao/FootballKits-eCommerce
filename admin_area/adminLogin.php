<?php include('../includes/connect.php');
include('../functions/common_function.php'); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- bootstrap css link !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome css link !-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css link !-->
</head>
<style>
    body{
        overflow-x: hidden;
    }
</style>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">
            Admin Login
        </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../img/adminReg.png" alt="adminLogin" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
               <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter your Username" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" id="userPassword" name="userPassword" class="form-control" placeholder="Enter your Password" required>
                    </div>
                    <div>
                       <a href="" class="link-danger">Forget Password?</a> 
                    </div>
                    <div class="pt-5">
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="adminLogin" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account?<a href="adminRegistration.php" class="link-danger">Register</p>
                    </div>
               </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php

if(isset($_POST['adminLogin'])){
    $username = $_POST['username'];
    $adminPassword = $_POST['userPassword'];

    $sql = "SELECT * FROM admin_table WHERE admin_name = '$username'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if($count == 1){
        if(password_verify($adminPassword, $row_data['admin_password'])){
            $_SESSION['username'] = $username;
            echo "<script>alert('Login Successfull')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            echo "<script>alert('Invalid Username or Password')</script>";
        }
}
}



?>