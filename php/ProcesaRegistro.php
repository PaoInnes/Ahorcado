<html>
	<head>
		<title>Reglas</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="..\css\ahorcado_diseno.css"/>
		<link href="https://fonts.googleapis.com/css?family=Lemon|Merienda+One|Vast+Shadow" rel="stylesheet">
	</head>
	<body class="reglas">
		<?php
		//ProcesaRegistro.php
			include 'Funciones.php';
			$a=0;
			forEach($_POST as $ind => $ele)
				$_SESSION[$ind]=$ele;
			$regex=array(
			'nombre' => '/^[A-Z][a-z]+/',
			'contraseña' =>'/(?=^.{10,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/',
			'imagen'=> '/^[1-6]$/'
			);
			//print_r($_SESSION);
			//VALIDACIÓN 1, todos los elementos cumplen con la regex
			forEach($_SESSION as $ind => $ele)
			{
				$n=preg_match($regex[$ind], $ele);
				if ($n==0)
					echo $ele.' es un dato incorrecto <br />';
				else
					$a++;
			}
			if ($a<3)
				echo '<a href="'.$arch.'" class="fondo">Regresar </a>';
			else
			{
				setcookie('nombre',$_SESSION['nombre'],time()+24*3000*15,'/');
				setcookie('imagen',$_SESSION['imagen'],time()+24*3000*15,'/');
			//Los datos que ingresó están bien y ahora los buscar en el archivo
				$sigue=checar_arch();
				if ($sigue==true)
				{
						echo '<img src="..\archivos\img'.$_SESSION['imagen'].'.jpeg" />';
						echo '<h1 id="hola">Hola '.$_SESSION['nombre'].'!!<br />Bienvenid@</h1>';
						hola();
						echo '<br /><a href="juego.php" class="fondo"> Empezar a jugar </a>';
				}
				else
					echo ' <a href="..\html\registro.html" class="fondo"> Regresar </a>';
			}
			//session_unset();//Solo mientras todos los archivos están separados
			//session_destroy();//No queremos dañar a nuestro buen amigo el servidor
		?>
	</body>
</html>
