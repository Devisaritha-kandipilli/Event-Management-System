<!DOCTYPE html>
<html>
<head>
<?php
	 session_start();
       if(empty($_SESSION)) {
    include_once './login.php';
    include_once './include/login.php';
}
else {
        ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <style>
        body {
            background-image: url('./dist/img/vbg.jpeg') !important;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .img-thumbnail {
            width: 500px;
            height: 300px;
        }
        .table,#speciality_table {
            border: 2px solid #ccc; /* Add a border to the table */
            border-collapse: collapse; /* Collapse the table borders */
            width: 100%;
        }
        .table th, .table td,#speciality_table th,#speciality_table td {
            border: 1px solid #ddd; /* Add borders to table cells */
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2; /* Add a background color to table headers */
        }
		#speciality_table th{
            background-color: #f2f2f2; /* Add a background color to table headers */
        }
        .panel {
            border: 1px solid #ccc; /* Add a border to the panel */
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
<?php
include_once 'include/head.php';
?> 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
        include_once 'include/sidebar.php';
        ?>
<div class="content-wrapper">
        <section class="content">    
            <div class="col-md-12"> <br>
			
                <h2 class="text-center"> Food Service providers</h2><br><br>
    <form action="insertdet.php" method="POST">
       <div class="form-group">
            <table class="table"> <!-- Add the "table" class -->
                <thead>
                    <tr>
                        <th>code</th>
                        <th>Catering Name</th>
                        <th>Address</th>
                        <th>price per plate</th>
                        <th>Email</th>
                        <th>Rating</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                   <tbody>
                <?php
                // Connect to your database (replace with your database credentials)
                $host = "localhost";
                $username = "root";
                $password = "";
                $database = "dbevent";

                $conn = mysqli_connect($host, $username, $password, $database);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Query the catering table to get catering details
                $sql = "SELECT Catering_Name, Address, price, Code, Email, Rating FROM catering";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['Code'] . '</td>';
                        echo '<td>' . $row['Catering_Name'] . '</td>';
                        echo '<td>' . $row['Address'] . '</td>';
                        echo '<td>' . $row['price'] . '</td>';
                        echo '<td>' . $row['Email'] . '</td>';
                        echo '<td>' . $row['Rating'] . '</td>';
                      echo'	<td><input type="radio" name="selected_catering" value="' . $row['Code'] . '" data-code="' . $row['Code'] . '"></td>';
                        echo '</tr>';
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                // Close the database connection
                
                ?>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="Code" id="Code" value="">
        <div class="form-group">
     
            <label for="food_recommendations">Do you want food recommendations?</label>
            <input type="radio" name="food_recommendations" value="yes"> Yes
            <input type="radio" name="food_recommendations" value="no"> No
        </div>
        <div class="form-group">
           
            <div class="panel"> <!-- Add the "panel" class -->
                <table id="speciality_table"> <!-- Add the "table" class -->
                    <thead>
                        <tr>
                            <th>codeID</th>
                            <th>Address</th>
                            <th>Specialities</th>
                            <th>Select</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                // Query the speciality table to get speciality details
                $sql = "SELECT codeID, Address, speciality FROM speciality";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['codeID'] . '</td>';
                        echo '<td>' . $row['Address'] . '</td>';
                        echo '<td>' . $row['speciality'] . '</td>';
					
					echo'<td><input type="radio" name="selected_speciality" value="' . $row['codeID'] . '" data-codeid="' . $row['codeID'] . '"></td>';


                        echo '</tr>';
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                ?><?phpmysqli_close($conn);?>
                    </tbody>
                </table>
            </div>
        </div>
        <input type="hidden" name="codeID" id="codeID" value="">
        <div class="form-group">
            <label for="bookingID">BookingID:</label>
            <input type="text" name="bookingID" id="bookingID" placeholder="Enter Booking ID">
            <input type="submit" value="Book Catering">
        </div>
    </form>
  
    <script>
        // JavaScript to show/hide the speciality table based on food recommendations
        const foodRecommendations = document.getElementsByName("food_recommendations");
        const specialityTable = document.getElementById("speciality_table");

        for (const radio of foodRecommendations) {
            radio.addEventListener("change", function () {
                specialityTable.style.display = this.value === "yes" ? "table" : "none";
            });
        }
		// Handle the catering selection
const cateringRadios = document.getElementsByName("selected_catering");
for (const radio of cateringRadios) {
    radio.addEventListener("change", function () {
        const code = this.getAttribute("data-code");
        document.getElementById("Code").value = code;
    });
}

// Handle the speciality selection
const specialityRadios = document.getElementsByName("selected_speciality");
for (const radio of specialityRadios) {
    radio.addEventListener("change", function () {
        const codeID = this.getAttribute("data-codeid");
        document.getElementById("codeID").value = codeID;
    });
}
    </script>
    </div>
	<?php include_once './include/scripts.php'; ?>
</body>
</html>
<?php
}
?>