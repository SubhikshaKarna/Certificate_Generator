<?php
	$email = $_POST['email'];
	$password = $_POST['password'];

	//Dbase connection
	$con = new mysqli("localhost","root","","cregs"); 
	if($con->connect_error){
		die("Failed to connect : ".$con->connect_error);
	}else{
		$stmt = $con->prepare("select * from contents where email = ?");
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if($stmt_result->num_rows > 0){
			$data = $stmt_result->fetch_assoc();
			if($data['password']=== $password){
				header("location:dashboard.html");
				
			}else{
				echo "<h2>Invalid Email or password</h2>";
			}

		}else{
			echo "<h2>Invalid Email or Password</h2>";
		}
	}
	
?>