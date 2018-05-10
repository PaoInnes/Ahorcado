<!DOCTYPE html>
<?php
session_start();
	$nombre=$_POST['nombre'];
	$contraseña=$_POST['contraseña'];
	$imagen=$_POST['imagen'];
	$exist=false; //no existe el registro aún
echo '<html>';
	echo '<head>';
		echo '<title>Tabla</title>';
		echo '<meta charset="UTF-8"/>';
	echo '</head>';
	echo '<body>';
		/* Sacar las las palabras del formulario, eso se haría hasta que empieza a jugar
		$arch=fopen('palabras.txt','r');
		for ($i=0;$i<50;$i++)
			$pals[$i]=fgets($arch);
		fclose($arch);
		print_r($pals);*/
		//sacar todos los registros del
		$i=0;
		$arch=fopen('..\archivos\usuarios.txt','r');//ESE NO EXISTE AÚN,PERO LO PROBÉ CON EL DE ARRIBA
		while(!feof($arch))//sacar todos los registros que haya en un arreglo y después acomodarlo
		{
			$todos[$i]=fgets($arch);
			$i++;
		}
		fclose($arch);
		print_r($todos);
		echo '</br>';
		$max=count($todos);//la longitud de toooodos los registros, de ahí suma de 3 en 3 para sacar uno por uno
		for($i=0;$i<=$max;$i+=3)
			$ord[$todos[$i]]=['contraseña'=>$todos[$i+1],'imagen'=>$todos[$i+2]];//ord es asociativo, el indice(asociativo) es el nombre del usuario, tiene otros dos campos adentro(contra y foto)
		print_r($ord);
		echo '</br>';
		foreach($ord as $i=>$elem)//revisar nombre recibido con todos los nombres que hay
			if($i==$nombre)
			{
				$exist=true;
				echo 'hola';
				//if($contraseña!=$i['contraseña'])//la contraseña que ingresaste no es la registrada
					//@include 'funciones.php';//dice que está mal la contraseña y te regresa al registro
			}
		if($exist==false)
		{
				$arch=fopen('..\archivos\usuarios.txt','a+');
					$salto=chr(13);
					fwrite($arch,$nombre.$salto);
					fwrite($arch,$contraseña.$salto);
					fwrite($arch,$imagen.$salto);
				fclose($arch);
		}
		setcookie('nombre',$nombre,time()+24*3000*15,'/');
	echo '</body>';
echo '</html>';
?>