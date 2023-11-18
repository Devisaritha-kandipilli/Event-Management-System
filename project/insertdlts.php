<title>Eventrix</title>
<link rel="shortcut icon" href="./dist/img/eventrix.png">
        <link rel="icon" href="./dist/img/eventrix.png" type="image/x-icon">
<?php
include("./include/conn.php");

// Check if the keys exist in the $_POST array
if (isset($_POST['bookingID']) && isset($_POST['pname'])) {
    $bookingID = $_POST['bookingID'];
    $pname = $_POST['pname'];

    if (!empty($bookingID)) {
        // Booking ID is provided, update the existing record
        // Use prepared statements to prevent SQL injection
        $sql = "UPDATE booking SET pname = ? WHERE bookingID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $pname, $bookingID);
    } else {
        // Booking ID is empty, insert a new record
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO booking (pname) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $pname);
    }

    if ($stmt->execute()) {
        $bookingID = $bookingID ? $bookingID : $conn->insert_id;
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <?php
        echo "<div class='alert alert-success'>Booking ID: <strong>$bookingID</strong>. Success! Details added successfully.</div>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Close the prepared statement
}

$conn->close();
?>
<div class="center-button">
    <a class="btn btn-success" href="proceed.php">go back</a>
    <a class="btn btn-success" href="pmnt.php">proceed to pay</a>
</div>
