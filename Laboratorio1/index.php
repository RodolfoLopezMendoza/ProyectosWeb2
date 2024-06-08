<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 1</title>

</head>

<body>

<h1>Hola</h1>

<h1>Lista de Pagos</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Deudor</th>
            <th>Cuota</th>
            <th>Cuota Capital</th>
            <th>Fecha de Pago</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Salida de datos de cada fila
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"]. "</td>";
                echo "<td>" . $row["deudor"]. "</td>";
                echo "<td>" . $row["cuota"]. "</td>";
                echo "<td>" . $row["cuota_capital"]. "</td>";
                echo "<td>" . $row["fecha_pago"]. "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay registros</td></tr>";
        }
        ?>
    </table>

    <h2>Registrar Nuevo Pago</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="deudor">Deudor:</label>
        <input type="text" name="deudor" id="deudor" required><br>
        
        <label for="cuota">Cuota:</label>
        <input type="number" name="cuota" id="cuota" required><br>
        
        <label for="cuota_capital">Cuota Capital:</label>
        <input type="text" name="cuota_capital" id="cuota_capital" required><br>
        
        <label for="fecha_pago">Fecha de Pago:</label>
        <input type="date" name="fecha_pago" id="fecha_pago" required><br>
        
        <input type="submit" value="Registrar Pago">
    </form>

    
</body>
</html>