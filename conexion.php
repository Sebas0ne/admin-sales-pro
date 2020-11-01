<?php
//conectando a MySQL
$db_usuario = "root";
$db_pass    = "";
$db_db      = "ventas";
$db_host    = "localhost";
$db_port    = "3306";

$db_cn = mysqli_connect($db_host, $db_usuario, $db_pass) or die("no se pudo conectar con el servidor!");
//echo 'conexión realizada<br>';
mysqli_select_db($db_cn, $db_db);
mysqli_query($db_cn,"SET NAMES 'utf8'");
//echo 'DB seleccionada<br>';

//probando una query cualquiera
//$query = "select * from usuarios";
//$rs = mysqli_query($db_cn, $query);
//while($res = mysqli_fetch_array($rs)){
//    echo $res[1];
//}


$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
//echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
$dia_hoy = date('d');

$current_time = $dias[date('w')]." ".$dia_hoy." de ".$meses[date('n')-1]. " del ".date('Y');

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}