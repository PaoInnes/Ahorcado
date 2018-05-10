<?php
//ProcesRegistro.php
	@include 'Funciones.php';
	session_start();//inicia sesión, es necesario quitarlo cuando juntemos todo. 
	$arch='registro.html';//Ruta página registro 
	$a=0;
	
	forEach($_POST as $ind => $ele)
		$_SESSION[$ind]=$ele;
	$regex=array(
	'nombre' => '/^[A-Z][a-z]+/',
	'contraseña' =>'/(?=^.{10,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/',
	'contraseña2' =>'/(?=^.{10,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/',
	'imagen'=> '/^[1-6]$/'
	);
	
	//VALIDACIÓN 1, todos los elementos cumplen con la regex  
	forEach($_SESSION as $ind => $ele)
	{
		$n=preg_match($regex[$ind], $ele);
		if ($n==0)
			echo $ele.' es un dato incorrecto <br />';
		else 
			$a++;
	}
	if ($a<4) 
		echo '<a href="'.$arch.'" clas="fondo">Regresar </a>';	
	else 
	//VALIDACIÓN 2, contraseña1 y contraseña2 son las mismas 
		coincon($_SESSION['contraseña'], $_SESSION['contraseña2'], 'validado :)', $arch);
	
	//continuar con el código 
	
	session_unset();//Solo mientras todos los archivos están separados
	session_destroy();//No queremos dañar a nuestro buen amigo el servidor 
?>