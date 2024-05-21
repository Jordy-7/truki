<?php
include_once './config/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="./css/pages/inicio/index.css">
  <!-- Estilos de carrusel y slider -->
  <!-- swiper -->
  <link rel="stylesheet" href="css/global/carrusel-slider/swiper/swiper-bundle.min.css">
  <!-- carrusel - banner style -->
  <link rel="stylesheet" href="css/global/carrusel-slider/carrusel-banner.css">
  <!-- slider - productos destacados -->
  <link rel="stylesheet" href="css/global/carrusel-slider/slider-cards.css">
  <!-- common styles -->
  <link rel="stylesheet" href="css/global/carrusel-slider/common-styles.css">

  <!-- bento grid and categories -->
  <link rel="stylesheet" href="css/global/bento/bento-category.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">

  <!-- scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./script/global/common.js"></script>

</head>

<body>
  <!-- navbar -->
  <?php
  include_once './components/header.php';
  ?>

  <!-- Content -->
  <main>

    <!-- Carrusel banner swiper -->
    <div class="banner-slider-conatiner">
      <div class="swiper banner-container">
        <div class="swiper-wrapper banner-wrapper">
          <div class="swiper-slide banner-slide">
            <img class="desktop-image" src="https://placehold.co/1900x400?text=Image+A" alt="Image A">
            <img class="mobile-image" src="https://placehold.co/600x500?text=Image+A" alt="Image A">
          </div>
          <div class="swiper-slide banner-slide">
            <img class="desktop-image" src="https://placehold.co/1900x400?text=Image+B" alt="Image B">
            <img class="mobile-image" src="https://placehold.co/600x500?text=Image+B" alt="Image B">
          </div>
          <div class="swiper-slide banner-slide">
            <img class="desktop-image" src="https://placehold.co/1900x400?text=Image+C" alt="Image C">
            <img class="mobile-image" src="https://placehold.co/600x500?text=Image+C" alt="Image C">
          </div>
        </div>
        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
      </div>
    </div>

    <!-- CATEGORIAS -->
<section class="categorias-container">
  <div class="categorias">
    <a href="tienda.php?categoria=Todo" class="categoria">
      <span class="text-categoria">Todo</span>
    </a>
    <a href="tienda.php?categoria=Memorias RAM" class="categoria">
      <span class="text-categoria">Memorias RAM</span>
    </a>
    <a href="tienda.php?categoria=Discos Duros" class="categoria">
      <span class="text-categoria">Discos Duros</span>
    </a>
    <a href="tienda.php?categoria=Teclados" class="categoria">
      <span class="text-categoria">Teclados</span>
    </a>
    <a href="tienda.php?categoria=Mouse" class="categoria">
      <span class="text-categoria">Mouse</span>
    </a>
    <a href="tienda.php?categoria=Monitores" class="categoria">
      <span class="text-categoria">Monitores</span>
    </a>
    <a href="tienda.php?categoria=Cargadores" class="categoria">
      <span class="text-categoria">Cargadores</span>
    </a>
    <a href="tienda.php?categoria=Audífonos" class="categoria">
      <span class="text-categoria">Audífonos</span>
    </a>
  </div>
</section>

    <!-- slider de productos destacados generales -->
    <div class="slider-cards-container swiper">
      <h1 class="titulo-seccion">Memoria RAM</h1>
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
          <?php
          // Consulta para obtener todos los productos de la categoría de Memoria RAM (ID 1)
          $sql = "SELECT p.*, d.Porcentaje AS Descuento FROM Productos p LEFT JOIN Descuentos d ON p.ID = d.Producto_ID WHERE p.Categoria_ID = 1";
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

    <!-- Bento grid -->
    <div class="bento">
      <div class="bento__container" variant-1>
        <div class="bento__item" style="--bg: #837AED;"></div>
        <div class="bento__item" style="--bg: #837AED;"></div>
        <div class="bento__item" style="--bg: #837AED;"></div>
      </div>
      <div class="bento__container" variant-2>
        <div class="bento__item" style="--bg: #F272AC;"></div>
        <div class="bento__item" style="--bg: #F272AC;"></div>
      </div>
    </div>

    <!-- slider de productos destacados generales -->
    <div class="slider-cards-container swiper">
      <h1 class="titulo-seccion">Discos Duros</h1>
      <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
          <?php
          // Consulta para obtener todos los productos de la categoría de Monitores (ID 5)
          $sql = "SELECT p.*, d.Porcentaje AS Descuento FROM Productos p LEFT JOIN Descuentos d ON p.ID = d.Producto_ID WHERE p.Categoria_ID = 2";
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
  <!-- scripts -->
  <script type="module" src="script/index.js"></script>
  <!-- swiper -->
  <script src="script/carrusel-slider/swiper/swiper-bundle.min.js"></script>
  <!-- Carrusel y slider -->
  <script src="script/carrusel-slider/carrusel-banner.js"></script>
  <!-- slider - productos destacados -->
  <script src="script/carrusel-slider/slider-cards.js"></script>
</body>

</html>