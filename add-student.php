<?php
session_start();
//error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit'])){

    foreach ($_POST as $key => $value) {
        echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";

    }
die();
//$regno=$_POST['regno'];
$school=$_POST['school'];
$f_name=$_POST['firstname'];
$m_name=$_POST['middlename'];
$l_name=$_POST['lastname'];
$gender=$_POST['sex']; 
$tempregno = mt_rand(1, 999);

$sql="INSERT INTO  student(sid,sch_id,f_name,m_name,l_name,sex) VALUES('$tempregno','$school','$f_name','$m_name','$l_name','$gender')";
if(mysqli_query($conn,$sql)){
    $last_id = mysqli_insert_id($conn);

    $msg = 'Added Successfully';
}else{
    die("Stoooop");
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
    <title>SMS Admin| Student Admission< </title>
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
                                <h2 class="title">Student Admission</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>

                                    <li class="active">Student Admission</li>
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
                                            <h5>Fill the Student info</h5>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(@$msg){?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done!</strong><?php echo htmlentities($msg); ?>
                                        </div><?php } 
                                        else if(@$error){?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Failed !</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                        <form  action="" class="form-horizontal" method="post">
                                            <!-- Should provide Registration number to students -->
                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Registration
                                                    No</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="" class="form-control" id="fullanme"
                                                        readonly value="system provide number automatically">
                                                </div>
                                                <div class="col-md-1">
                                                    <label for="default" class="col-sm-2 control-label">School</label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select name="school" required="" class="form-control">
                                                        <option selected disabled>Choose school</option>
                                                        <!-- selected from the database -->
                                                        <?php
                                                        $getsch_id = mysqli_query($conn,"SELECT regno,schoolname      FROM school");

                                                        while ($row = mysqli_fetch_array($getsch_id)) {
                                                        ?>
                                                        <option value="<?php echo $row['regno'];?>">
                                                            <?php echo $row['schoolname']; ?></option>
                                                        <?php } ?>
                                                    </select> 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">First Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="firstname" class="form-control" id="email"
                                                        required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Second Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="middlename" class="form-control" id="email"
                                                        required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Last Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="lastname" class="form-control" id="email"
                                                        required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Gender</label>
                                                <div class="col-sm-10">
                                                    <input type="radio" name="sex" value="M" required="required"
                                                        checked=""> Male <input type="radio" name="sex" value="F"
                                                        required="required"> Female
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <input type="checkbox" name="name1" value="name1">
                                                <input type="checkbox" name="name2" value="name2">
                                                <input type="checkbox" name="name3" value="name3">
                                                <input type="checkbox" name="name4" value="name4">
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="submit"
                                                        class="btn btn-primary">Add</button>
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