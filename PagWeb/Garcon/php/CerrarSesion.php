<?php
session_start();//inicia una nueva sesion o reanuda la existente

//destruir todas las variables de sesion.
$_SESSION = array();

//finalmente, destruir la sesion
session_destroy();
header('C:\xampp\htdocs\PagWeb\Garcon\index.html');//nos direcciona al index

?>