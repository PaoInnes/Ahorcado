<?php
	@include 'Funciones.php';
	$postres=vaciar('palabras.txt');
	$good_pal=$postres[rand(0,49)];
	$bad_pal='';
	$letra='e';
	$tam=strlen($good_pal);//aux vale el tamaño final
	for ($i=0; $i<$tam; $i++)
		$aux[$i]='x';
	$coin=substr_count($good_pal,' ');
	for ($i=0; $i<$coin;$i++)
	{
		$pos=strpos($good_pal,' ');
		$aux[$pos]=' ';
		$good_pal[$pos]='_';
	}
	$coin=substr_count($good_pal,$letra);
	for ($i=0; $i<$coin;$i++)
	{
		$pos=strpos($good_pal,$letra);
		$aux[$pos]=$good_pal[$pos];
		$good_pal[$pos]='x';
	}
	$bad_pal=implode('',$aux);
	$good_pal=str_replace('_',' ',$good_pal);
	echo $bad_pal.'</br>';
	echo $good_pal.'</br';
	
	
		----------------------------------
		
		
	//PRIMERA VEZ EN PÁGINA DEL JUEGO
	session_start();
	$rand=0;
	$_SESSION['length']='0';//longitud goodpal
	$_SESSION['goodpal']='0';
	$_SESSION['badpal']='0';
	
	//PALABRAS => ARREGLO INDEXADO
	$arch=fopen('palabras.txt','r');
	for ($i=0;$i<48;$i++)
		$pals[$i]=fgets($arch);
	fclose($arch);
	print_r($pals);
	
	$rand=rand(0,47);
	$_SESSION['goodpal']=$pals[$rand];
	$_SESSION['badpal']=$pals[$rand];
	
	$_SESSION['length']=strlen($_SESSION['goodpal']);//DOS NÚMEROS MAYOR, VALOR SIEMPRE +2
	$_SESSION['length']=$_SESSION['length']-2;
	
	$caracter=array(' ', '(', ')');
	$_SESSION['goodpal']=str_replace($caracter,'X',$_SESSION['goodpal']);//CAMBIAR ESPACIOS POR X   !!!!FALTA AGREGAR ESO AL CONTADOR DE ACIERTOS
	//pensar como crear badpal 
	//$letra=pista($_SESSION['length'],$_SESSION['goodpal']);//DEVUELVE Letra
	
	session_unset();//Solo mientras todos los archivos están separados
	session_destroy();//No queremos dañar a nuestro buen amigo el servidor 
	
	
	-----------------------
	
	session_start();
	$good_pal = 'ahorcado';
	$gp2 = 'pastel de chocolate';
	$length = strlen($good_pal);
	//$_SESSION['length']=$length;
	$le2 = strlen($gp2);
	//$_SESSION['le2']=$le2;
	$bad_pal='';
	
	//REVUELTA
	$revuelta=str_shuffle($good_pal);
	echo $revuelta;
	echo '</br>';
	$rev2=str_shuffle($gp2);
	echo $rev2;
	echo '</br>';

	//REEMPLAZO A "X"
	for($i=0; $i<$le2; $i++)
		$aux[$i] = 'x'; //CREA ARRAY QUE SE MUESTRA EN PANTALLA
	$coin=substr_count($gp2,' '); // # DE COINCIDENCIAS DE ESPACIOS
	for ($i=0; $i<$coin; $i++)
	{
		$posis = strpos($gp2,' '); // POSICIÓN DEL ESPACIO
		$aux[$posis]=' '; //MUESTRA ESPACIOS EN PANTALLA
		$gp2[$posis]='_'; // AGREGA _ EN PALABRA ORIG.
	}
	$bad_pal=implode('',$aux); //LO PEGA TODO EN bad_pal
	echo $bad_pal.'<br/>'; //VAR FINAL PARA MOSTRAR EN PANTALLA
	echo $gp2.'<br/>';

	//RECIBE LETRAS, Y MODIFICA bad_pal
	$aux_orig = str_repeat($gp2,1); //COPIA DE PAL.ORIG. PARA NO DAÑAR
	$recibe = 'e'; //LETRA RECIBIDA
	$count_reem = substr_count($aux_orig,$recibe); //# DE COINCIDENCIAS EN PALABRA ORIG.
	for($k=0; $k<$count_reem; $k++)
	{
		$posi = strpos($aux_orig,$recibe); // POSICIÓN DE LA LETRA
		$aux_orig[$posi] = 'x'; //LA TACHA EN LA ORIGINAL PARA NO VOLVERLA A CONTAR
		$bad_pal[$posi] = $recibe; //MODIFICA LO QUE MUESTRA EN PANTALLA
	}
	echo $bad_pal; //MUESTRA EN PANTALLA
?>