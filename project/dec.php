<?php
include("./include/conn.php");
session_start();
$msg = '';
$action = "add";

$decorationID='';
$Event_name='';
$Name='';
$Budget='';
$imgpath='';
 
if(isset($_POST['save']))
{

$decorationID = $_POST['decorationID'];
$Event_name  = $_POST['Event_name'];
$Name = $_POST['Name'];
$Budget  = $_POST['Budget'];
$imgpath   = $_POST['imgpath'];
   
if($_POST['action']=="add") {
 
 $sql="SELECT * FROM decoration  WHERE decorationID = '$decorationID' ";
 $rs = $conn->query($sql);
 								 
 if ($row = $rs->fetch_assoc()) {
    header("location: dec.php?act=6");
 }
else  {
  $sql="INSERT INTO decoration VALUES ('$decorationID','$Event_name','$Name','$Budget','$imgpath'  )";
  $rs = $conn->query($sql) ;
    
   echo '<script type="text/javascript">  window.location="dec.php?act=1";
   </script>';
  }
 }
 else if($_POST['action']=="update") {
  $sql="UPDATE  decoration  SET  Event_name = '$Event_name',Name= '$Name' ,Budget= '$Budget' ,imgpath='$imgpath'  WHERE  decorationID  = '$decorationID'  "; 	
   if($conn->query($sql)===TRUE)
   echo '<script type="text/javascript">  window.location="dec.php?act=2";
   </script>';
   else
	echo '<script type="text/javascript">  window.location="dec.php?act=7";
   </script>';   
 }

}

if(isset($_GET['action']) && $_GET['action']=="delete"){
$decorationID=$_GET['decorationID'];
$sql="delete from  decoration WHERE decorationID='$decorationID'";
if($conn->query($sql)===TRUE)
  header("location: dec.php?act=3");
else
  header("location: dec.php?act=4");
}


$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" )
{
 $decorationID =  $_GET['decorationID'];
 $sql="SELECT * FROM decoration WHERE decorationID='".$decorationID."'";
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


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <?php
        include_once 'include/head.php';
        ?>
		<style>
        /* CSS to set the background for the table */
        table {
            width: 100%;
            background-color: #f2f2f2; /* Set your desired background color here */
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50; /* Header background color */
            color: white;
        }
    </style>
 </head>
 <body class="hold-transition sidebar-mini layout-fixed">
  <?php
        include_once 'include/sidebar.php';
        ?>
 <div class="content-wrapper">
 <section class= "content">
<div class="row">
<div class="col-md-12">
        
<h1 class="page-head-line">Decoration Details
<?php
echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
? '<a href="dec.php" class="btn btn-primary  pull-right"> Back <i class="glyphicon glyphicon-arrow-right"></i></a>' 
: '<a href="dec.php?action=add" class="btn btn-primary   pull-right"><i class="glyphicon glyphicon-plus"></i> Add info. </a>';
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
		<form action="dec.php" method="post"   class="form-horizontal">
        <div class="panel-body">
		<div class="form-group">
		<label class="col-sm-2 control-label" for="Old">decorationID</label>
		<div class="col-sm-10">
 	 <input type="text" class="form-control" id="decorationID" name="decorationID"  value="<?php echo $decorationID;?>"  />
		</div>
		</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="Old">Event_name</label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="Event_name" name="Event_name"  value="<?php echo $Event_name;?>" required />
	</div>
	</div>
							
	<div class="form-group">
	<label class="col-sm-2 control-label" for="Name"> Name </label>
	<div class="col-sm-10">
	  <textarea class="form-control" id="Name" name="Name" required><?php echo $Name ;?></textarea >
	</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="Budget"> Budget </label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="Budget" name="Budget" value="<?php echo $Budget;?>"  required />
	</div>
	
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="imgpath"> imgpath </label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="imgpath" name="imgpath" value="<?php echo $imgpath;?>"  required />
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
             Manage Decoration
         </div>
    <div class="panel-body">
    <div class="table-sorting table-responsive">
    <table class="table table-striped table-bordered table-hover" >
     <thead>
         <tr>
           <th>SNo</th>
           <th>decorationID </th>

           <th>Name</th>
           <th>Budget</th>
		 
           <th>Action</th>
         </tr>
    </thead>
    <tbody>
	<?php
	$sql = "select * from decoration";
	$rs = $conn->query($sql);
	$i=1;
	 while($row = $rs->fetch_assoc())
	{
	  echo '<tr>
       <td>'.$i.'</td>
       <td>'.$row['decorationID'].'</td>
		<td>'.$row['Name'].'</td>
       <td>'.$row['Budget'].'</td>
	
         
		<td>
<a href="dec.php?action=edit&decorationID='.$row['decorationID'].'" class="btn btn-success btn-xs">
	<span class="glyphicon glyphicon-edit"></span>
</a>
<a onclick="return confirm(\'Are you sure you want to delete ?\');" href="dec.php?action=delete&decorationID='.$row['decorationID'].'" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove"></span></a> 
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
