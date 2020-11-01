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
<title>Sistema de Ventas y Almacén - Overware - Almacén</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="prettify/prettify.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap-fileupload.min.css" type="text/css" />
<link rel="stylesheet" href="css/bootstrap-timepicker.min.css" type="text/css" />
<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-fileupload.min.js"></script>
<script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="js/jquery.autogrow-textarea.js"></script>
<script type="text/javascript" src="js/charCount.js"></script>
<script type="text/javascript" src="js/ui.spinner.min.js"></script>
<script type="text/javascript" src="js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/forms.js"></script>
<script type="text/javascript" src="jqueryui1121/jquery-ui.min.js"></script>
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
                        <li class="active"><a href="articulo_nuevo.php">Nuevo</a></li>
                        <li><a href="articulo_editar.php">Editar</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href=""><span class="icon-briefcase"></span> Proveedores</a>
                    <ul>
                    	<li><a href="proveedores_nuevo.php">Nuevo</a></li>
                        <li><a href="proveedores_editar.php">Editar</a></li>
                    </ul>
                </li>
                <li class="dropdown active"><a href=""><span class="icon-briefcase"></span> Almacén</a>
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
          <h1>Nuevo Ingreso a Almacén</h1> <span></span><!--sample description for dashboard page...-->
        </div><!--pagetitle-->
        
        <div class="maincontent">
            <div class="contentinner widgetcontent">
                <form class="stdform" action="ventas_anular.php" method="post">
                    <p>
                        <label>Serie y Número de Recibo</label>
                        <span class="formwrapper">
                            <select class="input-small" name="tipo"><option value="1">BOLETA</option><option value="2">FACTURA</option></select>
                            <input type="text" placeholder="000" class="input-mini" style="width: 25px" size="3" maxlength="3" name="serie"><b> - </b><input type="text" placeholder="0000001" class="input-small" size="7" maxlength="7" name="numero">
                        </span>
                    </p>
                    
                    <p class="stdformbutton">
                        <button class="btn btn-primary">Aceptar</button>
                        <button type="reset" class="btn">Deshacer Cambios</button>
                    </p>
                </form>
                
            
            
            <?php 
            if(isset($_POST["tipo"])){
                //buscar recibo
            ?>
            <table class="table table-bordered">
                <tr>
                    <th>Nro de Recibo</th>
                    <th>Pago</th>
                    <th>Fecha de Ingreso</th>
                    <th>Cliente</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            
            <?php
                $serie  = $_POST["serie"];
                $numero = $_POST["numero"];
                $tipo   = $_POST["tipo"];
                $query = "call verCabecera($serie, $numero, $tipo);";
                $rs = mysqli_query($db_cn, $query);
                while($res = mysqli_fetch_array($rs)){
                    echo '<tr>'
                    . '<td>'.$res["tipo"].' '.$res["correlativo"].'</td>'
                    . '<td>'.$res["total"].'</td>'
                    . '<td>'.$res["fechaIngreso"].'</td>'
                    . '<td>'.$res["nombre"].'</td>'
                    . '<td>'.$res["estado"].'</td>';
                    $jaava = "window.open('tcpdf/examples/verRecibo.php?serie=$serie&nro=$numero&tipo=$tipo','newwindow','width=1300,height=650');return false;";
                    echo '<td style="font-size: 20px;"><a class="iconfa-eye-open" onclick="'.$jaava.'" ></a> <a class="iconfa-trash" href="#"></a></td>';
                    echo '</tr>';
                }?>
                </table><?php
            }
            ?>
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

<script>
jQuery(document).ready(function(){
    jQuery('#filtro_producto').change(function(){
        jQuery('#cantidadpaquete').val(lista_cantidades[jQuery('#filtro_producto option:selected').val()]);
        jQuery('#unidad_medida').val(lista_unidades[jQuery('#filtro_producto option:selected').val()]);
    });
    jQuery('#calcular_unitario_ingreso').click(function(){
        var unitario = 0.0;
        unitario = Math.round((jQuery('#precio_compra_total').val() / (jQuery('#cantidadpaquete').val() * jQuery('#cantidad_ingreso').val()))*100)/100;
        jQuery('#precio_compra_unidad').val(unitario);
    });
});
function poner_sin_fecha(){
    document.getElementById("yy").selectedIndex = "10";
    document.getElementById("mm").selectedIndex = "11";
    document.getElementById("dd").selectedIndex = "30";
};
document.getElementById("btn_no_vencimiento").onclick = function() {poner_sin_fecha()};
</script>

</body>
</html>
