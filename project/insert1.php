<?php
// Assuming you have a database connection established
// Replace with your database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dbevent';

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'));
    $rating = intval($data->rating);
    $bookingId = intval($data->booking_id);
    $description = ($data->description);

    // Save the rating and booking ID to the database
    $stmt = $conn->prepare("INSERT INTO ratings (rating, booking_id, description) VALUES (:rating, :booking_id, :description)");
    $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
    $stmt->bindParam(':booking_id', $bookingId, PDO::PARAM_INT);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $response = ['status' => 'success', 'message' => 'Rating saved successfully'];
    } else {
        $response = ['status' => 'error', 'message' => 'Error saving rating'];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
