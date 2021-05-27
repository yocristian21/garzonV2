<?php

class Consulta extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->productos = [];
       
    }
//productos es un array con todos los detalles de los productos, id_prod nomb prec categoria etc
    function render(){
        $productos = $this->model->get();
        $this->view->productos = $productos;
        $this->view->render('consulta/index');
    }

    function verProducto($param = null){
        $idProducto = $param[0];
        $producto = $this->model->getById($idProducto);

        session_start();
        $_SESSION['id_verProducto'] = $producto->id_producto;
        $this->view->producto = $producto;
        $this->view->mensaje = "";
        $this->view->render('consulta/detalle');
    }

    function actualizarProducto(){
        session_start();
        $id_producto = $_SESSION['id_verProducto'];
        $nombre    = $_POST['nombre'];
        $descripcion  = $_POST['descripcion'];
        $precio  = $_POST['precio'];
        $foto  = $_POST['foto'];
        $stock  = $_POST['stock'];
        $categoria  = $_POST['categoria'];

        unset($_SESSION['id_verProducto']);

        if($this->model->update(['id_producto' => $id_producto, 'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'foto' => $foto, 'stock' => $stock, 'categoria' => $categoria] )){
            // actualizar alumno exito
            $producto = new Producto();
            $producto->id_producto = $id_producto;
            $producto->nombre = $nombre;
            $producto->precio = $precio;
            $producto->foto = $foto;
            $producto->stock = $stock;
            $producto->categoria = $categoria;
            
            $this->view->producto = $producto;
            $this->view->mensaje = "Producto actualizado correctamente";
        }else{
            // mensaje de error
            $this->view->mensaje = "No se pudo actualizar el producto";
        }
        $this->view->render('consulta/detalle');
    }

    function eliminarAlumno($param = null){
        $matricula = $param[0];

        if($this->model->delete($matricula)){
            //$this->view->mensaje = "Alumno eliminado correctamente";
            $mensaje = "Alumno eliminado correctamente";
        }else{
            // mensaje de error
            //$this->view->mensaje = "No se pudo eliminar el alumno";
            $mensaje = "No se pudo eliminar el alumno";
        }
        //$this->render();
        
        echo $mensaje;
    }
}

?>