<?php

class Nuevo extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje = "Mensaje de la clase Nuevo";
        //echo "<p>Nuevo controlador Main</p>";
     //   $this->view->render('nuevo/index');
    }

    function render(){
        $this->view->render('nuevo/index');
    }

    function registrarProducto(){
       // echo "se Registro correctamente";
        $id_producto = $_POST['id_producto'];
        $nombre      = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio      = $_POST['precio'];
        $foto        = $_POST['foto'];
        $stock       = $_POST['stock'];
        $categoria   = $_POST['categoria'];
        

        $mensaje = "";

        if($this->model->insert(['id_producto' => $id_producto, 'nombre' => $nombre, 'descripcion' => $descripcion,'precio' => $precio,  'foto' => $foto, 'stock' => $stock, 'categoria' => $categoria])){
            $mensaje = "Nuevo producto creado";
        }else{
            $mensaje = "El ID ya existe";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
    }
}

?>