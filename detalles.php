<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="./css/global/index.css">
    <link rel="stylesheet" href="./css/index.css">
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
                            <div class="thumbnail"></div>
                            <div class="thumbnail"></div>
                            <div class="thumbnail"></div>
                        </div>
                        <div class="carousel">
                            <div class="carousel-buttons">
                                <button id="prevBtn" class="swiper-navBtn carousel-button">&#10094;</button>
                                <button id="nextBtn" class="swiper-navBtn carousel-button">&#10095;</button>
                            </div>
                            <img src="https://placehold.co/400x200" alt="Imagen 1">
                            <img src="https://get.wallhere.com/photo/colorful-galaxy-space-nebula-atmosphere-universe-astronomy-TylerCreatesWorlds-outer-space-astronomical-object-101048.jpg"
                                alt="Imagen 2">
                            <img src="https://wallpapers.com/images/file/space-galaxy-l3bkk0cf6prcfp8o.jpg"
                                alt="Imagen 3">
                        </div>

                    </div>
                </div>
                <div class="product-details-info">
                    <div class="product-info">
                        <h2>Smartphone XYZ</h2>
                        <ul>
                            <li>Pantalla: 6.5 pulgadas</li>
                            <li>Memoria RAM: 8GB</li>
                            <li>Almacenamiento: 128GB</li>
                            <li>Cámara: 48MP + 12MP + 8MP</li>
                            <li>Batería: 4000mAh</li>
                            <li>Precio: $999</li>
                        </ul>
                        <button>Agregar al carrito</button>
                        <p>Descripción: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero
                            at nunc porta, eget aliquam ipsum facilisis. Maecenas accumsan felis id nulla varius, in
                            malesuada magna placerat.</p>
                    </div>
                </div>
            </div>
        </div>
 
       <!-- slider de productos destacados -->
     <div class="slider-cards-container swiper">
        <div class="slide-container">
          <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="https://via.placeholder.com/300" alt="Product Image" />
              </div>
              <div class="product-details">
                <h3 class="name">Product Name 1</h3>
                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$10.99</p>
                <button class="add-to-cart-btn">Add to Cart</button>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="https://via.placeholder.com/300" alt="Product Image" />
              </div>
              <div class="product-details">
                <h3 class="name">Product Name 2</h3>
                <p class="description">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <p class="price">$19.99</p>
                <button class="add-to-cart-btn">Add to Cart</button>
              </div>
            </div>
            <div class="card swiper-slide">
              <div class="image-box">
                <img src="https://via.placeholder.com/300" alt="Product Image" />
              </div>
              <div class="product-details">
                <h3 class="name">Product Name 3</h3>
                <p class="description">Ut enim ad minim veniam, ut aliquip ex ea commodo consequat.</p>
                <p class="price">$29.99</p>
                <button class="add-to-cart-btn">Add to Cart</button>
              </div>
              <!-- Add more product cards as needed -->
            </div>
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