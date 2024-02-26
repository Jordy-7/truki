import { saveToLocalStorage } from "../lib/utils/save-to-local-storage.js";
import { getToLocalStorage } from "../lib/utils/get-to-local-storage.js";

const darkModeBtn = document.getElementById("btn-tema");
const icon = darkModeBtn.querySelector("img")

window.addEventListener("load", () => {
  const saveMode = getToLocalStorage("tema")

  if (saveMode) {
    document.body.classList.add("dark");
    icon.src = "image/icons/UilSun.svg"
  }

})

darkModeBtn.addEventListener('click', () => {
  document.body.classList.toggle("dark")

  const activo = document.body.classList.contains("dark");
  icon.src = activo ? "image/icons/UilSun.svg" : "image/icons/UilMoon.svg"

  saveToLocalStorage("tema", activo)
});
