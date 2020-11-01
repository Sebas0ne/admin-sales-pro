<?php
//session_start();
//if($_SESSION["permiso"] != 1 || !isset($_SESSION["permiso"])){
//    header("Location: index.php");
//}
//if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 7200)) {
//    // last request was more than 2 hours ago
//    session_unset();     // unset $_SESSION variable for the run-time 
//    header("Location: logout.php");
//}
//$_SESSION['LAST_ACTIVITY'] = time();
include_once 'conexion.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sistema de Ventas y Almacén - Overware - Clientes</title>
        <link rel="stylesheet" href="css/style.default.css" type="text/css" />
        <link rel="stylesheet" href="prettify/prettify.css" type="text/css" />
        <!--<link rel="stylesheet" href="jqueryui1121/jquery-ui.min.css" type="text/css" />-->
        <script type="text/javascript" src="prettify/prettify.js"></script>
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.flot.min.js"></script>
        <script type="text/javascript" src="js/jquery.flot.resize.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
    </head>
    <body>
        <div class="maincontent">
            <div class="contentinner widgetcontent">
                <button onclick="javascript:location.reload()">Recargar Página</button><br>
                <form class="stdform" action="cliente_guardar.php" method="post">
                    <p>
                        <label>Tipo de Documento</label>
                        <span class="field">
                            <select name="tipodoc">
                                <option value="RUC">RUC</option>
                                <option value="DNI">DNI</option>
                            </select>
                        </span>
                    </p>
                    
                    <p>
                        <label>Nro de Documento</label>
                        <span class="field"><input type="text" name="documento" class="input-medium" placeholder=""/></span>
                    </p>
                    
                    <p>
                        <label>Nombre o Razón Social</label>
                        <span class="field"><input type="text" name="nombre" class="input-medium" placeholder=""/></span>
                    </p>
                    
                    <p>
                        <label>Dirección</label>
                        <span class="field"><input type="text" name="direccion" class="input-medium" placeholder=""/></span>
                    </p>
                    
                    <p>
                        <label>Teléfono</label>
                        <span class="field"><input type="text" name="telefono" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Correo-e</label>
                        <span class="field"><input type="text" name="correo" class="input-medium" placeholder=""/></span>
                    </p>
                    
                    <p>
                        <label>Observación</label>
                        <span class="field"><input type="text" name="observacion" class="input-large" placeholder=""/></span>
                    </p>
                    
                    <p class="stdformbutton">
                        <button class="btn btn-primary">Aceptar</button>
                        <button type="reset" class="btn">Deshacer Cambios</button>
                    </p>
                </form>
                
            </div>
            
        </div><!--maincontent-->
        
    </body>
    
</html>
