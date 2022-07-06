<?php
session_start();

include('includes/config.php');
// error_reporting(0);
$user_id = $_SESSION['user_id'];
//get user details
$ret=mysqli_query($conn,"select * from users where sno='$user_id'");
$row=mysqli_fetch_array($ret);

//get user school assign
$school = $row['sch_id'];
// echo $school;
// exit();
$sql = "select * from school where regno='$school'";
$ret2=mysqli_query($conn,$sql);
if(mysqli_num_rows($ret2) >0){
 $row2 = mysqli_fetch_array($ret2);
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//get user subject
$sch = "select * from subject_has_users where users_sno='$user_id'";
$ret3=mysqli_query($conn,$sch);
if(mysqli_num_rows($ret3) >0){
 $row3 = mysqli_fetch_array($ret3);
}else{
    echo "Error: " . $sch . "<br>" . mysqli_error($conn);
}

//user sub code to find sub name
$subcode = $row3['subject_subcode'];
//get user subject
$sub_nam = "select * from subject where subcode='$subcode'";
$ret4=mysqli_query($conn,$sub_nam);
if(mysqli_num_rows($ret4) >0){
 $row3 = mysqli_fetch_array($ret4);
}else{
    echo "Error: " . $sub_nam . "<br>" . mysqli_error($conn);
}

if (isset($_POST['submit'])) {
$f_name=strtolower($_POST['firstname']);
$m_name=$_POST['middlename'];
$l_name=$_POST['lastname'];

$sql = "UPDATE users SET f_name='$f_name',m_name='$m_name',l_name='$l_name' WHERE sno='$user_id'";

if (mysqli_query($conn, $sql)) {
    $msg = "Record updated successfully";
} else {
    $error = "Please try again";
}

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS Admin| User Profile </title>
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
                                <h2 class="title">User Profile</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                                    <li class="active">User profile</li>
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
                                                <label for="default" class="col-sm-2 control-label">Firstname/Username</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="firstname" class="form-control" value="<?php echo $row['f_name']; ?>">
                                                </div>
                                                     <label for="default" class="col-sm-2 control-label">Middlename</label>

                                                <div class="col-md-4">
                                                    <input type="text" name="middlename" class="form-control" value="<?php echo $row['m_name']; ?>" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Last Name</label>
                                                <div class="col-sm-4">
                                                    <input type="text" name="lastname" class="form-control" value="<?php echo $row['l_name']; ?>" >
                                                </div>
                                                <label for="default" class="col-sm-2 control-label">School</label>
                                                <div class="col-md-4">
                                                    <input type="text" name="" class="form-control" value="<?php echo $row2['schoolname']; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Sex</label>
                                                <div class="col-sm-10">
                                                    <label for="default"><?php echo $row['sex']; ?></label>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Role</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" value="<?php echo $row['role']; ?>" readonly>
                                                </div>
                                                <div class="col-md-2">
                                                     <label for="default" class="col-sm-2 control-label">Assign Subject</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" name="lastname" class="form-control" value="<?php echo $row3['subname']; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
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
</body>

</html>