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
    <h1 class="center">Pedido</h1>
    
    <div>
	<table class="table_1" align="center">
		<tr>
			<th class="table_1">Cantidad</th>
			<th class="table_1">Descripcion</th>
			<th class="table_1">Precio Unitario</th>
		</tr>
	</table>

</div>


<div>
	
<table class="table_2" style="">
	<tr>
		<td><p align="right">Total:</p></td>
	</tr>
	<tr>
		<td><p align="right"><button onclick="">Hacer Pedido</button></p></td>
	</tr>
	<tr>
		<td><p align="right"><button onclick="">Pedir Cuenta</button></p></td>
	</tr>
</table>

</div>
<br>
<br>

<hr>

<br>
<br>

<div>

<center>
	
<a href="carta.php"><input type="button" value="Ver Carta"/></a>

<a href="pedidos.php"><input type="button" value="Ver Pedidos"/></a>

<a href=""><input type="button" value="Llamar Mozo"/></a>

<a href=""><input type="button" value="Ayuda"/></a>

</center>

</div>

<?php require 'views/footer.php'; ?>
</body>
</html>