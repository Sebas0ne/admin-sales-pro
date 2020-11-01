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
                <form class="stdform" action="almacen_guardar.php" method="post">
                    <script>
                        lista_cantidades = [];
                        lista_unidades = [];
                        lista_nombres = [];
                        lista_colores = [];
                        //var lista_articulos = new array{"0":"cero"};
                    </script>
                    <p>
                        <label>Proveedor</label>
                        <span class="formwrapper">
                            <select data-placeholder="Buscar" style="width:500px" class="chzn-select" tabindex="2" name="proveedor">
                                <option value=""></option>
                                <?php
                                $query = "select nombre, ruc, id from proveedor where id not in (0);";
                                $rs = mysqli_query($db_cn, $query);
                                while($res = mysqli_fetch_array($rs)){
                                    $proveedor_id = $res["id"];
                                    $nombre       = $res["nombre"];
                                    $ruc          = $res["ruc"];
                                    echo '<option value="'.$proveedor_id.'">'.$ruc.' - '.$nombre.'</option>';
                                }
                                ?>
                            </select>
                        </span>
                    </p>
                    <hr>
                    <p>
                        <label>Nombre o Código de Barras</label>
                        <span class="formwrapper">
                            <select data-placeholder="Buscar" style="width:500px" class="chzn-select" tabindex="2" name="filtro_producto" id="filtro_producto">
                                <option value=""></option>
                                <?php
                                $query = "select articulo_id, cod_barra, descripcion, cantidad_paquete, unidad from v_articulos where articulo_estado = 1 group by articulo_id, cod_barra, descripcion, cantidad_paquete, unidad;";
                                $rs = mysqli_query($db_cn, $query);
                                while($res = mysqli_fetch_array($rs)){
                                    $articulo_id      = $res["articulo_id"];
                                    $descripcion      = $res["descripcion"];
                                    $cod_barra        = $res["cod_barra"];
                                    $cantidad_paquete = $res["cantidad_paquete"];
                                    $unidad           = $res["unidad"];
                                    echo '<option value="'.$articulo_id.'">'.$cod_barra.' - '.$descripcion.'</option>';
                                    echo '<script>lista_cantidades["'.$articulo_id.'"] = "'.$cantidad_paquete.'";</script>';
                                    echo '<script>lista_unidades["'.$articulo_id.'"] = "'.$unidad.'";</script>';
                                    echo '<script>lista_nombres["'.$articulo_id.'"] = "'.$descripcion.'";</script>';
                                }
                                ?>
                            </select>
                        </span>
                    </p>
                    
                    <p>
                        <label>Cantidad por Paquete:</label>
                        <span class="field"><input type="text" name="cantidadpaquete" id="cantidadpaquete" class="input-small disabled" readonly /></span>
                    </p>
                    
                    <p>
                        <label>Unidad de Medida:</label>
                        <span class="field"><input type="text" name="unidad_medida" id="unidad_medida" class="input-small disabled" readonly /></span>
                    </p>
                    
                    <p>
                        <label>Cantidad de Paquetes que Ingresan:</label>
                        <span class="field"><input type="text" name="cantidad_ingreso" id="cantidad_ingreso" class="input-small"/></span>
                    </p>
                    
                    <p>
                        <label>Fecha de Vencimiento:</label>
                        <span class="field">
                            día / mes / año <br>
                            <select name="dd" id="dd" class="input-mini">
                                <?php for ($i=1;$i<=31;$i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                                } ?>
                            </select> / 
                            <select name="mm" id="mm" class="input-mini">
                                <?php for ($i=1;$i<=12;$i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                                } ?>
                            </select> / 
                            <select name="yy" id="yy" class="input-mini">
                                <?php for ($i=0;$i<=10;$i++){
                                $imp = date('Y') + $i;
                                echo '<option value="'.$imp.'">'.$imp.'</option>';
                                } ?>
                            </select><br>
                            (<a href="#" id="btn_no_vencimiento">El producto no tiene vencimiento</a>)
                        </span>
                    </p>
                    
                    <p>
                        <label>Precio de Compra Total:</label>
                        <span class="field"><input type="text" name="precio_compra_total" id="precio_compra_total" class="input-small"/><a href="#" id="calcular_unitario_ingreso">Calcular Precio Unitario</a></span>
                    </p>
                    
                    <p>
                        <label>Precio Unitario de Ingreso:</label>
                        <span class="field"><input type="text" name="precio_compra_unidad" id="precio_compra_unidad" class="input-small" readonly /></span>
                    </p>
                    
                    <p>
                        <label>Precio de Venta (unitario):</label>
                        <span class="field"><input type="text" name="precio_venta_unitario" id="precio_venta_unitario" class="input-small"/></span>
                    </p>
                    
                    <p>
                        <label>Color:</label>
                        <span class="field">
                            <select name="color" id="colores" class="uniformselect">
                                <?php
                                    $query = "select id, descripcion from colores;";
                                    $rs = mysqli_query($db_cn, $query);
                                    while($res = mysqli_fetch_array($rs)){
                                        $color_id = $res["id"];
                                        $color_descripcion = $res["descripcion"];
                                        echo '<option value="'.$color_id.'">'.$color_descripcion.'</option>';
                                        echo '<script>lista_colores["'.$color_id.'"]="'.$color_descripcion.'";</script>';
                                    }
                                ?>
                            </select>
                        </span>
                    </p>
                    
                    <p class="stdformbutton">
                        <a href="#" class="btn btn-primary" id="btn_agregar">Agregar</a>
                        <button type="reset" class="btn">Deshacer Cambios</button>
                    </p>
                    <p>
                    <table class="table">
                        <tr>
                            <th width="55%">Producto</th>
                            <th width="15%">Cantidad</th>
                            <th width="15%">Precio de Compra</th>
                            <th width="15%">Total</th>
                        </tr>
                    </table>
                    <span id="mostrar" name="mostrar">
                        
                    </span>
                    <input type="submit" class="btn btn-primary" value="Enviar Nota">
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

