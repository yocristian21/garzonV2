<?php

class NuevoModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        // insertar datos en la BD
        try{
            $query = $this->db->connect()->prepare('INSERT INTO PRODUCTO (ID_PRODUCTO, NOMBRE, DESCRIPCION, PRECIO, FOTO, STOCK, CATEGORIA) VALUES(:id_producto, :nombre, :descripcion,:precio, :foto, :stock, :categoria)');
            $query->execute(['id_producto' => $datos['id_producto'], 'nombre' => $datos['nombre'], 'descripcion' => $datos['descripcion'], 'precio' => $datos['precio'], 'foto' => $datos['foto'], 'stock' => $datos['stock'], 'categoria' => $datos['categoria']]);
            return true;
        }catch(PDOException $e){
            //echo $e->getMessage();
            //echo "Ya existe esa matrícula";
            return false;
        }
        
    }
}

?>