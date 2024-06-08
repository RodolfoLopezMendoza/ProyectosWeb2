<?php 

function getRegistros(){

    $db = new PDO('mysql:host=localhost;dbname=db_pagosdeudas;charset=utf-8','root', '');
    $sentencia = $db->prepare("select * from pagos");
    $sentencia->execute();

    $pagos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    return $pagos;

}

$servername = "mysql:host=localhost";
$username = "root";
$password = "";
$dbname = "dbname=db_pagosdeudas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Si el formulario ha sido enviado, insertar el nuevo pago
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deudor = $_POST['deudor'];
    $cuota = $_POST['cuota'];
    $cuota_capital = $_POST['cuota_capital'];
    $fecha_pago = $_POST['fecha_pago'];

    $sql = "INSERT INTO pagos (deudor, cuota, cuota_capital, fecha_pago) VALUES ('$deudor', '$cuota', '$cuota_capital', '$fecha_pago')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo pago registrado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Obtener todos los registros de la tabla pagos
$sql = "SELECT * FROM pagos";
$result = $conn->query($sql);

