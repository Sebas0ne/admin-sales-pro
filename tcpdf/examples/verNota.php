<?php
session_start();
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

//globales
$empresa = $_SESSION["empresa"];


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Overware');
$pdf->SetTitle('Nota de Ingreso');
$pdf->SetSubject('Nota de Ingreso Overware');
$pdf->SetKeywords('comprobante, factura, boleta, recibo');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(10, 10, 10);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/spa.php')) {
	require_once(dirname(__FILE__).'/lang/spa.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */
include_once '../../conexion.php';
$primer_correlativo = 0;
$segundo_correlativo = 0;
if(isset($_GET["nota"])){
    //cuando invoco con el ID de la nota, debo sacar el primer y segundo correlativo
    //realizo una query para sacar los dos correlativos
    $query = "select primer_correlativo, segundo_correlativo from ingreso_maestro where id = ".$_GET["nota"];
    $rs = mysqli_query($db_cn, $query);
    while($res = mysqli_fetch_array($rs)){
        $primer_correlativo = $res["primer_correlativo"];
        $segundo_correlativo = $res["segundo_correlativo"];
    }
    mysqli_next_result($db_cn);
}else{
    //envío directamente los dos correlativos
    $primer_correlativo  = $_GET["primero"];
    $segundo_correlativo = $_GET["segundo"];
}

// define some HTML content with style
$html = <<<EOF
<style>
    .cabecera tr td {background-color: #cccccc;}
    .columna1 {width: 64%;}
    .columna2 {width: 20%;}
    .columna3 {width: 12%;}
    th {font-weight: bold;}
    .logotipo{width: 100px;}
    .arriba{text-align: center; width: 100%;}
    .titulo{width: 90%; text-align: left;}
    .titulazo{font-weight: bold; font-size: 26px;}
    .marco{border:1px solid #999999;}
</style>
EOF;

$valorNumero = "";
$valorProveedor = "";
$valorFecha = "";
$valorTotal = "";
$valorRUC = "";
//cabecera (datos cliente)
$query = "call ver_nota_cabecera($primer_correlativo, $segundo_correlativo);";
$rs = mysqli_query($db_cn, $query);
while($res = mysqli_fetch_array($rs)){
    $valorNumero = $res["correlativo"];
    $valorProveedor = $res["proveedor"];
    $valorFecha = $res["fecha"];
    $valorTotal = $res["total"];
    $valorRUC = $res["ruc"];
}

$nombreempresa    = $_SESSION["empresa_largo"];
$direccionempresa = $_SESSION["direccion"];
$rucempresa       = $_SESSION["ruc"];
$cabeza = '<div class="arriba"><table><tr><td class="logotipo"><img src="images/logo_square.png"></td><td class="titulo">&nbsp;&nbsp;&nbsp;<span class="titulazo">'.$nombreempresa.'</span><br>&nbsp;&nbsp;&nbsp;'.$direccionempresa.'<br>&nbsp;&nbsp;&nbsp;RUC: '.$rucempresa.'</td></tr></table></div>';
$html = $html.$cabeza.'<table>'
        .'<tr><td class="columna2">Nota de Ingreso:</td><td>'.$valorNumero.'</td></tr>'
        ."<tr><td>Proveedor:</td><td>$valorProveedor</td></tr>"
        ."<tr><td>RUC:</td><td>$valorRUC</td></tr>"
        ."<tr><td>Fecha:</td><td>$valorFecha</td></tr></table><br><br>";

mysqli_next_result($db_cn);
//detalle
$query = "call ver_nota_detalle($primer_correlativo, $segundo_correlativo);";
$rs = mysqli_query($db_cn, $query);
$html = $html.'<table class="marco"><tr><td class="columna1">Descripción</td><td class="columna3">Cantidad</td><td class="columna3">P. Unitario</td><td class="columna3">Importe</td></tr>';
while($res = mysqli_fetch_array($rs)){
    $html = $html.'<tr><td class="columna1">'.$res["descripcion"].'</td><td>'.$res["cantidad"].'</td><td>'.$res["precio_unitario"].'</td><td>'.$res["subtotal"].'</td></tr>';
}
$html = $html.'</table><br><br>';

$html = $html.'<table>';

//if($valorImpuesto > 0){
//$html = $html.'<tr><td class="columna2">Subtotal:</td><td>'.$valorSubtotalBruto.'</td></tr>'
//        ."<tr><td>IGV:</td><td>$valorImpuesto</td></tr>";
//}
//if($valorDescuento > 0){
//	$html = $html.'<tr><td class="columna2">Total:</td><td>'.$valorSubTotal.'</td></tr>'
//        ."<tr><td>Descuento:</td><td>$valorDescuento</td></tr>";
//}
        
    $html = $html.'<tr><td class="columna2">Total a Pagar:</td><td>'.$valorTotal.'</td></tr>'
        .'</table>';


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('boleta.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
