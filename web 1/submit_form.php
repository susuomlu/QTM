<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "sUXVxLIN5adL";
	$database = "testdb"; 		 
	$table = "student_info";

	$conn = mysqli_connect($servername, $username, $password, $database);
		if ($conn->connect_error) {
			$_SESSION['msg'] = "Connection failed";
		}
		else{
			$login_name = mysqli_real_escape_string($conn, $_POST['name']);
			$login_student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
			$login_email = mysqli_real_escape_string($conn, $_POST['email']);
			$login_phone = mysqli_real_escape_string($conn, $_POST['phone']);
			$login_dob = mysqli_real_escape_string($conn, $_POST['dob']);
			$login_gender = mysqli_real_escape_string($conn, $_POST['gender']);
			$login_address = mysqli_real_escape_string($conn, $_POST['address']);
			$login_note = mysqli_real_escape_string($conn, $_POST['note']);

			$sql_command = "INSERT INTO $table (name,student_id,email,phone,dob,gender,address,note) values ('".$login_name."','".$login_student_id."','".$login_email."','".$login_phone."','".$login_dob."','".$login_gender."','".$login_address."','".$login_note."')";
			if ($conn->query($sql_command) === TRUE)
				$_SESSION['msg'] = "New record created successfully";
			else
				$_SESSION['msg'] = $conn->error;
			mysqli_close($conn);
		}
?>
<html>
<head>
	<title>Form Submit Confirmation</title>
	<style>
	    body{
	    	font-family: Arial
	    }
		.label {
			width: 10%;
			float: left;
		}
		.info{
			padding: 5px;
		}
		form{
			padding-left: 30px;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<?php
		if (isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			header("Location: daa.html");
		}
			
	?>
</body>
</html>