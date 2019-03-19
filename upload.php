<?php
// En versiones de PHP anteriores a la 4.1.0, debería utilizarse $HTTP_POST_FILES en lugar
// de $_FILES.

	
	//ruta de almacenameinto
	$dir_subida = 'imagenes/';
	$fichero_subido = $dir_subida . basename($_FILES['fileToUpload']['name']);
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

	echo 'Más información de depuración:';
	//print_r($_FILES);

	//print "</pre>";

?>
