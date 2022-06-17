<?php
session_start();
//error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit'])){
$subcode=$_POST['subcode'];
$score=$_POST['score']; 


$sql="INSERT INTO  score(subcode,score) VALUES('$subcode','$score')";
if(mysqli_query($conn,$sql)){
    $msg = 'Added Successfully';
}else{
    $error = 'Ooops! Try Again';
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS Admin| Add Score </title>
            <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
            <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
            <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
            <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
            <link rel="stylesheet" href="css/prism/prism.css" media="screen">
            <link rel="stylesheet" href="css/select2/select2.min.css">
            <link rel="stylesheet" href="css/main.css" media="screen">
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
                                <h2 class="title">Score Registration</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                                    <li class="active">Score Registration</li>
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
                                            <h5>Fill the Score info</h5>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php if($msg){?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Success!</strong><?php echo htmlentities($msg); ?>
                                        </div><?php } 
                                        else if($error){?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Failed !</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                        <form class="form-horizontal" method="post">

<<<<<<< HEAD
                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Subject</label>
=======
                                             <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">School</label>
>>>>>>> 78f5feb82d4895cf569f24b3ac721306408dd135
                                                <div class="col-sm-10">
                                                    <select name="school" required="" class="form-control">

                                                        <option selected disabled>Choose subject</option>
                                                        <!-- selected from the database -->
                                                        <?php
                                                        $getsch_id = mysqli_query($conn,"SELECT subcode,subname FROM subject");
                                                        if(mysqli_num_rows($getsch_id)==0){
                                                            $nores = "No subject";
                                                        }

                                                        while ($row = mysqli_fetch_array($getsch_id)) {
                                                        ?>
                                                        <option value="<?php echo $row['subcode'];?>">
                                                            <?php
                                                            echo $row['subname']; ?></option>
                                                        <?php } 
                                                            if($nores=="No subject"){
                                                                echo "<option>No Subject Added</option>";
                                                            }
                                                        ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Score</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="score" class="form-control"
                                                         required="required">
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