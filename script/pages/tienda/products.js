
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
          url: 'filtrar_productos.php',
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