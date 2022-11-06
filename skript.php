<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webbserverprogrammering";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$login_success = false;
$full_name = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row["userId"] == $_POST["username"] &&
					$row["passwd"] == $_POST["password"]) {
			$login_success = true;
			$full_name = $row["firstname"] . " " .
					$row["lastname"];
			}
	}
} else {
    echo "0 results";
}
$conn->close();
?>