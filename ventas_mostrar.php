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
          <h1>Nuevo Comprobante de Pago</h1> <span></span><!--sample description for dashboard page...-->
        </div><!--pagetitle-->
        
        <div class="maincontent">
            <div class="contentinner widgetcontent">
                <form class="stdform" action="ventas_guardar.php" method="post">
                    <?php
                    if(isset($_POST["nombrecliente"])){
                    ?>
                    <table border="1">
                        <tr>
                            <td>Cliente:</td>
                            <td><?php echo $_POST["nombrecliente"]; ?></td>
                        </tr>
                        <tr>
                            <td>Dirección:</td>
                            <td><?php echo $_POST["direccioncliente"]; ?></td>
                        </tr>
                        <tr>
                            <td>DNI / RUC:</td>
                            <td><?php echo $_POST["documentocliente"]; ?></td>
                        </tr>
                    </table>
                    <?php }else{
                        //aquí poner los datos del cliente extraído de la DB
                    echo 'ID cliente:'.$_POST["filtro_cliente"];
                    } ?>
                    <?php
                    $subtotal = $_POST["txtSubTotal"];
                    $impuesto = $_POST["txtImpuesto"];
                    $total = $_POST["txtTotal"];
                    $descuento = $_POST["txtDescuento"];
                    $pago = $_POST["txtPago"];
                    $idComprobante = '';
                    $cliente_nombre = '';
                    $cliente_documento = '';
                    $cliente_direccion = '';
                    $cliente_id = '';
                    $caja = $_SESSION["caja"];
                    $tipoDoc = 1;
                    if($impuesto == 0){
                        $tipoDoc = 1;
                    }else{
                        $tipoDoc = 2;
                    }
                    $var_sesion = $_SESSION["sesion"];
                    //1: boleta, 2: factura
                    if($_SESSION["registroclientes"]){
                        $cliente_id = $_POST["filtro_cliente"];
                        $query = "select guardar_comprobante_maestro($caja,$tipoDoc,$subtotal,$impuesto,$total,$descuento,$pago,$cliente_id,'prueba id cliente','','','','$var_sesion') as idcomprobante";
                        //echo $query.'<br>';
                    }else{
                        $cliente_nombre    = $_POST["nombrecliente"];
                        $cliente_documento = $_POST["documentocliente"];
                        $cliente_direccion = $_POST["direccioncliente"];
                        $query = "select guardar_comprobante_maestro($caja,$tipoDoc,$subtotal,$impuesto,$total,$descuento,$pago,1,'prueba cliente sin id','$cliente_nombre','$cliente_direccion','$cliente_documento') as idcomprobante";
                        //echo $query.'<br>';
                    }
                    $rs = mysqli_query($db_cn, $query);
                    while($res = mysqli_fetch_array($rs)){
                        $idComprobante = $res["idcomprobante"];
                        //echo "cabecera guardada <br>";
                    }
                    echo '<table>';
                    echo '<tr><th>Nombre</th><th>Cantidad</th><th>Precio Unitario</th><th>Total</th></tr>';
                    if(isset($_POST['detalle'])){
                        foreach ($_POST['detalle'] as $det){
                            echo '<tr>';
                            //echo '<td>'.$det['idproducto'].' &nbsp; </td>';
                            echo '<td>'.$det['nombre'].' &nbsp; </td>';
                            echo '<td>'.$det['cantidad'].' &nbsp; </td>';
                            echo '<td>'.$det['unitario'].' &nbsp; </td>';
                            echo '<td>'.$det['subtotal'].' </td>';
                            echo '</tr>';
                            $idproducto = $det['idproducto'];
                            $cantidad = $det['cantidad'];
                            $unitario = $det['unitario'];
                            $subtotal = $det['subtotal'];
                            $color = $det["color"];
                            $query = "select guardar_comprobante_detalle($idComprobante,$idproducto,$cantidad,$unitario,$subtotal,$color) as ress";
                            //echo $query.'<br>';
                            $rs = mysqli_query($db_cn, $query);
                            while ($res = mysqli_fetch_array($rs)){
                                //echo "detalle guardado <br>";
                            }
                            $query = "select extraer_kardex($idproducto,$cantidad,$color,$idComprobante) as ress";
                            //echo $query.'<br>';
                            $rs = mysqli_query($db_cn, $query);
                            while ($res = mysqli_fetch_array($rs)){
                                //echo "kardex guardado <br>";
                            }
                        }
                    }
                    echo '</table>';
                    ?>
                    <table>
                        <tr>
                            <td>Tipo:</td>
                            <td><?php if($tipoDoc == 1){ echo 'BOLETA';} else { echo 'FACTURA';}?></td>
                        </tr>
                        <tr>
                            <td>Subtotal:</td>
                            <td><?php echo $_POST["txtSubTotal"]; ?></td>
                        </tr><?php if($tipoDoc != 1){ ?>
                        <tr>
                            <td>IGV:</td>
                            <td><?php echo $_POST["txtImpuesto"]; ?></td>
                        </tr>
                        <tr>
                            <td>Total:</td>
                            <td><?php echo $_POST["txtTotal"]; ?></td>
                        </tr><?php } ?>
                        <tr>
                            <td>Descuento:</td>
                            <td><?php echo $_POST["txtDescuento"]; ?></td>
                        </tr>
                        <tr>
                            <td>Total a Pagar:</td>
                            <td><?php echo $_POST["txtPago"]; ?></td>
                        </tr>
                    </table>
                    <p class="stdformbutton">
                        <a href="#" class="btn btn-primary" id="imprimir">IMPRIMIR</a>
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
<?php
$query = "select primer_correlativo, segundo_correlativo, tipodocumento from comprobante_maestro where id = $idComprobante";
$rs = mysqli_query($db_cn, $query);
$uno = '';
$dos = '';
$tres = '';
while($res = mysqli_fetch_array($rs)){
    $uno  = $res["primer_correlativo"];
    $dos  = $res["segundo_correlativo"];
    $tres = $res["tipodocumento"];
}
$zelda = "./tcpdf/examples/verRecibo.php?serie=$uno&nro=$dos&tipo=$tres";
?>
<script>
jQuery(document).ready(function(){
    jQuery('#filtro_producto').change(function(){
        jQuery('#tip_unidad').text(lista_unidades[jQuery('#filtro_producto option:selected').val()]);
        jQuery('#tip_cantidad').text(lista_saldo[jQuery('#filtro_producto option:selected').val()]);
    });
    var valorIdProducto = 0;
    var valorCantidad = 0.0;
    var valorProducto = '';
    var valorPrecio = 0.0;
    var valorTotalItem = 0.0;
    var valorSubTotal = 0.0;
    var valorImpuesto = 0.0;
    var valorTotal = 0.0;
    var valorDescuento = 0.0;
    var valorPago = 0.0;
    var valorIGV = 0.0;
    valorIGV = <?php echo $_SESSION["igv"]; ?>;
    jQuery('#agregar').click(function(){
        valorCantidad = jQuery('#cantidad').val();
        valorIdProducto = jQuery('#filtro_producto option:selected').val();
        comparaSaldo = lista_saldo[jQuery('#filtro_producto option:selected').val()] - jQuery('#cantidad').val();
        if(comparaSaldo >= 0){
            valorProducto = lista_descripcion[jQuery('#filtro_producto option:selected').val()];
            valorPrecio = lista_precio_venta[jQuery('#filtro_producto option:selected').val()];
            valorTotalItem = valorCantidad * valorPrecio;
            jQuery('#tableta > tbody:last-child').append('<tr><td style="display: none;"><input type="hidden" name="detalle['+valorIdProducto.toString()+'][idproducto]" value="'+valorIdProducto.toString()+'"><input type="hidden" name="detalle['+valorIdProducto.toString()+'][cantidad]" value="'+valorCantidad.toString()+'"><input type="hidden" name="detalle['+valorIdProducto.toString()+'][subtotal]" value="'+valorTotalItem.toString()+'"><input type="hidden" name="detalle['+valorIdProducto.toString()+'][unitario]" value="'+valorPrecio.toString()+'"></td><td>'+valorCantidad.toString()+'</td><td>'+valorProducto+'</td><td>'+valorPrecio.toString()+'</td><td>'+valorTotalItem.toString()+'</td></tr>');
            
            valorSubTotal = valorSubTotal + valorTotalItem;
            jQuery('#txtSubTotal').val(valorSubTotal.toString());
            valorImpuesto = valorSubTotal * valorIGV;
            valorImpuesto = Math.round((valorImpuesto + 0.00001) * 100);
            valorImpuesto = valorImpuesto / 100;
            jQuery('#txtImpuesto').val(valorImpuesto.toString());
            valorTotal = valorSubTotal + valorImpuesto;
            valorTotal = Math.round((valorTotal + 0.00001) * 100);
            valorTotal = valorTotal / 100;
            jQuery('#txtTotal').val(valorTotal.toString());
            valorDescuento = jQuery('#txtDescuento').val();
            valorPago = valorTotal - valorDescuento;
            valorPago = Math.round((valorPago + 0.00001) * 100);
            valorPago = valorPago / 100;
            jQuery('#txtPago').val(valorPago.toString());
        }else{
            alert('No hay saldo suficiente para cubrir la cantidad!');
        }
    });
    jQuery('#btnAplicarDescuento').click(function(){
        valorDescuento = jQuery('#txtDescuento').val();
        valorTotal = jQuery('#txtTotal').val();
        valorPago = valorTotal - valorDescuento;
        valorPago = Math.round((valorPago + 0.00001) * 100);
        valorPago = valorPago / 100;
        jQuery('#txtPago').val(valorPago.toString());
    });
});
//acción del botón de imprimir
var ventana_comprobante;
function abrir_nuevo_comprobante(){
    ventana_comprobante = window.open("<?php echo $zelda; ?>", "nombrePop-Up", "width=1000, height=700, top=0, left=0");
}
document.getElementById("imprimir").onclick = function() {abrir_nuevo_comprobante();};
</script>

</body>
</html>
