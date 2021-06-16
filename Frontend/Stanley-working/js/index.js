// 整頁-fullpage輪播套件
new fullpage('#fullpage', {
  autoScrolling: true,
  afterLoad: function (origin, destination, direction) {
    if (destination.index === 5 && direction === 'down') {
      fullpage_api.setAutoScrolling(false); //關閉自動滾動模式
      fullpage_api.setFitToSection(false); //關閉滾輪自動回到最近section的效果
    }
    else if (direction === 'up') {
      fullpage_api.setAutoScrolling(true); //開啟自動滾動模式
    }
  },
  menu: '#fullpageMenu',
  //配置導航,位置，提示,顯示當前位置
  navigation: true,
  navigation: 'left',
  //導航欄
  anchors: ['firstPage', 'secondPage', 'thirdPage', 'fourthPage', 'fifthPage', 'sixthPage', 'seventhPage'],
  menu: '#myMenu',
  responsiveWidth: 769,
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
const aboutUsSwiper = new Swiper(".aboutUsSwiper", {
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
    hideOnClick: true,
  },
});

//審計新訊-生成按鈕
const monthList = document.querySelector('#month-list');
const yearsList = document.querySelector('#years-list');
const monthData = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
let dataValue = 1;
monthData.forEach(data => {
  monthList.innerHTML += `<button class="month-btn" data-month="${dataValue}" title="${data}">${data}</button>`
  dataValue++;
});
for (let i = 0; i < 5; i++) {
  yearsList.innerHTML += `<button class="years-btn" title="${2019 + i}">${2019 + i}</button>`;
};

//審計新訊-切換選擇日期的效果
const monthEn = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const monthBtns = document.querySelectorAll('.month-btn');
const yearsBtns = document.querySelectorAll('.years-btn');
const dateTitle = document.querySelector('.content-title > div:nth-child(2)');
const date = new Date();
const thisYear = String(date.getFullYear());
const thisMonth = String(date.getMonth() + 1);
focusChange(monthBtns);
focusChange(yearsBtns);

function focusChange(dateBtns) {
  dateTitle.previousElementSibling.textContent = monthData[date.getMonth()];
  dateTitle.textContent = monthEn[date.getMonth()];
  dateTitle.nextElementSibling.textContent = `,${thisYear}`;
  dateBtns.forEach(btns => {
    if (btns.textContent === thisYear) {
      btns.classList.add('focus-change');
    }
    else if (btns.dataset.month === thisMonth) {
      btns.classList.add('focus-change');
    }
    btns.addEventListener('click', function () {
      if (this.getAttribute('class') === 'month-btn') {
        dateTitle.textContent = monthEn[this.dataset.month - 1];
        dateTitle.previousElementSibling.textContent = this.textContent;
      }
      else if (this.getAttribute('class') === 'years-btn') {
        dateTitle.nextElementSibling.textContent = `,${this.textContent}`;
      }
      dateBtns.forEach(btn => {
        btn === this
          ?
          btn.classList.add('focus-change')
          :
          btn.classList.remove('focus-change');
      });
    });
  });
}

//店家介紹-切換店家分類按鈕
const navTaps = document.querySelectorAll('.nav-tap');
const shopList = document.querySelectorAll('.shop-list');
const tapChange = document.querySelectorAll('.tap-change');
const shopPhotos = document.querySelectorAll('.figure-box figure');
const shopBtns = document.querySelectorAll('.shop-list > div > span');
const windowTitles = document.querySelectorAll('.window-title');
navTaps.forEach(tab => {
  tab.addEventListener('click', function () {
    navTaps.forEach(tab => {
      tab.classList.remove('tap-active');
    })
    this.classList.add('tap-active');
    shopList.forEach(list => {
      list.classList.add('list-active');
      if (list.dataset.title === this.dataset.title) {
        list.classList.remove('list-active');
      }
    })
    tapChange.forEach(box => {
      box.classList.add('photo-none');
      if (box.dataset.title === this.dataset.title) {
        box.classList.remove('photo-none');
      };
    });
    shopPhotos.forEach(photo => {
      photo.style.transform = `translateX(0%)`;
    });
    shopBtns.forEach(btn => {
      btn.classList.remove('bottom-line');
      if (btn.dataset.img === '0' || btn.dataset.img === '7') {
        btn.classList.add('bottom-line');
      }
    });
    windowTitles.forEach(title => {
      title.classList.add('title-hide');
      if (title.dataset.title === '7' && this.dataset.title === '2') {
        title.classList.remove('title-hide');
      } else if (title.dataset.title === '0' && this.dataset.title === '1') {
        title.classList.remove('title-hide');
      };
    });
  });
});

//店家介紹-點擊店家名稱切換圖片效果
const checkBtnLists = document.querySelectorAll('.shop-window > ul');
shopBtns.forEach(btns => {
  btns.addEventListener('click', function () {
    shopBtns.forEach(btn => {
      btn.classList.remove('bottom-line');
    });
    this.classList.add('bottom-line');
    shopPhotos.forEach(photo => {
      this.parentNode.parentNode.className === 'food-shop shop-list'
        ?
        photo.style.transform = `translateX(-${this.dataset.img * 100}%)`
        :
        photo.style.transform = `translateX(-${(Number(this.dataset.img) - 7) * 100}%)`
    });
    windowTitles.forEach(title => {
      title.classList.add('title-hide');
      if (this.dataset.img === title.dataset.title) {
        title.classList.remove('title-hide');
      };
    });
    checkBtnLists.forEach(list => {
      list.classList.add('check-list-hide');
      if (this.dataset.img === list.dataset.list) {
        list.classList.remove('check-list-hide');
      };
    });
  });
});

//店家介紹-燈箱套件
lightbox.option({
  'resizeDuration': 500,
  'wrapAround': true,
  'disableScrolling': true,
  'positionFromTop': 100,
});

//周邊景點-swiper效果
const swiper = new Swiper('.swiper-container', {
  slidesPerView: 5,
  centeredSlides: true,
  grabCursor: true,
  spaceBetween: 150,
  speed: 500,
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  on: {
    init: function () {
    },
    transitionStart: function () {
      $('.view-card').css("background-color", " #D28E76");
      $('.swiper-slide-active .view-card').css("background-color", "#96422D");
    },
    transitionEnd: function (swiper) {
      // $('.swiper-slide-active .view-card').addClass('viewcard-active');
      // $('.swiper-slide-active .view-card').css("background-color","#96422D");
    }
  }
});

//回到頂端按鈕
(function () {
  $("body").append("<a href='#firstPage' id='goTopButton' class='fas fa-chevron-up' style='display: none; z-index: 5; cursor: pointer;' title='回到頂端'/></a>");
  const locatioin = 2 / 3, // 按鈕出現在螢幕的高度
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

