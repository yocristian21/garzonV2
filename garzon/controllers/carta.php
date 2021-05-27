<?php

class Carta extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->productos = [];
        $this->view->categorias = [];
       
    }

    function render(){//ver q le pase categoria tambien
        $categorias = $this->model->getCategoria();
        $productos = $this->model->get();
        $this->view->productos = $productos;
        $this->view->categorias = $categorias;
        $this->view->render('carta/index');
    }
// hay q pasarle la categoria pizza, deberia mostrar todos los productos por categoria
    function verPorCategoria($param = null){
      //  include_once 'models/producto.php';
     //   foreach($this->productos as $row){
     //             $producto = new Producto();
     //             $producto = $row; 
     //   }
       
        $categoria = $param[0];//retorna un vector con los nombre y precio
        echo "verPorCategoria param=".$categoria;
        $producto = $this->model->getByCategoria($categoria);
        
        session_start();
        $_SESSION['id_verBurger'] = $producto->categoria;
        $this->view->producto = $producto;
        //vamos a ver q sale de producto
        echo " producto= ".$producto->nombre;
        $this->view->mensaje = "";
        $this->view->render('carta/burger');
    }
//ingresa algo null ver!!!
    function verProducto($param = null){
        $idProducto = $param[0];
        $producto = $this->model->getById($idProducto);

        session_start();
        $_SESSION['id_verProducto'] = $producto->id_producto;
        $this->view->producto = $producto;
        $this->view->mensaje = "";
        $this->view->render('carta/burger');
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