<?php

include("Conexion.php");// es para llamar al archivo conexion.php
//declaracion de variables para recibir y guardar datos enviado desde formulario
$nickname    =  $_POST("nickname");
$nombre      =  $_POST("nombre");
$apellidos   =  $_POST("apellidos");
$edad        =  $_POST("edad");
$descripcion =  $_POST("descripcion");
$email       =  $_POST("correo");
$password    =  $_POST("contraseña");

$passwordHash= password_Hash($password, PASSWORD_BCRYPT);//BCRYPT es el algoritmo de encriptacion, devuelve una cadeana de 60 caracteres
$fotoPerfil  = "img/$nickname/perfil.jpg";

//evaluamos si nickname existe en la base de datos
//Se redacta/crea la consulta con SQL
$consultaId = "SELECT nickname
               FROM persona
			   WHERE nickname= '$nickname'
   ";
//se hace la consulta con el metodo mysql_query
//el primer parametro es la variable de conexion, la segu es la consulta a ejecutar
$consultaId = mysql_query($conexion, $consultaID);   
//mysql_fetch_array de la variable consulta va a extraer un array, solo una fila y lo guarda en consultaID 
$consultaId = mysqli_fetch_array($consultaId);
//si la consulta esta vacia, no econtro ningun nickname, por lo q podriamo aceptar al usuario
if(!$consultaId){
	//vamos a insertar en la tabla persona los valores (nombre, edad, etc)	
	$sql = "INSERT INTO persona VALUES ( '$nombre', '$apellidos', '$edad', '$descripcion', '$fotoPerfil', '$email', '$passwordHash' )";
	//vamos a ejecutar la consulta, en el if vamos a preguntar si a realizado correctamente la consulta
	if (mysqli_query($conexion, $sql)){
		//si un usuario se registra, le creamos una carpeta
		mkdir("../img/$nickname");
		//vamos a copiar una imagen defaul en el siguiente directorio
		copy("../img/default.jpg", "../img/$nickname/perfil.jpg");
		
		echo "Tu cuenta a sido creada";
		//crea un link para retornar a la pagina de iniciar sesion
		echo "<br> <a href='../index.html' >Iniciar Sesion</a></div>";
	}
	else{ //si no conecta muestra error
		echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
}	
else {
	echo "El nickname ya existe";
	echo "<a href='index.html' > Intentalo de nuevo.</a></div>";
//cerramos la conexion
mysqli_close($conexion);	
}  

?>