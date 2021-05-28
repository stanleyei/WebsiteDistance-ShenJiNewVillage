//fullpage卷軸套件
new fullpage('main', {
	//options here
	autoScrolling:true,
	scrollHorizontally: true,
  scrollBar:true,
});

//Swiper輪播套件
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
    delay: 2500,
    disableOnInteraction: false,
    waitForTransition: false,
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
