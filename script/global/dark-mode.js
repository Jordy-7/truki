const darkModeBtn = document.getElementById("btn-tema");

darkModeBtn.addEventListener('click', () => {
  document.body.classList.toggle("dark");

  const activo = document.body.classList.contains("dark");

  // Rutas completas de las imágenes
  const sunImage = "../../image/icons/UilSun.svg";
  const moonImage = "../../image/icons/UilMoon.svg";

  // Establecer la imagen en función del modo oscuro o claro
  darkModeBtn.src = activo ? moonImage : sunImage;
});
