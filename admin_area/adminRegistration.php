<?php include('../includes/connect.php');
include('../functions/common_function.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
            Admin Registration
        </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../img/adminReg.png" alt="adminRegistration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
               <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter your Username" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" id="userEmail" name="userEmail" class="form-control" placeholder="Enter your Email" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" id="userPassword" name="userPassword" class="form-control" placeholder="Enter your Password" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="adminRegistration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">You have an account?<a href="adminLogin.php" class="link-danger">Login</p>
                    </div>
               </form>
            </div>

        </div>
    </div>
</body>
</html>
<?php

if(isset($_POST['adminRegistration'])){
    $username = $_POST['username'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if($userPassword == $confirmPassword){
        $userPassword = password_hash($userPassword, PASSWORD_DEFAULT);
        $query = "INSERT INTO admin_table (admin_name, admin_email, admin_password) VALUES ('$username', '$userEmail', '$userPassword')";
        $result = mysqli_query($con, $query);
        if($result){
            echo "<script>alert('Admin Registration Successful')</script>";
        }else{
            echo "<script>alert('Admin Registration Failed')</script>";
        }
    }else{
        echo "<script>alert('Password does not match')</script>";
    }
}

?>