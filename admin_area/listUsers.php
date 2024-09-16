<style>
    .userImage{
        width: 60px;
        height: 60px;
    }
</style>
<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="table-info">
        <tr>
            <th>SI no</th>
            <th>Username</th>
            <th>User Email</th>
            <th>User Image</th>
            <th>User Address</th>
            <th>User Contact</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table-light text-center">
    <?php
        $getUsers = "SELECT * FROM user_table";
        $resultUsers = mysqli_query($con, $getUsers);
        $rowCount = mysqli_num_rows($resultUsers);
        if($rowCount == 0){
            echo "<tr><td colspan='7' class='text-center'>No Users Available</td></tr>";
        } else {
            $number=0;
            while($rowUsers = mysqli_fetch_array($resultUsers)){
                $userID = $rowUsers['user_id'];
                $username = $rowUsers['username'];
                $userEmail = $rowUsers['user_email'];
                $userImage = $rowUsers['user_image'];
                $userAddress = $rowUsers['user_address'];
                $userMobile = $rowUsers['user_mobile'];
                $number++;
                echo "<tr>
                    <td>$number</td>
                    <td>$username</td>
                    <td>$userEmail</td>
                    <td><img src='../users_area/users_images/$userImage' alt='' class='userImage'></td>
                    <td>$userAddress</td>
                    <td>$userMobile</td>
                    <td><a href='index.php?deletePayment=<?php echo $userID ?>' type='button' class='text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash' style='color: #000000;'></i></a></td>
                </tr>";
            }
        ?>
    </tbody>
    <?php } ?>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?listUsers" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?deleteUser=<?php echo $userID ?>" class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>