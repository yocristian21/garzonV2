<?php

include_once 'models/producto.php';

class CartaModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];

        try{

            $query = $this->db->connect()->query("SELECT *FROM producto");
//tenemos un objetos q encapsula los datos de la base de datos
            while($row = $query->fetch()){
                $item = new Producto();
                $item->id_producto    = $row['id_producto'];
                $item->nombre       = $row['nombre'];
                $item->descripcion  = $row['descripcion'];
                $item->precio       = $row['precio'];
                $item->foto         = $row['foto'];
                $item->stock        = $row['stock'];
                $item->categoria    = $row['categoria'];
     //ingresar a un arreglo un nuevo valor
                array_push($items, $item);
            //    echo "datos de la BD:";
            //    echo  $row['nombre'];
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }
//retorna un vector items con las categorias sin repetir
    public function getCategoria(){
        $items = [];

        try{

            $query = $this->db->connect()->query("SELECT DISTINCT categoria FROM producto");
//tenemos un objetos q encapsula los datos de la base de datos
            while($row = $query->fetch()){
                $item = new Producto();
               
                $item->categoria    = $row['categoria'];
     //ingresar a un arreglo un nuevo valor
                array_push($items, $item);
            //    echo "datos de la BD:";
            //    echo  $row['nombre'];
            }

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

//retorna un vector con los nombres y precio filtrado por categoria. Ej: pizza-> todas las variedades por nomb y precio
    public function getByCategoria($categoria){
        $item = new Producto();

        $query = $this->db->connect()->prepare("SELECT nombre, precio FROM producto WHERE categoria=:categoria ");
        try{
            $query->execute(['categoria' => $categoria]);

            while($row = $query->fetch()){
               $item->nombre = $row['nombre'];
               $item->precio = $row['precio'];
              
            }

            return $item;
        }catch(PDOException $e){
            return null;
        }
    }

    public function update($item){
        $query = $this->db->connect()->prepare("UPDATE producto SET nombre = :nombre, descripcion = :descripcion, precio = :precio, foto = :foto, stock = :stock, categoria = :categoria  WHERE id_producto = :id_producto");
        try{
            $query->execute([
                'id_producto'=> $item['id_producto'],
                'nombre'=> $item['nombre'],
                'descripcion'=> $item['descripcion'],
                'precio'=> $item['precio'],
                'foto'=> $item['foto'],
                'stock'=> $item['foto'],
                'categoria'=> $item['categoria']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }


    public function getById($id){
        $item = new Producto();

        $query = $this->db->connect()->prepare("SELECT * FROM producto WHERE id_producto = :id_producto");
        try{
            $query->execute(['id_producto' => $id]);

            while($row = $query->fetch()){
                $item->id_producto = $row['id_producto'];
             // $item->matricula = $row['matricula'];   
                $item->nombre = $row['nombre'];
                $item->descripcion = $row['descripcion'];
                $item->precio = $row['precio'];
                $item->foto = $row['foto'];
                $item->stock = $row['stock'];
                $item->categoria = $row['categoria'];
            }

            return $item;
        }catch(PDOException $e){
            return null;
        }
    }


    public function delete($id){//                                                        ver!!!!
        $query = $this->db->connect()->prepare("DELETE FROM producto WHERE id_producto = :id");
        try{
            $query->execute([
                'id'=> $id,
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}

?>