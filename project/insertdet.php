<title>Eventrix</title>
<link rel="shortcut icon" href="./dist/img/eventrix.png">
        <link rel="icon" href="./dist/img/eventrix.png" type="image/x-icon">
<?php
include("./include/conn.php");

if (isset($_POST['codeID']) && isset($_POST['Code'])) {
    $bookingID = isset($_POST['bookingID']) ? $_POST['bookingID'] : ''; // Initialize $bookingID
    $codeID = $_POST['codeID'];
    $Code = $_POST['Code'];

    if (!empty($bookingID)) {
        // Booking ID is provided, update the existing record
        // Use prepared statements to prevent SQL injection
        $sql = "UPDATE booking SET codeID = ?, Code = ? WHERE bookingID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $codeID, $Code, $bookingID);

    } else {
        // Booking ID is empty, insert a new record
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO booking (Code, codeID) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $Code, $codeID);
    }

    if ($stmt->execute()) {
        $bookingID = $bookingID ? $bookingID : $conn->insert_id; // Use the existing ID or the newly inserted ID
        ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <?php
        echo "<div class='alert alert-success'>Booking ID is: <strong>$bookingID</strong>. Booking done successfully.</div>";
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
