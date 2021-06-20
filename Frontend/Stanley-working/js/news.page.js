//header的點擊拉出效果
const navbar = document.querySelector('nav');
const ulbar = document.querySelector('.ulbar');
const navimg = document.querySelector('.nav-img');
const header = document.querySelector('header');
document.querySelector('.toggle').onclick = function () {
  this.classList.toggle('active');
  navbar.classList.toggle('active');
  ulbar.classList.toggle('active');
  navimg.classList.toggle('active');
  header.classList.toggle('header-shady');
};

// 生出活動內容結構
const contentInfsNow = document.querySelector('#content-infs-now');
const contentInfsNext = document.querySelector('#content-infs-next');
for (let i = 0; i < 3; i++) {
  contentInfsNow.innerHTML += infCard('now', i);
};
for (let i = 3; i < 6; i++) {
  contentInfsNext.innerHTML += infCard('next', i);
};

function infCard(id, i) {
  ic = `<div class="content-inf" data-toggle="collapse" data-target="#collapse${i}"
  aria-expanded="true" aria-controls="collapse${i}" title="">
  <div class="inf-date">
      <div class="during">
          <div class="start-date">03</div>
      </div>
      <span>五月</span>
  </div>
  <h5>防疫重要通知 審計新村假日市集皆停辦</h5>
  <i class="fas fa-chevron-down"></i>
</div>
<div class="inf-detail collapse" id="collapse${i}" aria-labelledby="heading${i}"
  data-parent="#content-infs-${id}">
  <span class="far fa-edit"> 活動詳情</span>
  <div class="card-body">
      <div class="card-imgs">
          <figure style="background-image: url(./img/news-event-image-1.png);"></figure>
          <figure style="background-image: url(./img/news-event-image-2.png);"></figure>
      </div>
      <div class="card-content">
          <p>
              <span>☆平面設計 / 手繪類</span>
              <span>#Drifting In Life</span>
              <span>#小田月所</span>
              <span>翻滾酪梨 Rolin is rolling</span>
              <span>鳥人鳥事多</span>
          </p>
          <p>
              <span>☆植栽 / 木作類</span>
              <span>深白曙光工房</span>
              <span>Lady Is Gaga 手木系</span>
              <span>古夜天工坊</span>
              <span>Tadpole Teak 得寶老柚木</span>
          </p>
      </div>
  </div>
  <div class="card-other-inf">
      <div class="event-time">
          <div>
            <i class="far fa-clock"></i>
            <div>時間</div>
          </div>
          <time>
              <div>
                <span>2021/05/03(一)</span>
                <span>-05/14(五)</span>
              </div>
              <div>10:00-19:00</div>
          </time>
      </div>
      <div class="event-place">
          <div>
            <i class="fas fa-map-marker-alt"></i>
            <div>地點</div>
          </div>
          <span>台中市西區民生路368巷</span>
      </div>
      <div class="event-organizer">
          <i class="fas fa-suitcase"></i>
          <span>主辦單位</span>
          <img src="./img/news-event-logo.png" alt="">
      </div>
      <div class="event-calendar">
          <a target="_blank" href="http://www.google.com/calendar/event?action=TEMPLATE&text=pokemon go 俱樂部聚餐&dates=20210710T183000/20210711T235900&details=第一屆 pokemon go 會員大會，聚餐時間與注意事項%0A1.來吃飯%0A2.帶妹來%0A3.自備飲料&location=道館&trp=false" title="加入google日曆">
              <i class="far fa-calendar-minus"></i>
              <div>加入google日曆</div>
          </a>
      </div>
  </div>
</div>`;
  return ic;
};

//判斷傳進來的url值後切換到對應的分類
const getUrlString = location.href;
const newsUrl = new URL(getUrlString);
const asideTabs = document.querySelectorAll('.aside-tab');
const customSelect = document.querySelector('.custom-select-list');
const infsNone = document.querySelector('#content-infs-none');
const photoWall = document.querySelector('.feast-photo-wall');
const phoneDateSelect = document.querySelector('.phone-date-btn');
const contentInf = document.querySelectorAll('.content-inf');
const dateTitleControl = document.querySelector('.date-title-control');
asideTabs.forEach(tab => {
  if (newsUrl.searchParams.get('tap') === tab.dataset.tap) {
    if (tab.dataset.tap === '1') {
      tab.classList.add('news-tab-focus');
    }
    else if (tab.dataset.tap === '2') {
      tab.classList.add('event-tab-focus');
      contentInf.forEach(inf => {
        inf.classList.add('event-content-inf');
      });
    }
    else {
      tab.classList.add('festival-tab-focus');
    };
  };
});
if (newsUrl.searchParams.get('tap') === '3') {
  customSelect.style = 'display:block';
  photoWall.style = 'display:grid';
  infsNone.style = 'display:none';
  phoneDateSelect.classList.add('phone-date-none');
  dateTitleControl.classList.add('date-title-control-none');
};

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
const thisMonthTitle = document.querySelector('#this-month-title h4');
const nextMonthTitle = document.querySelector('#next-month-title h4');
const yearsTitle = document.querySelectorAll('.content-title .years');
const date = new Date();
const thisYear = String(date.getFullYear());
const thisMonth = String(date.getMonth() + 1);
focusChange(monthBtns);
focusChange(yearsBtns);

