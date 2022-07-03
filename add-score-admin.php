<?php
session_start();
//error_reporting(0);
include('includes/config.php');
$role = $_SESSION['role'];


 $query = mysqli_query($conn,"SELECT * FROM subject_has_student");   

if(isset($_POST['add_score'])){
    $sub_code = $_POST['sub_code'];
    $score = $_POST['subj_score'];
    $stud_id = $_POST['stud_id'];

    echo $sub_code;

    die();

    $update_score = mysqli_query($conn,"UPDATE subject_has_student SET score='$score' WHERE subject_subcode='$sub_code' AND student_sid='$stud_id'");
    if($update_score){
        header("location: add-score-admin.php?msg=score added");
    }else{
        header("location: add-score-admin.php?error=Sorry please Try Again");
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeprs | View Student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css" />
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <style>
    .errorWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }

    .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    }
    </style>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <?php include('includes/topbar.php');?>
        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar.php');?>

                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Students Scores Management</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> Students</li>
                                    <li class="active">score</li>
                                </ul>
                            </div>

                        </div>
                                        <?php 
                                        $msg = @$_GET['msg'];
                                        $error = @$_GET['error'];
                                        if(@$msg){?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Successfull! </strong><?php echo htmlentities($msg); ?>
                                        </div><?php } 
                                        else if(@$error){?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Failed! </strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->

                    <section class="section">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>Manage Students Scores</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body p-20">

                                            <table id="example" class="display table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Reg Number</th>
                                                        <th>Fullname</th>
                                                        <th>Sex</th>
                                                        <th>School</th>
                                                        <th>Subject</th>
                                                        <th>Subject Score</th>
                                                        <th>Action</th>

                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Reg Number</th>
                                                        <th>Fullname</th>
                                                        <th>Sex</th>
                                                        <th>School</th>
                                                        <th>subject</th>
                                                        <th>Subject Score</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>


                                                    <?php
                                                //$NO = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $student_id=$row['student_sid'];
                                                    $subject_subcode = $row['subject_subcode'];

                                                 $find_subj_name = mysqli_query($conn,"SELECT * FROM subject WHERE subcode='$subject_subcode'");
                                                     $subname = mysqli_fetch_array($find_subj_name);

                                                    $find_stu_id = mysqli_query($conn,"SELECT * FROM student WHERE sid='$student_id'");
                                                        $row2 = mysqli_fetch_array($find_stu_id);
                                                        $sch_id = $row2['sch_id'];

                                                    $find_sch_name = mysqli_query($conn,"SELECT schoolname FROM school WHERE regno='$sch_id'");
                                                        $row3 = mysqli_fetch_array($find_sch_name);
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['student_sid'];?></td>
                                                        <td><?php echo $row2['f_name']." ".$row2['m_name']." ".$row2['l_name'];?>
                                                        </td>
                                                        <td><?php echo $row2['sex'];?></td>
                                                        <td><?php echo $row3['schoolname'];?></td>
                                                        <td><?php echo $subname['subname']; ?></td>
                                                        <td><?php echo $row['score']; ?></td>

                                                        <td style="text-align: center;"><a href="" data-toggle="modal"
                                                                data-target="#myModal<?php echo $row['student_sid']; ?>"> <i
                                                                    class="fa fa fa-edit mr-3"></i></a>

                                                                    <a href="hfjf.php?<?php echo $row['subject_subcode']; ?>" > <i
                                                                    class="fa fa fa-edit mr-3"></i></a>

                                                                    <!---------------Modal---------------------->


                                                    <div class="modal" id="myModal<?php echo $row['student_sid']; ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <h4 class="modal-title" id="modalLabel">Add/Update score
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="" method="POST">
                                                                        <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="radio" checked  name="stud_id" value="<?php echo $row['student_sid']; ?>" hidden="true" >
                                                                            <input type="radio" checked  name="sub_code" value="<?php echo $row['subject_subcode']; ?>" hidden="true" >
                                                                            <label><?php echo $row2['f_name']." ".$row2['m_name']." ".$row2['l_name']; ?></label>

                                                                            <?php echo $row['subject_subcode']; ?>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input class="form-control" type="text" name="subj_score"
                                                                            placeholder="Student Score" maxlength="3" value="<?php echo $row['score']; ?>" >
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="submit" name="add_score" class="btn btn-primary" value="Add Score">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                                    </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!------------------------------------------->
                                                        </td>
                                                    </tr>


                                                    


                                                    <?php } ?>


                                                </tbody>
                                            </table>





                                            <!-- /.col-md-12 -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-6 -->


                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.section -->

    </div>
    <!-- /.main-page -->



    </div>
    <!-- /.content-container -->
    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/pace/pace.min.js"></script>
    <script src="js/lobipanel/lobipanel.min.js"></script>
    <script src="js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="js/prism/prism.js"></script>
    <script src="js/DataTables/datatables.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>
    <script>
    $(function($) {
        $('#example').DataTable();

        $('#example2').DataTable({
            "scrollY": "300px",
            "scrollCollapse": true,
            "paging": false
        });

        $('#example3').DataTable();
    });
    </script>
</body>

</html>