<!DOCTYPE html>
<html>
	<head>
		<title>Ahorcado</title>
		<meta charset='UTF-8'/>
		<style>
			body{
				text-align: justify;
				background: blue;
				color: white;
			}
		</style>
	</head>
	<body>
		<?php
			include "revisa_cookie.php";
			$exist = revisa();
		?>
		<h1>-AHORCADO-</h1>
		<p>En el reino de Cremme BruLand regia un Rey que adoraba comer, pero su gran debilidad eran los postres, lo cual hacía que todo lo relacionara a ellos, flanes, mousse y algunos pasteles. Cuando algún expedicionario regresaba exitoso de un viaje, el rey los premiaba con una gran variedad de postres. 
		<br/>Todos sus súbditos eran muy felices, la vida era dulzura y felicidad… hasta que un día un hombre tuvo la osadía de comerse el gran festín para la hora de cenar. El rey al descubrir tal acto, enfureció y gritó a los 4 vientos -”Mereces la horca”-<br/>
		Cuando estaban a punto de ejecutarlo en la plaza del pueblo, el mejor amigo de aquel glotón ladrón amante de los postres pidió al Rey que le perdonara la vida, el Rey ante aquella propuesta se quedó pensando y le propuso -”Si adivinas cuál es mi postre favorito, será perdonado de la horca”-
		<br/>El amigo aceptó el reto, y ...</p>
		
		<h2>REGLAS DEL JUEGO</h2>
		<p>Hola @TU_NOMBRE, ahora que sabes la gran amenaza de esta situación, necesitamos explicarte como puedes salvar a tu amigo, así que presta mucha atención.</p>

		<p>El Rey comelón te dará la palabra a adivinar, pero sólo podrás ver esto ---> "X".<br/>
		Cada "X" significa una letra, y si hay espacios " ", entonces es el nombre de un postre con más de una palabra.<br/><br/>

		El Rey te proporcionará una pista al inicio de la adivinanza, y conforme avances en el proceso...y al Rey comience a darle hambre, te proporcionara pistas para terminar más rápido con esto.</p>

		<p>Se te mostrarán cuadros como estos: (ADJUNTAR IMAGEN DE CUADROS), los cuales representan el postre misterioso<br/>
		Y tu tendrás un espacio como este: (ADJUNTAR IMAGEN DE LETRA), que representa la opción de letra que puedes darle al Rey, esperando que esta esté dentro de la palabra oculta.<br/><br/>

		Tendrás 10 oportunidades para probar tus letras, en caso de fracasar, el Rey degollará a tu amigo.<br/><br/>

		¡Vamos valiente!</p>
		<form action = ".php">		
			<br/><input type="submit" value="COMENZAR"/>
		</form>	
	</body>
</html>