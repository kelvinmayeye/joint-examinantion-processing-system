<?php
//error_reporting(0);
include('includes/config.php');

if(isset($_POST['login'])){
$uname= strtolower($_POST['username']);
$password=md5($_POST['password']);

$sql_ad  ="SELECT sno,username,password,role FROM users WHERE username='$uname' and password='$password'";
$result_ad = mysqli_query($conn, $sql_ad);

        $row = mysqli_fetch_assoc($result_ad);  
        $count = mysqli_num_rows($result_ad);  
          
        if($count == 1){
            $role = $row['role'];
            $teacher_no = $row['sno'];

            $user_sub  ="SELECT subject_subcode FROM subject_has_users WHERE users_sno='$teacher_no'";
            $result_user_sub = mysqli_query($conn, $user_sub);
            $row2 = mysqli_fetch_assoc($result_user_sub); 


            switch ($role) {
            case "admin":
                 session_start();
                 $_SESSION['alogin']=$_POST['username'];
                 $_SESSION['role'] = $role;
                 $_SESSION['user_id'] = $row['sno'];
                 //redirect to the next page
            header('Location: dashboard.php');

            break;
            case "teacher":
                session_start();
                 $_SESSION['alogin']=$_POST['username'];
                 $_SESSION['role'] = $role;
                 $_SESSION['has_subject'] = $row2['subject_subcode'];
                 $_SESSION['user_id'] = $row['sno'];
                 //redirect to the next page
            header('Location: dashboard.php');
            break;
            case "head":
                session_start();
                 $_SESSION['alogin']=$_POST['username'];
                 $_SESSION['role'] = $role;
                 $_SESSION['user_id'] = $row['sno'];

                 //redirect to the next page
            header('Location: dashboard.php');
            case "academic":
                session_start();
                 $_SESSION['alogin']=$_POST['username'];
                 $_SESSION['role'] = $role;
                 $_SESSION['user_id'] = $row['sno'];
                 
                 //redirect to the next page
            header('Location: dashboard.php');
            break;
            default:
                $msg= "sorry contact the admin";
            }

        }else{
            $msg = "Wrong username or password";
        }

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="">
        <div class="main-wrapper">

            <div class="">
                <div class="row">
 <h1 align="center">Joint Result Management System</h1>
                    
                         <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <section class="section">
                            <div class="row mt-40">
                                <div class="col-md-10 col-md-offset-1 pt-50">

                                    <div class="row mt-30 ">
                                        <div class="col-md-11">
                                            <div class="panel">
                                                <div class="panel-heading text-center">
                                                    <div class="panel-title text-center">
                                                        <h4>Login</h4>
                                                    </div>

                                                            <?php echo @$msg; ?>
                                                </div>
                                                <div class="panel-body p-20">

                                                    <form class="form-horizontal" method="post">
                                                    	<div class="form-group">
                                                    		<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                                    		<div class="col-sm-10">
                                                    			<input type="text" name="username" class="form-control" id="inputEmail3" placeholder="UserName">
                                                    		</div>
                                                    	</div>
                                                    	<div class="form-group">
                                                    		<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                    		<div class="col-sm-10">
                                                    			<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                                                    		</div>
                                                    	</div>
                                                    
                                                        <div class="form-group mt-20">
                                                    		<div class="col-sm-offset-2 col-sm-10">
                                                           
                                                    			<button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Login<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                    		</div>
                                                    	</div>
                                                    </form>

                                            

                                                 
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                            <p class="text-muted text-center"><small><a href="index.php">Home</a><br>Joint Result Management System</small></p>
                                        </div>
                                        <!-- /.col-md-11 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </section>

                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){

            });
        </script>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
