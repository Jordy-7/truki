<header class="head">
    <a class="logo" href="./index.php">
        <h1>TRUKI</h1>
    </a>

    <!-- btn hamburguer - responsive -->
    <input type="checkbox" id="hamburguer">
    <label for="hamburguer" class="hamburguer">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </label>

    <nav class="navbar">
        <form class="search" onsubmit="return handleSearchSubmit(event);">
            <input id="search-input" type="search" placeholder="Buscar..." name="buscar">
            <div id="search-results" class="search-results"></div>
        </form>

        <div class="links">
            <ul>
                <li><a href="./index.php">Inicio</a></li>
                <li><a href="./tienda.php">Tienda</a></li>
                <li><a href="./contacto.php">Contacto</a></li>
                <li><a href="./nosotros.php">Nosotros</a></li>
                <!--<li><a href="./carrito.php">Carrito</a></li>-->
            </ul>

            <div class="confg">
                <button id="btn-tema">
                    <img src="image/icons/UilMoon.svg">
                </button>

                <div class="handle-theme-container">
                    <button class="handle-theme-default-btn"></button>
                    <div class="handle-theme-colors-container">
                        <button class="handle-theme-btn" style="--currentColor: #0093E9" data-value="#0093E9"></button>
                        <button class="handle-theme-btn" style="--currentColor: #FF647C" data-value="#FF647C"></button>
                        <button class="handle-theme-btn" style="--currentColor: #EE9AE5" data-value="#EE9AE5"></button>
                        <button class="handle-theme-btn" style="--currentColor: #FBAB7E" data-value="#FBAB7E"></button>
                        <button class="handle-theme-btn" style="--currentColor: #9599E2" data-value="#9599E2"></button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $("#search-input").on("keyup", function() {
        var query = $(this).val();
        if (query.length > 0) {
            $.ajax({
                url: "config/buscar.php",
                method: "POST",
                data: { buscar: query },
                success: function(data) {
                    $("#search-results").html(data);
                }
            });
        } else {
            $("#search-results").html("");
        }
    });

    $(document).on("click", ".search-result-item", function() {
        if (!$(this).hasClass("no-results")) {
            var productId = $(this).data("id");
            window.location.href = "detalles.php?producto_id=" + productId;
        }
    });
});


    function handleSearchSubmit(event) {
        event.preventDefault();
        var query = document.getElementById("search-input").value;
        if (query.length > 0) {
            window.location.href = "tienda.php?buscar=" + query;
        }
    }
</script>
