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
	echo $good_pal.'</br>';
?>