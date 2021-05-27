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
        <h1 class="center">Sección de Nuevo: Ingresar producto</h1>

        <div class="center"><?php echo $this->mensaje; ?></div>

        <form action="<?php echo constant('URL'); ?>nuevo/registrarProducto" method="POST">

            <p>
                <label for="id_producto">id_producto</label><br>
                <input type="text" name="id_producto" id="" required>
            </p>
            <p>
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" id="" required>
            </p>
            <p>
                <label for="descripcion">Descripcion</label><br>
                <input type="text" name="descripcion" id="" required>
            </p>
            <p>
                <label for="precio">Precio</label><br>
                <input type="text" name="precio" id="" required>
            </p>
            <p>
                <label for="foto">foto</label><br>
                <input type="text" name="foto" id="" required>
            </p>
            <p>
                <label for="stock">Stock</label><br>
                <input type="text" name="stock" id="" required>
            </p>
            <p>
                <label for="categoria">Categoria</label><br>
                <input type="text" name="categoria" id="" required>
            </p>

            <p>
            <input type="submit" value="Registrar nuevo Producto">
            </p>

        </form>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>