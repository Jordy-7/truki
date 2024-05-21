<?php 
include 'conexion.php';

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Establecer la codificación de caracteres
$conn->set_charset("utf8");

// Obtener categorías y marcas seleccionadas del formulario
$categoriasSeleccionadas = isset($_POST['categorias']) ? $_POST['categorias'] : array();
$marcasSeleccionadas = isset($_POST['marcas']) ? $_POST['marcas'] : array();


// Crear la parte de la consulta SQL para filtrar por categorías
$whereCategoria = '';
if (!empty($categoriasSeleccionadas)) {
    $whereCategoria = "WHERE Categoria_ID IN (" . implode(',', $categoriasSeleccionadas) . ")";
}

// Crear la parte de la consulta SQL para filtrar por marcas
$whereMarca = '';
if (!empty($marcasSeleccionadas)) {
    $whereMarca = "AND Marca_ID IN (" . implode(',', $marcasSeleccionadas) . ")";
}

// Si no se han seleccionado categorías pero sí marcas, quitamos el AND
if (empty($categoriasSeleccionadas) && !empty($marcasSeleccionadas)) {
    $whereMarca = "WHERE Marca_ID IN (" . implode(',', $marcasSeleccionadas) . ")";
}

// Consulta SQL para obtener los productos filtrados
$sql = "SELECT p.*, d.Porcentaje AS Descuento FROM Productos p LEFT JOIN Descuentos d ON p.ID = d.Producto_ID $whereCategoria $whereMarca";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Iterar sobre los resultados y generar el HTML de las tarjetas de productos filtrados
    while ($row = $result->fetch_assoc()) {
        $nombreProducto = $row["Nombre"];
        $descripcionProducto = $row["Descripcion"];
        $precioProducto = $row["Precio"];
        $imagenProducto = $row["Portada"];
        $descuento = $row["Descuento"];

        // Mostrar la tarjeta de producto con los datos obtenidos de la base de datos
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
        echo '<button>Agregar al carrito</button>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }
} else {
    echo "No se encontraron productos que coincidan con los filtros seleccionados.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
