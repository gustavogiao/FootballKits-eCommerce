<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="table-info">
        <tr>
            <th>Brand ID</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table-light">
        <?php
        
        $getBrands = "SELECT * FROM brandss";
        $runBrands = mysqli_query($con, $getBrands);
        while($rowBrands = mysqli_fetch_array($runBrands)){
            $brandID = $rowBrands['brand_id'];
            $brandTitle = $rowBrands['brand_title'];
        ?>
        <tr class = "text-center">
            <td><?php echo $brandID ?></td>
            <td><?php echo $brandTitle ?></td>
            <td><a href="index.php?editBrand=<?php echo $brandID?>" class="text-light"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></a></td>
            <td><a href="index.php?deleteBrand=<?php echo $brandID ?>" type="button" class="text-light" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-trash" style="color: #000000;"></i></a></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?viewBrands" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?deleteBrand=<?php echo $brandID ?>" class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>