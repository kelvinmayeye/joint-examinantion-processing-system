<?php
session_start();
error_reporting(0);
include('../includes/config.php');
?>

<?php $no = 1; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Grade Admin| Grade Defined </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">View Grade</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Grade Registered</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Fill the Grade Infotrmation Correctly</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>


<table align="center"  style="border-collapse: collapse; width: 100%; text-align:left; margin: auto; line-height: 30px;">
	
	<tr>
		<th colspan="9" style="text-align: center;">Grade Details</th>
	</tr>
<tr>
		<th>S/NO</th>
		<th>Grade</th>
		<th>Start Value</th>
		<th>End Value</th>
		<th>Grade Point</th>
		<th>Comments</th>
		<th text align="center" colspan="2">Action</th>
	</tr>

	<?php
$sql="select * from grade";
$result=mysqli_query($dbh,$sql);
if($result){
	while($row=mysqli_fetch_assoc($result)){

	?>							

		<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $row['gradename']; ?></td>
		<td><?php echo $row['start_value']; ?></td>
		<td> <?php echo $row['end_value']; ?></td>
		<td><?php echo $row['gradepoint']; ?></td>	
		<td><?php echo $row['comments']; ?></td>	
		<td><a href="studentupdate.php?../updatedelete/updateid='.$id.'" class="buttonc" type="button">Edit/Update</a>	
		<a href="deletestudent.php?deleteid='.$id.'" class="buttond" type="button">Delete</a>
		</td>	
	</tr>
		<?php $no = $no + 1?>
	

<?php }} ?>
</table>

        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?PHP } ?>




































<?php
$hostname = "localhost";
$Username = "root";
$password = "";
$database = "project1";

$connection = mysqli_connect("$hostname","$Username","$password","$database");
?>
<?php $no = 1; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Grade Defined!</title>
	<link rel="stylesheet" type="text/css" href="stylesheetform2.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
<style>
	table,th,tr,td{
		border: 2px solid black;
	}

</style>
</style>

</head>

<?php include('../include/header.php'); ?>
<br><br>	
<div class="AddItem">
	<p style="color: #000;text-align: center;" ><a href="../function/AddStudent.php" type="button"><b>Add New Student</b></a></p>

</div>





<table align="center"  style="border-collapse: collapse; width: 100%; text-align:left; margin: auto; line-height: 30px;">
	<tr>
		<th colspan="9" style="text-align: center;">Student Records</th>
	</tr>
<tr>
		<th>S/NO</th>
		<th>Full Name</th>
		<th>Sex</th>
		<th>Date of Birth</th>
		<th>Admission</th>
		<th>Class</th>
		<th text align="center" colspan="2">Action</th>
	</tr>

	<?php
$sql="select * from student";
$result=mysqli_query($connection,$sql);
if($result){
	while($row=mysqli_fetch_assoc($result)){

	?>							

		<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $row['f_name'].' '.$row['m_name'].' '.$row['l_name']; ?></td>
		<td><?php echo $row['sex']; ?></td>
		<td><?php echo $row['dob']; ?></td>
		<td> <?php echo $row['s_id']; ?></td>
		<td><?php echo $row['stream']; ?></td>	
		
		<td><a href="studentupdate.php?../updatedelete/updateid='.$id.'" class="buttonc" type="button">Edit/Update</a>	
		<a href="deletestudent.php?deleteid='.$id.'" class="buttond" type="button">Delete</a>
		</td>	
	</tr>
		<?php $no = $no + 1?>
	

<?php }} ?>
</table>

<?php include('../include/footer.php'); ?>
</body>
</html>