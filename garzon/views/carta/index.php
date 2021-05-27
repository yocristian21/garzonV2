<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php require 'views/header.php'; ?>

<div id="main">
    <h1 class="center">Carta</h1>
    <div id="respuesta" class="center"></div>

    <table width="100%">
        <thead>
            <tr>
              
                <th>Categoriaa</th>
                
            </tr>
        </thead>
        <tbody id="tbody-productos">
            <?php
                include_once 'models/producto.php';
              
            
              
                foreach($this->categorias as $row){
                    $categoria = new Producto();
                    $categoria = $row; 
              ?>
             
            <tr id="fila-<?php echo $categoria->id_producto; ?>">
              
                <td><?php 
                     //producto viene solo con todos los elementos
                          echo $categoria->categoria; 
                         
                         // echo $producto->id_producto;
                       //  echo $producto->precio; 
                      //ver si la funcion verPorCategoria funka!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                      ?></td>
               <td><a href="<?php echo constant('URL') . 'carta/verPorCategoria/'    . $categoria->categoria; ?>">Ir a la categoria</a>  </td>
               
            </tr>
             
            <?php  
             
             } ?>  
        </tbody>
    </table>
    
</div>

<?php require 'views/footer.php'; ?>

<script src="<?php echo constant('URL'); ?>public/js/main.js"></script>


</body>
</html>