<?php
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