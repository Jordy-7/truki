const darkModeBtn = document.getElementById("btn-tema")

darkModeBtn.addEventListener('click', () => {
  document.body.classList.toggle("dark");

  const activo = document.body.classList.contains("dark");
  darkModeBtn.textContent = activo ? "🌝" : "🌚";
})