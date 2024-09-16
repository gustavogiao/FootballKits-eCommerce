<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="table-info">
        <tr>
            <th>Order ID</th>
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>Payment Mode</th>
            <th>Order Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table-light text-center">
    <?php
        $getPayments = "SELECT * FROM user_payments";
        $resultPayments = mysqli_query($con, $getPayments);
        $rowCount = mysqli_num_rows($resultPayments);
        if($rowCount == 0){
            echo "<tr><td colspan='7' class='text-center'>No Payments Available</td></tr>";
        } else {
            $number=0;
            while($rowPayments = mysqli_fetch_array($resultPayments)){
                $orderID = $rowPayments['order_id'];
                $paymentID = $rowPayments['payment_id'];
                $amount = $rowPayments['amount'];
                $invoiceNumber = $rowPayments['invoice_number'];
                $paymentMode = $rowPayments['payment_mode'];
                $orderDate = $rowPayments['date'];
                $number++;
                echo "<tr>
                    <td>$number</td>
                    <td>$invoiceNumber</td>
                    <td>$amount</td>
                    <td>$paymentMode</td>
                    <td>$orderDate</td>
                    <td><a href='index.php?deletePayment=<?php echo $paymentID ?>' type='button' class='text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash' style='color: #000000;'></i></a></td>
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
        <button type="button" class="btn btn-primary"><a href="index.php?deletePayment=<?php echo $paymentID ?>" class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>