let swiper = new Swiper(".aboutUsSwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },
  mousewheel: true,
  speed: 2500,
  autoplay: {
    delay: 4000,
    disableOnInteraction: true,
    waitForTransition: false,
    pauseOnMouseEnter: true,
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