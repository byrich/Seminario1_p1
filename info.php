<?php
	$host = 'practica1.cclfdl028j9k.us-east-2.rds.amazonaws.com';
	$user = 'byrich';
	$pass = '24490024';
	$db_name = 'dbDos';
	$conn = new mysqli($host,$user,$pass,$db_name);
	if ($conn->connect_error) {
		die('error de conecion '. $conn-> connect_error);
	}
	$sql = "SELECT id, firstname FROM prueba";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "id: " . $row["id"]. " - Name: " . $row["firstname"] . " <br>";
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();
?>
