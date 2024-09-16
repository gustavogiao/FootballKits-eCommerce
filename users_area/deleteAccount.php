<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <!-- bootstrap css link !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <label for="deleteAccount" class="form-label">Are you sure you want to delete your account?</label>
            <input type="submit" value="Delete Account" class="form-control w-50 m-auto" name="delete">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" value="Don't Delete Account" class="form-control w-50 m-auto" name="dontDelete">
        </div>
    </form>    
    <?php
        $userName = $_SESSION['userName'];
        if(isset($_POST['delete'])){
            $queryDelete = "DELETE FROM user_table WHERE username = '$userName'";
            $runDeleteQuery = mysqli_query($con, $queryDelete);
            if($runDeleteQuery){
                session_destroy();
                echo "<script>alert('Your account has been deleted successfully!')</script>";
                echo "<script>window.open('../index.php', '_self')</script>";
            }
        }
        if(isset($_POST['dontDelete'])){
            echo "<script>window.open('profile.php', '_self')</script>";
        }
    ?>
</body>
</html>