function focusChange(dateBtns) {
  thisMonthTitle.nextElementSibling.textContent = monthEn[date.getMonth()];
  nextMonthTitle.nextElementSibling.textContent = monthEn[date.getMonth() + 1];
  yearsTitle.forEach(title => {
    title.textContent = `,${thisYear}`;
  });
  dateBtns.forEach(btns => {
    if (btns.textContent === thisYear) {
      btns.classList.add('focus-change');
    }
    else if (btns.dataset.month === thisMonth) {
      monthChoose(btns);
      btns.classList.add('focus-change');
    }
    btns.addEventListener('click', function () {
      if (this.getAttribute('class') === 'month-btn') {
        thisMonthTitle.nextElementSibling.textContent = monthEn[this.dataset.month - 1];
        this.dataset.month === '12'
          ?
          nextMonthTitle.nextElementSibling.textContent = monthEn[0]
          :
          nextMonthTitle.nextElementSibling.textContent = monthEn[this.dataset.month];
        monthChoose(this);
      }
      else if (this.getAttribute('class') === 'years-btn') {
        yearsTitle.forEach(title => {
          title.textContent = `,${this.textContent}`;
        });
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
function monthChoose(element) {
  thisMonthTitle.textContent = element.textContent;
  element.nextSibling === null
    ?
    nextMonthTitle.textContent = '一月'
    :
    nextMonthTitle.textContent = element.nextSibling.textContent;
}

//news-aside-tap被點擊後的效果
const feastPhoto = document.querySelector('#feast-photo');
asideTabs.forEach(tabs => {
  tabs.addEventListener('click', function (tab) {
    if (tab.target === feastPhoto) {
      customSelect.style = 'display:block';
      photoWall.style = 'display:grid';
      infsNone.style = 'display:none';
      phoneDateSelect.classList.add('phone-date-none');
    } else {
      customSelect.style = "display:none";
      photoWall.style = 'display:none';
      infsNone.style = 'display:block';
      phoneDateSelect.classList.remove('phone-date-none');
    }
    asideTabs.forEach(tab => {
      tab.classList.remove('news-tab-focus', 'event-tab-focus', 'festival-tab-focus');
      if (this === tab) {
        if (tab.dataset.tap === '1') {
          dateTitleControl.classList.remove('date-title-control-none');
          tab.classList.add('news-tab-focus');
          contentInf.forEach(inf => {
            inf.classList.remove('event-content-inf');
          });
        }
        else if (tab.dataset.tap === '2') {
          dateTitleControl.classList.remove('date-title-control-none');
          tab.classList.add('event-tab-focus');
          contentInf.forEach(inf => {
            inf.classList.add('event-content-inf');
          });
        }
        else {
          dateTitleControl.classList.add('date-title-control-none');
          tab.classList.add('festival-tab-focus');
        };
      };
    });
  });
});

//客製化select下拉式選單
const x = document.querySelectorAll('.custom-select-list');
document.addEventListener("click", closeAllSelect);
for (let i = 0; i < x.length; i++) {
  let selElmnt = x[i].getElementsByTagName("select")[0];
  const a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  const b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (let j = 0; j < selElmnt.length; j++) {
    const c = document.createElement("DIV");
    if (j === 0) {
      c.setAttribute("class", "active");
    }
    c.innerHTML = selElmnt.options[j].innerHTML;
    b.appendChild(c);
    c.addEventListener("click", function (e) {
      var y, s, h;
      s = this.parentNode.parentNode.getElementsByTagName("select")[0];
      h = this.parentNode.previousSibling;
      a.classList.toggle('select-selected-focus');
      for (let i = 0; i < s.length; i++) {
        if (s.options[i].innerHTML === this.innerHTML) {
          s.selectedIndex = i;
          h.innerHTML = this.innerHTML;
          y = this.parentNode.querySelectorAll('.active');
          for (let k = 0; k < y.length; k++) {
            y[k].removeAttribute("class");
          }
          this.setAttribute("class", "active");
          break;
        }
      }
    });
  }
  x[i].appendChild(b);
  a.addEventListener("click", function (e) {
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle('select-selected-focus');
    window.addEventListener('click', function () {
      a.classList.remove('select-selected-focus');
    });
  });
}
function closeAllSelect(elmnt) {
  let x, y, arrNo = [];
  x = document.querySelectorAll('.select-items');
  y = document.querySelectorAll('.select-selected');
  for (let i = 0; i < y.length; i++) {
    if (elmnt === y[i]) {
      arrNo.push(i);
    }
  }
  for (let i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

//活動資訊點擊後click變色效果
const NowInfs = document.querySelectorAll('#content-infs-now .content-inf');
const NextInfs = document.querySelectorAll('#content-infs-next .content-inf');
const iconsNow = document.querySelectorAll('#content-infs-now .content-inf i');
const iconsNext = document.querySelectorAll('#content-infs-next .content-inf i');
infsFocusStyle(NowInfs, iconsNow);
infsFocusStyle(NextInfs, iconsNext);

function infsFocusStyle(infsName, iconsName) {
  infsName.forEach(infs => {
    infs.addEventListener('click', function () {
      infsName.forEach(inf => {
        inf === this
          ?
          inf.classList.toggle('inf-focus')
          :
          inf.classList.remove('inf-focus');
      });
      iconsName.forEach(icon => {
        icon === this.querySelector('i')
          ?
          this.querySelector('i').classList.toggle('fa-chevron-up')
          :
          icon.classList.remove('fa-chevron-up');
      });
    });
  });
}

//生成活動花絮結構
for (let i = 1; i < 13; i++) {
  photoWall.innerHTML +=
    `<a href="./img/ShenJiNewVillage-27.png" data-lightbox="image-1"><figure style="background-image: url(./img/ShenJiNewVillage-27.png);"><div class="figure-hover-appear">0501 小蝸牛市集</div></figure></a>`;
};

//燈箱套件
lightbox.option({
  'resizeDuration': 500,
  'wrapAround': true,
  'disableScrolling': true,
  'positionFromTop': 100,
});

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