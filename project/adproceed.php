<?php
session_start();
if(empty($_SESSION)) {
    include_once './adlogin.php';
    include_once './include/login.php';
}
else{
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	
    <title>Evnetrix</title>
		<?php
include_once 'include/head.php';
?> 
    <style>
    body{
		background-image: url('./dist/img/eventrixxx.png');
		 background-size: cover;
  background-position: center;
	background-repeat: no-repeat;}
      
		.info-box-number{
		color:black;}

    </style>
</head>
<body>
<?php
include_once 'include/sidebar.php';?>
    <div class="content-wrapper">
                <!-- Content Header (Page header) -->
            <div class="content-header">
               <h2 class="m-1">Dashboard</h2> 
                    <!-- /.container-fluid -->
                </div>
               <section class="content">
<div class="container-fluid">

<div class="row">

<div class=" col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-alt"></i></span>
<div class="info-box-content">
<span class="info-box-text">Events</span>

<span>  <a href="event.php" class="info-box-number">12</a></span>
</div>

</div>

</div>


<div class="clearfix hidden-md-up"></div>
<div class=" col-sm-6 col-md-4">
<div class="info-box mb-3">
<span class="info-box-icon bg-info elevation-1"><i class="fas fa-building "></i></span>
<div class="info-box-content">
<span class="info-box-text">venue</span>
<span>  <a href="ven.php" class="info-box-number">19</a></span>
</div>

</div>

</div>

<div class="col-sm-8 col-md-4">
    <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="ion ion-stats-bars"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Ratings</span>
            <!-- Adding an anchor tag for info-box-number -->
            <a href="ratinginfo.php" class="info-box-number">view</a>
        </div>
    </div>
</div>
 

</div>

</div>

</div>

               
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
      
        <!-- /.content -->
        
        <!-- /.content-wrapper -->
		

<?php
}
?>