<?php
session_start();
//error_reporting(0);
include('includes/config.php');
//the fetch query
$username = $_SESSION['alogin'];



//dont select sir the admin
$query = mysqli_query($conn,"SELECT * FROM users WHERE username !='$username'");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
   $role = $_POST['role'];

   $update_sch = mysqli_query($conn,"UPDATE users SET role='$role' WHERE sno='$id'");
   if($update_sch){
    header("location: view-users.php?success=ok");
   }
  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeprs | View Usersl</title>
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
                                <h2 class="title">View Users</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> Users</li>
                                    <li class="active">View Users</li>
                                </ul>
                            </div>

                        </div>
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
                                                <h5>View User Information</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body p-20">

                                            <table id="example" class="display table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>SNO</th>
                                                       
                                                        <th>Fullname</th>
                                                        <th>Sex</th>
                                                        <th>School Reg No</th>
                                                        <th>Role</th>
                                                        <th>Subject</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                        
                                                        <th>S/NO</th>
                                                        <th>Fullname</th>
                                                        <th>Sex</th>
                                                        <th>School Reg No</th>
                                                        <th>Role</th>
                                                        <th>Subject</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>


                                                    <?php
                                                $NO = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                        $user_id = $row['sno'];
                                                    $find_asg_sub = mysqli_query($conn,"SELECT * FROM subject_has_users WHERE users_sno='$user_id'");
                                                    $get_sub_id = mysqli_fetch_array($find_asg_sub);
                                                        $sub_code = $get_sub_id['subject_subcode'];
                                                    $find_sub_name = mysqli_query($conn,"SELECT * FROM subject WHERE subcode='$sub_code'");
                                                    $sub_name = mysqli_fetch_array($find_sub_name);
                
                                                ?>
                                                    <tr>
                                                        <td><?php echo $NO;?></td>
                                                        <td><?php echo $row['f_name'].' '.$row['m_name'].' '.$row['l_name'];?></td>
                                                        <td><b><?php echo $row['sex'];?></b></td>
                                                        <td><?php echo $row['sch_id'];?></td>
                                                        <td><?php echo $row['role'];?></td>
                                                        <td><?php echo $sub_name['subname']; ?></td>
                                                        <td style="text-align: center;"><a href="" data-toggle="modal"
                                                                data-target="#myModal<?php echo $row['sno']; ?>"> <i
                                                                    class="fa fa fa-edit mr-3"></i></a>
                                                        </td>
                                                    </tr>


                                                    <!---------------Modal---------------------->


                                                    <div class="modal" id="myModal<?php echo $row['sno']; ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <h4 class="modal-title" id="modalLabel">Update User
                                                                    </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="" method="POST">
                                                                        <div class="row">
                                                                        <div class="col-md-8">
                                                                            <input type="radio" name="id" value="<?php echo $row['sno']; ?>" hidden="" checked> 
                                                                            <input type="text" name="sch_name" readonly class="form-control" value="<?php echo $row['f_name'].' '.$row['m_name'].' '.$row['l_name'];?>" >                                                                        
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <select name="role" class="form-control">
                                                        <option selected value="<?php echo $row['role']; ?>" hidden><?php echo $row['role']; ?></option>
                                                        <option value="admin">Admin</option>
                                                        <option value="head">Head of School</option>
                                                        <option value="academic">Academic</option>
                                                        <option value="teacher">Teacher</option>
                                                    </select>
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