<?php
session_start();
//error_reporting(0);
include('includes/config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jeprs | Best ten</title>
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
                                <h2 class="title">School Performance</h2>

                            </div>

                            <!-- /.col-md-6 text-right -->
                        </div>
                        <!-- /.row -->
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li> School</li>
                                    <li class="active">View School Results</li>
                                </ul>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->

                    <section class="section">
                        <div class="container-fluid">

                            <h1 align="center">JOINT EXAMINATION RESULTS</h1>
                            <h3 align="center">Available centers</h3>

                            <div class="content justify-center text-center">
                                <form action="" method="POST">
                                    <select name="school" required="true" class="" required="">
                                    <option selected disabled hidden>Choose school</option>
                                     <!-- selected from the database -->
                                      <?php
                                      $getsch_id = mysqli_query($conn,"SELECT regno,schoolname      FROM school");
                                      while ($row = mysqli_fetch_array($getsch_id)) {
                                      ?>
                                    <option value="<?php echo $row['regno'];?>">
                                      <?php echo $row['schoolname']; ?></option>
                                     <?php } ?>
                                </select> 

                                <input type="submit" name="search" value="show result" class="btn btn-primary">
                                </form>
                            </div>

                            <?php if(isset($_POST['search'])){ 
                                @$school = $_POST['school'];
                                
                                //the fetch query
                                $query = mysqli_query($conn,"SELECT * FROM student WHERE sch_id='$school'");

                                ?>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <div class="panel-title">
                                                <h5>View School Results</h5>
                                            </div>
                                        </div>
                                        <div class="panel-body p-20">

                                            <table class="display table table-striped table-bordered"
                                                cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Index No</th>
                                                        <th>Student Full Name</th>
                                                        <th>Sex</th>
                                                        <th>AGGT</th>
                                                        <th>Division</th>
                                                        <th>Detailed Subject Results</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Index No</th>
                                                        <th>Student Full Name</th>
                                                        <th>Sex</th>
                                                        <th>AGGT</th>
                                                        <th>Division</th>
                                                        <th>Detailed Subject Results</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>


                                                    <?php
                                                //$NO = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                    $stu_id = $row['sid'];
                                                    $find_point = mysqli_query($conn,"SELECT * FROM result_processing WHERE stu_id ='$stu_id'");
                                                    $row2 = mysqli_fetch_array($find_point);
                
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row['sid'];?></td>
                                                         <td><?php echo $row['f_name']." ".$row['m_name']." ".$row['l_name'];?></td>
                                                         <td><?php echo $row['sex'];?></td>
                                                        <td><?php echo $row2['div_point']; ?></td>
                                                        <td>
                                                            <?php
                                                            if ($row2['div_point'] >= 7 AND $row2['div_point'] <= 17) {
                                                                echo "I";
                                                            }else if ($row2['div_point'] >= 18 AND $row2['div_point'] <= 21) {
                                                                echo "II";
                                                            }else if ($row2['div_point'] >= 22 AND $row2['div_point'] <= 25) {
                                                                echo "III";
                                                            }else if ($row2['div_point'] >= 26 AND $row2['div_point'] <= 33) {
                                                                echo "IV";
                                                            }else if ($row2['div_point'] >= 34 AND $row2['div_point'] <= 55) {
                                                                echo 0;
                                                            }

                                                            ?>
                                                        </td>
                                                         <td></td>
                                                        
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
                            <?php } ?>
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