<?php
	@include 'Funciones.php';
	//session_start();
	echo $_SESSION['p1'];
	if ($_SESSION['p1']=='no')
	{
		echo '___________';
		$letra = 'a';
		$n=preg_match('/^[A-Za-z]$/', $letra);
		if ($n==1)
		{
			$letra=strtoupper ($letra);
			if ($letra!='X')
			{
				$monito=tachar($letra);//Esta es la imagen que va mostrando, también son los errores que lleva
				if ($monito==3 ||$monito==6 ||$monito==9)//ya tuvo algunos errores
				{
					$letra=pista((strlen($_SESSION['goodpal'])),$_SESSION['goodpal']);//generar la primera pista
					$monito=tachar($letra);
				}
			}
			// else 
				// echo 'perdiste muejajajajja';
			
		}
	}
	
	if ($_SESSION['p1']=='si')
	{
		echo '________';
		primeraVez();
		$letra=pista((strlen($_SESSION['goodpal'])),$_SESSION['goodpal']);//generar la primera pista
		$monito=tachar($letra);
	}
	
	$aciertos=substr_count($_SESSION['badpal'],'x');
	if($monito<=10 && $aciertos<0 )
	{
		echo '<form action="juego.php" method="get">';
			echo '<input type="text" name="letra" maxlength="2" required pattern="^[A-Za-z]$" />';
			echo '<input type="submit" />';
		echo '</form>';
	}
	else
		echo 'perdiste muejajajajja';
	//session_unset();//Solo mientras todos los archivos están separados
  	//session_destroy();//No queremos dañar a nuestro buen amigo el servidor
		
?>