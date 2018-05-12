<?php
	@include 'Funciones.php';
	//session_start();
	//echo $_SESSION['p1'];
	if ($_SESSION['p1']=='no')
	{
		$letra = $_GET['letra'];;
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
					echo 'Te ayudamos con una pequeña pista para que logres salvar a tu amigo :)';
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
		echo '<img src="..\archivos\ahor'.$_SESSION['error'].'.jpg" width="20%" height="40%"/>';
		echo '<form action="juego.php" method="get">';
			//echo $_SESSION['goodpal'].'<br />';
			echo $_SESSION['badpal'].'<br />';
			echo '<input type="text" name="letra" maxlength="2" required pattern="^[A-Za-z]$" />';
			echo '<input type="submit" />';
		echo '</form>';
	}
	else
	{
		session_unset();//Solo mientras todos los archivos están separados
		session_destroy();//No queremos dañar a nuestro buen amigo el servidor
	}	
?>