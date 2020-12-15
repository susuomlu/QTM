<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "sUXVxLIN5adL";
	$database = "testdb";
	$table = "login_info";

	$conn = mysqli_connect($servername, $username, $password, $database);
		if ($conn->connect_error){
			$_SESSION['msg'] = "Connection failed";
		}
		else{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql_command = "SELECT * FROM ".$table." WHERE login_username='".$username."' and login_password='".$password."'";
			$result = mysqli_query($conn, $sql_command);
			if (mysqli_num_rows($result) > 0){
				$_SESSION['name'] = $username;
				$cookie_name = "localuser";
				$cookie_value = $username .$password;
				setcookie($cookie_name, $cookie_value, time() + 600, "/");
			}
			else{
				$_SESSION['name'] = null;
				$_SESSION['msg'] = "Login failed";
			}
			mysqli_close($conn);
		}
?>
<html>
<head>
	<title>Simple Info Form</title>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js" integrity="sha512-/DXTXr6nQodMUiq+IUJYCt2PPOUjrHJ9wFrqpJ3XkgPNOZVfMok7cRw6CSxyCQxXn6ozlESsSh1/sMCTF1rL/g==" crossorigin="anonymous"></script>
</head>
<body>
	<?php
	 	if ( isset($_SESSION['name']) ){
			echo 'Welcome '.$_SESSION['name'];
			header("Location: daa.html");
		 }
		 	
		else{
			if ( isset($_SESSION['msg']))
				echo $_SESSION['msg'];
		} 
		
	?>
</body>
</html>