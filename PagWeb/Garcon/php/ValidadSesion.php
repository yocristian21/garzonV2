<?php
//si la variable login global es verdadera o falsa
session_start();

$login = $_SESSION['login'];

if(!$login){
	header('C:\xampp\htdocs\PagWeb\Garcon\index.html'); //si login es false nos direcciona al index
	}
else{
	$nickname = $_SESSION('nickname');//asignamos $_SESSION('nickname') a $nickname 
}	
//tenemos que poner en el cabezado de el archivo miPerfil.php y modificar la extension html por php
//<?php
//  include("php/conexion.php");
//  include("php/validarSesion.php");
//esto es para evitar que ingresen desde el navegador sin antes validar sesion, y como tiene php tenemos
//que reescribir el archivo a .php
?>