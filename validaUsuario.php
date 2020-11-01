<?php
session_start();
include_once 'conexion.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // validando el usuario ingresado
        
        //evalúo si existen los datos de ingreso
        if(!isset($_POST["username"])){
           die("mal envío de datos");
        }
        //variables
        $usuario  = $_POST["username"];
        $password = $_POST["password"];
        $id_usuario = 0;
        $_SESSION["permiso"] = 0;
        //query SQL
        $query = "select id, nombre, usuario, pass, descripcion, tipo from v_usuarios where usuario = '$usuario' and pass = '$password'";
        $res = mysqli_query($db_cn, $query);
        if(!$res){echo 'datos no válidos';}
        while($resultado = mysqli_fetch_array($res)){
            $_SESSION["permiso"] = $resultado["tipo"];
            $_SESSION["nombre"] = $resultado["nombre"];
            $_SESSION["usuario"] = $resultado["usuario"];
            $id_usuario = $resultado["id"];
        }
        mysqli_next_result();
        $cliente_ip = get_client_ip();
        $query = "select iniciar_sesion('$usuario','$cliente_ip') as sesion;";
        $rs = mysqli_query($db_cn, $query);
        while($res = mysqli_fetch_array($rs)){
            $_SESSION["sesion"] = $res["sesion"];
        }
        $query = "select nombre, nombrelargo, estado, DATE_FORMAT(fecha_vencimiento, ".'"%d/%m/%Y"'.") as vencimiento, ruc, direccion, telefono, igv, registroclientes from empresa";//debería ser un solo registro
        $res = mysqli_query($db_cn, $query);
        while($resultado = mysqli_fetch_array($res)){
            $_SESSION["empresa"] = $resultado["nombre"];
            $_SESSION["empresa_largo"] = $resultado["nombrelargo"];
            $_SESSION["estadoempresa"] = $resultado["estado"];
            $_SESSION["vencimiento"] = $resultado["vencimiento"];
            $_SESSION["ruc"] = $resultado["ruc"];
            $_SESSION["direccion"] = $resultado["direccion"];
            $_SESSION["telefono"] = $resultado["telefono"];
            $_SESSION["igv"] = $resultado["igv"];
            $_SESSION["registroclientes"] = FALSE;
            if($resultado["registroclientes"] == 1){
                $_SESSION["registroclientes"] = TRUE;
            }
        }
        $_SESSION["caja"] = 1;
        if(isset($_POST["caja"])){
            $_SESSION["caja"] = $_POST["caja"];
        }
        if($_SESSION["permiso"] == 0){
            echo 'usuario y contraseña no válidos';
            session_destroy();
            header("Location: index.php");
        }else{
            echo 'redireccionando al indice de usuario';
            header("Location: inicio.php");
        }
        ?>
    </body>
</html>
