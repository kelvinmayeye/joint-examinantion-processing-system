<?php
session_start();

include('includes/config.php');
error_reporting(0);
if(isset($_POST['submit'])){
$schoolid=$_POST['schoolid'];
$f_name=$_POST['firstname']; 
$m_name=$_POST['middlename'];
$l_name=$_POST['lastname'];
$sex=$_POST['optionsRadiosinline'];
$username=$_POST['uname'];
$password=md5($_POST['pass']);
$role=$_POST['role'];
$sub_code=$_POST['sub_code'];

$sql="INSERT INTO  users(sch_id,f_name,m_name,l_name,sex,username,password,role) VALUES('$schoolid','$f_name','$m_name','$l_name','$sex','$username','$password','$role')";
if(mysqli_query($conn,$sql)){

    $last_id = mysqli_insert_id($conn);

    $subj_has_user = "INSERT INTO subject_has_users(subject_subcode, users_sno) VALUES ('$sub_code','$last_id')";

    if(mysqli_query($conn,$subj_has_user)){
        
    }

    $msg = 'User were added';
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
    <title>SMS Admin| User Admission< </title>
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
                                <h2 class="title">User Registration</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                                    <li class="active">User Registration</li>
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
                                            <h5>Fill the User information</h5>
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

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">First Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="firstname" class="form-control"
                                                        id="fullanme" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Second Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="middlename" class="form-control"
                                                        id="fullanme" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Last Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="lastname" class="form-control"
                                                        id="fullanme" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">School</label>
                                                <div class="col-sm-10">
                                                    <select name="schoolid" required="" class="form-control">
                                                        <option selected disabled>Choose school</option>
                                                        <!-- selected from the database -->
                                                        <?php
                                                        $getsch_id = mysqli_query($conn,"SELECT regno,schoolname FROM school");

                                                        while ($row = mysqli_fetch_array($getsch_id)) {
                                                        ?>
                                                        <option value="<?php echo $row['regno'];?>">
                                                            <?php echo $row['schoolname']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Sex</label>
                                                <div class="col-sm-10">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadiosinline"
                                                            id="optionsRadios3" value="M" checked> Male
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="optionsRadiosinline"
                                                            id="optionsRadios4" value="F"> Female
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">User Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="uname" class="form-control" id="fullanme"
                                                        required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="pass" class="form-control"
                                                        id="fullanme" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Role</label>
                                                <div class="col-sm-4">
                                                    <select name="role" class="form-control">
                                                        <option selected disabled hidden>Choose user role</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="head">Head of School</option>
                                                        <option value="academic">Academic</option>
                                                        <option value="teacher">Teacher</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                     <label for="default" class="col-sm-2 control-label">Assign Subject</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <select name="sub_code" required="" class="form-control">
                                                        <option selected disabled>Select Subject</option>
                                                        <!-- selected from the database -->
                                                        <?php
                                                        $getsch_id = mysqli_query($conn,"SELECT subcode,subname FROM subject");

                                                        while ($row = mysqli_fetch_array($getsch_id)) {
                                                        ?>
                                                        <option value="<?php echo $row['subcode'];?>">
                                                            <?php echo $row['subname']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                        </div>
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