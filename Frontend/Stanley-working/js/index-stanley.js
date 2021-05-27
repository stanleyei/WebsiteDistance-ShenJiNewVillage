const section = document.querySelectorAll('section');
const loading_page = document.querySelector('.loading-page');
const random = Math.floor(Math.random()*21)+10;
let count = 0;
const loading_timer = setInterval(() => {
  count++;
  loading.style.width = `${count}%`;
  loading_percent.innerText = `${count} %`

  if (count >= 100) {
    loading_page.classList.add('complete');
    clearInterval(loading_timer);
    setTimeout(() => {
      loading_page.remove();
    }, 1000);
    
    section.forEach(e => {
      e.style.display = 'flex';
    });
  }
}, random);

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