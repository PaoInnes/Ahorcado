<!DOCTYPE html>
<html>
	<head>

		<title>Ahorcado</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="..\css\ahorcado_diseno.css"/>
		<link href="https://fonts.googleapis.com/css?family=Vast+Shadow|Righteous|Skranji" rel="stylesheet">
	</head>
	<body id="juego">
		<div id="trans">
			<?php
				session_start();
				@include 'Funciones.php';
				//echo $_SESSION['p1'];
				if ($_SESSION['p1']=='no')
				{
					$letra = $_POST['letra'];;
					$n=preg_match('/^[A-Za-z]$/', $letra);
					if ($n==1)
					{
						$letra=strtoupper ($letra);
						if ($letra!='X')
						{
							tachar($letra);//Esta es la imagen que va mostrando, también son los errores que lleva
							if ($_SESSION['error']==3 ||$_SESSION['error']==6 ||$_SESSION['error']==9)//ya tuvo algunos errores
							{
								$letra=pista((strlen($_SESSION['goodpal'])),$_SESSION['goodpal']);//generar la primera pista
								tachar($letra);
								echo '<p class="ayuda">Te ayudamos con una pequeña pista para que logres salvar a tu amigo :)</p>';
							}
						}
						else 
							$_SESSION['error']++;
					}
				}
				if ($_SESSION['p1']=='si')
				{
					primeraVez();
					$letra=pista((strlen($_SESSION['goodpal'])),$_SESSION['goodpal']);//generar la primera pista
					tachar($letra);
				}
				$aciertos=substr_count($_SESSION['badpal'],'X');
				if($_SESSION['error']<=10 && $aciertos>0 )
				{
					echo '<img src="..\archivos\ahor'.$_SESSION['error'].'.png" width="20%" height="40%"/>';
					echo '<form action="juego.php" method="POST">';
						//echo $_SESSION['goodpal'].'<br />';
						echo '<div id="palabra">'.$_SESSION['badpal'].'<br />';
						//echo '<input type="text" name="letra" maxlength="2" required pattern="^[A-Za-z]$" />';
						echo '<input type="text" style="font-size:20px; text-align:center" size=2 name="letra" maxlength="1" required pattern="^[A-Za-z]$" /><br/>';
						echo '<input type="submit" />';
					echo '</form>';
				}
				else
				{
					if ($_SESSION['error']>10)
						{
						echo '<p class="preguntar">Vaya... Estuviste muy cerca de salvarlo.</p>';
						echo '<p class="preguntar">Yo soy íntimo amigo del rey, si gustas puedo pedirle que te de otra oportunidad.</p>';
						}
					else
						{
						$_SESSION['puntaje']++;
						echo '<p class="preguntar">¡WOW! Eres muy bueno en esto. ¿No te gustaría salvar a más gente del reino? Con esa habilidad que tienes será pan comido.</p>';
						}
					echo '<p class="preguntar">¿Qué dices '.$_SESSION['nombre'].', aceptas? No olvides que está en juego la vida de alguien.</p>';
					echo '<form action="respuesta.php" method="post">';
						echo '<p class="preguntar"><ins>¡Claro que sí! </ins><input type="radio" style="width:25px;height:25px" name="respuesta" value="1" /><br /><br />';
						echo '<ins>Será para la otra </ins><input type="radio" style="width:25px;height:25px" name="respuesta" value="2" /></p><br /><br />';
						echo '<input type="submit"  />';
					echo '</form>';
				}
			?>
		</div>
	</body>
</html>
