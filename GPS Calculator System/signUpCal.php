<?php
//GPA Calculator System Sign UP
include 'connect.php';

$username =" ";
$email = " ";
$password = " ";
$confirm = " ";
$programme = " ";

$errors = [];

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		//Getting data from the form 
		if(isset($_POST['username'])){
			$username = htmlspecialchars(trim($_POST["username"])); 
		}
		
		if(isset($_POST['email'])){
			$email = htmlspecialchars(trim($_POST["email"]));
		}
		
		if(isset($_POST['password'])){
			
			$password = trim($_POST["password"]);
		}
		
		if(isset($_POST['confirm'])){
			$confirm = trim($_POST["confirm"]);
		}
		
		if(isset($_POST['programme'])){
			$programme = trim($_POST["programme"]);
		}
		
		//Validation 
		
		if(empty($username)){
			
			$errors[]="Username Required";
			
		}elseif(!preg_match("/^[a-zA-Z0-9]+$/", $username)){
			
			$errors[]="Username can only contain letter and numbers no space";
		}
		
		//Email
		if(empty($email)){
			
			$errors[]="Email is Required";
			
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			
			$errors[] = "Invalid email format";
		}
		
		//Password Verification
		
		if(empty($password)){
			
			$errors[]="Password Required";
			
		}elseif(strlen($password) > 8){
			
			$errors[] = "Password must be at most 8 characters";
		}
		
		//Confrim Password
		if($password != $confirm){
			
			$errors[]= "Passwords do not match."; 
		}
		
		//Program
		if(empty($programme)){
			
			$errors[] = "Please sselect your programme";
		}
		
		//If there are no errors
		
		if(empty($errors)){ 
		
			$passwordHash = password_hash($password, PASSWORD_DEFAULT);
			
			
			// Inserting information in db 
			$stmt= $conn-> prepare(
				"INSERT INTO users(username, email, password,programme)
				VALUES(?,?,?,?)"
				); 
				
			$stmt-> bind_param("ssss",$username, $email, $passwordHash,$programme);
			
			if ($stmt->execute() ) {
				
				$success = "User saved!";
				
				echo "<p> User saved successfully!</p>";
				
			} else {
				
				$errors[] = "Registration Failed"; 
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Sign Up </title>
	
	<style>
		body{
			font-family: Times New Roman;
			background-color: #CCEAFF;
		}
		
		.section{
			width: 500px;
			margin: 60px;
			background-color: #D2FFB0;
			padding:30px;
			border-radius:10px;
		}
		
		input, select{
			width:100%;
			padding: 10px;
			margin-top:8px;
			margin-bottom:15px;
		}
		button{
			width: 100px;
			padding:10px;
			background-color: white;
			color:green;
			border: 2px solid #D2FFB0;
		}
		.error{
			color: red;
		}
		
	</style>
	
</head>
<body>
	
<div class= "section"> 
	<h2> Create Account </h2>
	
	<?php
	if(!empty($errors)){
		
		foreach($errors as $error){
		
		echo "<p class='error'> $error</p>";
		}
	}
	?>
		
	<form method="POST" action = "">
	
		<label>Username</label><br>
		<input type="text" name="username"><br><br>
		
		<label>Email</label><br>
		<input type="email" name="email"><br><br>
		
		<label>Password</label><br>
		<input type="password" name="password"><br><br>
		
		<label>Confirm Password</label><br>
		<input type="password" name="confirm"><br><br>
		
		<label>Select a Program</label><br>
		
		<select name="programme">
		
			<option value="CIT">CIT</option>
			
			<option value="CSE">CSE</option>
			
		</select><br><br>
		
		<button type="submit"> Submit </button>
		
</form>

<p>
	Already have an account?
	<a href="loginCal.php"> Login </a>
</p>

</div>

</body>
</html>