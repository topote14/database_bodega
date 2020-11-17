<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = 'bodega';

try {
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	
	$con = new mysqli($servername, $username, $password, $database);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

if(isset($_POST['enviar'])){

    $producto = $_POST["NombreProducto"];
    $precio = $_POST["PrecioProducto"];
    $stock = $_POST["StockProducto"];
    $fecha = $_POST["fechaProd"];
    $tipo = $_POST["TipoProducto"];

    $sql = "INSERT INTO `tabla producto`(NombreProducto, PrecioProducto,StockProducto,fechaProd,TipoProducto) 
    VALUES ('$producto','$precio','$stock','$fecha','$tipo')";
    
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
}

}

?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
    <body class="subpage">

		<!-- Header -->
			 <header id="header">
				<div class="inner">
					<nav id="nav">
						<a href="index.html">Home</a>
						<a href="contacto.html">Contacto</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header> 

		<!-- Three -->
		<section id="three" class="wrapper">
			<div class="inner">
				<header class="align-center">
					<h2>Administrar productos</h2>
					
				</header>
				
			</div>
		</section>
		
<!-- Tabla -->


<?php

$sql = "SELECT * FROM `tabla producto`";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
echo '<h3>Productos</h3>
<div class="table-wrapper">
	<table>
		<thead>
			<tr>
				<th>Nombre</th>
				<th>ID</th>
				<th>Precio</th>
				<th>Stock</th>
				<th>Fecha</th>
				<th>Tipo</th>
			</tr>
		</thead>
		<tbody>';
  while($row = $result->fetch_assoc()) {
   
	echo '<tr>
		<td>'. $row["idProducto"] . '</td>
		<td>'. $row["NombreProducto"] . '</td>
		<td>'. $row["PrecioProducto"] . '</td>
		<td>'. $row["StockProducto"] . '</td>
		<td>'. $row["fechaProd"] . '</td>
		<td>'. $row["TipoProducto"] . '</td>

	</tr>';
}
}
echo '</tbody>
</table>
</div>';
?>






<!-- Form -->
<h3>Agregar producto</h3>
<form method="post" action="#">
	<div class="row uniform">
		<div class="6u 12u$(xsmall)">
			<input type="text" name="NombreProducto" id="NombreProducto" value="" placeholder="Nombre" />
        </div>
        <div class="6u$ 12u$(xsmall)">
			<input type="text" name="PrecioProducto" id="PrecioProducto" value="" placeholder="Precio" />
        </div>
        <div class="6u 12u$(xsmall)">
			<input type="number" name="StockProducto" id="StockProducto" value="" placeholder="Stock" />
        </div>
        <div class="6u 12u$(xsmall)">
			<input type="text" name="TipoProducto" id="TipoProducto" value="" placeholder="Tipo de cosecha" />
        </div>
        <div class="6u 12u$(xsmall)">
			<input type="text" name="fechaProd" id="fechaProd" value="" placeholder="Año del producto" />
        </div>
        <div class="12u$">
            <ul class="actions">
			<button type="submit" name="enviar">Enviar</button>
            </ul>
        </div>
	</div>
</form>
</body>
</html>

