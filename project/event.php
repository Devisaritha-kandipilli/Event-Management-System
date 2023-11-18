<?php
include("./include/conn.php");
session_start();
$msg = '';
$action = "add";

$EventID='';
$Name='';
$EventType='';
$Description='';

 
if(isset($_POST['save']))
{

$EventID = $_POST['EventID'];
$Name  = $_POST['Name'];
$EventType = $_POST['EventType'];
$Description  = $_POST['Description'];

   
if($_POST['action']=="add") {
 
 $sql="SELECT * FROM events  WHERE EventID = '$EventID' ";
 $rs = $conn->query($sql);
 								 
 if ($row = $rs->fetch_assoc()) {
    header("location: event.php?act=6");
 }
else  {
  $sql="INSERT INTO events VALUES ('$EventID','$Name','$EventType','$Description'  )";
  $rs = $conn->query($sql) ;
    
   echo '<script type="text/javascript">            window.location="event.php?act=1";
   </script>';
  }
 }
 else if($_POST['action']=="update") {
  $sql="UPDATE  events  SET  Name  = '$Name', EventType   = '$EventType'  ,Description= '$Description'   WHERE  EventID  = '$EventID'  "; 	
   if($conn->query($sql)===TRUE)
   echo '<script type="text/javascript">  window.location="event.php?act=2";
   </script>';
   else
	echo '<script type="text/javascript">  window.location="event.php?act=7";
   </script>';   
 }

}

if(isset($_GET['action']) && $_GET['action']=="delete"){
$EventID=$_GET['EventID'];
$sql="delete from  events WHERE EventID='$EventID'";
if($conn->query($sql)===TRUE)
  header("location: event.php?act=3");
else
  header("location: event.php?act=4");
}


$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" )
{
 $EventID =  $_GET['EventID'];
 $sql="SELECT * FROM events WHERE EventID='".$EventID."'";
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

		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="dist/css/adminlte.min.css">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
              
 <?php
           
            include_once 'include/sidebar.php';
            ?>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 </head>
 <div class="content-wrapper">
 <section class= "content">
<div class="row">
<div class="col-md-12">
        
<h1 class="page-head-line">Event Details
<?php
echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
? '<a href="event.php" class="btn btn-primary  pull-right"> Back <i class="glyphicon glyphicon-arrow-right"></i></a>' 
: '<a href="event.php?action=add" class="btn btn-primary   pull-right"><i class="glyphicon glyphicon-plus"></i> Add info. </a>';
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
		<form action="event.php" method="post"   class="form-horizontal">
        <div class="panel-body">
		<div class="form-group">
		<label class="col-sm-2 control-label" for="Old">EventID</label>
		<div class="col-sm-10">
 	 <input type="text" class="form-control" id="EventID" name="EventID"  value="<?php echo $EventID;?>"  />
		</div>
		</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="Old">Name</label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="Name" name="Name"  value="<?php echo $Name;?>" required />
	</div>
	</div>
							
	<div class="form-group">
	<label class="col-sm-2 control-label" for="EventType">  Event type </label>
	<div class="col-sm-10">
	  <textarea class="form-control" id="EventType" name="EventType" required><?php echo $EventType ;?></textarea >
	</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="Description">  description </label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="Description" name="Description" value="<?php echo $Description;?>"  required />
	</div>
	
	</div>
	
						
	<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
	<input type="hidden" name="id" 
	               value="<?php echo $id;?>">
    <input type="hidden" name="action" 
                    value="<?php echo $action;?>">
    <button type="submit" name="save" 
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
             Manage events 
         </div>
    <div class="panel-body">
    <div class="table-sorting table-responsive">
    <table class="table table-striped table-bordered table-hover" >
     <thead>
         <tr>
           <th>SNo</th>
           <th>Event id</th>
		   <th>Name</th>
           <th> Event type</th>
           <th>description</th>
           <th>Action</th>
         </tr>
    </thead>
    <tbody>
	<?php
	$sql = "select * from events ";
	$rs = $conn->query($sql);
	$i=1;
	while($row = $rs->fetch_assoc())
	{
	  echo '<tr>
       <td>'.$i.'</td>
       <td>'.$row['EventID'].'</td>
       <td>'.$row['Name'].'</td>
		<td>'.$row['EventType'].'</td>
       <td>'.$row['Description'].'</td>
	 
         
		<td>
<a href="event.php?action=edit&EventID='.$row['EventID'].'" class="btn btn-success btn-xs">
	<span class="glyphicon glyphicon-edit"></span>
</a>
<a onclick="return confirm(\'Are you sure you want to delete ?\');" href="event.php?action=delete&EventID='.$row['EventID'].'" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove"></span></a> 
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

    <!-- /. WRAPPER  -->   
        <!-- ./wrapper -->

        <!-- jQuery -->
<?php include_once './include/scripts.php'; ?>
   
       
 
</body>
</html>
