<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
        .productImage{
            width: 80px;
            height: 80px;
        }
        body {
            margin-bottom: 100px;
        }
        
    </style>
</head>
<body>
    <h3 class="text-center text-success">All Products</h3>
    <table class="table table-bordered mt-10">
        <thead class="table-info">
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php
        $querySelectProducts = "SELECT * FROM productss";
        $resultQuery = mysqli_query($con, $querySelectProducts);
        while($row = mysqli_fetch_assoc($resultQuery)){
            $productID = $row['product_id'];
            $productTitle = $row['product_title'];
            $productImage = $row['product_image1'];
            $productPrice = $row['product_price'];
            $productStatus = $row['status'];   
        ?>
        <tbody class="table-light">
            <tr class="text-center">
                <td><?php echo $productID?></td>
                <td><?php echo $productTitle?></td>
                <td><?php echo "<img src='product_images/$productImage' alt='' class='productImage'>" ?></td>
                <td><?php echo $productPrice?></td>
                <td><?php 
                
                $getCount = "SELECT * FROM orders_pending WHERE product_id = '$productID'";
                $resultCount = mysqli_query($con, $getCount);
                $count = mysqli_num_rows($resultCount);
                echo $count;
                ?></td>
                <td><?php echo $productStatus?></td>
                <td><a href="index.php?editProduct=<?php echo $productID?>" class="text-light"><i class="fa-solid fa-pen-to-square" style="color: #000000;"></i></a></td>
                <td><a href="index.php?deleteProduct=<?php echo $productID ?>" class="text-light"><i class="fa-solid fa-trash" style="color: #000000;"></i></a></td>
            </tr>
           <?php } ?> 
        </tbody>
    </table>
</body>
</html>