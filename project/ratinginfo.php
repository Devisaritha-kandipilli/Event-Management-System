<?php
include("./include/conn.php");
session_start();


$ID='';
$rating='';
$booking_id='';
$description='';

 
if(isset($_POST['save']))
{

$ID = $_POST['ID'];
$rating  = $_POST['rating'];
$booking_id = $_POST['booking_id'];
$description = $_POST['description'];
}
?>
<html>


<head>
        <?php
        include_once 'include/head.php';
        ?>
        
    </head>

    <body class="hold-transition sIDebar-mini layout-fixed">
        <div class="wrapper">
              
 <?php
         
            include_once 'include/sIDebar.php';
            ?>


<body>
<div class="content-wrapper">
                  <section class="content">
                    <div class="col-md-12">
<div class="panel panel-default">
                        <div class="panel-heading">
                            Rating
                        </div>
                        <div class="panel-body">
                             <div class="table-sorting table-responsive">

                                <table class="table table-striped table-bordered table-hover" ID="tSortable22">
                                    <thead>
                                        <tr>
                                            <th>SNo</th>
                                            <th>ID</th>
											<th>Ratings</th>
											<th>description</th>
                                            <th>booking_id</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$sql = "select * from ratings";
									$q = $conn->query($sql);
									$i=1;
				while($r = $q->fetch_assoc())
									{
									echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$r['ID'].'</td>
                                            <td>'.$r['rating'].'</td>
											<td>'.$r['description'].'</td>
											<td>'.$r['booking_id'].'</td>
                                           
											  
						
                                        </tr>';
										$i++;
									}
									?>
									
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
							</div>
							</div>
							</section>
							</div>


							</body>
							</html>