<?php
include("./include/conn.php");

if (isset($_POST['address'])) {
    $selectedAddress = $_POST['address'];

    // Create an array to store image URLs and venue names
    $imageData = array();
    $venueNames = array();

    // Query the database to retrieve image URLs and venue names based on the selected address
    $sql = "SELECT Imgpath, Name FROM venues WHERE Address = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedAddress);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $imageData[] = $row['Imgpath'];
        $venueNames[] = $row['Name'];
    }

    $stmt->close();

    // Create an associative array to hold the image URLs and venue names
    $data = array(
        'images' => $imageData,
        'venueNames' => $venueNames
    );

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "Invalid request.";
}

$conn->close();
?>
