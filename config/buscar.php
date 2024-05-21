<?php
include 'conexion.php';

if (isset($_POST['buscar'])) {
    $buscar = $conn->real_escape_string($_POST['buscar']);

    $sql = "
    SELECT DISTINCT p.ID, p.Nombre, p.Portada
    FROM Productos p
    LEFT JOIN Categorias c ON p.Categoria_ID = c.ID
    LEFT JOIN Marcas m ON p.Marca_ID = m.ID
    LEFT JOIN Producto_Caracteristica pc ON p.ID = pc.Producto_ID
    LEFT JOIN Caracteristicas cr ON pc.Caracteristica_ID = cr.ID
    WHERE p.Nombre LIKE '%$buscar%'
    OR p.Descripcion LIKE '%$buscar%'
    OR c.Nombre LIKE '%$buscar%'
    OR m.Nombre LIKE '%$buscar%'
    OR cr.Nombre LIKE '%$buscar%'
    OR pc.Valor LIKE '%$buscar%'
    LIMIT 5
    ";

    $resultSearch = $conn->query($sql);

    if ($resultSearch->num_rows > 0) {
        while ($row = $resultSearch->fetch_assoc()) {
            echo '<div class="search-result-item" data-id="' . $row["ID"] . '">';
            echo '<img src="' . $row["Portada"] . '" alt="' . $row["Nombre"] . '" class="result-image">';
            echo '<span>' . $row["Nombre"] . '</span>';
            echo '</div>';
        }
    } else {
        echo '<div class="search-result-item no-results">No hay resultados</div>';
    }
}
?>
