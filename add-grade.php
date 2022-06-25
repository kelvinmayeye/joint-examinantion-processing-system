<?php

include('includes/config.php');

// session_start();

// if(!isset($_SESSION['user_status']) or $_SESSION['user_status'] != "admin"){
//  header('location: ../index.php');
// }


//this page variables
// $p_year = $_GET['y'];
// $p_term = $_GET['t'];
// $p_name = "project_".$p_term."_".$p_year;
// $error = "";
// $notes = "";


// //used for navigation menu
// $logout_path = "../index.php";
// $active = array("", "", "current", "", "", "");

//form data variables
$grades = array("A","B", "C", "D", "F");
$start_values = array(75, 65, 45, 30, 0);
$end_values = array(100, 74, 64, 44, 29);
$end_values = array(1, 2, 3, 4, 5);
$comments = array("Vizuri Sana", "Vizuri", "Wastani",  "Dhaifu", "Mbaya");


// if($_SERVER['REQUEST_METHOD'] == "POST"){
//     //get all start values
//     $start_values[0] = $_POST['a_start'];
//     $start_values[1] = $_POST['b1_start'];
//     $start_values[2] = $_POST['b2_start'];
//     $start_values[3] = $_POST['c_start'];
//     $start_values[4] = $_POST['d_start'];
//     $start_values[5] = $_POST['e_start'];
//     $start_values[6] = 0;
    
//     //get all end values
//     $end_values[0] = 100;
//     $end_values[1] = $_POST['b1_end'];
//     $end_values[2] = $_POST['b2_end'];
//     $end_values[3] = $_POST['c_end'];
//     $end_values[4] = $_POST['d_end'];
//     $end_values[5] = $_POST['e_end'];
//     $end_values[6] = $_POST['f_end'];
    
//     //get all comments
//     $comments[0] = $_POST['a_comment'];
//     $comments[1] = $_POST['b1_comment'];
//     $comments[2] = $_POST['b2_comment'];
//     $comments[3] = $_POST['c_comment'];
//     $comments[4] = $_POST['d_comment'];
//     $comments[5] = $_POST['e_comment'];
//     $comments[6] = $_POST['f_comment'];
    
    
//     for($i = 0; $i <=6; $i++){
//         if($comments[$i] == ""){
//             $error .= "Missing comments at grade '".$grades[$i]."'<br><br>";
//             break;
//         }
//     }
//     for($i = 0; $i <=6; $i++){
//         if($start_values[$i] < 0 or $end_values[$i] > 100 or $start_values[$i] > 100 or $end_values[$i] < 0 ){
//             $error.= "Invalid input values at '".$grades[$i]."' (out of range 0 - 100)<br><br>";
//             break;
//         }
//     }
//     for($i = 0; $i <=5; $i++){
//         if($start_values[$i] != $end_values[$i+1] + 1 or $start_values[$i] <= $end_values[$i+1]){
//             $error.= "The Start-value of grade '".$grades[$i]."' should be greater than End-value of grade '".$grades[$i+1]."', and they should differ by one";
//             break;
//         }
//     }

//     if($error == ""){
//         $conn = connect_project($p_name);

//         $sql = "insert into grades values('".$grades[0]."', ".$start_values[0].", ".$end_values[0].", '".$comments[0]."');";
//         for($i = 1; $i<=6; $i++)
//         $sql .= "insert into grades values('".$grades[$i]."', ".$start_values[$i].", ".$end_values[$i].", '".$comments[$i]."');";
        
//         if(mysqli_multi_query($conn, $sql)){
//             header('location: projectGrades.php?t='.$p_term.'&y='.$p_year);
//         }
//         else{
//             $error = "Action Failed ! <br> unable to save grades.";
//         }
        
//         mysqli_close($conn);
//     }

// }

?>
<html>
    <head>
        <title>Admin SAPRGS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/mystyle.css" rel="stylesheet">
    </head>
<body>
<?php
displayNavMenu($logout_path, "", $active); 
 ?>

<div class="container" style="background-color: #BBB; margin-top: 100px; height: 80%; width: 90%; border-radius: 10px; pading: 0; ">
<h2 style="color: #000; padding: 10px 5px; margin: 10px auto; border-bottom: 5px solid #000; text-align: right;">
<span style="margin-right: 50px; float: left; color: #DDD; font-size: 12pt; background-color: #050; padding: 3px; border-radius: 5px;">
    <a href="<?php echo "projects.php";?>" style="font-size: 13pt; text-decoration: none;">
        <?php echo "Projects";?>
    </a>&gt;
    <a href="<?php echo "openProject.php?t=".$p_term."&y=".$p_year;?>" style="font-size: 13pt; text-decoration: none;">
        <?php echo "Project  ".$p_term.", ".$p_year." ";?>
    </a>&gt;
    <a href="<?php echo "projectGrades.php?t=".$p_term."&y=".$p_year;?>" style="font-size: 13pt; text-decoration: none;">
        <?php echo "Project Grades";?>
    </a>&gt; Define New Grades
</span>
<?php echo "Defining Grades.."; ?>
</h2>
<div class="row">
<div class="col-md-7">
<p style="color: #000; font-weight: bold;">This is just a suggestion, values shown can be changed if desired. Click 'Save grades' when you are satisfied.</p>
<?php 
    displayDefineProjectGradesForm(array($p_term, $p_year), $start_values, $end_values, $comments);
?>
</div>
<div class="col-md-5">
    <div style="height: 50%; width: 100%; padding: 10px;">
        <p style="font-weight: bold; color: red;"><?php echo $error; ?></p>
        <h3 style="color: #005500;"><?php echo $notes; ?></h3>
    </div>
</div>
</div> <!-- end row   -->

</div> <!-- end container -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>