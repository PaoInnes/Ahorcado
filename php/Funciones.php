<?php
	function coincon($palabra, $palabra2, $mensaje, $arch)
	{
		if($palabra != $palabra2)
			echo 'La contraseña no coincide<a href="'.$arch.'" clas="fondo"> Regresar </a>';
		else
			echo $mensaje;
	}/*PARA COMPARAR CONTRASEÑAS, SI NO COINCIDE TE REGRESA A LA PÁGINA REGISTRO DE LO CONTRARIO TE MANDA UN MENSAJE.
	ES NECESARIO INDICAR LA RUTA DEL ARCHIVO REGISTRO */
	
?>