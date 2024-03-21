let currentIndex = 0;
    const slidesB = document.querySelectorAll('.carousel-item');
    const indicatorsContainer = document.querySelector('.indicators');

    function showSlide(index) {
      slidesB.forEach((slide, i) => {
        if (i === index) {
          slide.style.display = 'flex';
        } else {
          slide.style.display = 'none';
        }
      });
    }

    function createIndicators() {
      slidesB.forEach((_, i) => {
        const indicator = document.createElement('div');
        indicator.classList.add('indicator');
        if (i === 0) {
          indicator.classList.add('active');
        }
        indicator.addEventListener('click', () => {
          currentIndex = i;
          showSlide(currentIndex);
          updateIndicators();
        });
        indicatorsContainer.appendChild(indicator);
      });
    }

    function updateIndicators() {
      const indicators = document.querySelectorAll('.indicator');
      indicators.forEach((indicator, i) => {
        if (i === currentIndex) {
          indicator.classList.add('active');
        } else {
          indicator.classList.remove('active');
        }
      });
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % slidesB.length;
      showSlide(currentIndex);
      updateIndicators();
    }

    function prevSlide() {
      currentIndex = (currentIndex - 1 + slidesB.length) % slidesB.length;
      showSlide(currentIndex);
      updateIndicators();
    }

    createIndicators();
    setInterval(nextSlide, 5000); // Cambia de imagen cada 5 segundos
