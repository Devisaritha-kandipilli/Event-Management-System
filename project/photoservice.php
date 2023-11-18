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
    <title>Eventrix </title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
<body  class="hold-transition sidebar-mini layout-fixed">
<?php
        include_once 'include/sidebar.php';
        ?>
<div class="content-wrapper">
        <section class="content">    
            <div class="col-md-12">  
                <h2> *** photography Service providers ***</h2>
    <form id="submitBooking"action="insertdlts.php" method="POST">
       <div class="form-group">
            <table class="table"> <!-- Add the "table" class -->
                <thead>
                    <tr>
                        <th>photography id</th>
                        <th> Name</th>
                        <th>Address</th>
                        
                        <th>Email</th>
                        <th>Rating</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                   <tbody>
                <?php
                
                    include("./include/conn.php"); 
                // Query the catering table to get catering details
                $sql = "SELECT * FROM photographyservices";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['pid'] . '</td>';
                        echo '<td>' . $row['pname'] . '</td>';
                        echo '<td>' . $row['Address'] . '</td>';
                       
                        echo '<td>' . $row['Email'] . '</td>';
                        echo '<td>' . $row['Rating'] . '</td>';
                      echo'	<td><input type="radio" name="selected" value="' . $row['pname'] . '" data-code="' . $row['pname'] . '"></td>';
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
        <input type="hidden" name="pname" id="pname" value="">
		  <div class="form-group">
            <label for="bookingID">BookingID:</label>
            <input type="text" name="bookingID" id="bookingID" placeholder="Enter Booking ID">
            <input type="submit" value="Book Catering">
        </div>
    </form>
	<script>
	const cateringRadios = document.getElementsByName("selected");
for (const radio of cateringRadios) {
    radio.addEventListener("change", function () {
        const Pname = this.getAttribute("data-code");
        document.getElementById("pname").value = Pname;
    });
}
</script>	<script>
	 $(document).ready(function() {
   $("#submitBooking").submit(function(e) {
    e.preventDefault();
                
        $.ajax({
            type: "POST",
             url: "insertdlts.php",
           data: $(this).serialize(),
           success: function(res) {
           $("#result").html(res);
              }
                });
            });
        });
    </script>
	
	   <?php include_once './include/scripts.php'; ?>
	</body>
	</html>
<?php
}
?>