<?php
	$host = 'practica1.cclfdl028j9k.us-east-2.rds.amazonaws.com';
	$user = 'byrich';
	$pass = '24490024';
	$db_name = 'dbDos';
	$conn = new mysqli($host,$user,$pass,$db_name);
	if ($conn->connect_error) {
		die('error de conecion '. $conn-> connect_error);
	}
?>