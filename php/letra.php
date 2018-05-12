<?php
  $letra = $_POST['letra'];
  $n=preg_match('/^[A-Za-z]$/', $letra);
  if ($n==1)
    {
    $letra=strtoupper ($letra);
    if ($letra!='X')
      echo 'hola';
    else
      echo 'perdiste muajajjajaja';
    }
  echo '<form action="letra.php" method="post">';
    echo '<input type="text" name="letra" maxlength="2" required pattern="^[A-Za-z]$" />';
    echo '<input type="submit" />';
  echo '</form>';



?>
