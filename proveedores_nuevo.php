<?php
session_start();
if($_SESSION["permiso"] != 1 || !isset($_SESSION["permiso"])){
    header("Location: index.php");
}
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 7200)) {
    // last request was more than 2 hours ago
    session_unset();     // unset $_SESSION variable for the run-time 
    header("Location: logout.php");
}
$_SESSION['LAST_ACTIVITY'] = time();
include_once 'conexion.php';
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Sistema de Ventas y Almacén - Overware - Artículos</title>
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

<body> <!-- onfocus='javascript:location.reload()'>-->

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
                <li class="dropdown"><a href=""><span class="icon-briefcase"></span> Artículos</a>
                    <ul>
                        <li><a href="articulo_nuevo.php">Nuevo</a></li>
                        <li><a href="articulo_editar.php">Editar</a></li>
                    </ul>
                </li>
                <li class="dropdown active"><a href=""><span class="icon-briefcase"></span> Proveedores</a>
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
                <?php if($_SESSION["permiso"] == 1){ ?>
                <li><a href="configurar.php"><span class="icon-cog"></span> Configurar Aplicación</a></li>
                <?php } ?>
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
          <h1>Nuevo Proveedor</h1> <span></span><!--sample description for dashboard page...-->
        </div><!--pagetitle-->
        
        <div class="maincontent">
            <div class="contentinner widgetcontent">
                <form class="stdform" action="proveedores_guardar.php" method="post">
                    <p>
                        <label>Nombre (Razón Social):</label>
                        <span class="field"><input type="text" name="nombre" class="input-medium" placeholder="obligatorio"/></span>
                    </p>
                    <p>
                        <label>RUC:</label>
                        <span class="field"><input type="text" name="ruc" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Dirección Fiscal:</label>
                        <span class="field"><input type="text" name="direccion" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Teléfono:</label>
                        <span class="field"><input type="text" name="telefono" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Correo Electrónico:</label>
                        <span class="field"><input type="text" name="correo" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Nombre del Contacto 1:</label>
                        <span class="field"><input type="text" name="nombre1" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Teléfono del Contacto 1:</label>
                        <span class="field"><input type="text" name="telefono1" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Correo del Contacto 1:</label>
                        <span class="field"><input type="text" name="correo1" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Nombre del Contacto 2:</label>
                        <span class="field"><input type="text" name="nombre2" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Teléfono del Contacto 2:</label>
                        <span class="field"><input type="text" name="telefono2" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Correo del Contacto 2:</label>
                        <span class="field"><input type="text" name="correo2" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Nombre del Contacto 3:</label>
                        <span class="field"><input type="text" name="nombre3" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Teléfono del Contacto 3:</label>
                        <span class="field"><input type="text" name="telefono3" class="input-medium" placeholder=""/></span>
                    </p>
                    <p>
                        <label>Correo del Contacto 3:</label>
                        <span class="field"><input type="text" name="correo3" class="input-medium" placeholder=""/></span>
                    </p>
                    
                    <p class="stdformbutton">
                        <button class="btn btn-primary">Aceptar</button>
                        <button type="reset" class="btn">Deshacer Cambios</button>
                    </p>
                </form>
                
            </div>
            
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
var ventana_familia;
var ventana_marca;
var ventana_unidad;

function abrir_nuevo_familia(){
    ventana_familia = window.open("familia_nuevo.php", "nombrePop-Up", "width=380, height=500, top=85, left=150");
}
function abrir_nuevo_marca(){
    ventana_marca = window.open("marca_nuevo.php", "nombrePop-Up", "width=380, height=500, top=85, left=150");
}
function abrir_nuevo_unidad(){
    ventana_unidad = window.open("unidad_nuevo.php", "nombrePop-Up", "width=380, height=500, top=85, left=150");
}
document.getElementById("btn_nuevo_familia").onclick = function() {abrir_nuevo_familia()};
document.getElementById("btn_nuevo_marca").onclick = function() {abrir_nuevo_marca()};
document.getElementById("btn_nuevo_unidad").onclick = function() {abrir_nuevo_unidad()};
</script>
</body>
</html>
