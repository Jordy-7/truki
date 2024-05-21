<?php

include 'conexion.php';

// Obtener el término de búsqueda de la URL
$terminoBusqueda = isset($_POST['buscar']) ? $_POST['buscar'] : '';

// Consulta para obtener los productos filtrados por búsqueda
$sqlProductos = "
SELECT DISTINCT p.ID, p.Nombre, p.Descripcion, p.Precio, p.Portada, d.Porcentaje AS Descuento
FROM Productos p
LEFT JOIN Categorias c ON p.Categoria_ID = c.ID
LEFT JOIN Marcas m ON p.Marca_ID = m.ID
LEFT JOIN Producto_Caracteristica pc ON p.ID = pc.Producto_ID
LEFT JOIN Caracteristicas cr ON pc.Caracteristica_ID = cr.ID
LEFT JOIN Descuentos d ON p.ID = d.Producto_ID
WHERE (p.Nombre LIKE '%$terminoBusqueda%'
OR p.Descripcion LIKE '%$terminoBusqueda%'
OR c.Nombre LIKE '%$terminoBusqueda%'
OR m.Nombre LIKE '%$terminoBusqueda%'
OR cr.Nombre LIKE '%$terminoBusqueda%'
OR pc.Valor LIKE '%$terminoBusqueda%')
";

$resultProductos = $conn->query($sqlProductos);

if ($resultProductos->num_rows > 0) {
    while ($row = $resultProductos->fetch_assoc()) {
        $nombreProducto = $row["Nombre"];
        $descripcionProducto = $row["Descripcion"];
        $precioProducto = $row["Precio"];
        $imagenProducto = $row["Portada"];
        $descuento = $row["Descuento"];

        echo '<div class="producto">';
        echo '<a class="productos-link" href="detalles.php?producto_id=' . $row['ID'] . '">';
        echo '<img src="' . $imagenProducto . '" alt="' . $nombreProducto . '">';
        echo '<div class="producto-info">';
        echo '<h2 class="name-product">' . $nombreProducto . '</h2>';
        echo '<p class="description">' . $descripcionProducto . '</p>';
        if ($descuento > 0) {
            // Mostrar precio con descuento y precio original
            echo '<p class="price">$' . number_format($precioProducto * (1 - $descuento / 100), 2) . '<span class="descuentoProducto">'.'-' . $descuento . '%</span>';
            echo '<br><span class="original-price">$' . number_format($precioProducto, 2) . '</span></p>';
        } else {
            // Mostrar solo precio original si no hay descuento
            echo '<p class="price">Precio: $' . $precioProducto . '</p>';
        }
        echo '<button>Ver detalles</button>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }
} else {
    echo '<div class="producto-item">No hay resultados</div>';
}

?>
