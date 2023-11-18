<?php
include("./include/conn.php");
session_start();
$msg = '';
$action = "add";

$Code='';
$Catering_Name='';
$Address='';
$price='';
$Email='';
$Rating='';

 
if(isset($_POST['save']))
{

$Code = $_POST['Code'];
$Catering_Name  = $_POST['Catering_Name'];
$Address = $_POST['Address'];
$price  = $_POST['price'];
$Email  = $_POST['Email'];
$Rating  = $_POST['Rating'];
   
if($_POST['action']=="add") {
 
 $sql="SELECT * FROM catering  WHERE Code = '$Code' ";
 $rs = $conn->query($sql);
 								 
 if ($row = $rs->fetch_assoc()) {
    header("location: crudcate.php?act=6");
 }
else  {
  $sql="INSERT INTO catering VALUES ('$Code','$Catering_Name','$Address','$price','$Email','$Rating'  )";
  $rs = $conn->query($sql) ;
    
   echo '<script type="text/javascript">            window.location="crudcate.php?act=1";
   </script>';
  }
 }
 else if($_POST['action']=="update") {
  $sql="UPDATE  catering  SET  Catering_Name  = '$Catering_Name', Address   = '$Address',price= '$price',Email='$Email',Rating='$Rating'   WHERE  Code  = '$Code'  "; 	
   if($conn->query($sql)===TRUE)
   echo '<script type="text/javascript">  window.location="crudcate.php?act=2";
   </script>';
   else
	echo '<script type="text/javascript">  window.location="crudcate.php?act=7";
   </script>';   
 }

}

if(isset($_GET['action']) && $_GET['action']=="delete"){
$Code=$_GET['Code'];
$sql="delete from  catering WHERE Code='$Code'";
if($conn->query($sql)===TRUE)
  header("location: crudcate.php?act=3");
else
  header("location: crudcate.php?act=4");
}


$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" )
{
 $Code =  $_GET['Code'];
 $sql="SELECT * FROM catering WHERE Code='".$Code."'";
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
<head>  <?php
        include_once 'include/head.php';
        ?>

        
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
	 <?php
           
            include_once 'include/sidebar.php';
            ?>
        <div class="wrapper">
              


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 </head>
 <div class="content-wrapper">
 <section class= "content">
<div class="row">
<div class="col-md-12">
        
<h1 class="page-head-line"> Food service details
<?php
echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
? '<a href="crudcate.php" class="btn btn-primary  pull-right"> Back <i class="glyphicon glyphicon-arrow-right"></i></a>' 
: '<a href="crudcate.php?action=add" class="btn btn-primary   pull-right"><i class="glyphicon glyphicon-plus"></i> Add info. </a>';
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
		<form action="crudcate.php" method="post"   class="form-horizontal">
        <div class="panel-body">
		<div class="form-group">
		<label class="col-sm-2 control-label" for="Old">Code</label>
		<div class="col-sm-10">
 	 <input type="text" class="form-control" id="Code" name="Code"  value="<?php echo $Code;?>"  />
		</div>
		</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="Old">Catering_Name</label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="Catering_Name" name="Catering_Name"  value="<?php echo $Catering_Name;?>" required />
	</div>
	</div>
							
	<div class="form-group">
	<label class="col-sm-2 control-label" for="Address">  Address </label>
	<div class="col-sm-10">
	  <textarea class="form-control" id="Address" name="Address" required><?php echo $Address ;?></textarea >
	</div>
	</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="price">  price </label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="price" name="price" value="<?php echo $price;?>"  required />
	</div>
	
	</div>
		<div class="form-group">
	<label class="col-sm-2 control-label" for="Email">  Email </label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="Email" name="Email" value="<?php echo $Email;?>"  required />
	</div>
	
	</div>
		<div class="form-group">
	<label class="col-sm-2 control-label" for="Rating">  Rating </label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="Rating" name="Rating" value="<?php echo $Rating;?>"  required />
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
             Manage catering 
         </div>
    <div class="panel-body">
    <div class="table-sorting table-responsive">
    <table class="table table-striped table-bordered table-hover" >
     <thead>
         <tr>
           <th>SNo</th>
           <th>Event id</th>
		   <th>Catering_Name</th>
           <th> Event type</th>
           <th>price per plate</th>
		   <th>Email</th>
		   <th>Rating</th>
           <th>Action</th>
         </tr>
    </thead>
    <tbody>
	<?php
	$sql = "select * from catering ";
	$rs = $conn->query($sql);
	$i=1;
	while($row = $rs->fetch_assoc())
	{
	  echo '<tr>
       <td>'.$i.'</td>
       <td>'.$row['Code'].'</td>
       <td>'.$row['Catering_Name'].'</td>
		<td>'.$row['Address'].'</td>
       <td>'.$row['price'].'</td>
	    <td>'.$row['Email'].'</td>
		 <td>'.$row['Rating'].'</td>
	 
         
		<td>
<a href="crudcate.php?action=edit&Code='.$row['Code'].'" class="btn btn-success btn-xs">
	<span class="glyphicon glyphicon-edit"></span>
</a>
<a onclick="return confirm(\'Are you sure you want to delete ?\');" href="crudcate.php?action=delete&Code='.$row['Code'].'" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove"></span></a> 
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
