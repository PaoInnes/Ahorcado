<?php
  include 'Funciones.php';
  $postres= array();
  $postres = vaciar('palabras.txt');

  $_SESSION['goodpal']=$postres[rand(0,49)];

  $length = strlen($_SESSION['goodpal']);

  for($i=0; $i<$length; $i++)//$le2=
    if ($_SESSION['goodpal'][$i]==' ')
      $bad_pal[$i] = ' '; //CREA ARRAY QUE SE MUESTRA EN PANTALLA
    else
      $bad_pal[$i] = 'X';
  $_SESSION['badpal']=implode('',$bad_pal); //LO PEGA TODO EN bad_pal
  echo $_SESSION['badpal'].'<br/>'; //VAR FINAL PARA MOSTRAR EN PANTALLA
  echo $_SESSION['goodpal'].'<br/>';
  $_SESSION['p1']=false;

//RECIBE LETRAS, Y MODIFICA bad_pal
//LETRA RECIBIDO
  $recibe = 'k';
  static $error = 0;
  $count_reem = substr_count($_SESSION['goodpal'],$recibe); //# DE COINCIDENCIAS EN PALABRA ORIG.
  if ($count_reem !=0)
    for($k=0; $k<$count_reem; $k++)
    {
      $posi = strpos($_SESSION['goodpal'],$recibe); // POSICIÓN DE LA LETRA
      $_SESSION['goodpal'][$posi] = 'x'; //LA TACHA EN LA ORIGINAL PARA NO VOLVERLA A CONTAR
      $_SESSION['badpal'][$posi] = $recibe; //MODIFICA LO QUE MUESTRA EN PANTALLA
    }
  else
    $error++;
    echo $_SESSION['badpal']; //MUESTRA EN PANTALLA

    session_unset();//Solo mientras todos los archivos están separados
  	session_destroy();//No queremos dañar a nuestro buen amigo el servidor

?>
