<?php
include("./include/conn.php");
session_start();
$msg = '';
$action = "add";

$venueID='';
$Name='';
$Address='';
$capacity='';
$imgpath='';
 
if(isset($_POST['save']))
{

$venueID = $_POST['venueID'];
$Name  = $_POST['Name'];
$Address = $_POST['Address'];
$capacity  = $_POST['capacity'];
$imgpath   = $_POST['imgpath'];
   
if($_POST['action']=="add") {
 
 $sql="SELECT * FROM venues  WHERE venueID = '$venueID' ";
 $rs = $conn->query($sql);
 								 
 if ($row = $rs->fetch_assoc()) {
    header("location: ven.php?act=6");
 }
else  {
  $sql="INSERT INTO venues VALUES ('$venueID','$Name','$Address','$capacity','$imgpath')";
  $rs = $conn->query($sql) ;
    
   echo '<script type="text/javascript">            window.location="ven.php?act=1";
   </script>';
  }
 }
 else if($_POST['action']=="update") {
  $sql="UPDATE  venues  SET  Name  = '$Name', Address  = '$Address',capacity= '$capacity' ,imgpath='$imgpath' WHERE venueID = '$venueID' "; 	
 

   if($conn->query($sql)===TRUE)
   echo '<script type="text/javascript">  window.location="ven.php?act=2";
   </script>';
   else
	echo '<script type="text/javascript">  window.location="ven.php?act=7";
   </script>';   
 }

}

if(isset($_GET['action']) && $_GET['action']=="delete"){
$venueID=$_GET['venueID'];
$sql="delete from  venues WHERE venueID='$venueID'";
if($conn->query($sql)===TRUE)
  header("location: ven.php?act=3");
else
  header("location: ven.php?act=4");
}


$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" )
{
 $venueID =  $_GET['venueID'];
 $sql="SELECT * FROM venues WHERE venueID='".$venueID."'";
 $rs = $conn->query($sql);
if($rs->num_rows){
   $row = $rs->fetch_assoc();
   extract($row);
   $action = "update";
}else{
$_GET['action']="";
}

}

if(isset($_REQUEST['act']) && $_REQUEST['act']=="1")
{
$msg = "<div class='alert alert-success'>   <strong>Success!</strong> Details Added successfully
  </div>";
}else if(isset($_REQUEST['act']) && $_REQUEST['act']=="2")
{
$msg = "<div class='alert alert-success'> <strong>Success!</strong> Details Edited successfully
</div>";
}
else if(isset($_REQUEST['act']) && $_REQUEST['act']=="3"  )
{
$msg = "<div class='alert alert-success'> <strong>Success!</strong> Details Deleted successfully</div>";
}
else if(isset($_REQUEST['act']) && $_REQUEST['act']=="4"){
$msg = "<div class='alert alert-danger'> <strong>Fail!</strong> Details is not Deleted </div>";	
}
else if(isset($_REQUEST['act']) && $_REQUEST['act']=="6"){
$msg = "<div class='alert alert-danger'> <strong>Fail!</strong> Details is  already exists!! </div>";	
}
else if(isset($_REQUEST['act']) && $_REQUEST['act']=="7"){
$msg = "<div class='alert alert-danger'> <strong>Fail!</strong> Details  is not updated!! </div>";	
}
?>

<!DOCTYPE html>
<html>
<head>    
<?php
        include_once 'include/head.php';
        ?>
