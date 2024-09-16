<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="table-info">
        <tr>
            <th>Order ID</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Order Status</th>
            <th>Delete Order</th>
        </tr>
    </thead>
    <tbody class="table-light text-center">
    <?php
        $getOrders = "SELECT * FROM user_orders";
        $resultOrders = mysqli_query($con, $getOrders);
        $rowCount = mysqli_num_rows($resultOrders);
        if($rowCount == 0){
            echo "<tr><td colspan='7' class='text-center'>No Orders Available</td></tr>";
        } else {
            $number=0;
            while($rowOrders = mysqli_fetch_array($resultOrders)){
                $orderID = $rowOrders['order_id'];
                $dueAmount = $rowOrders['amount_due'];
                $invoiceNumber = $rowOrders['invoice_number'];
                $totalProducts = $rowOrders['total_products'];
                $orderDate = $rowOrders['order_date'];
                $orderStatus = $rowOrders['order_status'];
                $number++;
                echo "<tr>
                    <td>$number</td>
                    <td>$dueAmount</td>
                    <td>$invoiceNumber</td>
                    <td>$totalProducts</td>
                    <td>$orderDate</td>
                    <td>$orderStatus</td>
                    <td><a href='index.php?deleteOrder=<?php echo $orderID ?>' type='button' class='text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash' style='color: #000000;'></i></a></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?listOrders" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href="index.php?deleteOrder=<?php echo $orderID ?>" class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>