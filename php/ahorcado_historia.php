<!DOCTYPE html>
<html>
	<head>
		<title>Ahorcado</title>
		<meta charset='UTF-8'/>
		<style>
			body
			{
				text-align: justify;
				background: pink;
				color: white;
			}
		</style>
	</head>
	<body>
		<?php
			session_start();
			include "Funciones.php";
			$exist = revisa();
			echo    '<h1>-AHORCADO-</h1>
					<p>En el reino de Cremme BruLand regia un Rey que adoraba comer, pero su gran debilidad eran los postres, lo cual hacía que todo lo relacionara a ellos, flanes, mousse y algunos pasteles. Cuando algún expedicionario regresaba exitoso de un viaje, el rey los premiaba con una gran variedad de postres.
					<br/>Todos sus súbditos eran muy felices, la vida era dulzura y felicidad… hasta que un día un hombre tuvo la osadía de comerse el gran festín para la hora de cenar. El rey al descubrir tal acto, enfureció y gritó a los 4 vientos -”Mereces la horca”-<br/>
					Cuando estaban a punto de ejecutarlo en la plaza del pueblo, el mejor amigo de aquel glotón ladrón amante de los postres pidió al Rey que le perdonara la vida, el Rey ante aquella propuesta se quedó pensando y le propuso -”Si adivinas cuál es mi postre favorito, será perdonado de la horca”-
					<br/>¿Aceptas el reto?</p>
					';
			if($exist==false)
				echo '<a href="..\html\registro.html" clas="fondo">¡Acepto! </a>';
			if($exist==true)
			{
				$_SESSION['p1']=true;
				$_SESSION['nombre']=$_COOKIE['nombre'];
				echo '<h1>Hola '.$_SESSION['nombre'].'!!<br />Bienvenid@</h1>';
				hola();
				echo '<br /><a href="juego.php" clas="fondo"> Empezar a jugar </a>';
			}
			?>
	</body>
</html>
