<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventrix | Social Events</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .center-button {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
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
	<link rel="shortcut icon" href="./dist/img/eventrix.png">
        <link rel="icon" href="./dist/img/eventrix.png" type="image/x-icon">
</head>
<body>
    <div class="container"><br>
	<br>
        <h1 class="text-center">Social Events</h1>
		<br>
		<br>
        <div class="row">
            <div class="col-md-6">
                <!-- First Card Section -->
                <div class="card">
                    <div class="card-body">
                        <img src="./dist/img/wedding.png" class="card-img-top" alt="Wedding Event Image">
                        <h5 class="card-title">Wedding</h5>
                        <a href="new.php?set=1" class="btn btn-primary">Click to View</a>
                    </div>
                </div>
            </div>

            <!-- Second Card Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="./dist/img/bdaypty.png" class="card-img-top" alt="Birthday Party Event Image">
                        <h5 class="card-title">Birthday Party</h5>
                        <a href="new.php?set=2" class="btn btn-primary">Click to View</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div a class="card">
                    <div class="card-body">
                        <img src="./dist/img/anv.png" class="card-img-top" alt="Anniversary Event Image">
                        <h5 class="card-title">Anniversary</h5>
                        <a href="new.php?set=3" class="btn btn-primary">Click to View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="./dist/img/babyshow.png" height="350" class="card-img-top" alt="Baby Shower Event Image">
                        <h5 class="card-title">Baby Shower</h5>
                        <a href="new.php?set=4" class="btn btn-primary">Click to View</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="center-button">
            <a class="btn btn-success" href="login.php">Click to Proceed</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
