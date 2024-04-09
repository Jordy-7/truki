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
        <div class="categoria">
          <span class="text-categoria">Todo</span>
        </div>
        <div class="categoria">
          <span class="text-categoria">Mouse</span>
        </div>
        <div class="categoria">
          <span class="text-categoria">Monitores</span>
        </div>
        <div class="categoria">
          <span class="text-categoria">Teclados</span>
        </div>
        <div class="categoria">
          <span class="text-categoria">Audio</span>
        </div>
        <div class="categoria">
          <span class="text-categoria">Accesorios</span>
        </div>
        <div class="categoria">
          <span class="text-categoria">Componentes</span>
        </div>
        <div class="categoria">
          <span class="text-categoria">Perifericos</span>
        </div>
      </div>
    </section>




<!-- slider de productos destacados generales -->
    <div class="slider-cards-container swiper">
    <h1 class="titulo-seccion">Memoria RAM</h1>
    <div class="slide-container">
        <div class="card-wrapper swiper-wrapper">
            <?php
            // Consulta para obtener todos los productos de la categoría de Monitores (ID 5)
            $sql = "SELECT * FROM Productos WHERE Categoria_ID = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar cada producto como una tarjeta
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card swiper-slide">';
                    echo '<div class="image-box">';
                    echo '<img src="' . $row["Portada"] . '" alt="' . $row["Nombre"] . '" />';
                    echo '</div>';
                    echo '<div class="product-details">';
                    echo '<h3 class="name">' . $row["Nombre"] . '</h3>';
                    // Aquí podrías mostrar la descripción y el precio del producto si lo deseas
                    echo '<p class="description">' . $row["Descripcion"] . '</p>';
                    echo '<p class="price">$' . $row["Precio"] . '</p>';
                    echo '<button class="add-to-cart-btn">Add to Cart</button>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No hay productos disponibles en la categoría de Monitores.";
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
            $sql = "SELECT * FROM Productos WHERE Categoria_ID = 2";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar cada producto como una tarjeta
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card swiper-slide">';
                    echo '<div class="image-box">';
                    echo '<img src="' . $row["Portada"] . '" alt="' . $row["Nombre"] . '" />';
                    echo '</div>';
                    echo '<div class="product-details">';
                    echo '<h3 class="name">' . $row["Nombre"] . '</h3>';
                    // Aquí podrías mostrar la descripción y el precio del producto si lo deseas
                    echo '<p class="description">' . $row["Descripcion"] . '</p>';
                    echo '<p class="price">$' . $row["Precio"] . '</p>';
                    echo '<button class="add-to-cart-btn">Add to Cart</button>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No hay productos disponibles en la categoría de Monitores.";
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
            $sql = "SELECT * FROM Productos WHERE Categoria_ID = 3";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar cada producto como una tarjeta
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card swiper-slide">';
                    echo '<div class="image-box">';
                    echo '<img src="' . $row["Portada"] . '" alt="' . $row["Nombre"] . '" />';
                    echo '</div>';
                    echo '<div class="product-details">';
                    echo '<h3 class="name">' . $row["Nombre"] . '</h3>';
                    // Aquí podrías mostrar la descripción y el precio del producto si lo deseas
                    echo '<p class="description">' . $row["Descripcion"] . '</p>';
                    echo '<p class="price">$' . $row["Precio"] . '</p>';
                    echo '<button class="add-to-cart-btn">Add to Cart</button>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No hay productos disponibles en la categoría de Monitores.";
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