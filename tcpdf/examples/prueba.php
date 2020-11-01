<?php
$valorSerie  = $_GET["serie"];
$valorNumero = $_GET["nro"];
$valorTipo   = $_GET["tipo"];

$valorCorrelativo = '';
$valorSubtotalBruto = '';
$valorImpuesto = '';
$valorSubTotal = '';
$valorDescuento = '';
$valorTotal = '';
$valorFechaIngreso = '';
$valorNombre = '';
$valorDireccion = '';
$valorCorreo = '';
$valorTelefono = '';
$valorDocumento = '';
$textoTipo = '';
// define some HTML content with style
$html = <<<EOF
<style>
    .cabecera tr td {background-color: #cccccc;}
</style>
EOF;
include_once '../../conexion.php';
//cabecera (datos cliente)
$query = "call verCabecera($valorSerie,$valorNumero,$valorTipo);";
$rs = mysqli_query($db_cn, $query);
while($res = mysqli_fetch_array($rs)){
    $valorCorrelativo   = $res["correlativo"];
    $valorSubtotalBruto = $res["subtotal_bruto"];
    $valorImpuesto      = $res["impuesto"];
    $valorSubTotal      = $res["subtotal"];
    $valorDescuento     = $res["descuento"];
    $valorTotal         = $res["total"];
    $valorFechaIngreso  = $res["fechaIngreso"];
    $valorNombre        = $res["nombre"];
    $valorDireccion     = $res["direccion"];
    $valorCorreo        = $res["correo"];
    $valorTelefono      = $res["telefono"];
    $valorDocumento     = $res["documento"];
}

mysqli_next_result($db_cn);
if($valorTipo == 1){
    $textoTipo = 'BOLETA';
}else{
    $textoTipo = 'FACTURA';
}
$html = $html.'<table>'
        ."<tr><td>Cliente:</td><td>$valorNombre</td></tr>"
        ."<tr><td>Dirección:</td><td>$valorDireccion</td></tr>"
        ."<tr><td>Documento:</td><td>$valorDocumento</td></tr>"
        ."<tr><td>Comprobante:</td><td>$textoTipo $valorCorrelativo</td></tr></table>";

$html = $html."<table><tr><td>Subtotal:</td><td>$valorSubtotalBruto</td></tr>"
        ."<tr><td>IGV:</td><td>$valorImpuesto</td></tr>"
        ."<tr><td>Total:</td><td>$valorSubTotal</td></tr>"
        ."<tr><td>Descuento:</td><td>$valorDescuento</td></tr>"
        ."<tr><td>Total a Pagar:</td><td>$valorTotal</td></tr>"
        .'</table>';



//detalle
$query = "call verDetalle($valorSerie,$valorNumero,$valorTipo);";
$rs = mysqli_query($db_cn, $query);
$html = $html.'<table><tr><th>Descripción</th><th>Cantidad</th><th>P. Unitario</th><th>Importe</th></tr>';
while($res = mysqli_fetch_array($rs)){
    $html = $html.'<tr><td>'.$res["descripcion"].'</td><td>'.$res["cantidad"].'</td><td>'.$res["precio_unit"].'</td><td>'.$res["subtotal"].'</td></tr>';
}
$html = $html.'</table>';


echo $html;
?>