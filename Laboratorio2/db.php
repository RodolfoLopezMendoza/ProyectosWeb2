<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_universidad";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Si el formulario ha sido enviado para agregar una nueva materia
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $nombre = $_POST['nombre'];
    $profesor = $_POST['profesor'];

    $sql = "INSERT INTO MATERIA (nombre, profesor) VALUES ('$nombre', '$profesor')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva materia registrada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Si el formulario ha sido enviado para buscar una materia
$searchResults = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchName = $_POST['searchName'];

    $sql = "SELECT * FROM MATERIA WHERE nombre LIKE '%$searchName%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    } else {
        echo "No se encontraron materias";
    }
}

// Función para obtener todas las materias
function getAllMaterias($conn) {
    $sql = "SELECT * FROM MATERIA";
    $result = $conn->query($sql);
    $materias = [];
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $materias[] = $row;
        }
    }
    
    return $materias;
}

// Obtener todas las materias
$allMaterias = getAllMaterias($conn);

