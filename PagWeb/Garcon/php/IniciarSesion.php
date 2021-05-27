<?php

include("Conexion.php");//include es para llamar un archivo, en este caso Conexion.php

session_start();//inicia una nueva sesion o reanuda la existente

$_SESSION['login'] = false;//variable global de tipo array, creamos el componente login como false

//declarando variables para recibir y guardar los datos ingresados desde la pagina web
$nickname = $_POST["nickname"]; // ?? ""
$password = $_POST["contraseña"]; 

//evaluamos el nickname ingresado
$consulta = "SELECT * FROM persona WHERE nickname = '$nickname'";

$consulta = mysqli_query($conexion, $consulta);//ejecutamos la consulta

$consulta = mysqli_fetch_array($consulta);//extrae la primera fila del array, el fetch_array
//echo $consulta[1];
//si lo anterior tiene un valor, validamos el password
  if($consulta){ 
	  echo $password;
	  echo $consulta['password'];
  //comparamos el password ingresando, con el password de la base de datos, osea extraemos la columna password
   if( password_verify($password, $consulta['password']) ){//como consulta se almaceno en un array, extraemos su valor para compararlo
      $_SESSION[login] = true;
    
	//sacamos los datos de la base de datos y se la asignamos a variables globales
    $_SESSION[nickname] = $consulta['nickname'];
	$_SESSION[nombre] = $consulta['nombre'];
	$_SESSION[apellidos] = $consulta['apellidos'];
	$_SESSION[edad] = $consulta['edad'];
	$_SESSION[descripcion] = $consulta['descripcion'];
	$_SESSION[foto] = $consulta['foto'];
   
   header('C:\xampp\htdocs\PagWeb\Garcon\index.html');//redireccionamos a la pagina mi perfil
   
   }
   
   else {
	   
	   echo "Contraseña incorrecta";
	   echo "<br><a href='../index.html' >Intentalo de nuevo. </a></div>";
   }
 }
 else{
	 echo "El usuario no existe";
	 echo "<br><a href= '../index.html' >Intentalo de nuevo.</a></div>";
 }
//cerramos la conexion a la base 
	  mysqli_close($conexion);
	  
?>