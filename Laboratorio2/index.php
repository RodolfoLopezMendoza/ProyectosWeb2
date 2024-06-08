<!DOCTYPE html>
<html>
<head>
    <title>Registro y Búsqueda de Materias</title>
</head>
<body>

<?php require_once 'db.php'?>

    <h1>Registro de Materias</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nombre">Nombre de la Materia:</label>
        <input type="text" name="nombre" id="nombre" required><br>
        
        <label for="profesor">Profesor:</label>
        <input type="text" name="profesor" id="profesor" required><br>
        
        <input type="submit" name="add" value="Registrar Materia">
    </form>

    <h1>Búsqueda de Materias</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="searchName">Buscar por Nombre:</label>
        <input type="text" name="searchName" id="searchName" required><br>
        
        <input type="submit" name="search" value="Buscar Materia">
    </form>

    <?php if (!empty($searchResults)): ?>
        <h2>Resultados de la Búsqueda</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Profesor</th>
            </tr>
            <?php foreach ($searchResults as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['profesor']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <h2>Todas las Materias</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Profesor</th>
        </tr>
        <?php foreach ($allMaterias as $materia): ?>
            <tr>
                <td><?php echo $materia['id']; ?></td>
                <td><?php echo $materia['nombre']; ?></td>
                <td><?php echo $materia['profesor']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    
</body>
</html>