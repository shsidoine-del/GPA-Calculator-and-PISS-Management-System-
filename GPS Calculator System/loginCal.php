<?php
//GPA Calculator System Sign UP
session_start();

include 'connect.php';

$username= "";
$password = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	//Getting form data
	$username = trim($_POST["username"]);
	$password = $_POST["password"];
	
	//Validation
	if(empty($username)){
		$errors[] = "Username is required";
	}
	
	if(empty($password)){
		$errors[] = "Password is required";
	}
	
	//If no errors
	if(empty($errors)){
		
		//Prepared Statement
		$sql = "SELECT * FROM users WHERE username = '$username' ";
		
		$stmt = $conn->prepare($sql);
		
		$stmt->bind_param("s", $username);
		
		$stmt->execute();
		
        $result = $stmt->get_result();
		
		if ($result && $result->num_rows > 0) {
			
            $row = $result->fetch_assoc();
			
			//Password check
            if (password_verify($password, $row["password"])) {
				
				//Sessions
				$_SESSION["user_id"]=$row["user_id"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["programme"] = $row["programme"];
				
			
				header("Location: dashboard.php");
				exit();
				
            } else {
				
                $errors[] = "Incorrect password";
				
            }
			
        }else{
			
            $errors[] = "No account found with that username";
			
        }
    
	}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
	<style>
	
		body{
			font-family: Times New Roman;
			background-color: #CCEAFF;
		}
		.box{
			width: 400px;
			margin: 60px;
			background-color: MediumSeaGreen;
			padding:30px;
			border-radius:10px;
		}
		input{
			width: 100%;
			padding: 10px;
			margin-top: 8px;
			margin-bottom: 15px;
		}
		button{
			width: 100px;
			padding: 10px;
			background-color: #D2FFB0;
			color: white;
			border: none;
		}
		.error{
			color: red;
		}
	</style>
</head>
<body>

<div class="box">

	<h1>Login Form</h1>
	
	<?php
	if(!empty($errors)){
		
		foreach($errors as error){
		echo<"p class='error'>$error</p>";
		 }
	}
	?>
	
	<form method="POST" action ="">
	
		<label> Username </lable><br>
		<input type="text" name= "username"><br><br>
		
		<label> Password </label><br>
		<input type="password" name="password"><br><br>
		
		<button type ="submit"> Login </button>
		
	</form>
	
	<p>
		Don't have an account?
		<a href="signUpCal.php"> Sign Up Here </a>
	</p>

</div>

</body>
</html>