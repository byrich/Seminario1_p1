<?php
	//ruta de almacenameinto
	$dir_subida = 'imagenes/';
	$fichero_subido = $dir_subida . basename($_FILES['fileToUpload']['name']);
	// insert mysql
	$host = 'practica1.cclfdl028j9k.us-east-2.rds.amazonaws.com';
	$user = 'byrich';
	$pass = '24490024';
	$db_name = 'dbDos';
	$conn = new mysqli($host,$user,$pass,$db_name);
	if ($conn->connect_error) {
		die('error de conecion '. $conn-> connect_error);
	}
	$sql = "INSERT INTO Juegos (nombre, compania,img_url,fecha) VALUES ('".$_POST["nombre"]."', '".$_POST["compania"]."', '../".$fichero_subido."', now())";
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	}
	$conn->close();

	// escritura en archivo
	$myfile = fopen("imagenes/conf.txt", "w") or die("Unable to open file!");
	//$txt = $fichero_subido;
	fwrite($myfile, basename($_FILES['fileToUpload']['name']));
	fclose($myfile);

	echo '<pre>';
	if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $fichero_subido)) {
	    echo "El fichero es válido y se subió con éxito.\n";
	} else {
	    echo "¡Posible ataque de subida de ficheros!\n";
	}

	header("Location: http://ec2-3-17-11-100.us-east-2.compute.amazonaws.com/subirImg.html");
	die();
	//print_r($_FILES);

	//print "</pre>";

?>
