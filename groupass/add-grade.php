<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit'])){

$gradeid = $_POST['gradeid'];
$gradename = $_POST['gradename'];
$start=$_POST['initialvalue'];
$endg=$_POST['finalvalue'];
$pointg=$_POST['point'];
$comment=$_POST['comment'];


$sql="INSERT INTO grade(id,gradename,start_value,end_value,grade_point,comments) VALUES (:gradeid,:gradename,:start,:endg,:pointg,:comment)";

$query = $dbh->prepare($sql);
$query->bindParam(':gradeid',$gradeid,PDO::PARAM_STR);
$query->bindParam(':gradename',$gradename,PDO::PARAM_STR);
$query->bindParam(':initialvalue',$start,PDO::PARAM_STR);
$query->bindParam(':finalvalue',$endg,PDO::PARAM_STR);
$query->bindParam(':point',$pointg,PDO::PARAM_STR);
$query->bindParam(':comment',$comment,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="School info added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin| School Admission< </title>
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
                                    <h2 class="title">Grade Registration</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Grade Registration</li>
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
                                                <form class="form-horizontal" method="post">


<div class="form-group">

<label for="default" class="col-sm-2 control-label">Grade Name</label>

<div class="col-sm-10">
<input type="text" name="gradename" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="initialvalue" class="col-sm-2 control-label">Start_Value</label>
<div class="col-sm-10">
<input type="number" name="initialvalue" class="form-control" id="rollid" required="required" autocomplete="off" minlength="0" maxlength="100">
</div>
</div>

<div class="form-group">
<label for="finalvalue" class="col-sm-2 control-label">End_Value</label>
<div class="col-sm-10">
<input type="number" name="finalvalue" class="form-control" id="rollid" required="required" autocomplete="off" minlength="0" maxlength="100">
</div>
</div>

<div class="form-group">
<label for="finalvalue" class="col-sm-2 control-label">Point</label>
<div class="col-sm-10">
<input type="number" name="finalvalue" class="form-control" id="rollid" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="comment" class="col-sm-2 control-label">Comments</label>
<div class="col-sm-10">
<input type="text" name="comment" class="form-control" id="rollid" required="required" autocomplete="off">
</div>
</div>
                                                

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
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