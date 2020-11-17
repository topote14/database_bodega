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

    $venta = $_POST["FechaVenta"];
    $cliente = $_POST["idCliente"];
    $producto = $_POST["idProducto"];
    $empleado = $_POST["idEmpleado"];
    $precio = $_POST["precioUnitario"];
    $cantidad = $_POST["cantVendida"];
    $total = $_POST["montoTotal"];
    

$sql = "INSERT INTO `datos factura`(FechaVenta,idCliente,idProducto,idEmpleado,precioUnitario,cantVendida,montoTotal) 
VALUES ('$venta', '$cliente','$producto','$empleado','$precio','$cantidad','$total')";
    
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
}
echo'	<li><a href="/bodega/comprobante.php" class="button special">Comprobante?</a></li>';

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
					<h2>Ventas</h2>
					
				</header>
				
			</div>
		</section>


<!-- Form -->
<h3>Nueva venta minorista</h3>
<form method="post" action="#">
	<div class="row uniform">
        <div class="6u$ 12u$(xsmall)">
			<input type="date" name="FechaVenta" id="Fechaventa" value="" placeholder="Fecha" />
        </div>
        <div class="6u$ 12u$(xsmall)">
			<input type="number" name="idCliente" id="idCliente" value="" placeholder="Numero de cliente" />
        </div>
        <div class="6u 12u$(xsmall)">
			<input type="number" name="idProducto" id="idProducto" value="" placeholder="Numero de producto" />
        </div>
        <div class="6u 12u$(xsmall)">
			<input type="number" name="idEmpleado" id="idEmpleado" value="" placeholder="Numero de empleado" />
        </div>
        <div class="6u 12u$(xsmall)">
			<input type="number" name="precioUnitario" id="precioUnitario" value="" placeholder="Precio de la venta" />
        </div>
        <div class="6u 12u$(xsmall)">
			<input type="number" name="cantVendida" id="cantVendida" value="" placeholder="Cantidad de productos" />
        </div>
        <div class="6u 12u$(xsmall)">
			<input type="number" name="montoTotal" id="montoTotal" value="" placeholder="Monto total" />
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
