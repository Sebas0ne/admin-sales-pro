<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Sistema de Ventas y Almacén - Overware</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<?php
    include 'conexion.php';
?>
</head>

<body class="loginbody">

<div class="loginwrapper">
	<div class="loginwrap zindex100 animate2 bounceInDown">
	<h1 class="logintitle"><span class="iconfa-lock"></span> INGRESO <span class="subtitle">Por favor, ingrese su usuario y contraseña</span></h1>
        <div class="loginwrapperinner">
            <form id="loginform" action="validaUsuario.php" method="post">
                <p class="animate4 bounceIn"><input type="text" id="username" name="username" placeholder="Usuario" /></p>
                <p class="animate5 bounceIn"><input type="password" id="password" name="password" placeholder="Contraseña" /></p>
                <p class="animate5 bounceIn">
                    <select placeholder="Número de Caja" id="caja" name="caja">
                        <?php
                        $query = "select id, descripcion from caja where estado = 1;";
                        $rs = mysqli_query($db_cn, $query);
                        while($res = mysqli_fetch_array($rs)){
                            echo '<option value="'.$res["id"].'">'.$res["descripcion"].'</option>';
                        }
                        ?>
                    </select>
                </p>
                <p class="animate6 bounceIn"><button class="btn btn-default btn-block">INGRESO</button></p>
                <p class="animate7 fadeIn"><a href=""><span class="icon-question-sign icon-white"></span> ¿Olvidó su contraseña?</a></p>
                <p class="animate7 fadeIn">Si usted no inicia correctamente o no tiene permisos o licencia, no podrá salir de esta página.</p>
            </form>
        </div><!--loginwrapperinner-->
    </div>
    <div class="loginshadow animate3 fadeInUp"></div>
</div><!--loginwrapper-->

<script type="text/javascript">
jQuery.noConflict();

jQuery(document).ready(function(){
	
	var anievent = (jQuery.browser.webkit)? 'webkitAnimationEnd' : 'animationend';
	jQuery('.loginwrap').bind(anievent,function(){
		jQuery(this).removeClass('animate2 bounceInDown');
	});
	
	jQuery('#username,#password').focus(function(){
		if(jQuery(this).hasClass('error')) jQuery(this).removeClass('error');
	});
	
	jQuery('#loginform button').click(function(){
		if(!jQuery.browser.msie) {
			if(jQuery('#username').val() == '' || jQuery('#password').val() == '') {
				if(jQuery('#username').val() == '') jQuery('#username').addClass('error'); else jQuery('#username').removeClass('error');
				if(jQuery('#password').val() == '') jQuery('#password').addClass('error'); else jQuery('#password').removeClass('error');
				jQuery('.loginwrap').addClass('animate0 wobble').bind(anievent,function(){
					jQuery(this).removeClass('animate0 wobble');
				});
			} else {
				jQuery('.loginwrapper').addClass('animate0 fadeOutUp').bind(anievent,function(){
					jQuery('#loginform').submit();
				});
			}
			return false;
		}
	});
});
</script>
</body>
</html>
