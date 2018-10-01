<?php 

$mensajeStatus = null;

if(isset($_POST["ajax"]))
{
	$nombre = htmlspecialchars($_POST['nombre']);
	$ciudad = htmlspecialchars($_POST['ciudad']);
	$telefono = htmlspecialchars($_POST['telefono']);
	$correo = htmlspecialchars($_POST['correo']);
	$asunto = htmlspecialchars($_POST['asunto']);
	$mensaje = htmlspecialchars($_POST['mensaje']);

	//campo nombre
	if($nombre == '')
	{
		$mensajeStatus = "<script>document.getElementById('nombre-status').innerHTML='El campo es requerido';</script>";
	}

	elseif(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombre))
	{
		$mensajeStatus = "<script>document.getElementById('nombre-status').innerHTML='Error s&oacute;lo se permiten letras';</script>";
	}

	elseif(strlen($nombre) < 2)
	{
		$mensajeStatus = "<script>document.getElementById('nombre-status').innerHTML='m&iacute;nimo permitido 2 caracteres';</script>";
	}

	elseif(strlen($nombre) > 60)
	{
		$mensajeStatus = "<script>document.getElementById('nombre-status').innerHTML='m&aacute;ximo permitido 60 caracteres';</script>";
	}

	//campo ciudad
	elseif( $ciudad =='')
	{
		$mensajeStatus = "<script>document.getElementById('ciudad-status').innerHTML='El campo es requerido';</script>";
	}

	elseif(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $ciudad))
	{
		$mensajeStatus = "<script>document.getElementById('ciudad-status').innerHTML='Error s&oacute;lo se permiten letras';</script>";
	}

	elseif(strlen($ciudad) < 2)
	{
		$mensajeStatus = "<script>document.getElementById('ciudad-status').innerHTML='m&iacute;nimo permitido 2 caracteres';</script>";
	}

	elseif(strlen($ciudad) > 60)
	{
		$mensajeStatus = "<script>document.getElementById('ciudad-status').innerHTML='m&aacute;ximo permitido 60 caracteres';</script>";
	}

	//campo telefono
	elseif( $telefono =='')
	{
		$mensajeStatus = "<script>document.getElementById('telefono-status').innerHTML='El campo es requerido';</script>";
	}

	elseif(!preg_match('/^([0-9]+\.+[0-9]|[0-9])+$/', $telefono))
	{
		$mensajeStatus = "<script>document.getElementById('telefono-status').innerHTML='Debe ingresar un numero de teléfono válido';</script>";
	}

	elseif(strlen($telefono) < 8)
	{
		$mensajeStatus = "<script>document.getElementById('telefono-status').innerHTML='m&iacute;nimo permitido 8 caracteres';</script>";
	}

	elseif(strlen($telefono) > 60)
	{
		$mensajeStatus = "<script>document.getElementById('telefono-status').innerHTML='m&aacute;ximo permitido 60 caracteres';</script>";
	}

	//campo correo
	elseif( $correo =='')
	{
		$mensajeStatus = "<script>document.getElementById('email-status').innerHTML='El campo es requerido';</script>";
	}

	elseif(!preg_match('/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/', $correo))
	{
		$mensajeStatus = "<script>document.getElementById('email-status').innerHTML='debe ingresar un correo electrónico válido';</script>";
	}

	elseif(strlen($correo) < 8)
	{
		$mensajeStatus = "<script>document.getElementById('email-status').innerHTML='m&iacute;nimo permitido 8 caracteres';</script>";
	}

	elseif(strlen($correo) > 80)
	{
		$mensajeStatus = "<script>document.getElementById('email-status').innerHTML='m&aacute;ximo permitido 80 caracteres';</script>";
	}

	//campo asunto
	elseif( $asunto =='')
	{
		$mensajeStatus = "<script>document.getElementById('asunto-status').innerHTML='El campo es requerido';</script>";
	}

	elseif(strlen($correo) < 5)
	{
		$mensajeStatus = "<script>document.getElementById('asunto-status').innerHTML='m&iacute;nimo permitido 5 caracteres';</script>";
	}

	elseif(strlen($correo) > 60)
	{
		$mensajeStatus = "<script>document.getElementById('asunto-status').innerHTML='m&aacute;ximo permitido 60 caracteres';</script>";
	}

	//campo mensaje
	elseif( $mensaje =='')
	{
		$mensajeStatus = "<script>document.getElementById('mensaje-status').innerHTML='El campo es requerido';</script>";
	}

	elseif(strlen($mensaje) < 5)
	{
		$mensajeStatus = "<script>document.getElementById('mensaje-status').innerHTML='m&iacute;nimo permitido 5 caracteres';</script>";
	}

	elseif(strlen($mensaje) > 300)
	{
		$mensajeStatus = "<script>document.getElementById('mensaje-status').innerHTML='m&aacute;ximo permitido 300 caracteres';</script>";
	}

	else
	{
		//destino
		$destino="juan_27angel@hotmail.com";
		//enviar al correo
		$contenido = '
			<html>
			<head></head>
			<body>
				<h3>'.$nombre.' ha enviado el siguiente mensaje a través de la página</h3>
				<p>'.$ciudad.'</p>
				<p>'.$telefono.'</p>
				<br>
				<p>'.$mensaje.'</p>
				<br>
				<h2>Te puedes poner en contacto con '.$nombre.' al correo  <span style="color:#0645AD = rgb(6,69,173);">'.$correo.'</span></h2> 
			</body>
			</html>
		';

		//cabeceras
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "Content-type: text/html; charset=UTF-8\r\n";

		//envio de correo
		$envio = mail($destino, $asunto, $contenido, $headers);

		if($envio)
		{
			printf("<script>alert('Su correo ha sido enviado, gracias');</script>");
			printf("<script>window.location.href=landing.php;</script>");
		}

		else
		{
			printf("<script>alert('Intentelo de nuevo en unos momentos');</script>");
			printf("<script>window.location.href=landing.php;</script>");
		}
	}
}

echo $mensajeStatus;

?>