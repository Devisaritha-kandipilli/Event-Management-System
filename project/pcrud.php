<?php
include("./include/conn.php");
session_start();
$msg = '';
$action = "add";
$pid='';
$pname='';
$Address='';
$Email='';
$Rating='';
if(isset($_POST['save']))
{
$pid = $_POST['pid'];
$pname  = $_POST['pname'];
$Address = $_POST['Address'];
$Email  = $_POST['Email'];
$Rating  = $_POST['Rating'];
   
if($_POST['action']=="add") {
 
 $sql="SELECT * FROM photographyservices  WHERE pid = '$pid' ";
 $rs = $conn->query($sql);
 								 
 if ($row = $rs->fetch_assoc()) {
    header("location: pcrud.php?act=6");
 }
else  {
  $sql="INSERT INTO photographyservices VALUES ('$pid','$pname','$Address','$Email','$Rating'  )";
  $rs = $conn->query($sql) ;
    
   echo '<script type="text/javascript">            window.location="pcrud.php?act=1";
   </script>';
  }
 }
 else if($_POST['action']=="update") {
  $sql="UPDATE  photographyservices  SET  pname  = '$pname', Address   = '$Address',Email='$Email',Rating='$Rating'   WHERE  pid  = '$pid'  "; 	
   if($conn->query($sql)===TRUE)
   echo '<script type="text/javascript">  window.location="pcrud.php?act=2";
   </script>';
   else
	echo '<script type="text/javascript">  window.location="pcrud.php?act=7";
   </script>';   
 }

}

if(isset($_GET['action']) && $_GET['action']=="delete"){
$pid=$_GET['pid'];
$sql="delete from  photographyservices WHERE pid='$pid'";
if($conn->query($sql)===TRUE)
  header("location: pcrud.php?act=3");
else
  header("location: pcrud.php?act=4");
}


$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" )
{
 $pid =  $_GET['pid'];
 $sql="SELECT * FROM photographyservices WHERE pid='".$pid."'";
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
        
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
              


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 </head><body>
 <?php
           
            include_once 'include/sidebar.php';
            ?>
 <div class="content-wrapper">
 <section class= "content">
<div class="row">
<div class="col-md-12">
        
<h1 class="page-head-line"> photography service provider Details
<?php
echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
? '<a href="pcrud.php" class="btn btn-primary  pull-right"> Back <i class="glyphicon glyphicon-arrow-right"></i></a>' 
: '<a href="pcrud.php?action=add" class="btn btn-primary   pull-right"><i class="glyphicon glyphicon-plus"></i> Add info. </a>';
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
		<form action="pcrud.php" method="post"   class="form-horizontal">
        <div class="panel-body">
		<div class="form-group">
		<label class="col-sm-2 control-label" for="Old">pid</label>
		<div class="col-sm-10">
 	 <input type="text" class="form-control" id="pid" name="pid"  value="<?php echo $pid;?>"  />
		</div>
		</div>
	<div class="form-group">
	<label class="col-sm-2 control-label" for="Old">pname</label>
	<div class="col-sm-10">
	<input type="text" class="form-control" id="pname" name="pname"  value="<?php echo $pname;?>" required />
	</div>
	</div>
							
	<div class="form-group">
	<label class="col-sm-2 control-label" for="Address">  Address </label>
	<div class="col-sm-10">
	  <textarea class="form-control" id="Address" name="Address" required><?php echo $Address ;?></textarea >
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
             Manage photographyservices 
         </div>
    <div class="panel-body">
    <div class="table-sorting table-responsive">
    <table class="table table-striped table-bordered table-hover" >
     <thead>
         <tr>
           <th>SNo</th>
           <th>Event id</th>
		   <th>pname</th>
           <th> Event type</th>
         
		   <th>Email</th>
		   <th>Rating</th>
           <th>Action</th>
         </tr>
    </thead>
    <tbody>
	<?php
	$sql = "select * from photographyservices ";
	$rs = $conn->query($sql);
	$i=1;
	while($row = $rs->fetch_assoc())
	{
	  echo '<tr>
       <td>'.$i.'</td>
       <td>'.$row['pid'].'</td>
       <td>'.$row['pname'].'</td>
		<td>'.$row['Address'].'</td>
	    <td>'.$row['Email'].'</td>
		 <td>'.$row['Rating'].'</td>
	 
         
		<td>
<a href="pcrud.php?action=edit&pid='.$row['pid'].'" class="btn btn-success btn-xs">
	<span class="glyphicon glyphicon-edit"></span>
</a>
<a onclick="return confirm(\'Are you sure you want to delete ?\');" href="pcrud.php?action=delete&pid='.$row['pid'].'" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove"></span></a> 
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
