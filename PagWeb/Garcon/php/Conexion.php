<?php
   //declarando variable para la conexion
   $servidor 	= "localhost";
   $usuario 	= "root";//el usuario de la base de dato
	$contrasenha = "";//la contraseña que utilizaremos
	$BD 		= "garcon";// el nombre de la base datos


//creando la conexion
	$conexion = mysqli_connect($servidor, $usuario, $contrasenha, $BD);

	if( !$conexion ){
	echo "Fallo la conexion <br>";
    die("Conection failed: " . mysqli_connect_error() );
	} 
 
	else{
		echo "Conexion exitosa";
	}	


?>