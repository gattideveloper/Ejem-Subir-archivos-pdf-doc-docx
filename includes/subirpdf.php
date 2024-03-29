<?php
	$nombre = $_POST['nombre'];
    $destino = $_POST['destino'];
	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name){

		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = 'files/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
//------->
			// Obtener el nombre y la extensión del archivo
			$extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

			// Validar la extensión del archivo
			if ($extension == "pdf" || $extension == "doc" || $extension == "docx") {

           		
           		// Insertar la información del archivo en la base de datos
	            include "db.php";
	            
	            $sql = "INSERT INTO documento (nombre, descripcion, archivo) 
		            VALUES ( '$nombre', '$destino','$filename')";
		            
	            $resultado = mysqli_query($conexion, $sql);
	            if ($resultado) {
///<-----
					//Validamos si la ruta de destino existe, en caso de no existir la creamos
					if(!file_exists($directorio)){
						mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
					}
			
					$dir=opendir($directorio); //Abrimos el directorio de destino
					$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
					//Movemos y validamos que el archivo se haya cargado correctamente
					//El primer campo es el origen y el segundo el destino
					if(move_uploaded_file($source, $target_path)) {	
						echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
					} else {	
						echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
					}
					closedir($dir); //Cerramos el directorio de destino
				}
			}
		}
	}
?>