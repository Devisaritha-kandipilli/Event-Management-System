<title>Eventrix</title>
<?php
include("./include/conn.php"); 

// Check if the keys exist in the $_POST array
if (isset($_POST['EventID']) && isset($_POST['Bookingdate']) && isset($_POST['number_of_attendees']) && isset($_POST['budget'])&& isset($_POST['selectedImage'])) {
    $EventID = $_POST['EventID'];
    $Bookingdate = $_POST['Bookingdate'];
    $number_of_attendees = $_POST['number_of_attendees'];
$budget = $_POST['budget'];
    $selectedImage = $_POST['selectedImage'];

    // Prepare and execute SQL query for insertion
    $sql = "INSERT INTO booking (EventID, Bookingdate, number_of_attendees,budget, selectedImage) VALUES ('$EventID', '$Bookingdate', '$number_of_attendees','$budget', '$selectedImage')";

    if ($conn->query($sql) === TRUE) {
        // Get the last inserted BookingId
        $bookingId = $conn->insert_id;?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<?php

        echo "<div class='alert alert-success'><strong>Success!</strong> Details added successfully.  your Booking ID is:<strong> $bookingId </strong>. remember this id for further use.</div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


?>
<div class="center-button">
               <a class="btn btn-success" href="proceed.php">go back</a>
<a class="btn btn-success" href="pmnt.php">proceed to pay</a></div>

<?php
}
			   $conn->close();
			   ?>