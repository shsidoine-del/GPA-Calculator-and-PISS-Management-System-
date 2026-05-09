<?php

//GPA Dashboard 

session_start();

include "connect.php";

$timeout = 120;

	if (!isset($_SESSION["username"])){
		header("Location: loginCal.php");
		exit();
	}
	
	$username = $_SESSION["username"];
	$programme = $_SESSION["programme"];

$sqlStudent = "SELECT student.Student_ID 
FROM student 
INNER JOIN users ON student.user_id= users.user_id 
WHERE users.username = ?";

$stmtStudent = $conn->prepare($sqlStudent);

$stmtStudent->bind_param("s", $username);

$stmtStudent->execute();

$studentResult = $stmtStudent->get_result();

if($studentResult->num_rows > 0){
	$studentRow = $studentResult->fetch_assoc();
	$studentID - $studentRow['Student_ID'];
	
	//Fetch student Results
	$sql = "SELECT Course_ID, Grade FROM result WHERE Student_ID =?";
	
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $studentID);
	$stmt->execute();
	
	$result = $stmt->get_result();
} else{
	die("Student record not found");
}

//GPA conversion and calculation
$totalPoints =0;
$totalCourse = 0;


?>

<!DOCTYPE html>
<html>
<head>
	<title> Dashboard </title>
	
<style>
		body{
			font-family: Times New Roman;
			background-color: #CCEAFF;
		}
		
		.container{
			width: 700px;
			margin: 50px;
			background-color: white;
			padding: 30px;
			border-radius: 10px;
		}
		
		table{
			width:100%;
			margin-top:20px;
		}
		
		table, th, td{
			border: 1px solid black;
		}
		
		th,td{
			padding: 10px;
			text-align: center;
		}
		
		th{
			background-color: lightgreen;
		}

</style>

</head>
<body>

<div class="container">

	<h1> Welcome <?php echo $_SESSION["username"];?></h1>
	
	<p> Programme: <?php echo $_SESSION["programme"]; ?></p>
	
	<h2> Your GPA Results</h2>
	
	<table>
		<tr>
			<th>Course ID</th>
			<th>Grade</th>
			<th>GPA</th>
		</tr>
		
<?php
	
//GPA Conversion
	
	while($row = $result->fetch_assoc()) {
		
		if($row['Grade'] == "A"){
			
			$gpaValue = 4.0;
	
		}elseif($row['Grade']== "B"){
		
			$gpaValue = 3.0;
		
		}elseif($row['Grade'] == "C"){
		
			$gpaValue = 2.0;
		
		}elseif($row['Grade'] == "D"){
		
			$gpaValue = 1.0;
		
		}else{
			
			$gpaValue = 0.0;
		}
	
		$totalPoints += $gpaValue;
		$totalCourse++;
	
	
		echo "<tr>";
			echo "<td>". htmlspecialchars($row['Course_ID']) . "</td>";
			echo "<td>". htmlspecialchars($row['Grade'])."</td>";
			echo "<td>". number_format($gpaValue, 2) . "</td>";
		echo "</tr>";
	}

		if($totalCourse > 0){
			
			$finalGPA = $totalPoints / $totalCourse;
			
			echo "<tr>";
			echo "<td colspan='2'><strong> Final GPA </strong></td>";
			echo "<td><strong>" . number_format($finalGPA, 2) . "</strong></td>";
			echo "</tr>";
		}
	?>
	
	</table>
	
	<br>
	
	<a href = "logout.php"> Logout</a>
	
	</div>
	
</body>
</html>