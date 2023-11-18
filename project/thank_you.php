<?php
session_start();
include("./include/conn.php");

// Check if the session contains the order ID (OID)
if(isset($_SESSION['OID'])){
    $orderId = $_SESSION['OID'];
    
    // Retrieve payment data based on the order ID from the database
    $result = mysqli_query($conn, "SELECT name, amount, bookingID, contact, payment_status, added_on, payment_id FROM payment WHERE id='$orderId'");
    $paymentData = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventrix </title>
	<link rel="shortcut icon" href="./dist/img/eventrix.png">
    <link rel="icon" href="./dist/img/eventrix.png" type="image/x-icon">
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto; /* Center the table */
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .return-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Payment Details</h1>
    <?php if (isset($paymentData)) { ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Amount</th>
                <th>bookingID</th>
                <th>contact</th>
                <th>Payment Status</th>
                <th>Added On</th>
                <th>Payment ID</th>
            </tr>
            <tr>
                <td><?php echo $paymentData['name']; ?></td>
                <td><?php echo $paymentData['amount']; ?></td>
                <td><?php echo $paymentData['bookingID']; ?></td>
                <td><?php echo $paymentData['contact']; ?></td>
                <td><?php echo $paymentData['payment_status']; ?></td>
                <td><?php echo $paymentData['added_on']; ?></td>
                <td><?php echo $paymentData['payment_id']; ?></td>
            </tr> 
        </table>
      <form method="post" action="download.php">
    <input type="hidden" name="name" value="<?php echo $paymentData['name']; ?>" readonly>
    <input type="hidden" name="amount" value="<?php echo $paymentData['amount']; ?>" readonly>
    <input type="hidden" name="bookingID" value="<?php echo $paymentData['bookingID']; ?>" readonly>
    <input type="hidden" name="contact" value="<?php echo $paymentData['contact']; ?>" readonly>
    <input type="hidden" name="payment_status" value="<?php echo $paymentData['payment_status']; ?>" readonly>
    <input type="hidden" name="added_on" value="<?php echo $paymentData['added_on']; ?>" readonly>
    <input type="hidden" name="payment_id" value="<?php echo $paymentData['payment_id']; ?>" readonly>
    <button type="submit">Download Payment Details</button>
</form>
<a href="proceed.php" class="return-button">Return to home</a>
    <?php } ?>
</body>
</html>
