<?php
	session_start();
	//FUNCIONES DEL INICIO DE SESION
	function vaciar ($nom_arch)//sacar todos los registros que haya en un archivo y pasarlo a un array, devuelde el array
	{
		$todos=[];
		$i=0;
		$arch=fopen('..\\archivos\\'.$nom_arch,'r');//ESE NO EXISTE AÚN,PERO LO PROBÉ CON EL DE ARRIBA
		while(!feof($arch))//sacar todos los registros que haya en un arreglo y después acomodarlo
		{
			$aux=fgets($arch);
			$tam=strlen($aux);
			$todos[$i]=substr($aux,0,$tam-2);
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
			$usu_ord[$usuarios[$i]]=[$usuarios[$i+1],$usuarios[$i+2]];
		foreach($usu_ord as $i=>$elem)//revisar nombre recibido con todos los nombres que hay
			if($i==$_SESSION['nombre'])
			{
				//echo 'existe'.'</br>';MONITOREAR
				$exist=true;
			}
		//echo $_SESSION['contraseña'].'</br>';MONITOREAR, YA NO ES NECESARIO MOSTRARLO, CONTRASEÑA FORMULARIO
		//echo $usu_ord[$nombre][0].'</br>';MONITOREAR, CONTRASEÑA DEL ARCHIVO
		if ($exist==false)//GUARDA UN NUEVO USUARIO EN CASO DE QUE NO COINCIDA NINGUN REGISTRO
		{
			$arch=fopen('..\archivos\usuarios.txt','a+');
				fputs($arch,"\r\n".$_SESSION['nombre']);
				fputs($arch,"\r\n".$_SESSION['contraseña']);
				fputs($arch,"\r\n".$_SESSION['imagen']);
			fclose($arch);
		}
		if ($exist==true)
		{
			if ($_SESSION['contraseña']!=$usu_ord[$_SESSION['nombre']][0])//COMPARA CONTRASEÑA YA QUE EL USUARIO SI ESTÁ REGISTRADO
			{
				$sigue=false;
				echo 'Tu contraseña no coincide, intentalo de nuevo'.'</br>';
			}
		}
		return $sigue;
	}
	function revisa()
	{
		if(isset($_COOKIE['nombre']))
			$exist = true;
		else
			$exist = false;
		return $exist;
	}
	//FUNCIONES DEL JUEGO
	function pista ($length, $pal)
	{
		$length=$length-1;
		do
		{
			$rand=rand(0,$length); 
			$n=preg_match('/[AEIUOaeiou_]/', $pal[$rand]);//AMO ESTO! <3
		}
		while ($n!=0);
		return $pal[$rand];
	}

?>
