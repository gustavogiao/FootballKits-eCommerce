<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="table-info">
        <tr>
            <th>Category ID</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table-light">
        <?php
        
        $getCategories = "SELECT * FROM categoriess";
        $runCategories = mysqli_query($con, $getCategories);
        while($rowCategories = mysqli_fetch_array($runCategories)){
            $categoryID = $rowCategories['category_id'];
            $categoryTitle = $rowCategories['category_title'];
        ?>
        <tr class = "text-center">
            <td><?php echo $categoryID ?></td>
            <td><?php echo $categoryTitle ?></td>
            <td><a href="index.php?editCategory=<?php echo $categoryID?>" class="text-light"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></a></td>
            <td><a href="index.php?deleteCategory=<?php echo $categoryID ?>" type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-trash" style="color: #000000;"></i></a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?viewCategories" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?deleteCategory=<?php echo $categoryID ?>" class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>