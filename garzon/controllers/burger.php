<?php

class Burger extends Controller{


    function __construct(){

        parent::__construct();
        $this->view->productos = [];
       // $this->view->render('ayuda/index');
    }

    function render(){//devuelve item vector con todos los elementos de producto
        $productos2 = $this->model->get();
        $this->view->productos = $productos;
        $this->view->render('burger/index');
    }
    
}

?>