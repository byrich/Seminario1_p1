<?php
// En versiones de PHP anteriores a la 4.1.0, debería utilizarse $HTTP_POST_FILES en lugar
// de $_FILES.

	$myfile = fopen("/var/www/html/imagenes/conf.txt", "w") or die("Unable to open file!");
	$txt = "Mickey Mouse\n";
	fwrite($myfile, $txt);
	fclose($myfile);

	$dir_subida = 'imagenes/';
	$fichero_subido = $dir_subida . basename($_FILES['fileToUpload']['name']);

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
