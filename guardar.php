<?php

$nombre_archivo = $_FILES["archivo"]["name"];
$tipo_archivo = $_FILES["archivo"]["type"];

/*
echo $nombre_archivo;
echo "<br>";
echo $tipo_archivo;
*/


if ($tipo_archivo == "application/pdf") {

    if ($_FILES["archivo"]["name"]) {


        $filename = $_FILES["archivo"]["name"];
        $source = $_FILES["archivo"]["tmp_name"];

        $directorio = 'docs/';

        if (!file_exists($directorio)) {
            mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
        }

        date_default_timezone_set('America/Argentina/Buenos_Aires');

        $fecha_hora = date("dmy_His");
        $dir = opendir($directorio);
        $target_path = $directorio . $fecha_hora . "_" . $filename;

        if (move_uploaded_file($source, $target_path)) {
            echo '<a href=' . $target_path . ' target="blank">' . $target_path . '</a>';
        } else {
            echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
        }

        closedir($dir);
    }
    
} else {

    echo "No se admiten archivos que no sean PDF.";
}
