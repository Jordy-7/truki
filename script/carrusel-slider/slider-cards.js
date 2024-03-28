document.querySelectorAll('.slider-container').forEach(container => {
  const slider = container.querySelector('.slider-products');
  const slides = slider.querySelectorAll('.slide');
  const prevBtn = container.querySelector('.prev');
  const nextBtn = container.querySelector('.next');
  let currentIndex = 0;
  const slideWidth = slides[0].offsetWidth + parseInt(window.getComputedStyle(slides[0]).marginRight);

  function goToSlide(index) {
    if (index < 0) {
      index = slides.length - 1;
    } else if (index >= slides.length) {
      index = 0;
    }
    currentIndex = index;
    slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
  }

  prevBtn.addEventListener('click', () => {
    goToSlide(currentIndex - 1);
  });

  nextBtn.addEventListener('click', () => {
    goToSlide(currentIndex + 1);
  });
});