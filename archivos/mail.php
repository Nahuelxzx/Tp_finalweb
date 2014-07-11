<?php
//FUNCION MAIL
//$_POST['nommail']
//$_POST['apemail']
//$_POST['textarea']
		$para      ='Airline@gmail.com'; //'loabzurdo2@hotmail.com';
		$titulo    = "Enviado por:" . $_POST['nommail'] . $_POST['apemail']  ;
		$mensaje   = 'Hola' . $_POST['textarea'];
		$cabeceras = 'From: webmaster@Airline.com' . "\r\n" .
		    'Reply-To: webmaster@Airline.com' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

		mail($para, $titulo, $mensaje, $cabeceras);
		echo '<scrip>alert ("mensaje enviado correctamente");</script>';
		
		header('Location: index.php');
?>