// 整頁-fullpage輪播套件
new fullpage('#fullpage', {
  autoScrolling: true,
  afterLoad: function (origin, destination, direction) {
    if (destination.index == 1 && direction === 'down') {
      fullpage_api.setAutoScrolling(false); //關閉自動滾動模式
      fullpage_api.setFitToSection(false); //關閉滾輪自動回到最近section的效果
    }
    else if (direction === 'up') {
      fullpage_api.setAutoScrolling(true); //開啟自動滾動模式
    }
  },
});

//header的點擊拉出效果
const navbar = document.querySelector('nav');
const ulbar = document.querySelector('.ulbar');
const navimg = document.querySelector('.nav-img');
document.querySelector('.toggle').onclick = function () {
  this.classList.toggle('active');
  navbar.classList.toggle('active');
  ulbar.classList.toggle('active');
  navimg.classList.toggle('active');
};

//關於審計-Swiper輪播套件
const swiper = new Swiper(".aboutUsSwiper", {
  slidesPerView: 1, //同時顯示幾張
  spaceBetween: 30,
  loop: true,
  grabCursor: true,
  effect: 'fade',
  fadeEffect: {
    crossFade: true,
  },
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

//審計新訊-切換選擇日期的效果
const monthList = document.querySelector('#month-list');
const yearsList = document.querySelector('#years-list');
const monthData = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
let dataValue = 1;
monthData.forEach(data => {
  monthList.innerHTML += `<button class="month-btn" data-month="${dataValue}">${data}</button>`
  dataValue++;
});
for (let i = 0; i < 5; i++) {
  yearsList.innerHTML += `<button class="years-btn">${2019 + i}</button>`;
};

const monthBtns = document.querySelectorAll('.month-btn');
const yearsBtns = document.querySelectorAll('.years-btn');
const date = new Date();
const thisYear = String(date.getFullYear());
const thisMonth = String(date.getMonth() + 1);
focusChange(monthBtns);
focusChange(yearsBtns);

function focusChange(date) {
  date.forEach(btns => {
    if (btns.textContent === thisYear || btns.dataset.month === thisMonth) {
      btns.classList.add('focus-change');
    }
    btns.addEventListener('click', function () {
      date.forEach(btn => {
        btn === this
          ?
          btn.classList.add('focus-change')
          :
          btn.classList.remove('focus-change');
      });
    });
  });
}

//回到頂端按鈕
(function () {
  $("body").append("<div id='goTopButton' class='fas fa-chevron-up' style='display: none; z-index: 5; cursor: pointer;' title='回到頂端'/></div>");
  const locatioin = 3 / 5, // 按鈕出現在螢幕的高度
    right = 10, // 距離右邊 px 值
    opacity = 0.5, // 透明度
    speed = 500, // 捲動速度
    $button = $("#goTopButton"),
    $body = $(document),
    $win = $(window);
  $button.on({
    mouseover: () => { $button.css("opacity", 1); },
    mouseout: () => { $button.css("opacity", opacity); },
    click: () => { $("html, body").animate({ scrollTop: 0 }, speed); }
  });
  window.goTopMove = () => {
    const scrollH = $body.scrollTop(),
      winH = $win.height(),
      css = { "top": winH * locatioin + "px", "position": "fixed", "right": right, "opacity": opacity };
    if (scrollH > 20) {
      $button.css(css);
      $button.fadeIn("slow");
    } else {
      $button.fadeOut("slow");
    }
  };
  $win.on({
    scroll: () => { goTopMove(); },
    resize: () => { goTopMove(); }
  });
})();
