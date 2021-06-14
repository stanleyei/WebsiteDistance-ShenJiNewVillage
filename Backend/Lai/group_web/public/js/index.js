/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/index.js":
/*!*******************************!*\
  !*** ./resources/js/index.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

var _fullpage;

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var token = document.querySelector('[name="csrf-token"]').getAttribute('content'); // 整頁-fullpage輪播套件

new fullpage('#fullpage', (_fullpage = {
  autoScrolling: true,
  afterLoad: function afterLoad(origin, destination, direction) {
    if (destination.index == 4 && direction === 'down') {
      fullpage_api.setAutoScrolling(false); //關閉自動滾動模式

      fullpage_api.setFitToSection(false); //關閉滾輪自動回到最近section的效果
    } else if (direction === 'up') {
      fullpage_api.setAutoScrolling(true); //開啟自動滾動模式
    }
  },
  menu: '#fullpageMenu',
  //配置導航,位置，提示,顯示當前位置
  navigation: true
}, _defineProperty(_fullpage, "navigation", 'left'), _defineProperty(_fullpage, "anchors", ['firstPage', 'secondPage', 'thirdPage', 'fourthPage', 'fifthPage', 'sixthPage', 'seventhPage']), _defineProperty(_fullpage, "menu", '#myMenu'), _fullpage)); //header的點擊拉出效果

var navbar = document.querySelector('nav');
var ulbar = document.querySelector('.ulbar');
var navimg = document.querySelector('.nav-img');

document.querySelector('.toggle').onclick = function () {
  this.classList.toggle('active');
  navbar.classList.toggle('active');
  ulbar.classList.toggle('active');
  navimg.classList.toggle('active');
}; //關於審計-Swiper輪播套件


var swiper = new Swiper(".aboutUsSwiper", {
  slidesPerView: 1,
  //同時顯示幾張
  spaceBetween: 30,
  loop: true,
  grabCursor: true,
  effect: 'fade',
  fadeEffect: {
    crossFade: true
  },
  speed: 2500,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
    waitForTransition: false
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
    hideOnClick: true
  }
}); //審計新訊-生成按鈕

var monthList = document.querySelector('#month-list');
var yearsList = document.querySelector('#years-list');
var monthData = ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'];
var dataValue = 1;
monthData.forEach(function (data) {
  monthList.innerHTML += "<button class=\"month-btn\" data-month=\"".concat(dataValue, "\" title=\"").concat(data, "\">").concat(data, "</button>");
  dataValue++;
});

for (var i = 0; i < 5; i++) {
  yearsList.innerHTML += "<button class=\"years-btn\" title=\"".concat(2019 + i, "\">").concat(2019 + i, "</button>");
}

; //審計新訊-切換選擇日期的效果

var monthEn = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
var monthBtns = document.querySelectorAll('.month-btn');
var yearsBtns = document.querySelectorAll('.years-btn');
var dateTitle = document.querySelector('.content-title > div:nth-child(2)');
var date = new Date();
var thisYear = String(date.getFullYear());
var thisMonth = String(date.getMonth() + 1);
focusChange(monthBtns);
focusChange(yearsBtns);

function focusChange(dateBtns) {
  dateTitle.previousElementSibling.textContent = monthData[date.getMonth()];
  dateTitle.textContent = monthEn[date.getMonth()];
  dateTitle.nextElementSibling.textContent = ",".concat(thisYear);
  dateBtns.forEach(function (btns) {
    if (btns.textContent === thisYear) {
      btns.classList.add('focus-change');
    } else if (btns.dataset.month === thisMonth) {
      btns.classList.add('focus-change');
    }

    btns.addEventListener('click', function () {
      var _this = this;

      if (this.getAttribute('class') === 'month-btn') {
        dateTitle.textContent = monthEn[this.dataset.month - 1];
        dateTitle.previousElementSibling.textContent = this.textContent;
      } else if (this.getAttribute('class') === 'years-btn') {
        dateTitle.nextElementSibling.textContent = ",".concat(this.textContent);
      }

      dateBtns.forEach(function (btn) {
        btn === _this ? btn.classList.add('focus-change') : btn.classList.remove('focus-change');
      });
      var month = this.dataset.month;
      var formData = new FormData();
      formData.append('month', month);
      formData.append('_token', token);
      fetch('/news_switch', {
        method: 'POST',
        body: formData
      }).then(function (response) {
        return response.text();
      }).then(function (result) {});
    });
  });
} //審計新訊-拿出月份及日期數字並放入網頁


var infMonth = document.querySelectorAll('.inf-date > span');
var startDate = document.querySelectorAll('.start-date');
var createdData = infsData.map(function (inf) {
  return inf.infos[0].created_at;
});
var monthFirstNumber = [];
var monthFinalNumber = [];
var dayNumber = [];
createdData.forEach(function (data) {
  var infsDate = data.split('-');
  var dayFinalNumber = infsDate[2].split('T');
  dayNumber.push(dayFinalNumber[0]);

  if (infsDate[1] === '10' || infsDate[1] === '11' || infsDate[1] === '12') {
    monthFinalNumber.push(infsDate[1]);
  } else {
    monthFirstNumber = infsDate[1].split('0');
    monthFinalNumber.push(monthFirstNumber[1]);
  }
});
infMonth.forEach(function (month) {
  var i = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
  month.textContent = monthData[monthFinalNumber[i] - 1];
  i++;
});
startDate.forEach(function (date) {
  var i = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
  date.textContent = dayNumber[i];
  i++;
}); //店家介紹-切換店家分類按鈕

var navTaps = document.querySelectorAll('.nav-tap');
var shopList = document.querySelectorAll('.shop-list');
var tapChange = document.querySelectorAll('.tap-change');
navTaps.forEach(function (tab) {
  tab.addEventListener('click', function () {
    var _this2 = this;

    navTaps.forEach(function (tab) {
      tab.classList.remove('tap-active');
    });
    this.classList.add('tap-active');
    shopList.forEach(function (list) {
      list.classList.add('list-active');

      if (list.dataset.title === _this2.dataset.title) {
        list.classList.remove('list-active');
      }
    });
    tapChange.forEach(function (box) {
      box.classList.add('photo-none');

      if (box.dataset.title === _this2.dataset.title) {
        box.classList.remove('photo-none');
      }

      ;
    });
  });
}); //店家介紹-點擊店家名稱切換圖片效果

var shopBtns = document.querySelectorAll('.shop-list > div > span');
var shopPhotos = document.querySelectorAll('.figure-box figure');
var windowTitles = document.querySelectorAll('.window-title');
var checkBtnLists = document.querySelectorAll('.shop-window > ul');
shopBtns.forEach(function (btns) {
  btns.addEventListener('click', function () {
    var _this3 = this;

    shopBtns.forEach(function (btn) {
      btn.classList.remove('bottom-line');
    });
    this.classList.add('bottom-line');
    shopPhotos.forEach(function (photo) {
      _this3.parentNode.parentNode.className === 'food-shop shop-list' ? photo.style.transform = "translateX(-".concat(_this3.dataset.img * 100, "%)") : photo.style.transform = "translateX(-".concat((Number(_this3.dataset.img) - 7) * 100, "%)");
    });
    windowTitles.forEach(function (title) {
      title.classList.add('title-hide');

      if (_this3.dataset.img === title.dataset.title) {
        title.classList.remove('title-hide');
      }

      ;
    });
    checkBtnLists.forEach(function (list) {
      list.classList.add('check-list-hide');

      if (_this3.dataset.img === list.dataset.list) {
        list.classList.remove('check-list-hide');
      }

      ;
    });
  });
}); //店家介紹-燈箱套件

lightbox.option({
  'resizeDuration': 500,
  'wrapAround': true,
  'disableScrolling': true,
  'positionFromTop': 100
}); //回到頂端按鈕

(function () {
  $("body").append("<a href='#firstPage' id='goTopButton' class='fas fa-chevron-up' style='display: none; z-index: 5; cursor: pointer;' title='回到頂端'/></a>");
  var locatioin = 2 / 3,
      // 按鈕出現在螢幕的高度
  right = 10,
      // 距離右邊 px 值
  opacity = 0.5,
      // 透明度
  speed = 500,
      // 捲動速度
  $button = $("#goTopButton"),
      $body = $(document),
      $win = $(window);
  $button.on({
    mouseover: function mouseover() {
      $button.css("opacity", 1);
    },
    mouseout: function mouseout() {
      $button.css("opacity", opacity);
    },
    click: function click() {
      $("html, body").animate({
        scrollTop: 0
      }, speed);
    }
  });

  window.goTopMove = function () {
    var scrollH = $body.scrollTop(),
        winH = $win.height(),
        css = {
      "top": winH * locatioin + "px",
      "position": "fixed",
      "right": right,
      "opacity": opacity
    };

    if (scrollH > 20) {
      $button.css(css);
      $button.fadeIn("slow");
    } else {
      $button.fadeOut("slow");
    }
  };

  $win.on({
    scroll: function scroll() {
      goTopMove();
    },
    resize: function resize() {
      goTopMove();
    }
  });
})();

/***/ }),

/***/ 2:
/*!*************************************!*\
  !*** multi ./resources/js/index.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\WebsiteDistance-ShenJiNewVillage\Backend\Lai\group_web\resources\js\index.js */"./resources/js/index.js");


/***/ })

/******/ });