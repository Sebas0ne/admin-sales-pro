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
<!--<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>-->
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
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
<style>
    .cajita{
        font-weight: bold;
        font-size: 16px;
    }
</style>

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
                <li class="dropdown"><a href=""><span class="icon-briefcase"></span> Almacén</a>
                    <ul>
                    	<li><a href="almacen_entrada.php">Entrada a Almacén</a></li>
                        <li><a href="almacen_editarlotes.php">Editar Lotes</a></li>
                        <li><a href="almacen_salida.php">Salida de Productos (NO VENTA)</a></li>
                    </ul>
                </li>
                <li><a href="almacen_inventario.php"><span class="icon-home"></span> Corrección de Inventario</a></li>
                <li class="dropdown active"><a href=""><span class="icon-briefcase"></span> Ventas y Caja</a>
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
          <h1>Nuevo Comprobante de Pago</h1> <span><button onclick="javascript:location.reload()">Recargar Página</button></span><!--sample description for dashboard page...-->
        </div><!--pagetitle-->
        
        <div class="maincontent">
            <div class="contentinner widgetcontent">
                
                <form class="stdform" action="ventas_mostrar.php" method="post">
                    <script>
                        lista_identificadores = [];
                        lista_descripcion = [];
                        lista_descripcion_corta = [];
                        lista_saldo = [];
                        lista_unidades = [];
                        lista_precio_venta = [];
                        lista_colores = [];
                        lista_clientes = [];
                    </script>
                    <label>Tipo de Documento (no se podrá cambiar):</label>
                    <span class="formwrapper">
                        <select id="optTipoDoc" name="optTipoDoc">
                            <option value="1" selected>Boleta</option>
                            <option value="2">Factura</option>
                        </select>
                    </span><br>
                    <?php if($_SESSION["registroclientes"]){ ?>
                    <label>Nombre o Documento (Cliente):</label>
                    <span class="formwrapper">
                        <select data-placeholder="Buscar" style="width:500px" class="chzn-select" tabindex="2" name="filtro_cliente" id="filtro_cliente">
                            <option value=""></option>
                            <?php
                            $query = "select id, dni_ruc, tipodocumento, nombre, direccion, observacion from v_clientes;";
                            $rs = mysqli_query($db_cn, $query);
                            while($res = mysqli_fetch_array($rs)){
                                $cliente_id            = $res["id"];
                                $cliente_documento     = $res["dni_ruc"];
                                $cliente_tipodocumento = $res["tipodocumento"];
                                $cliente_nombre        = $res["nombre"];
                                $cliente_direccion     = $res["direccion"];
                                echo '<option value="'.$cliente_id.'">'.$cliente_documento.' - '.$cliente_nombre.'</option>';
//                                echo '<script>lista_descripcion["'.$cliente_id.'"] = "'.$descripcion.'";';
//                                echo 'lista_saldo["'.$cliente_id.'"] = "'.$saldo.'";';
//                                echo 'lista_identificadores["'.$cadena_id.'"] = "'.$articulo_id.'";';
//                                echo 'lista_colores["'.$cadena_id.'"] = "'.$color.'";';
//                                echo 'lista_unidades["'.$cadena_id.'"] = "'.$unidad.'";';
//                                echo 'lista_precio_venta["'.$cadena_id.'"] = "'.$precio_venta.'";</script>';
                            }
                            ?>
                        </select><br>
                        <a class="btn btn-info" href="" id="btn_nuevo_cliente">Nuevo Cliente</a>
                    </span>
                    <?php }else{ ?>
                        <label>Cliente:</label>
                        <span class="field"><input type="text" name="nombrecliente" id="nombrecliente" class="input-large" /></span>
                    
                        <label>Dirección:</label>
                        <span class="field"><input type="text" name="direccioncliente" id="direccioncliente" class="input-large" /></span>
                    
                        <label>DNI o RUC:</label>
                        <span class="field"><input type="text" name="documentocliente" id="documentocliente" class="input-medium" /></span>
                    <?php } ?>
                    <hr>
                    <label>Nombre o Código de Barras (Producto)</label>
                    <span class="formwrapper">
                        <select data-placeholder="Buscar" style="width:500px" class="chzn-select" tabindex="2" name="filtro_producto" id="filtro_producto">
                            <option value=""></option>
                            <?php
                            $query = "select id, cod_barra, descripcion, saldo, unidad, precio_venta, idcolor from v_lista_precios_kardex;";
                            $rs = mysqli_query($db_cn, $query);
                            while($res = mysqli_fetch_array($rs)){
                                $cadena_id         = $res["id"]."c".$res["idcolor"];
                                $articulo_id       = $res["id"];
                                $descripcion       = $res["descripcion"];
                                $descripcion_corta = $res["descripcion_corta"];
                                $cod_barra         = $res["cod_barra"];
                                $saldo             = $res["saldo"];
                                $unidad            = $res["unidad"];
                                $precio_venta      = $res["precio_venta"];
                                $color             = $res["idcolor"];
                                echo '<option value="'.$cadena_id.'">'.$cod_barra.' - '.$descripcion.'</option>';
                                echo '<script>lista_descripcion["'.$cadena_id.'"] = "'.$descripcion.'";';
                                echo 'lista_saldo["'.$cadena_id.'"] = "'.$saldo.'";';
                                echo 'lista_identificadores["'.$cadena_id.'"] = "'.$articulo_id.'";';
                                echo 'lista_colores["'.$cadena_id.'"] = "'.$color.'";';
                                echo 'lista_unidades["'.$cadena_id.'"] = "'.$unidad.'";';
                                echo 'lista_precio_venta["'.$cadena_id.'"] = "'.$precio_venta.'";</script>';
                            }
                            ?>
                        </select> 
                    </span>
                    
                    
                    
                     <label>Cantidad: (máximo <span style="color: navy" id="tip_cantidad">--</span> <span id="tip_unidad">--</span>)</label>
                        <span class="field"><input type="text" name="cantidad" id="cantidad" class="input-small" /></span>
                    
                        <span class="field"><a href="#" class="btn btn-info" id="agregar">Agregar</a></span><br>
                        
                        <table class="table table-bordered" id="tableta">
                            <colgroup>
                                <col class="con0" style="display: none;"/>
                                <col class="con1" />
                                <col class="con0" />
                                <col class="con1" />
                                <col class="con0" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th style="display: none;">id de producto</th>
                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Precio Unitario</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <br>
                        <div class="alineacion">
                            <label>SubTotal: </label><input type="text" class="input-medium cajita" readonly id="txtSubTotal" name="txtSubTotal"><br>
                            <label>Impuesto: </label><input type="text" class="input-medium cajita" readonly id="txtImpuesto" name="txtImpuesto"><br>
                            <label>Total: </label><input type="text" class="input-medium cajita" readonly id="txtTotal" name="txtTotal"><br>
                            <label>Descuento: </label><input type="text" class="input-medium cajita" id="txtDescuento" value="0" name="txtDescuento"><a href="#" id="btnAplicarDescuento">Aplicar Descuento</a><br>
                            <label>Total a Pagar: </label><input type="text" class="input-medium cajita" readonly id="txtPago" name="txtPago"><br>
                        </div>
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

