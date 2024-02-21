import { saveToLocalStorage } from "/script/lib/utils/save-to-local-storage.js";
import { getToLocalStorage } from "/script/lib/utils/get-to-local-storage.js";

const allBtn = document.querySelectorAll(".handle-theme-btn")

window.addEventListener('load', () => {
  const theme = getToLocalStorage("tema-primary")

  if (theme) {
    document.documentElement.style.setProperty("--primary", theme)
  }
})

allBtn.forEach(btn => {
  btn.addEventListener('click', () => {
    const value = btn.getAttribute("data-value")
    document.documentElement.style.setProperty("--primary", value)

    saveToLocalStorage("tema-primary", value)
  })
});