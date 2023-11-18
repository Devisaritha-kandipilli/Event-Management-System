<?php
session_start();
if(empty($_SESSION)) {
    include_once './login.php';
    include_once './include/login.php';
}
else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
include_once 'include/head.php';
?> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
	
    <title>Evnetrix</title>
    <style>
        body {
            background-image: url('./dist/img/wp.png');
            background-repeat: no-repeat;
        }
		h2{color:white;
		text-align: center;}
        /* Update the animation for horizontal entrance */
.tile {
    background-color: #dd77a3;
    border: 1px solid #ccc;
    text-align: center;
    align-items: center;
    cursor: pointer;
    padding: 20px;
    width: 200px;
    height: 100px; /* Add a fixed height to maintain a consistent layout */
    margin: 20px;
    animation-timing-function: ease-in;
    animation-name: horizontalEntrance;
    animation-duration: 2s; /* Adjust the duration as needed */
    animation-iteration-count: 5s; /* Change to 1 iteration for a single slide */
    transform: translateX(0); /* Start the tiles off-screen to the right */
}

@keyframes horizontalEntrance {
    100% {
        transform: translateX(0);
    }
    0% {
        transform: translateX(200%); /* Slide in from the right to the original position */
    }
}


    .event-section {
        display: inline-block;
        margin: 20px;
        align-items: center;
    }
</style>
     
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <?php
    include_once 'include/sidebar.php';
    ?>

    <div class="container" style="margin-top: 50px;">
    <div class="row">
	<div class="col-md-2"></div>
        <div class="col-mb-5">
            <div class="event-section">
                <h2>Social Events</h2>
                <a class="btn btn-primary tile mb-3" href="booking.php">Book a venue</a>
                <a class="btn btn-primary tile mb-3" href="cate.php">Book food services</a>
                <a class="btn btn-primary tile mb-3" href="photoservice.php">Book photography service</a>
            </div>
        </div>
<div class="col-md-2"></div>
        <div class="col-mb-5">
            <div class="event-section">
                <h2>Leisure Events</h2><div></div>
                <a class="btn btn-primary tile mb-3" href="lev.php">Book a venue</a>
                <a class="btn btn-primary tile mb-3" href="cate.php">Book food services</a>
                <a class="btn btn-primary tile mb-3" href="photoservice.php">Book photography service</a>
            </div>
        </div>
<div class="col-md-2"></div>
        <div class="col-mb-5">
            <div class="event-section">
                <h2>Corporate Events</h2>
                <a class="btn btn-primary tile mb-3" href="cev.php">Book a venue</a>
                <a class="btn btn-primary tile mb-3" href="cate.php">Book food services</a>
                <a class="btn btn-primary tile mb-3" href="photoservice.php">Book photography service</a>
            </div>
        </div>
    </div>
</div>

	   <?php include_once './include/scripts.php'; ?>
</body>
</html>
<?php
}
?>
