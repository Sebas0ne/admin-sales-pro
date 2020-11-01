<?php
session_start();
if($_SESSION["permiso"] != 1 || !isset($_SESSION["permiso"])){
    header("Location: index.php");
}
include_once 'conexion.php';
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Sistema de Ventas y Almacén - Overware - Proveedores</title>
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
<!--<script type="text/javascript" src="jqueryui1121/jquery-ui.min.js"></script>-->
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>

<div class="mainwrapper">
	
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    	
        <div class="logopanel">
            <h1><a href="inicio.php"><?php echo $_SESSION["empresa"]; ?></a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget"><?php echo $current_time; ?></div>
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
            	<li class="nav-header">Navegación Principal</li>
                <li><a href="inicio.php"><span class="icon-home"></span> Inicio</a></li>
                <li class="dropdown active"><a href=""><span class="icon-briefcase"></span> Artículos</a>
                    <ul>
                    	<li><a href="articulo_nuevo.php">Nuevo</a></li>
                        <li><a href="articulo_editar.php">Editar</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href=""><span class="icon-briefcase"></span> Proveedores</a>
                    <ul>
                    	<li><a href="proveedores_nuevo.php">Nuevo</a></li>
                        <li><a href="proveedores_editar.php">Editar</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href=""><span class="icon-briefcase"></span> Almacén</a>
                    <ul>
                    	<li><a href="almacen_entrada.php">Entrada a Almacén</a></li>
                        <li><a href="almacen_editarlotes.php">Editar Lotes</a></li>
                        <li><a href="almacen_salida.php">Salida de Productos (NO VENTA)</a></li>
                    </ul>
                </li>
                <li><a href="almacen_inventario.php"><span class="icon-home"></span> Corrección de Inventario</a></li>
                <li class="dropdown"><a href=""><span class="icon-briefcase"></span> Ventas y Caja</a>
                    <ul>
                    	<li><a href="ventas_nuevo.php">Realizar Venta</a></li>
                        <li><a href="ventas_anular.php">Anular Venta</a></li>
                        <li><a href="ventas_cajachica.php">Salida por Caja Chica</a></li>
                        <li><a href="ventas_pagospersonal.php">Pagos a Personal</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href=""><span class="icon-briefcase"></span> Reportes</a>
                    <ul>
                    	<li><a href="reportes_caja.php">Caja (diario)</a></li>
                        <li><a href="reportes_stock.php">Stock</a></li>
                        <li><a href="reportes_movimiento.php">Movimientos por Producto (Kárdex)</a></li>
                        <li><a href="reportes_ventas.php">Ventas</a></li>
                        <li><a href="reportes_compras.php">Compras</a></li>
                        <li><a href="reportes_balance.php">Balance de Caja</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--leftmenu-->
        
    </div><!--mainleft-->
    <!-- END OF LEFT PANEL -->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
        	<a href="" class="showmenu"></a>
            
            <div class="headerright">
                <div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/page.html">Bienvenido <?php echo $_SESSION["nombre"]; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--<li><a href="editprofile.html"><span class="icon-edit"></span> Edit Profile</a></li>
                        <li><a href=""><span class="icon-wrench"></span> Account Settings</a></li>
                        <li><a href=""><span class="icon-eye-open"></span> Privacy Settings</a></li>
                        <li class="divider"></li>-->
                        <li><a href="logout.php"><span class="icon-off"></span> Salir</a></li>
                    </ul>
                </div><!--dropdown-->
    		
            </div><!--headerright-->
            
    	</div><!--headerpanel-->
        <div class="breadcrumbwidget">
        	<ul class="skins">
                <li><a href="default" class="skin-color default"></a></li>
                <li><a href="orange" class="skin-color orange"></a></li>
                <li><a href="dark" class="skin-color dark"></a></li>
                <li>&nbsp;</li>
                <li class="fixed"><a href="" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<!--<ul class="breadcrumb">
                <li><a href="dashboard.html">Home</a> <span class="divider">/</span></li>
                <li class="active">Dashboard</li>
            </ul>-->
        </div><!--breadcrumbwidget-->
      <div class="pagetitle">
        	<h1>Edición de Proveedores</h1> <!--<span>sample description for dashboard page...</span>-->
        </div><!--pagetitle-->
        
        <div class="maincontent">
            <div class="contentinner content-dashboard">
                
                <?php
                //obteniendo los datos de get["op"] (op es el ID del artículo)
                $proveedor_id = $_GET["op"];
                $query = "select id, nombre, ruc, direccion, telefono, correo, nombre1, telefono1, correo1, nombre2, telefono2, correo2, nombre3, telefono3, correo3, fecha_registro from proveedor where id = $proveedor_id";
                $rs = mysqli_query($db_cn, $query);
                while($res = mysqli_fetch_array($rs)){
                    $proveedor_id = $res["id"];
                    $nombre       = $res["nombre"];
                    $direccion    = $res["direccion"];
                    $ruc          = $res["ruc"];
                    $telefono     = $res["telefono"];
                    $correo       = $res["correo"];
                    $nombre1      = $res["nombre1"];
                    $telefono1    = $res["telefono1"];
                    $correo1      = $res["correo1"];
                    $nombre2      = $res["nombre2"];
                    $telefono2    = $res["telefono2"];
                    $correo2      = $res["correo2"];
                    $nombre3      = $res["nombre3"];
                    $telefono3    = $res["telefono3"];
                    $correo3      = $res["correo3"];
                    $fecha        = $res["fecha_registro"];
                }
                ?>
                <form class="stdform" action="proveedores_guardar_cambios.php" method="post">
                    <input type="hidden" name="proveedor_id" value="<?php echo $proveedor_id; ?>" />
                    <p>
                        <label>Razón Social:</label>
                        <span class="field"><input type="text" name="nombre" class="input-medium" value="<?php echo $nombre; ?>"/></span>
                    </p>
                    <p>
                        <label>RUC:</label>
                        <span class="field"><input type="text" name="ruc" class="input-medium" value="<?php echo $ruc; ?>"/></span>
                    </p>
                    <p>
                        <label>Dirección:</label>
                        <span class="field"><input type="text" name="direccion" class="input-medium" value="<?php echo $direccion; ?>"/></span>
                    </p>
                    <p>
                        <label>Teléfono:</label>
                        <span class="field"><input type="text" name="telefono" class="input-medium" value="<?php echo $telefono; ?>"/></span>
                    </p>
                    <p>
                        <label>Correo:</label>
                        <span class="field"><input type="text" name="correo" class="input-medium" value="<?php echo $correo; ?>"/></span>
                    </p>
                    <p>
                        <label>Nombre de Contacto 1:</label>
                        <span class="field"><input type="text" name="nombre1" class="input-medium" value="<?php echo $nombre1; ?>"/></span>
                    </p>
                    <p>
                        <label>Teléfono de Contacto 1:</label>
                        <span class="field"><input type="text" name="telefono1" class="input-medium" value="<?php echo $telefono1; ?>"/></span>
                    </p>
                    <p>
                        <label>Correo de Contacto 1:</label>
                        <span class="field"><input type="text" name="correo1" class="input-medium" value="<?php echo $correo1; ?>"/></span>
                    </p>
                    
                    <p>
                        <label>Nombre de Contacto 2:</label>
                        <span class="field"><input type="text" name="nombre2" class="input-medium" value="<?php echo $nombre2; ?>"/></span>
                    </p>
                    <p>
                        <label>Teléfono de Contacto 2:</label>
                        <span class="field"><input type="text" name="telefono2" class="input-medium" value="<?php echo $telefono2; ?>"/></span>
                    </p>
                    <p>
                        <label>Correo de Contacto 2:</label>
                        <span class="field"><input type="text" name="correo2" class="input-medium" value="<?php echo $correo2; ?>"/></span>
                    </p>
                    
                    <p>
                        <label>Nombre de Contacto 3:</label>
                        <span class="field"><input type="text" name="nombre3" class="input-medium" value="<?php echo $nombre3; ?>"/></span>
                    </p>
                    <p>
                        <label>Teléfono de Contacto 3:</label>
                        <span class="field"><input type="text" name="telefono3" class="input-medium" value="<?php echo $telefono3; ?>"/></span>
                    </p>
                    <p>
                        <label>Correo de Contacto 3:</label>
                        <span class="field"><input type="text" name="correo3" class="input-medium" value="<?php echo $correo3; ?>"/></span>
                    </p>
                    <p>
                        <label>Fecha de Registro (no editable):</label>
                        <span class="field"><input type="text" name="fecha" disabled class="input-medium" value="<?php echo $fecha; ?>"/></span>
                    </p>
                    
                    
                    <p class="stdformbutton">
                        <button class="btn btn-primary">Aceptar</button>
                        <button type="reset" class="btn">Deshacer Cambios</button>
                    </p>
                </form>
                
                
                
                
                
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
    <div class="footer">
    	<div class="footerleft">Sistema de Ventas y Almacén - OVERWARE</div>
    	<div class="footerright">&copy; Overware - <a href="http://facebook.com/overwaretech">Síguenos en Facebook</a></div>
    </div><!--footer-->

    
</div><!--mainwrapper-->
<script type="text/javascript">
jQuery(document).ready(function(){

});
</script>
</body>
</html>
