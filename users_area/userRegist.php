<?php include('../includes/connect.php');
include('../functions/common_function.php'); ?>

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
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="userName" class="form-label">Username</label>
                        <input type="text" id="userName" class="form-control" name="userName" placeholder="Enter your Username" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userEmail" class="form-label">Email</label>
                        <input type="email" id="userEmail" class="form-control" name="userEmail" placeholder="Enter your Email" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userImage" class="form-label">User Image</label>
                        <input type="file" id="userImage" class="form-control" name="userImage" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" id="userPassword" class="form-control" name="userPassword" placeholder="Enter your Password" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" id="userConfirmPassword" class="form-control" name="userConfirmPassword" placeholder="Enter your Password Again" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userAddress" class="form-label">Enter your Address</label>
                        <input type="text" id="userAddress" class="form-control" name="userAddress" placeholder="Enter your Address" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="userContact" class="form-label">Enter your Contact</label>
                        <input type="text" id="userContact" class="form-control" name="userContact" placeholder="Enter your Contact" required>
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="userRegister">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?
                        <a href="userLogin.php" class="text-danger"> Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>


<?php

if(isset($_POST['userRegister'])){
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $hashPassword = password_hash($userPassword, PASSWORD_DEFAULT); // password hashing
    $userConfirmPassword = $_POST['userConfirmPassword'];
    $userAddress = $_POST['userAddress'];
    $userContact = $_POST['userContact'];
    $userImage = $_FILES['userImage']['name'];
    $userImage_tmp = $_FILES['userImage']['tmp_name'];
    $userIP = getIPAddress();

    // select query to check if the user already exists
    $select_query = "SELECT * FROM user_table WHERE username = '$userName' OR user_email = '$userEmail'";
    $run_select_query = mysqli_query($con, $select_query);
    if(mysqli_num_rows($run_select_query) > 0){
        echo "<script>alert('User already exists!')</script>";
        exit();
    }else if($userPassword != $userConfirmPassword){
        echo "<script>alert('Password does not match!')</script>";
        exit();
    }else{
    move_uploaded_file($userImage_tmp, "./users_images/$userImage");
    $insert_query = "INSERT INTO user_table (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$userName', '$userEmail', '$hashPassword', '$userImage', '$userIP', '$userAddress', '$userContact')";
    $run_query = mysqli_query($con, $insert_query);
    if($run_query){
      echo "<script>alert('User Registration Successful!')</script>";
        echo "<script>window.open('../index.php', '_self')</script>";
    }else{
      die(mysqli_error($con));
    }
    }

// selecting cart items

$select_cartItems = "SELECT * FROM cart_details WHERE ip_address = '$userIP'";
$run_cartItems = mysqli_query($con, $select_cartItems);
$rows_count = mysqli_num_rows($run_cartItems);
if($rows_count > 0){
    $_SESSION['username'] = $userName;
    echo "<script>alert('You have items in your cart!')</script>";
    echo "<script>window.open('checkout.php', '_self')</script>";
}else{
    echo "<script>window.open('../index.php', '_self')</script>";
}
}

?>