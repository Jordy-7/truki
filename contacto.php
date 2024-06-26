<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/global/index.css">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/pages/style.css">
    <title>TRUKI - Tiendad</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">

    <!-- javascript -->
    <script src="script/index.js" type="module"></script>
    <!-- scripts -->
    <script src="script/global/common.js"></script>
</head>

<body>
      <!-- navbar -->
      <?php
    include_once './components/header.php';
    ?>

    <main class="main-info">
        <div class="contact-container">
            <h1>Contacto - Truki</h1>

            <div class="contact-info">
                <div class="contact-info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <h2>Dirección</h2>
                    <p>Av. Ejemplo 123, Ciudad Truki</p>
                </div>

                <div class="contact-info-item">
                    <i class="fas fa-phone"></i>
                    <h2>Teléfono</h2>
                    <p>+123 456 789</p>
                </div>

                <div class="contact-info-item">
                    <i class="fas fa-envelope"></i>
                    <h2>Correo electrónico</h2>
                    <p>info@truki.com</p>
                </div>

            </div>

            <div class="contact-info-item horario full-width">
                <h2>Horario de atención</h2>
                <p>Lunes a Viernes: 9:00 am - 6:00 pm</p>
            </div>

            <div class="contact-info-social">
                <h3>Puede seguirnos en nuestras redes sociales:</h3>
                <div class="contact-info-social-redes">
                    <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="contact-info-map">
                <h3>Ubicación en el mapa:</h3>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d243.86365890675634!2d-77.02521831262436!3d-12.056002848739777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1709684367583!5m2!1ses-419!2spe"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </main>



    <!-- Footer -->
    <?php
    include_once './components/footer.php';
    ?>
</body>

</html>