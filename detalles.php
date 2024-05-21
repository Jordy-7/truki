<?php
include_once './config/conexion.php';

// Obtener el ID del producto de la URL
if (isset($_GET['producto_id'])) {
  $producto_id = $_GET['producto_id'];

  // Consultar la base de datos para obtener los detalles del producto
  $sql = "SELECT p.*, m.Nombre AS Nombre_Marca, d.Porcentaje AS Descuento_Porcentaje
            FROM Productos p 
            LEFT JOIN Marcas m ON p.Marca_ID = m.ID
            LEFT JOIN Descuentos d ON p.ID = d.Producto_ID
            WHERE p.ID = $producto_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $producto = $result->fetch_assoc();

    // Consultar imágenes del producto
    $sql_imagenes = "SELECT * FROM Imagenes_Productos WHERE Producto_ID = $producto_id";
    $result_imagenes = $conn->query($sql_imagenes);

    // Guardar resultados en un array
    $imagenes = [];
    if ($result_imagenes->num_rows > 0) {
      while ($imagen = $result_imagenes->fetch_assoc()) {
        $imagenes[] = $imagen;
      }
    }
  } else {
    echo "Producto no encontrado.";
    exit;
  }
} else {
  echo "ID de producto no proporcionado.";
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles del Producto</title>
  <link rel="stylesheet" href="./css/global/index.css">

  <link rel="stylesheet" href="./css/pages/detalles/productos.css">
  <title>TRUKI - Tiendad</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
  <!-- Estilos de carrusel y slider -->
  <!-- swiper -->
  <link rel="stylesheet" href="css/global/carrusel-slider/swiper/swiper-bundle.min.css">
  <!-- slider - productos destacados -->
  <link rel="stylesheet" href="css/global/carrusel-slider/slider-cards.css">
  <!-- Comun styles -->
  <link rel="stylesheet" href="css/global/carrusel-slider/common-styles.css">
  <!-- swiper -->
  <script src="script/carrusel-slider/swiper/swiper-bundle.min.js"></script>
  <!-- slider - productos destacados -->
  <script src="script/carrusel-slider/slider-cards.js"></script>
  <!-- javascript -->
  <script src="script/index.js" type="module"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- scripts -->
  <script src="./script/global/common.js"></script>
</head>

<body>
  <!-- navbar -->
  <?php
  include_once './components/header.php';
  ?>

  <main class="main-datails">
    <div class="container-product-details">
      <h2>Detalles del Producto</h2>
      <div class="product-info-cont">
        <div class="sect-carousel">
          <div class="carousel-container">
            <div class="carousel-thumbnails">
              <!-- Thumbnails del carrusel -->
              <?php
              foreach ($imagenes as $imagen) {
                echo '<div class="thumbnail"><img src="' . $imagen["Ruta"] . '" alt="Imagen del producto"></div>';
              }
              ?>
            </div>
            <div class="carousel">
              <div class="carousel-buttons">
                <button id="prevBtn" class="swiper-navBtn carousel-button">&#10094;</button>
                <button id="nextBtn" class="swiper-navBtn carousel-button">&#10095;</button>
              </div>
              <!-- Mostrar las imágenes del producto -->
              <?php
              foreach ($imagenes as $imagen) {
                echo '<img src="' . $imagen["Ruta"] . '" alt="Imagen del producto">';
              }
              ?>
            </div>

          </div>
        </div>
        <div class="product-details-info">
          <div class="product-info">
          <div class="product-info">
    <!-- Detalles del producto -->
    <h2><?php echo $producto["Nombre"]; ?></h2>
    <ul>
        <?php
            // Calcular el precio con descuento si hay un descuento aplicado
            $precio_con_descuento = $producto["Precio"];
            if ($producto["Descuento_Porcentaje"] > 0) {
                $descuento_decimal = $producto["Descuento_Porcentaje"] / 100;
                $descuento = $producto["Precio"] * $descuento_decimal;
                $precio_con_descuento = $producto["Precio"] - $descuento;
                echo '<li class="details_Price">Precio con descuento: $' . number_format($precio_con_descuento, 2) . '<span class="descuento"> - ' . $producto["Descuento_Porcentaje"] . '%</span></li>';
                echo '<li><span class="details_Data">Precio original:</span> <span style="text-decoration: line-through;">$' . number_format($producto["Precio"], 2) . '</span></li>';
            } else {
                echo '<li class="details_Price">Precio: </span>$' . number_format($producto["Precio"], 2) . '</li>';
            }
        ?>
        <li><span class="details_Data">Marca: </span><?php echo $producto["Nombre_Marca"]; ?></li>
        <li><span class="details_Data">Descripción: </span><?php echo $producto["Descripcion"]; ?></li>
        <!-- Aquí puedes mostrar más detalles del producto -->
    </ul>
    <button>Compara ahora mediante WhatsApp</button>
</div>



          </div>
        </div>
      </div>

      <!-- slider de productos destacados generales -->
    <div class="slider-cards-container swiper">
      <h1 class="titulo-seccion">Teclados</h1>
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
          <?php
          // Consulta para obtener todos los productos de la categoría de Monitores (ID 5)
          $sql = "SELECT p.*, d.Porcentaje AS Descuento FROM Productos p LEFT JOIN Descuentos d ON p.ID = d.Producto_ID WHERE p.Categoria_ID = 3";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Mostrar cada producto como una tarjeta
            while ($row = $result->fetch_assoc()) {
              $nombreProducto = $row["Nombre"];
              $descripcionProducto = $row["Descripcion"];
              $precioProducto = $row["Precio"];
              $imagenProducto = $row["Portada"];
              $descuento = $row["Descuento"];

              echo '<div class="card swiper-slide">';
              echo '<a href="detalles.php?producto_id=' . $row["ID"] . '" class="card-link">'; // Agregar enlace con el ID del producto
              echo '<div class="image-box">';
              echo '<img src="' . $imagenProducto . '" alt="' . $nombreProducto . '" />';
              echo '</div>';
              echo '<div class="product-details">';
              echo '<h3 class="name">' . $nombreProducto . '</h3>';
              echo '<p class="description">' . $descripcionProducto . '</p>';
              if ($descuento > 0) {
                // Mostrar precio con descuento y precio original
                echo '<p class="price">$' . number_format($precioProducto * (1 - $descuento / 100), 2) . '<span class="descuentoProducto">'.'-' . $descuento . '%</span>';
                echo '<br><span class="original-price">$' . number_format($precioProducto, 2) . '</span></p>';
            } else {
                // Mostrar solo precio original si no hay descuento
                echo '<p class="price">Precio: $' . $precioProducto . '</p>';
            }
              echo '<button class="add-to-cart-btn">Ver detalles</button>';
              echo '</div>';
              echo '</a>'; // Cerrar el enlace
              echo '</div>';
            }
          } else {
            echo "No hay productos disponibles en la categoría de Memoria RAM.";
          }
          ?>
        </div>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div>

  </main>

  <!-- Footer -->
  <?php
  include_once './components/footer.php';
  ?>
  <script src="script/carrusel-slider/product-details.js"></script>
  <!-- swiper -->
  <script src="script/carrusel-slider/swiper/swiper-bundle.min.js"></script>
  <!-- slider - productos destacados -->
  <script src="script/carrusel-slider/slider-cards.js"></script>
</body>

</html>