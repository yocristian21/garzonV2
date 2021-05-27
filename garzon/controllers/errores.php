<?php
require_once("libs/controller.php");

class Errores extends Controller {
    function __construct(){
        parent::__construct();
       
        $this->view->mensaje = "Hubo un error en la solicitud o no existe la pagina";
       //echo "<p>Error al cargar recurso</p>";
       $this->view->render('errores/index');
     //$this->view->render('ayuda/index');


    }
}
?>