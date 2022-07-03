<?php
session_start();
//error_reporting(0);
include('includes/config.php');
//the fetch query
$query = mysqli_query($conn,"SELECT * FROM subject");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
   $sub_nam= $_POST['sub_nam'];

   $update_sub = mysqli_query($conn,"UPDATE subject SET subname='$sub_nam' WHERE subcode='$id'");
   if($update_sub){
    header("location: view-subject.php?success=ok");
   }
}

if (isset($_POST['yes'])) {
    $id = $_POST['id'];

   $del_sub = mysqli_query($conn,"DELETE FROM subject WHERE subcode='$id'");
   if($del_sub){
    echo "Deleted";
    header("location: view-subject.php?del=ok");
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeprs | View Subjects</title>
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
                                <h2 class="title">View All Subjects</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> Subjects</li>
                                    <li class="active">View Subjects</li>
                                </ul>
                            </div>

                        </div>


                        <?php 
                        @$success = $_GET['success'];
                        if($success === "ok"){
                         ?>
                        <div class="row" style="margin-top: 20px;">
                            <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done! </strong>Subject Was updated</div>
                        </div>
                    <?php } ?>


                    <?php 
                        @$del = $_GET['del'];
                        if($del === "ok"){
                         ?>
                        <div class="row" style="margin-top: 20px;">
                            <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done! </strong>Subject Was Deleted</div>
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
                                                <h5>View Subjects Information</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body p-20">

                                            <table id="example" class="display table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>SNO</th>
                                                        <th>Subject Code</th>
                                                        <th>Subject Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                        
                                                        <th>SNO</th>
                                                        <th>Subject Code</th>
                                                        <th>Subject Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>


                                                    <?php
                                                $NO = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                
                                                ?>
                                                    <tr>
                                                        <td><?php echo $NO;?></td>
                                                        <td><?php echo $row['subcode'];?></td>
                                                        <td><b><?php echo $row['subname'];?></b></td>
                                                        <td style="text-align: center;"><a href="" data-toggle="modal"
                                                                data-target="#myModal<?php echo $row['subcode']; ?>"> <i
                                                                    class="fa fa fa-edit mr-3"></i></a>&nbsp;&nbsp;&nbsp;

                                                                    <a href="" data-toggle="modal"
                                                                data-target="#myModaldel<?php echo $row['subcode']; ?>"> <i
                                                                    class="fa fa fa-trash mr-3"></i></a>
                                                        </td>
                                                    </tr>


                                                    <!---------------Modal---------------------->


                                                    <div class="modal" id="myModal<?php echo $row['subcode']; ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <h4 class="modal-title" id="modalLabel">Update Subject name
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="" method="POST">
                                                                        <div class="row">
                                                                        <div class="col-md-8">
                                                                            <input type="radio" name="id" value="<?php echo $row['subcode']; ?>" hidden="" checked> 
                                                                            <input type="text" name="sub_nam" class="form-control" value="<?php echo $row['subname']; ?>" >                      
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                                    </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!------------------------------------------->


                                                    <!---------------Modal for DELETE------------->


                                                    <div class="modal" id="myModaldel<?php echo $row['subcode']; ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <!-- <h4 class="modal-title" id="modalLabel">Update Subject name
                                                                    </h4> -->
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="" method="POST">
                                                                        <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="radio" name="id" value="<?php echo $row['subcode']; ?>" hidden="" checked> 
                                                                            <h3>Are you sure?<br>you want to delete <?php echo $row['subname']; ?></h3>                      
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="submit" name="yes" class="btn btn-danger" value="Yes">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                                    </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!------------------------------------------->



                                                    <?php $NO=$NO+1;} ?>


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