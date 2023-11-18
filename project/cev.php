<!DOCTYPE html>
<html lang="en">
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
       .content {
  background-image: url('./dist/img/vbg.jpeg') !important;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}
        .img-thumbnail {
            width: 500px; 
            height: 300px; 
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
                <h2>REGISTRATION Form</h2>
                <form id="submitBooking" method="post" action="insertbooking.php">
                    
                   
                    <div class="form-group">
                        <label for="EventID">Event ID</label>
                        <?php
                        include("./include/conn.php"); 
                        $sql = "select * from events WHERE  EventType='corporate event' "; 
                        $rs = $conn->query($sql);
                        ?>
                        <select name='EventID' id='EventID' class='form-control'>
                            <option value=''>Select Event</option>
                            <?php 
                            while ($row = $rs->fetch_assoc()) {
                            ?>
                            <option value='<?php echo $row['EventID'];?>'><?php echo $row['Name'];?></option>
                            <?php      
                            }
                            ?>
                        </select>
                    </div> 
					
            
         
    

                    <div class="form-group">
                        <label for="Bookingdate">Booking Date:</label>
                        <input type="date" class="form-control" id="Bookingdate" name="Bookingdate" required>
                    </div>
					
                    <div class="form-group">
                        <label for="number_of_attendees">Number of Attendees:</label>
                        <input type="number" class="form-control" id="number_of_attendees" name="number_of_attendees" required>
                    </div>
					 <div class="form-group">
                    <label for="address">Select Venue Address</label>
                    <select name="address" id="address" class="form-control">
                        <option value="">Select Address</option>
                        <?php
                        // Fetch unique addresses from the "venues" table
                        include("./include/conn.php");
                        $sql = "SELECT DISTINCT Address FROM venues";
                        $rs = $conn->query($sql);
                        while ($row = $rs->fetch_assoc()) {
                            echo '<option value="' . $row['Address'] . '">' . $row['Address'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
				 <div class="form-group">
    <label for="decor">Do you want to include decor?</label>
    <input type="radio" name="decor" value="yes" id="decorYes"> Yes
    <input type="radio" name="decor" value="no" id="decorNo"> No
</div>

                <div class="form-group" style="display: none;" id="budget">
    <label for="budget">Select budget</label>
    <select name="budget"id="budget" class="form-control">
        <option value="">Select budget</option>
        <?php
        // Fetch unique addresses from the "venues" table
        include("./include/conn.php");
        $sql = "SELECT budget FROM budgetranges";
        $rs = $conn->query($sql);
        while ($row = $rs->fetch_assoc()) {
            echo '<option value="' . $row['budget'] . '">' . $row['budget'] . '</option>';
        }
        ?>
    </select>
</div>
				<div class="form-group">
                    <label for="selectedImage">Select Image</label>
                    <select name="selectedImage" id="selectedImage" class="form-control">
                        <option value="">Select Image</option>
                    </select>
                </div>
				
                <div id="imageGallery">
                    <!-- Images will be displayed here -->
                </div>
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <div id="result"></div>
				</div>
				</section>
            </div>
        
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
    $(document).ready(function() {
        // Initial state
        toggleBudgetField();

        // Listen for changes in the decor radio buttons
        $("input[name='decor']").change(function() {
            toggleBudgetField();
        });

        function toggleBudgetField() {
            if ($("#decorYes").is(":checked")) {
                $("#budget").show(); // Show the budget field
            } else {
                $("#budget").hide(); // Hide the budget field
            }
        }
    });
</script>
    <script>
        $(document).ready(function() {
            $("#address").change(function() {
                var selectedAddress = $(this).val();

                if (selectedAddress) {
                    // Clear the previous images and options
                    $("#imageGallery").empty();
                    $("#selectedImage").empty();

                    $.ajax({
                        type: "POST",
                        url: "getVenueImages.php", // Create a PHP file to handle image retrieval
                        data: { address: selectedAddress },
                        dataType: "json",
                        success: function(data) {
                            if (data.images.length > 0) {
                                // Display the images
                                data.images.forEach(function(imageUrl, index) {
                                    $("#imageGallery").append('<img src="' + imageUrl + '" alt="Venue Image" class="img-thumbnail">');
                                    
                                    // Populate the select option with venue names
                                    $("#selectedImage").append('<option value="' + imageUrl + '">' + data.venueNames[index] + '</option>');
                                });
                            } else {
                                $("#imageGallery").html("No images found for the selected address.");
                            }
                        }
                    });
                }
            });

            $("#submitBooking").click(function() {
                var selectedAddress = $("#address").val();
                var selectedImage = $("#selectedImage").val();

                if (selectedAddress && selectedImage) {
                    $.ajax({
                        type: "POST",
                        url: "insertbooking.php",
                        data: {
                            address: selectedAddress,
                            selectedImage: selectedImage
                        },
                        success: function(res) {
                            $("#result").html(res);
                        }
                    });
                } 
            });
        });

    </script>
	<?php include_once './include/scripts.php'; ?>
</body>
</html>
<?php
}
?>