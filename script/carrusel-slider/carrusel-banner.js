var swiper = new Swiper(".banner-container", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  grabCursor: "true",
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});