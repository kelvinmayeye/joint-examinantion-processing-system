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

	echo "Sum of score for ".$row['sid']." = ".$row2['SUM(score)']."<br>";

	$insert_result = mysqli_query($conn,"INSERT INTO result_processing (stu_id,sum,avg) VALUES ('$student_id','$sum','$avg')");

}


$select_sch = mysqli_query($conn,"SELECT sid FROM student");
while($row = mysqli_fetch_array($select_sch)){
	$student_id = $row['sid'];

$query = mysqli_query($conn,"SELECT score FROM subject_has_student WHERE student_sid = '$student_id' ORDER BY score DESC");
$foo = 0;
$stack = array();
while ($row = mysqli_fetch_array($query)) {
	$foo++;
		if($foo <= 7){
		$mark = $row['score'];
		if($mark >= 75 AND $mark<=100){
			echo $mark." A<br>";
			array_push($stack, 1);
		}
		if($mark >= 65 AND $mark<=74){
			echo $mark." B<br>";
			array_push($stack, 2);
		}
		if($mark >= 45 AND $mark<=64){
			echo $mark." C<br>";
			array_push($stack, 3);
		}
		if($mark >= 30 AND $mark<=44){
			echo $mark." D<br>";
			array_push($stack, 4);
		}
		if($mark >= 0 AND $mark<=29){
			echo $mark." F<br>";
			array_push($stack, 5);
		}		
	}
}

echo "<br> division total points = ".array_sum($stack)."<br>";

$division_point = array_sum($stack);
$add_div = mysqli_query($conn,"UPDATE result_processing SET div_point = '$division_point' WHERE stu_id = '$student_id'");

}


?>
