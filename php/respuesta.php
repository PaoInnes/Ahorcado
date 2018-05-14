<html>
	<head>
		<title>Ahorcado</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="..\css\ahorcado_diseno.css"/>
		<link href="https://fonts.googleapis.com/css?family=Cinzel|Cinzel+Decorative|Courgette" rel="stylesheet">
	</head>
    <?php
//respuesta.php
  //session_start();
  @include 'Funciones.php';
  $resp=$_POST['respuesta'];
  $nombre=$_SESSION['nombre'];
  $puntaje=$_SESSION['puntaje'];
  if ($resp=='1')
    {
      $_SESSION['p1']='si';//empieza otra vez la otra partida
      $_SESSION['error']=0;
	  echo '<body id="meQuedo">';
		  echo '<div class="respuesta" style="font-size: 9em"><p>¡Sabía que aceptarías!</p>';
		  echo '<a href="../php/juego.php" class="fondo"> ¡VAMOS! </a></div>';
	  echo '</body>';
    }
  else
    {
	echo '<body id="meVoy">';
			$scores=[];
			$exist=false;
			$todos=vaciar('scores.txt');
			$max=count($todos);//la longitud de toooodos los scores, de ahí suma de 2 en 2 para acomodarlos
			for( $i=0; $i<$max-1; $i+=2 )
				$scores[$todos[$i]]=$todos[$i+1];//acomodar nombre => puntaje
			//print_r($scores);//checar
			
			forEach($scores as $nom=>$puntos)
				if($nom==$nombre)//ver si ya está en los puntajes registrados
				{
					$scores[$nom]=$puntaje;//agregar su nuevo puntaje
					$exist=true;
				}
				
			if($exist==false)//no existe, entonces lo tiene que agregar en el array
				$scores[$nombre]=$puntaje;
			//print_r($scores);
			array_multisort($scores);//ordenar los scores
			//print_r($scores);//checar
			$mejores=array_reverse($scores);//ya que los tiene ordenados, como lo hizo de menor a mayor, y nosotros queremos lo contrario, lo volteamos
			//print_r($mejores);//checar
			echo '<div class="respuesta" style="font-size: 2em"><h1>¡ADIÓS!</h1>';
			echo '<p>'.$_SESSION['nombre'].', fue un placer haberte conocido, esperamos que regreses pronto al reino.</p>';
			echo '<h2> SCORES </h2><br />';
			$i=0;
			$arch=fopen('..\archivos\scores.txt','w');
			forEach($mejores as $nom=>$puntos)//meter sólo los cinco mejores en el archivo, y mandar eso a pantalla
			{
				if($i<5)
				{
					echo $nom.'     '.$puntos.'<br />';
					fputs($arch,$nom."\r\n");
					fputs($arch,$puntos."\r\n");
				}
				$i++;
			}
			fclose($arch);
			session_unset();//Solo mientras todos los archivos están separados
			session_destroy();//No queremos dañar a nuestro buen amigo el servidor
	  echo '	</div>
			</body>';

    }
    ?>
</html>
