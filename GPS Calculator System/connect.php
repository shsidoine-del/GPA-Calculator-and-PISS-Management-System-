<?php 
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$dbname = "gpa_calculator";

//Creating an SQL Connection 

$conn = new mysqli($host, $user, $password, $dbname); 

//Testing Connection 
if($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
}

echo "$dbname connected successfully!";
?>