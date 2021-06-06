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

//生出活動內容結構
const contentInfsNow = document.querySelector('#content-infs-now');
const contentInfsNext = document.querySelector('#content-infs-next');
for (let i = 0; i < 2; i++) {
  contentInfsNow.innerHTML += infCard('now',i);
};
for (let i = 2; i < 5; i++) {
  contentInfsNext.innerHTML += infCard('next',i);
};

function infCard(id,i){
  ic =   `<div class="content-inf" data-toggle="collapse" data-target="#collapse${i}"
  aria-expanded="true" aria-controls="collapse${i}">
  <div class="inf-date">
      <div class="during">
          <div class="start-date">03</div>
          <div class="end-date">-14</div>
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
              <span>☆香氛 / 手工皂類</span>
              <span>#angel_candle_tw</span>
              <span>も Monster</span>
              <span>Yiweiya 創意手作設計</span>
              <span>晴空手作皂 Clear Sky</span>
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
      <div>
          <i class="far fa-clock"></i>
          <div>時間</div>
          <time>
              <span>2021/05/03(一)-05/14(五)</span>
              <div>10:00-19:00</div>
          </time>
      </div>
      <div>
          <i class="fas fa-map-marker-alt"></i>
          <span>地點<span>
                  <span>台中市西區民生路368巷</span>
      </div>
      <div>
          <i class="fas fa-suitcase"></i>
          <span>主辦單位</span>
          <img src="/img/news-event-logo.png" alt="">
      </div>
      <div>
          <a href="">
              <i class="far fa-calendar-minus"></i>
              <div>加入google日曆</div>
          </a>
      </div>
  </div>
</div>`;
return ic;
};
