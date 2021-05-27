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
        <h1 class="center">Sección de Consulta: Hamburguesas</h1>
        <div id="respuesta" class="center"></div>

        <table width="100%">
            <thead>
                <tr>
                    <th>id_producto</th>
                    <th>Nombre</th>
                    <th>descripcion</th>
                    <th>precio</th>
                    <th>foto</th>
                    <th>stock</th>
                    <th>categoria</th>
                    
                </tr>
            </thead>
            <tbody id="tbody-productos">
                <?php
                    include_once 'models/producto.php';
         //productos es un array con todos los detalles de los productos, id_prod nomb prec categoria etc          
                    foreach($this->productos as $row){
                        $producto = new Producto();
                        $producto = $row; 
                ?>
                <tr id="fila-<?php echo $producto->id_producto; ?>">
                    <td><?php echo $producto->nombre; ?></td>
                    <td><?php echo $producto->descripcion; ?></td>
                    <td><?php echo $producto->precio; ?></td>
                    <td><?php echo $producto->foto; ?></td>
                    <td><?php echo $producto->stock; ?></td>
                    <td><?php echo $producto->categoria; ?></td>
                    
                    <td><a href="<?php echo constant('URL') . 'consulta/verProducto/' . $producto->id_producto; ?>">Editar</a>  </td>
                    <!-- <td><a href="<?php echo constant('URL') . 'consulta/eliminarProducto/' . $producto->id_producto; ?>">Eliminar</a> </td>-->
                    <td><button class="bEliminar" data-matricula="<?php echo $producto->id_producto; ?>">Eliminar</button></td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
        
    </div>

    <?php require 'views/footer.php'; ?>

    <script src="<?php echo constant('URL'); ?>public/js/main.js"></script>

</body>
</html>