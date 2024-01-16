<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GattiDev ~ Subir Arvhico .PDF</title>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
    </head>
    <body>
        <div class="container">
            <form name="form1" id="form1" method="post" action="../includes/subirpdf.php" enctype="multipart/form-data">
                        
                <h4 class="text-center">Cargar Multiple Archivos</h4>
                
                <div class="form-group">        
                
                    <!-- Nombre -->
                    <label for="nombre" class="form-label">Nombre</label></br>
                    <input type="text" id="nombre" name="nombre" class="form-control" required></br>
                    <hr>
                    <!-- Destino -->
                    <label for="destino" class="form-label">Destino</label></br>
                    <input type="text" id="destino" name="destino" class="form-control" required></br>
                    <hr>
                    <label class="control-label">Archivos</label>
                    <div>
                        <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
                    </div>
                    </br>      
                    <button type="submit" class="btn">Cargar</button>
                </div>     
            </form>
        </div>
    </body>
</html>