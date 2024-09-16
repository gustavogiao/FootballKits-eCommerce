<?php
if(isset($_GET['editAccount'])){
    $userNameSession = $_SESSION['userName'];
    $selectQuery = "SELECT * FROM user_table WHERE username = '$userNameSession'";
    $runSelectQuery = mysqli_query($con, $selectQuery);
    $row = mysqli_fetch_array($runSelectQuery);
    $userID = $row['user_id'];
    $userName = $row['username'];
    $userEmail = $row['user_email'];
    $userAddress = $row['user_address'];
    $userMobile = $row['user_mobile'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<style>
    .editImage{
        width: 100px;
        height: 120px;
        object-fit: contain;
    }
</style>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="userName" id="userName" value="<?php echo $userName?>">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="userEmail" id="userEmail" value="<?php echo $userEmail?>">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="userImage" id="userImage" value="Upload User Image">
            <img src="./users_images/<?php echo $userImg?>" alt="" class="editImage">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="userAddress" id="userAddress" value="<?php echo $userAddress?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="userMobile" id="userMobile" value="<?php echo $userMobile?>">
        </div>
        <input type="submit" class="btn btn-success py-2 px-3" name="userUpdate" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['userUpdate'])){
    $updateID = $userID;
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userAddress = $_POST['userAddress'];
    $userMobile = $_POST['userMobile'];
    $userImg = $_FILES['userImage']['name'];
    $userImageTmp = $_FILES['userImage']['tmp_name'];
    move_uploaded_file($userImageTmp, "./users_images/$userImg");

    $updateQuery = "UPDATE user_table SET userName = '$userName', user_email = '$userEmail', user_address = '$userAddress', user_mobile = '$userMobile', user_image = '$userImg' WHERE user_id = '$updateID'";
    $runUpdateQuery = mysqli_query($con, $updateQuery);
    if($runUpdateQuery){
        echo "<script>alert('User Updated Successfully')</script>";
        echo "<script>window.open('logout.php', '_self')</script>";
    }else{
        echo "<script>alert('User Update Failed')</script>";
    }
}
?>