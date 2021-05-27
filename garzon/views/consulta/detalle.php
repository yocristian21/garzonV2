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
        <h1 class="center">Detalle de <?php echo $this->producto->id_producto; ?> </h1>

        <div class="center"><?php echo $this->mensaje; ?></div>

        <form action="<?php echo constant('URL'); ?>consulta/actualizarProducto" method="POST">

            <p>
                <label for="id_producto">Id Producto</label><br>
                <input type="text" name="id_producto" disabled value="<?php echo $this->producto->id_producto; ?>" required>
            </p>
            <p>
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" value="<?php echo $this->producto->nombre; ?>" required>
            </p>
            <p>
                <label for="descripcion">Descripcion</label><br>
                <input type="text" name="descripcion" value="<?php echo $this->producto->descripcion; ?>" required>
            </p>
            <p>
                <label for="precio">Precio</label><br>
                <input type="text" name="precio" value="<?php echo $this->producto->precio; ?>" required>
            </p>
            <p>
                <label for="foto">Foto</label><br>
                <input type="text" name="foto" value="<?php echo $this->producto->foto; ?>" required>
            </p>
            <p>
                <label for="stock">Stock</label><br>
                <input type="text" name="stock" value="<?php echo $this->producto->stock; ?>" required>
            </p>
            <p>
                <label for="categoria">Categoria</label><br>
                <input type="text" name="categoria" value="<?php echo $this->producto->categoria; ?>" required>
            </p>

            <p>
            <input type="submit" value="Actualizar producto">
            </p>

        </form>
    </div>

    <?php require 'views/footer.php'; ?>
</body>
</html>