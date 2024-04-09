<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/pages/tienda/index.css">
  <title>TRUKI - Tienda</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
  <!-- scripts -->
  <script src="./script/global/common.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <!-- navbar -->
  <?php
  include_once './components/header.php';
  ?>
 <?php
include './config/conexion.php';

// Consulta para obtener todas las categorías activas
$sqlCategorias = "SELECT * FROM Categorias";
$resultCategorias = $conn->query($sqlCategorias);

// Consulta para obtener todas las marcas activas
$sqlMarcas = "SELECT * FROM Marcas";
$resultMarcas = $conn->query($sqlMarcas);
?>

<main class="main">
    <!-- filtros -->
    <nav class="filtros">
        <div class="content-list-filtros">
            <h2 class="filtros-titulo">Categorias</h2>
            <ul class="filtros-lista">
                
                <?php
                // Mostrar opciones de categorías
                if ($resultCategorias->num_rows > 0) {
                    while ($row = $resultCategorias->fetch_assoc()) {
                        echo '<li>';
                        echo '<label>';
                        echo '<input type="checkbox" class="categoria-checkbox" value="' . $row["ID"] . '">';
                        echo '<span>' . $row["Nombre"] . '</span>';
                        echo '</label>';
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </div>

        <div class="content-list-filtros">
            <h2 class="filtros-titulo">Marcas</h2>
            <ul class="filtros-lista">
                
                <?php
                // Mostrar opciones de marcas
                if ($resultMarcas->num_rows > 0) {
                    while ($row = $resultMarcas->fetch_assoc()) {
                        echo '<li>';
                        echo '<label>';
                        echo '<input type="checkbox" class="marca-checkbox" value="' . $row["ID"] . '">';
                        echo '<span>' . $row["Nombre"] . '</span>';
                        echo '</label>';
                        echo '</li>';
                    }
                }
                ?>
            </ul>
        </div>
    </nav>

    <!-- Productos container -->
    <section class="productos-contenendor">
        <div class="productos">
           

        </div>
    </section>
</main>

<script>
    $(document).ready(function() {
        // Función para obtener los productos filtrados
        function obtenerProductosFiltrados() {
            var categoriasSeleccionadas = [];
            var marcasSeleccionadas = [];

            // Obtener las categorías seleccionadas
            $('.categoria-checkbox:checked').each(function() {
                categoriasSeleccionadas.push($(this).val());
            });

            // Obtener las marcas seleccionadas
            $('.marca-checkbox:checked').each(function() {
                marcasSeleccionadas.push($(this).val());
            });

            // Realizar la consulta AJAX
            $.ajax({
                type: 'POST',
                url: './config/filtrar_productos.php',
                data: {
                    categorias: categoriasSeleccionadas,
                    marcas: marcasSeleccionadas
                },
                success: function(response) {
                    $('.productos').html(response); // Mostrar los productos filtrados
                }
            });
        }

        // Manejar cambios en las selecciones de categorías y marcas
        $('.categoria-checkbox, .marca-checkbox').change(function() {
            obtenerProductosFiltrados();
        });

        // Inicializar los productos al cargar la página
        obtenerProductosFiltrados();
    });
</script>



  <!-- Footer -->
  <?php
  include_once './components/footer.php';
  ?>
  <script src="script/pages/tienda/index.js" type="module"></script>
</body>

</html>