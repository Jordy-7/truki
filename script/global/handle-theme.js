const allBtn = document.querySelectorAll(".handle-theme-btn")

allBtn.forEach(btn => {
  btn.addEventListener('click', () => {
    const value = btn.getAttribute("data-value")
    document.documentElement.style.setProperty("--primary", value)
  })
});