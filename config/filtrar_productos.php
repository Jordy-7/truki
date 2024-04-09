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
$sql = "SELECT * FROM Productos $whereCategoria $whereMarca";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Iterar sobre los resultados y generar el HTML de las tarjetas de productos filtrados
    while ($row = $result->fetch_assoc()) {
        $nombreProducto = $row["Nombre"];
        $descripcionProducto = $row["Descripcion"];
        $precioProducto = $row["Precio"];
        $imagenProducto = $row["Portada"];

        // Mostrar la tarjeta de producto con los datos obtenidos de la base de datos
        echo '<div class="productos">';
        echo '<a href="#" class="link-ver-product">';
        echo '<div class="producto">';
        echo '<img src="' . $imagenProducto . '" alt="' . $nombreProducto . '">';
        echo '<div class="producto-info">';
        echo '<h2 class="name-product">' . $nombreProducto . '</h2>';
        echo '<p class="description">' . $descripcionProducto . '</p>';
        echo '<p class="price">Precio: $' . $precioProducto . '</p>';
        echo '<button>Comprar</button>';
        echo '</div>';
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
