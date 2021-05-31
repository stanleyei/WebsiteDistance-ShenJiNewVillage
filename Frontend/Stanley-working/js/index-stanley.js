//Swiper輪播套件
let swiper = new Swiper(".aboutUsSwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  grabCursor : true,
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

// let mainSwiper = new Swiper(".main", {
//   direction: "vertical",
//   slidesPerView: 1,
//   mousewheel: true,
//   releaseOnEdges: true,
//   height: window.innerHeight,
// });

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
    mouseover: function () { $button.css("opacity", 1); },
    mouseout: function () { $button.css("opacity", opacity); },
    click: function () { $("html, body").animate({ scrollTop: 0 }, speed); }
  });
  window.goTopMove = function () {
    let scrollH = $body.scrollTop(),
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
    scroll: function () { goTopMove(); },
    resize: function () { goTopMove(); }
  });
})();