<script>
jQuery(document).ready(function(){
    jQuery('#filtro_producto').change(function(){
        jQuery('#cantidadpaquete').val(lista_cantidades[jQuery('#filtro_producto option:selected').val()]);
        jQuery('#unidad_medida').val(lista_unidades[jQuery('#filtro_producto option:selected').val()]);
    });
    jQuery('#calcular_unitario_ingreso').click(function(){
        var unitario = 0.0;
        unitario = (jQuery('#precio_compra_total').val() / (jQuery('#cantidadpaquete').val() * jQuery('#cantidad_ingreso').val())).toFixed(2);
        jQuery('#precio_compra_unidad').val(unitario);
    });
    var contador = 0;
    //agregar elementos a la tabla para luego mandarlos como detalle de la nota de ingreso
    jQuery('#btn_agregar').click(function(){
        var agregado = '';
        agregado += '<table class="table-bordered table"><tr>';
        agregado += '<td width="55%">' + lista_nombres[jQuery('#filtro_producto option:selected').val()] + ' - ' + lista_colores[jQuery('#colores option:selected').val()] +'</td>';
        agregado += '<td width="15%">' + (jQuery('#cantidadpaquete').val() * jQuery('#cantidad_ingreso').val()).toFixed(2) + '</td>';
        agregado += '<td width="15%">' + jQuery('#precio_compra_unidad').val() +'</td>';
        agregado += '<td width="15%">' + jQuery('#precio_compra_total').val();
        //campos ocultos
        agregado += '<input type="hidden" name="detalle[' + contador.toString() + '][idproducto]"    value="' + jQuery('#filtro_producto option:selected').val() + '">';
        agregado += '<input type="hidden" name="detalle[' + contador.toString() + '][cantidad]"      value="' + (jQuery('#cantidadpaquete').val() * jQuery('#cantidad_ingreso').val()).toFixed(2) + '">';
        agregado += '<input type="hidden" name="detalle[' + contador.toString() + '][fvencimiento]"  value="' + jQuery('#yy option:selected').val() + '-' + jQuery('#mm option:selected').val() + '-' + jQuery('#dd option:selected').val() + '">';
        agregado += '<input type="hidden" name="detalle[' + contador.toString() + '][precio_compra]" value="' + jQuery('#precio_compra_unidad').val() + '">';
        agregado += '<input type="hidden" name="detalle[' + contador.toString() + '][precio_venta]"  value="' + jQuery('#precio_venta_unitario').val() + '">';
        agregado += '<input type="hidden" name="detalle[' + contador.toString() + '][total]"         value="' + jQuery('#precio_compra_total').val() + '">';
        agregado += '<input type="hidden" name="detalle[' + contador.toString() + '][color]"         value="' + jQuery('#colores option:selected').val() + '">';
        agregado += '</td></tr></table>';
        jQuery('#mostrar').append(agregado);
        contador = contador + 1;
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
