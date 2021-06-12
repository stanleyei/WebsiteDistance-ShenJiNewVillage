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

//回到頂端按鈕
(function () {
    $("body").append("<div id='goTopButton' class='fas fa-chevron-up' style='display: none; z-index: 5; cursor: pointer;' title='回到頂端'/></div>");
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