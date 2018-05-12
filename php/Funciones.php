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
	function hola ()
	{
		echo '<h2>REGLAS DEL JUEGO</h2>
		<p>Hola '.$_SESSION['nombre'].', ahora que sabes la gran amenaza de esta situación, necesitamos explicarte como puedes salvar a tu amigo, así que presta mucha atención.</p>

		<p>El Rey comelón te dará la palabra a adivinar, pero sólo podrás ver esto ---> "X".<br/>
		Cada "X" significa una letra, y si hay espacios " ", entonces es el nombre de un postre con más de una palabra.<br/><br/>

		El Rey te proporcionará una pista al inicio de la adivinanza, y conforme avances en el proceso...y al Rey comience a darle hambre, te proporcionara pistas para terminar más rápido con esto.</p>

		<p>Se te mostrarán cuadros como estos: (ADJUNTAR IMAGEN DE CUADROS), los cuales representan el postre misterioso<br/>
		Y tu tendrás un espacio como este: (ADJUNTAR IMAGEN DE LETRA), que representa la opción de letra que puedes darle al Rey, esperando que esta esté dentro de la palabra oculta.<br/><br/>

		Tendrás 10 oportunidades para probar tus letras, en caso de fracasar, el Rey degollará a tu amigo.<br/><br/>

		¡Vamos valiente!</p>';
		$_SESSION['p1']='si';//para indicar que es la primera vez que se jugará y así poder procesar en juego
		//echo $_SESSION['p1'];
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

	function primeraVez ()
	{
		$postres= array();
		$postres = vaciar('palabras.txt');

		$_SESSION['goodpal']=$postres[rand(0,49)];

		$length = strlen($_SESSION['goodpal']);

		for($i=0; $i<$length; $i++)//$le2=
			if ($_SESSION['goodpal'][$i]==' ')
				$bad_pal[$i] = ' '; //CREA ARRAY QUE SE MUESTRA EN PANTALLA
			else
				$bad_pal[$i] = 'X';
		$_SESSION['badpal']=implode('',$bad_pal); //LO PEGA TODO EN bad_pal
		//echo $bad_pal.'<br/>'; //VAR FINAL PARA MOSTRAR EN PANTALLA
		//echo $_SESSION['goodpal'].'<br/>';
		$_SESSION['p1']='no';
		//echo $_SESSION['p1'];
		return;
	}

	function tachar($recibe)
	{
	//RECIBE LETRAS, Y MODIFICA bad_pal
 //LETRA RECIBIDO
		static $error = 0;
		$count_reem = substr_count($_SESSION['goodpal'],$recibe); //# DE COINCIDENCIAS EN PALABRA ORIG.
		if ($count_reem !=0)
			for($k=0; $k<$count_reem; $k++)
			{
				$posi = strpos($_SESSION['goodpal'],$recibe); // POSICIÓN DE LA LETRA
				$_SESSION['goodpal'][$posi] = 'XXX'; //LA TACHA EN LA ORIGINAL PARA NO VOLVERLA A CONTAR
				$_SESSION['badpal'][$posi] = $recibe; //MODIFICA LO QUE MUESTRA EN PANTALLA (palabra mala, aciertos que lleva)
			}
		else
			$error++;
			//echo $_SESSION['badpal']; //MUESTRA EN PANTALLA
		return $error;
	}

?>
