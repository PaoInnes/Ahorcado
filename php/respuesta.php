<?php
//respuesta.php
  session_start();
  $resp=$_POST['respuesta'];
  if ($resp=='1')
    {
      $_SESSION['p1']='si';
      $_SESSION['error']=0;
      echo '<p>¡Sabía que aceptarías!</p>';
      echo '<a href="../php/juego.php" class="fondo"> ¡VAMOS! </a>';
    }
  else
    {
      echo '<p>'.$_SESSION['nombre'].' fue un placer haberte conocido, esperamos que regreses pronto al reino.</p>';
      session_unset();//Solo mientras todos los archivos están separados
  		session_destroy();//No queremos dañar a nuestro buen amigo el servidor
    }
?>
