<html>
	<head>
		<title>Ahorcado</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="..\css\ahorcado_diseno.css"/>
		<link href="https://fonts.googleapis.com/css?family=Cinzel|Cinzel+Decorative|Courgette" rel="stylesheet">
	</head>
    <?php
//respuesta.php
  session_start();
  $resp=$_POST['respuesta'];
  if ($resp=='1')
    {
      $_SESSION['p1']='si';
      $_SESSION['error']=0;
  echo '<body id="meQuedo">';
      echo '<div class="respuesta" style="font-size: 9em"><p>¡Sabía que aceptarías!</p>';
      echo '<a href="../php/juego.php" class="fondo"> ¡VAMOS! </a></div>';
  echo '</body>';
    }
  else
    {
  echo '<body id="meVoy">';
		echo '<div class="respuesta" style="font-size: 3em"><h1>¡ADIOS!</h1>';
    echo '<p>'.$_SESSION['nombre'].', fue un placer haberte conocido, esperamos que regreses pronto al reino.</p></div>';
    session_unset();//Solo mientras todos los archivos están separados
		session_destroy();//No queremos dañar a nuestro buen amigo el servidor
  echo '</body>';
    }
    ?>
</html>