<style>
        /* CSS to set the background image for the table */
        body {
            background-image: url('path/to/your/image.jpg'); /* Set the path to your background image */
            background-size: cover; /* Adjust the background size as needed */
            background-repeat: no-repeat; /* Prevent image from repeating */
        }
        table {
            width: 100%;
            margin: 0 auto; /* Center the table on the page */
            background-color: rgba(255, 255, 255, 0.7); /* Set a background color for the table to make text readable */
        }
        th, td {
            padding: 10px;
            text-align: left;
            /* You can add more styles for your table cells if needed */
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 </head><body class="hold-transition sidebar-mini layout-fixed"><?php
           
            include_once 'include/sidebar.php';
            ?>
 <div class="content-wrapper">
 <section class= "content">
<div class="row">
<div class="col-md-12">
        
<h1 class="page-head-line">Venue Details
<?php
echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
? '<a href="ven.php" class="btn btn-primary  pull-right"> Back <i class="glyphicon glyphicon-arrow-right"></i></a>' 
: '<a href="ven.php?action=add" class="btn btn-primary   pull-right"><i class="glyphicon glyphicon-plus"></i> Add info. </a>';
 ?>
</h1>
                     
<?php
echo $msg;
?>
 </div>
</div>
  <?php 
 if(isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit"){
 ?>
	   <div class="row">
		<div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-primary">
        <div class="panel-heading">
  <?php echo ($action=="add")? "Add ": "Edit "; ?>
      </div>
		<form action="ven.php" method="post"   class="form-horizontal">
        <div class="panel-body">
		<div class="form-group">
		<label class="col-sm-2 control-label" for="Old">venueID</label>
		<div class="col-sm-10">
 	 <input type="text" class="form-control" id="venueID" Name="venueID"  value="<?php echo $venueID;?>"  />
		</div>
		</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="Old">Name</label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="Name" Name="Name"  value="<?php echo $Name;?>" required />
	</div>
	</div>
							
	<div class="form-group">
	<label class="col-sm-2 control-label" for="Address"> Address </label>
	<div class="col-sm-10">
	  <textarea class="form-control" id="Address" Name="Address" required><?php echo $Address ;?></textarea >
	</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="capacity"> Capacity </label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="capacity" Name="capacity" value="<?php echo $capacity;?>"  required />
	</div>
	
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="imgpath"> imgpath </label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="imgpath" Name="imgpath" value="<?php echo $imgpath;?>"  required />
	</div>
	
	</div>
						
	<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
	<input type="hidden" Name="id" 
	               value="<?php echo $id;?>">
    <input type="hidden" Name="action" 
                    value="<?php echo $action;?>">
    <button type="submit" Name="save" 
             class="btn btn-primary">Save </button>
</div>
</div>
 </div>
</form>
		
 </div>
 </div>
</div>
<?php
} else 
{
?>
		
	<div class="panel panel-primary">
         <div class="panel-heading">
             Manage Venue
         </div>
    <div class="panel-body">
    <div class="table-sorting table-responsive">
    <table class="table table-striped table-bordered table-hover" >
     <thead>
         <tr>
           <th>SNo</th>
           <th>venue ID</th>
		   <th>Name</th>
           <th>Address</th>
           <th>Capacity</th>
		 
           <th>Action</th>
         </tr>
    </thead>
    <tbody>
	<?php
	$sql = "select * from venues";
	$rs = $conn->query($sql);
	$i=1;
	 while($row = $rs->fetch_assoc())
	{
	  echo '<tr>
       <td>'.$i.'</td>
       <td>'.$row['venueID'].'</td>
       <td>'.$row['Name'].'</td>
		<td>'.$row['Address'].'</td>
       <td>'.$row['capacity'].'</td>
	 
         
		<td>
<a href="ven.php?action=edit&venueID='.$row['venueID'].'" class="btn btn-success btn-xs">
	<span class="glyphicon glyphicon-edit"></span>
</a>
<a onclick="return confirm(\'Are you sure you want to delete ?\');" href="ven.php?action=delete&venueID='.$row['venueID'].'" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove"></span></a> 
</td>
</tr>';
$i++;
}
?>
	</tbody>
     </table>
     </div>
   </div>
    </div>
	
	
	
	
	
	
    <?php
	}
	?> 
	</section>
</div>

    
<?php include_once './include/scripts.php'; ?>
   
       
 
</body>
</html>
