<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito</title>
  <link rel="stylesheet" href="./css/pages/carrito/index.css">
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


  <main class="main">
    <section class="carrito-section">
      <div class="car-container">
        <span class="loader">Cargando...</span>
      </div>
      <a href="#" class="total-pay"></a>
    </section>

  </main>

  <!-- Footer -->
  <?php
    include_once './components/footer.php';
    ?>

  <script type="module" src="script/pages/carrito/index.js"></script>
</body>

</html>