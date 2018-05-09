<?php
session_start();
	$nombre=$_SESSION['nombre']
	$contraseña=$_SESSION['contraseña']
	$nombre=$_SESSION['nombre']
echo '<html>';
	echo '<head>';
		echo '<title>Tabla</title>';
		echo '<meta charset="UTF-8"/>';
	echo '</head>';
	echo '<body>';
		/* Sacar las las palabras del formulario
		$arch=fopen('palabras.txt','r');
		for ($i=0;$i<50;$i++)
			$pals[$i]=fgets($arch);
		fclose($arch);
		print_r($pals);*/
		//sacar todos los registros del
		$i=0;
		$arch=fopen('usuarios.txt','r');//ESE NO EXISTE AÚN,PERO LO PROBÉ CON EL DE ARRIBA
		while(!feof($arch))
		{
			$todos[$i]=fgets($arch);
			$i++;
		}
		fclose($arch);
		$max=count($todos);
		for($i=0;$i<=$max;$i+=3)
			$ord[$todos[$i]]=['contraseña'=>$todos[$i+1],'foto'=>$todos[$i+2]];
		
	echo '</body>';
echo '</html>';
?>