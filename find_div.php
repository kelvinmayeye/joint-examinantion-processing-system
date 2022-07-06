<?php 
session_start();
//error_reporting(0);
include('includes/config.php');

$select_sch = mysqli_query($conn,"SELECT sid FROM student");
while($row = mysqli_fetch_array($select_sch)){
	$student_id = $row['sid'];

	$query = mysqli_query($conn,"SELECT AVG(score),SUM(score) FROM subject_has_student WHERE student_sid = '$student_id'");
	$row2 =mysqli_fetch_array($query);
	$sum = $row2['SUM(score)'];
	$avg = $row2['AVG(score)'];

	echo "Sum of score for ".$row['sid']." = ".$row2['AVG(score)']."<br>";


	//get total student 	

}


?>