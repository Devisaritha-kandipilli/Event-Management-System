<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .return-button {
            position: absolute;
            top: 100px;
            right: 10px;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .message-container {
            margin-top: 20px;
        }
    </style>
    <title>Eventrix</title>
	<link rel="shortcut icon" href="./dist/img/eventrix.png">
        <link rel="icon" href="./dist/img/eventrix.png" type="image/x-icon">
</head>
<body>

<?php
session_start();
include("./include/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    // Check if username already exists
    $checkUsernameQuery = "SELECT * FROM tblusers WHERE username = ?";
    $stmt = $conn->prepare($checkUsernameQuery);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username already exists, display an error
        $_SESSION['error'] = "Username already exists. Please choose a different username.";
    } else {
        // Insert user data into the database
        $insertQuery = "INSERT INTO tblusers (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo '<div class="message-container alert alert-success alert-dismissible fade show" role="alert">
                    Account created Successfully
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        } else {
            echo '<div class="message-container alert alert-danger alert-dismissible fade show" role="alert">
                    Error: ' . $stmt->error . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        }
    }
}

// Display error message if set
if (isset($_SESSION['error'])) {
    echo '<div class="message-container alert alert-danger alert-dismissible fade show" role="alert">
            ' . $_SESSION['error'] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    // Clear the error message
    unset($_SESSION['error']);
}

// Close the database connection
$conn->close();
?>

<a href="index.php" class="return-button">Return to home</a>

</body>
</html>
