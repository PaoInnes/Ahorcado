<?php
	session_start();
	function revisa()
	{
		if(isset($_COOKIE['']))
		{
			$_SESSION['exist'] = true;
			//jugar();
		}
		else
		{
			$_SESSION['exist'] = false;
			//registro();
		}
		return $_SESSION['exist'];
	} 
?>