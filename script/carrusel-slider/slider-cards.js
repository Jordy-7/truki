  var slider = document.getElementById('slider-products');
  var slidesPerPage;
  var currentPosition = 0;
  var currentMargin = 0;
  var slidesCount;
  var buttons = document.querySelectorAll('.btn');

  // Track touch events
  var startX, endX;

  function setParams() {
    var containerWidth = document.getElementById('container').offsetWidth;
    if (containerWidth < 551) slidesPerPage = 1;
    else if (containerWidth < 901) slidesPerPage = 2;
    else if (containerWidth < 1101) slidesPerPage = 3;
    else slidesPerPage = 4;

    slidesCount = document.querySelectorAll('.slide').length - slidesPerPage;
    currentMargin = -currentPosition * (100 / slidesPerPage);
    slider.style.marginLeft = currentMargin + '%';
    buttons[0].classList.toggle('inactive', currentPosition === 0);
    buttons[1].classList.toggle('inactive', currentPosition >= slidesCount);
  }

  setParams();

  window.addEventListener("resize", setParams);

  function slideLeft() {
    if (currentPosition !== 0) {
      slider.style.marginLeft = currentMargin + (100 / slidesPerPage) + '%';
      currentMargin += (100 / slidesPerPage);
      currentPosition--;
      setParams();
    }
  }

  function slideRight() {
    if (currentPosition < slidesCount) {
      slider.style.marginLeft = currentMargin - (100 / slidesPerPage) + '%';
      currentMargin -= (100 / slidesPerPage);
      currentPosition++;
      setParams();
    }
  }

  // Touch event handlers
  slider.addEventListener('touchstart', function(event) {
    startX = event.touches[0].clientX;
  });

  slider.addEventListener('touchmove', function(event) {
    endX = event.touches[0].clientX;
  });

  slider.addEventListener('touchend', function() {
    var diffX = startX - endX;
    if (diffX > 50) {
      slideRight(); // Swipe left
    } else if (diffX < -50) {
      slideLeft(); // Swipe right
    }
  });

