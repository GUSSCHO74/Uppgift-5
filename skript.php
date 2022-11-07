<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "webbserverprogrammering";
	$conn = new mysqli($servername, $username, $password, $dbname);

	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);	

	$login_success = false;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			if($row["username"] == $_POST["username"] && $row["password"] == $_POST["password"]){
				$login_success = true;
				echo "<h1>Welcome!</h1>";
			}
			else {
				echo "<h1>Login failed!</h1><p>Wrong username and password combination!</p>";	
			}
		}
	} 
	$conn->close();
?>
</body>
</html>
