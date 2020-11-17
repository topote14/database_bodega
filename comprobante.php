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

?>
<html>


	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
    <body class="subpage">

		
	

<!-- Tabla -->


<?php

$sql = "SELECT * FROM `datos factura` order by idFactura desc";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
echo '<h3>Comprobante</h3>
<div class="table-wrapper">
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Fecha</th>
				<th>Producto</th>
				<th>ID empleado</th>
				<th>Precio unitario</th>
                <th>Cantidad</th>
                <th>TOTAL</th>
			</tr>
		</thead>
		<tbody>';
  if($row = $result->fetch_assoc()) {
   
	echo '<tr>
		<td>'. $row["idFactura"] . '</td>
		<td>'. $row["FechaVenta"] . '</td>
		<td>'. $row["idProducto"] . '</td>
		<td>'. $row["idEmpleado"] . '</td>
		<td>'. $row["precioUnitario"] . '</td>
		<td>'. $row["cantVendida"] . '</td>
		<td>'. $row["montoTotal"] . '</td>

	</tr>';
}
}
echo '</tbody>
</table>
</div>';
?>
<h3>Firma digital - Bodega Pennisi.</h3>
</body>
</html>

