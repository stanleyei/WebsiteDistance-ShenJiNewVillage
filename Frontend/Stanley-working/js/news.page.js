//header的點擊拉出效果
const navbar = document.querySelector('nav');
const ulbar = document.querySelector('.ulbar');
const navimg = document.querySelector('.nav-img');
const header = document.querySelector('header');
const navToggle = document.querySelector('.toggle');
const main = document.querySelector('main');
navToggle.addEventListener('click', function () {
  this.classList.toggle('active');
  navbar.classList.toggle('active');
  ulbar.classList.toggle('active');
  navimg.classList.toggle('active');
  header.classList.toggle('header-shady');
});
main.addEventListener('click', function () {
  navRemove();
});
header.addEventListener('click', function (e) {
  if (e.target !== navToggle) {
    navRemove();
  };
});

function navRemove() {
  navToggle.classList.remove('active');
  navbar.classList.remove('active');
  ulbar.classList.remove('active');
  navimg.classList.remove('active');
  header.classList.remove('header-shady');
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
  ic = `<div id="content-inf-${i}" data-anchor="${i}" class="content-inf" data-toggle="collapse" data-target="#collapse${i}"
  aria-expanded="true" aria-controls="collapse${i}" title="點我展開">
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
  <figure style="background-image: url(./img/2020-11-26.jpg);"></figure>
  <p>據說在110年01月20日（三）
  將會有很黑暗的一面
  聽我說聽我說
  莫慌莫急莫害怕
  ..
  ...
  原來是園區停電啦
  但不要緊
  「因為店家是不會因此休息的」
  前來散步逛街拍照的你我他還是可以往店家去嚇店員呦
  #真的只是黑了點但照常營業</p>
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
const customSelect = document.querySelector('.btn-secondary');
const infsNone = document.querySelector('#content-infs-none');
const photoWall = document.querySelector('.feast-photo-wall');
const phoneDateSelect = document.querySelector('.phone-date-btn');
const contentInf = document.querySelectorAll('.content-inf');
const dateTitleControl = document.querySelector('.date-title-control');
const newsDate = document.querySelector('.news-date');
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
  dateTitleControl.style = 'display:none';
  newsDate.classList.add('news-data-none');
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

//審計新訊-點擊選擇日期按鈕切換效果
const mutationObserver = new MutationObserver(function (mutations) {
  mutations.forEach(function (mutation) {
    if (phoneDateSelect.value !== '選擇日期') {
      const seleteArray = phoneDateSelect.value.split('-');
      yearsTitle[0].textContent = `,${seleteArray[0]}`;
      if (seleteArray[1] === '10' || seleteArray[1] === '11' || seleteArray[1] === '12') {
        thisMonthTitle.nextElementSibling.textContent = monthEn[seleteArray[1] - 1];
        thisMonthTitle.textContent = monthData[seleteArray[1] - 1];
      }
      else {
        const titleMonth = seleteArray[1].split('0');
        thisMonthTitle.nextElementSibling.textContent = monthEn[titleMonth[1] - 1];
        thisMonthTitle.textContent = monthData[titleMonth[1] - 1];
      }
    };
  });
});
mutationObserver.observe(phoneDateSelect, {
  attributes: true,
  characterData: true,
  childList: true,
  subtree: true,
  attributeOldValue: true,
  characterDataOldValue: true
});

//點擊前後箭頭更換月份
let monthIndex = Number(thisMonth) - 1;
let yearsIndex = date.getFullYear();
dateTitleControl.addEventListener('click', function (e) {
  monthLoop(e, 'prev', 0, 11, -1);
  monthLoop(e, 'next', 11, 0, 1);
});

function monthLoop(e, direction, startIndex, finalIndex, count) {
  if (e.target.dataset.month === `${direction}`) {
    if (thisMonthTitle.textContent !== monthData[startIndex]) {
      thisMonthTitle.textContent = monthData[monthIndex + count];
      thisMonthTitle.nextElementSibling.textContent = monthEn[monthIndex + count];
      monthIndex = monthIndex + count;
    }
    else {
      thisMonthTitle.textContent = monthData[finalIndex];
      thisMonthTitle.nextElementSibling.textContent = monthEn[finalIndex];
      yearsTitle[0].textContent = yearsIndex + count;
      yearsIndex = yearsIndex + count;
      monthIndex = finalIndex;
    };
  };
};

//news-aside-tap被點擊後的效果
const feastPhoto = document.querySelector('#feast-photo');
asideTabs.forEach(tabs => {
  tabs.addEventListener('click', function (tab) {
    if (tab.target === feastPhoto) {
      customSelect.style = 'display:block';
      photoWall.style = 'display:grid';
      infsNone.style = 'display:none';
      phoneDateSelect.classList.add('phone-date-none');
      dateTitleControl.style = 'display:none';
      newsDate.classList.add('news-data-none');
    } else {
      customSelect.style = "display:none";
      photoWall.style = 'display:none';
      infsNone.style = 'display:block';
      phoneDateSelect.classList.remove('phone-date-none');
      dateTitleControl.style = 'display:flex';
      newsDate.classList.remove('news-data-none');
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
    `<a href="./img/愚室實驗所插畫主題商店-01.jpg" data-lightbox="image-1"><figure style="background-image: url(./img/ShenJiNewVillage-27.png);"><div class="figure-hover-appear">0501 小蝸牛市集</div></figure></a>`;
};

//日期選擇jquery.datepicker套件
$(function () {
  $('#datepicker').datepicker({
    changeYear: true, // 年下拉選單
    changeMonth: true, // 月下拉選單
    showButtonPanel: true, // 顯示介面
    showMonthAfterYear: true, // 月份顯示在年後面
    dateFormat: 'yy-mm-dd',
    showButtonPanel: true,
    monthNamesShort: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"], // 月名中文
    prevText: '上月', // 上月按鈕
    nextText: '下月', // 下月按鈕
    currentText: "本月", // 本月按鈕
    closeText: "送出", // 送初選項按鈕
    onClose: function (dateText, inst) {
      var month = $("#ui-datepicker-div .ui-datepicker-month option:selected").val(); //得到選則的月份值
      //增加0判斷
      var parseIntok = parseInt(month) + 1;
      if (parseIntok < 10) {
        parseIn = '0' + parseIntok;
      } else {
        parseIn = parseIntok;
      }
      var year = $("#ui-datepicker-div .ui-datepicker-year option:selected").val(); //得到選則的年份值
      $('#datepicker').val(year + '-' + parseIn); //给input赋值，其中要對月值加1才是實際的月份
    }
  });
});

//燈箱套件
lightbox.option({
  'resizeDuration': 500,
  'wrapAround': true,
  'disableScrolling': true,
  'positionFromTop': 100,
});

//讓資訊展開時回到正中間
NowInfs.forEach(inf => {
  inf.addEventListener('click', function () {
    const infId = this.dataset.anchor;
    location.href = `./news-page.html#content-inf-${infId}`;
  });
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