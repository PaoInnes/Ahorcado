<?php
  $letra = $_POST['letra'];
  $n=preg_match('/^[A-Za-z]$/', $letra);//SOLO ACEPTA UNA LETRA QUE ESTE EN EL RANGO A-Z o a-z
  if ($n==1)
    {
    $letra=strtoupper ($letra);//convertir a mayúscula la letra recibida
    if ($letra!='X')
      echo 'hola'; //CÓDIGO DEL JUEGO
    else
      echo 'perdiste muajajjajaja';//MONITOREAR QUE PERDIÓ
    }
  echo '<form action="letra.php" method="post">';
    echo '<input type="text" name="letra" maxlength="1" required pattern="^[A-Za-z]$" />';
    echo '<input type="submit" />';
  echo '</form>';



?>