<script>
jQuery(document).ready(function(){
    jQuery('#filtro_producto').change(function(){
        jQuery('#tip_unidad').text(lista_unidades[jQuery('#filtro_producto option:selected').val()]);
        jQuery('#tip_cantidad').text(lista_saldo[jQuery('#filtro_producto option:selected').val()]);
    });
    
    var valorIndice = 0;
    var valorIdProducto = 0;
    var valorCantidad = 0.0;
    var valorProducto = '';
    var valorPrecio = 0.0;
    var valorTotalItem = 0.0;
    var valorSubTotal = 0.0;
    var valorSubTotalMuestro = 0.0;
//    var valorImpuesto = 0.0;
    var valorTotal = 0.0;
    var valorDescuento = 0.0;
    var valorPago = 0.0;
    var valorIGV = 0.0;
    var valorColor = 0;
    valorIGV = <?php echo $_SESSION["igv"]; ?>;
    jQuery('#agregar').click(function(){
        var tipodocumento = jQuery('#optTipoDoc option:selected').val().toString();
        valorCantidad     = jQuery('#cantidad').val();
        valorIdProducto   = lista_identificadores[jQuery('#filtro_producto option:selected').val()];
        valorColor        = lista_colores[jQuery('#filtro_producto option:selected').val()];
        comparaSaldo      = lista_saldo[jQuery('#filtro_producto option:selected').val()] - jQuery('#cantidad').val();
        if(comparaSaldo >= 0){
            jQuery('#optTipoDoc').prop("disabled",true);
            valorProducto  = lista_descripcion[jQuery('#filtro_producto option:selected').val()];
            valorPrecio    = lista_precio_venta[jQuery('#filtro_producto option:selected').val()];
            valorTotalItem = valorCantidad * valorPrecio;
            jQuery('#tableta > tbody:last-child').append('<tr><td style="display: none;"><input type="hidden" name="detalle['+valorIndice.toString()+'][idproducto]" value="'+valorIdProducto.toString()+'"><input type="hidden" name="detalle['+valorIndice.toString()+'][cantidad]" value="'+valorCantidad.toString()+'"><input type="hidden" name="detalle['+valorIndice.toString()+'][nombre]" value="'+valorProducto.toString()+'"><input type="hidden" name="detalle['+valorIndice.toString()+'][subtotal]" value="'+valorTotalItem.toString()+'"><input type="hidden" name="detalle['+valorIndice.toString()+'][unitario]" value="'+valorPrecio.toString()+'"><input type="hidden" name="detalle['+valorIndice.toString()+'][color]" value="'+valorColor.toString()+'"></td><td>'+valorCantidad.toString()+'</td><td>'+valorProducto.toString()+'</td><td>'+valorPrecio.toString()+'</td><td>'+valorTotalItem.toString()+'</td></tr>');
            valorIndice    = valorIndice + 1;
            valorSubTotal  = valorSubTotal + valorTotalItem;
            if(tipodocumento === "1"){
                valorSubTotalMuestro = valorSubTotal.toFixed(2);
            }else{
                valorSubTotalMuestro = (valorSubTotal / (1 + valorIGV)).toFixed(2);
            }
            valorImpuestoMuestro = (valorSubTotal - valorSubTotalMuestro).toFixed(2);
            jQuery('#txtSubTotal').val(valorSubTotalMuestro.toString());
//            valorImpuesto = valorSubTotal * valorIGV;
//            valorImpuesto = Math.round((valorImpuesto + 0.00001) * 100);
//            valorImpuesto = valorImpuesto / 100;
            jQuery('#txtImpuesto').val(valorImpuestoMuestro.toString());
            valorTotal = valorSubTotal.toFixed(2); // + valorImpuesto;
            jQuery('#txtTotal').val(valorTotal.toString());
            valorDescuento = jQuery('#txtDescuento').val();
            valorPago = (valorTotal - valorDescuento).toFixed(2);
            jQuery('#txtPago').val(valorPago.toString());
        }else{
            alert('No hay saldo suficiente para cubrir la cantidad!');
        }
    });
    jQuery('#btnAplicarDescuento').click(function(){
        valorDescuento = jQuery('#txtDescuento').val();
        valorTotal = jQuery('#txtTotal').val();
        valorPago = (valorTotal - valorDescuento).toFixed(2);
        jQuery('#txtPago').val(valorPago.toString());
    });
});

var ventana_cliente;
function abrir_nuevo_cliente(){
    ventana_cliente = window.open("cliente_nuevo.php", "nombrePop-Up", "width=380, height=500, top=85, left=150");
}
document.getElementById("btn_nuevo_cliente").onclick = function() {abrir_nuevo_cliente()};

</script>

</body>
</html>
