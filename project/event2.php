<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Eventrix | Leisure events</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="shortcut icon" href="./dist/img/eventrix.png">
        <link rel="icon" href="./dist/img/eventrix.png" type="image/x-icon">
    <style>
        .center-button {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px; /* Adjust the margin to control the vertical positioning */
        }

        /* Style for card titles and buttons (customize as needed) */
        .card-title {
            font-size: 20px;
        }

        .btn-primary {
            background-color: #007BFF;
            color: #fff;
        }

        /* Additional styling as needed */
    </style>
    <!-- Include necessary CSS and scripts here -->  
</head>
<body>
    <div class="container">
	<br>
        <h1 class="text-center">Leisure Meeting Events</h1><br><br>
        <div class="row">
            <div class="col-md-6">
                <!-- First Card Section -->
                <div class="card">
                    <div class="card-body">
                        <img src="./dist/img/get.png" height="350" class="card-img-top" alt="Leisure Meeting Event 1">
                        <h5 class="card-title">Get together</h5>
                        <a href="new.php?set=5" class="btn btn-primary">Click to View</a>
                    </div>
                </div>
            </div>

            <!-- Second Card Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="./dist/img/pool.png" height="350" class="card-img-top" alt="Leisure Meeting Event 2">
                        <h5 class="card-title">Pool party</h5>
                        <a href="new.php?set=6" class="btn btn-primary">Click to View</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="./dist/img/concert.png" height="350" class="card-img-top" alt="Leisure Meeting Event 3">
                        <h5 class="card-title">Concerts</h5>
                        <a href="new.php?set=7" class="btn btn-primary">Click to View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="./dist/img/beach.png" height="350" class="card-img-top" alt="Leisure Meeting Event 4">
                        <h5 class="card-title">Beach Party</h5>
                        <a href="new.php?set=8" class="btn btn-primary">Click to View</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="center-button">
            <a class="btn btn-success" href="login.php">Click to Proceed</a>
        </div>
        <!-- You can add more card sections as needed -->
    </div>
</body>
</html>
