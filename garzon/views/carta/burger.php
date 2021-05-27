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
        <h1 class="center">detalle de hambur:</h1>
        <div id="respuesta" class="center"></div>

        <table width="100%">
            <thead>
                <tr>
                   
                    <th>Nombre</th>
                   
                    <th>precio</th>
                   
                </tr>
            </thead>
            <tbody id="tbody-productos">
                <?php
                    include_once 'models/producto.php';
         //productos es un array con todos los detalles de los productos, id_prod nomb prec categoria etc          
                   echo "hola mundo antes forech";//al parecer no ingresa al forech porq productos esta vacio
                       foreach($this->productos as $row){//deberia recorrer productos??????
                        $producto = new Producto();
                        $producto = $row; 
                ?>
               <tr id="fila-<?php echo $producto->id_producto; ?>">
                    <td><?php
                    echo "hola mundooo dentro forech";
                    echo $producto->nombre; ?></td>
                  
                    <td><?php echo $producto->precio; ?></td>
                 
                
                </tr>

                <?php } ?>
            </tbody>
        </table>
        
    </div>

    <?php require 'views/footer.php'; ?>

    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>

</body>
</html>