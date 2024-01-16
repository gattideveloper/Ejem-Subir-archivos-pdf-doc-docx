<?php 
include "includes/db.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GattiDev ~ Descargar Arvhico .PDF</title>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    </head>
    <body>
    	<a href=""></a>
        <div class="container">
            <?php
				// Buscar el archivo en la base de datos
				$sql = "SELECT * FROM documento";
				$resultado = mysqli_query($conexion, $sql);
				while($documento = mysqli_fetch_assoc($resultado)){  
					$id = $documento['id'];
					$name = $documento['nombre'];
					$archive = $documento['archivo'];
					
					echo "Nombre: " . $name . " & " . "Archivo: " . $archive; 
					echo "<br>";
					echo "<a href='includes/download.php?id=$id'>Descargar</a>";
					echo "<hr>";
					echo "<br>";
				}
				?>
        </div>
    </body>
</html>