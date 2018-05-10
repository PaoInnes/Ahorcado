<?php
	session_start();
	function vaciar ($nom_arch)//sacar todos los registros que haya en un archivo y pasarlo a un array, devuelde el array 
	{
		$todos=[];
		$i=0;
		$arch=fopen($nom_arch,'r');//ESE NO EXISTE AÚN,PERO LO PROBÉ CON EL DE ARRIBA
		while(!feof($arch))//sacar todos los registros que haya en un arreglo y después acomodarlo
		{
			$todos[$i]=fgets($arch);
			$i++;
		}
		fclose($arch);
		return $todos;
	}
	function checar_arch ()
	{
		$exist=false;
		$sigue=true;
		$usuarios=vaciar('..\archivos\usuarios.txt');
		$max=count($usuarios);//la longitud de toooodos los registros, de ahí suma de 3 en 3 para sacar uno por uno
		for($i=0;$i<$max;$i+=3)
			$usu_ord[$usuarios[$i]]=['contraseña'=>$usuarios[$i+1],'imagen'=>$usuarios[$i+2]];
		foreach($usu_ord as $i=>$elem)//revisar nombre recibido con todos los nombres que hay
		{
			echo $i.'</br>';
			echo $_SESSION['nombre'].'</br>';
			if($i==$_SESSION['nombre'])
			{
				echo 'hola'.$i;
			}
		}
		/*if ($exist==false)
		{
				$arch=fopen('..\archivos\usuarios.txt','a+');
					fputs($arch,$_SESSION['nombre']);
					fputs($arch,$_SESSION['contraseña']);
					fputs($arch,$_SESSION['imagen']);
				fclose($arch);
		}
		if ($exist==true)
		{
			if ($_SESSION['contraseña']!=$usu_ord[$_SESSION['nombre']]['contraseña']) 
				$sigue==false;
		}
		return $sigue;*/
		return $sigue;
	}
	function coincon($palabra, $palabra2, $mensaje, $arch)
	{
		if($palabra != $palabra2)
			echo 'La contraseña no coincide <a href="'.$arch.'" clas="fondo"> Regresar </a>';
		else
			checar_arch();
	}/*PARA COMPARAR CONTRASEÑAS, SI NO COINCIDE TE REGRESA A LA PÁGINA REGISTRO DE LO CONTRARIO TE MANDA UN MENSAJE.
	ES NECESARIO INDICAR LA RUTA DEL ARCHIVO REGISTRO */
	
?>