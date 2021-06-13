@extends('layouts.template')

@section('css')

@endsection

@section('main')
<main id="fullpage">
    <section id="about-us" class="section">
        <div class="effect-area">
            <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
            <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
            <div class="about-us-container">
                <div class="about-us-title">
                    <h2>關於審計</h2>
                    <span>Shen Ji New Village</span>
                </div>
                <article>
                    <div class="about-us-swiper aboutUsSwiper">
                        <div class="swiper-wrapper">
                            :@foreach ($sliders as $slider)
                            <div class="about-us-slide swiper-slide">
                                <div class="img" style="background-image: url({{$slider->img}});"
                                    alt="{{$slider->name}}"></div>
                            </div>
                            @endforeach
                        </div>
                        <div class="swiper-button swiper-button-next" title="點擊切換上一張"></div>
                        <div class="swiper-button swiper-button-prev" title="點擊切換下一張"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <p class="about-us-content">
                        審計新村原為臺灣省政府審計處（今審計部教育農林審計處）與臺灣省政府新聞處（今行政院新聞傳播處地方新聞科）的宿舍，1969年興建完成，是中部繼光復新村、長安新村之後的第三批台灣省政府宿舍群。
                    </p>
                </article>
            </div>
        </div>
    </section>
    <section id="news" class="section">
        <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
        <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
        <div class="news-container">
            <div class="news-title">
                <h2>審計新訊</h2>
                <span>Shen Ji New Village</span>
            </div>
            <article>
                <div class="news-date">
                    <div class="date-title">月份選擇</div>
                    <div class="date-btns" id="month-list"></div>
                    <div class="date-btns" id="years-list"></div>
                </div>
                <div class="news-content">
                    <div class="content-title">
                        <h3></h3>
                        <div></div>
                        <div></div>
                    </div>
                    <div class="content-infs">
                        @foreach ($infs as $inf)
                        <a class="content-inf" href="/news" title="前往{{$inf->name}}">
                            <div class="inf-date">
                                <div class="during">
                                    <div class="start-date">03</div>
                                    <div class="end-date">-14</div>
                                </div>
                                <span></span>
                            </div>
                            <div class="inf-detail">
                                <div class="inf-tag">{{$inf->name}}</div>
                                <h4>{{$inf->infos[0]->name}}</h4>
                            </div>
                            <span>more
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </article>
        </div>
    </section>
    <section id="map" class="map"></section>
    <section id="store" class="section">
        <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
        <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
        <div class="store-container">
            <div class="store-title">
                <h2>店家介紹</h2>
                <span>Shen Ji New Village</span>
            </div>
            <article>
                <div class="shop-window">
                    <img src="{{asset('/img/shop-window.png')}}" alt="窗戶的裝飾圖">
                    <ul data-list="1">
                        <li>
                            <a href="{{asset('img/swiper-text.png')}}" title="點我看大圖" class="check-btn photo-view"
                                data-lightbox="food-shop-1" data-title="Two Day日日鬆餅">看大圖</a>
                        </li>
                        <li>
                            <a href="/store" title="點我看介紹" class="check-btn shop-view">看介紹</a>
                        </li>
                    </ul>
                    <div class="window-title" data-title="1">Two Day日日鬆餅</div>
                    <figure style="background-image: url({{asset('img/swiper-text.png')}});" data-photo="1"></figure>
                    <ul class="check-list-hide" data-list="2">
                        <li>
                            <a href="{{asset('/img/text-2.png')}}" title="點我看大圖" class="check-btn photo-view"
                                data-lightbox="food-shop-2" data-title="三時杏仁">看大圖</a>
                        </li>
                        <li>
                            <a href="/store" title="點我看介紹" class="check-btn shop-view">看介紹</a>
                        </li>
                    </ul>
                    <div class="window-title title-hide" data-title="2">三時杏仁</div>
                    <figure class="figure-hide" style="background-image: url({{asset('/img/text-2.png')}});"
                        data-photo="2">
                    </figure>
                    <ul class="check-list-hide" data-list="3">
                        <li>
                            <a href="{{asset('/img/text-3.png')}}" title="點我看大圖" class="check-btn photo-view"
                                data-lightbox="food-shop-3" data-title="甜月亮義大利手作冰淇淋">看大圖</a>
                        </li>
                        <li>
                            <a href="/store" title="點我看介紹" class="check-btn shop-view">看介紹</a>
                        </li>
                    </ul>
                    <div class="window-title title-hide" data-title="3">甜月亮義大利手作冰淇淋</div>
                    <figure class="figure-hide" style="background-image: url({{asset('/img/text-3.png')}});"
                        data-photo="3">
                    </figure>
                    <ul class="check-list-hide" data-list="4">
                        <li>
                            <a href="{{asset('img/swiper-text.png')}}" title="點我看大圖" class="check-btn photo-view"
                                data-lightbox="food-shop-4" data-title="旅禾泡芙之家">看大圖</a>
                        </li>
                        <li>
                            <a href="/store" title="點我看介紹" class="check-btn shop-view">看介紹</a>
                        </li>
                    </ul>
                    <div class="window-title title-hide" data-title="4">旅禾泡芙之家</div>
                    <figure class="figure-hide" style="background-image: url({{asset('img/swiper-text.png')}});"
                        data-photo="4">
                    </figure>
                    <ul class="check-list-hide" data-list="5">
                        <li>
                            <a href="{{asset('/img/text-2.png')}}" title="點我看大圖" class="check-btn photo-view"
                                data-lightbox="food-shop-5" data-title="森小姐的茶店">看大圖</a>
                        </li>
                        <li>
                            <a href="/store" title="點我看介紹" class="check-btn shop-view">看介紹</a>
                        </li>
                    </ul>
                    <div class="window-title title-hide" data-title="5">森小姐的茶店</div>
                    <figure class="figure-hide" style="background-image: url({{asset('/img/text-2.png')}});"
                        data-photo="5">
                    </figure>
                    <ul class="check-list-hide" data-list="6">
                        <li>
                            <a href="{{asset('/img/text-3.png')}}" title="點我看大圖" class="check-btn photo-view"
                                data-lightbox="food-shop-6" data-title="艸水木堂">看大圖</a>
                        </li>
                        <li>
                            <a href="/store" title="點我看介紹" class="check-btn shop-view">看介紹</a>
                        </li>
                    </ul>
                    <div class="window-title title-hide" data-title="6">艸水木堂</div>
                    <figure class="figure-hide" style="background-image: url({{asset('/img/text-3.png')}});"
                        data-photo="6">
                    </figure>
                    <ul class="check-list-hide" data-list="7">
                        <li>
                            <a href="{{asset('img/swiper-text.png')}}" title="點我看大圖" class="check-btn photo-view"
                                data-lightbox="food-shop-7" data-title="成真咖啡">看大圖</a>
                        </li>
                        <li>
                            <a href="/store" title="點我看介紹" class="check-btn shop-view">看介紹</a>
                        </li>
                    </ul>
                    <div class="window-title title-hide" data-title="7">成真咖啡</div>
                    <figure class="figure-hide" style="background-image: url({{asset('img/swiper-text.png')}});"
                        data-photo="7"></figure>
                    <ul class="check-list-hide" data-list="8">
                        <li>
                            <a href="{{asset('img/swiper-text.png')}}" title="點我看大圖" class="check-btn photo-view"
                                data-lightbox="trinket-shop-1" data-title="森多水耕植研所">看大圖</a>
                        </li>
                        <li>
                            <a href="/store" class="check-btn shop-view">看介紹</a>
                        </li>
                    </ul>
                    <div class="window-title title-hide" data-title="8">森多水耕植研所</div>
                    <figure class="figure-hide" style="background-image: url({{asset('img/swiper-text.png')}});"
                        data-photo="8"></figure>
                </div>
                <nav>
                    <h3>商家介紹</h3>
                    <div class="nav-tap-list">
                        <div class="nav-tap tap-active" title="美食點心類">美食點心類</div>
                        <div class="nav-tap" title="小物禮品類">小物禮品類</div>
                    </div>
                    <div class="food-shop shop-list">
                        <div>
                            <span class="bottom-line" data-img="1" title="Two Day 日日鬆餅">Two Day 日日鬆餅 </span>
                        </div>
                        <div>
                            <span data-img="2" title="三時杏仁">三時杏仁</span>
                        </div>
                        <div>
                            <span data-img="3" title="甜月亮義大利手作冰淇淋">甜月亮義大利手作冰淇淋</span>
                        </div>
                        <div>
                            <span data-img="4" title="旅禾泡芙之家">旅禾泡芙之家</span>
                        </div>
                        <div>
                            <span data-img="5" title="森小姐的茶店">森小姐的茶店</span>
                        </div>
                        <div>
                            <span data-img="6" title="艸水木堂">艸水木堂</span>
                        </div>
                        <div>
                            <span data-img="7" title="成真咖啡">成真咖啡</span>
                        </div>
                    </div>
                    <div class="trinket-shop shop-list list-active">
                        <div>
                            <span data-img="8" title="森多水耕植研所">森多水耕植研所</span>
                        </div>
                        <div>
                            <span data-img="9" title="森林島嶼">森林島嶼</span>
                        </div>
                        <div>
                            <span data-img="10" title="愚室實驗所">愚室實驗所</span>
                        </div>
                        <div>
                            <span data-img="11" title="日子商号">日子商号</span>
                        </div>
                        <div>
                            <span data-img="12" title="Kou Jewellery">Kou Jewellery</span>
                        </div>
                        <div>
                            <span data-img="13" title="品墨良行">品墨良行</span>
                        </div>
                        <div>
                            <span data-img="14" title="KerKerland">KerKerland</span>
                        </div>
                    </div>
                </nav>
            </article>
        </div>
    </section>
    <section id="view" class="view"></section>
    <section id="traffic" class="section">
        <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
        <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
        <div class="traffic-container">
            <div class="traffic-title">
                <h2>交通資訊</h2>
                <span class="tra-title-icon">How To Get There</span>
                <span class="traffic-type">
                    <p>如何到達審計?</p>
                </span>
            </div>
            <div class="traffic-main">
                <div class="traffic-bus">
                    <div class="traffic-logo">
                        <div class="traffic-icon">
                            <img src="{{asset('/img/bus.svg')}}" alt="這是公車圖案的標示">
                        </div>
                        <p>台中市公車</p>
                    </div>
                    <div class="traffic-content">
                        <div class="traffic-content-text">
                            <span>
                                <P>步行兩分鐘</P>
                            </span>
                            <P>「英才郵局」 5路、51路</P>
                            <P>「向上國中」 11路、23路、71路、89路</P>
                        </div>
                    </div>
                </div>
                <div class="traffic-car">
                    <div class="traffic-logo">
                        <div class="traffic-icon">
                            <img src="{{asset('/img/traffic-car.svg')}}" alt="這是汽車圖案的標示">
                        </div>
                        <p>自行開車</p>
                    </div>
                    <div class="traffic-content">
                        <div class="traffic-content-text">
                            <p>台灣大道二段 → 美村路一段 → 民生路</p>
                        </div>
                    </div>
                </div>
                <div class="traffic-bike">
                    <div class="traffic-logo">
                        <div class="traffic-icon">
                            <img src="{{asset('/img/traffic-bike.svg')}}" alt="這是自行車圖案的標示">
                        </div>
                        <p>騎乘 YouBike</p>
                    </div>
                    <div class="traffic-content">
                        <div class="traffic-content-text">
                            <p>點擊查看附近YouBike 據點分布資訊</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section id="contact" class="section">
        <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
        <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
        <div class="contact-container">
            <div class="contact-title">
                <h2>聯絡審計</h2>
                <span>Contact Shen Ji </span>
            </div>
            <div class="contact-main">
                <div class="contact-form-title">
                    <div class="form-text">
                        <h2>聯絡審計</h2>
                        <p>Contact Shen Ji</p>
                    </div>
                </div>
                <div class="contact-form-main">
                    <form class="contact-form" id="contact-form" action="" method="POST">
                        <select name="kg" class="form-type">
                            <option>加入審計</option>
                            <option>顧客意見</option>
                        </select>
                        <div class="form-storename">
                            <p>進駐店家</p>
                            <input type="text">
                        </div>
                        <div class="form-email">
                            <p>E-mail</p>
                            <input type="text">
                        </div>
                        <div class="form-producttype">
                            <p>商品種類</p>
                            <select>
                                <option></option>
                                <option>食物類</option>
                                <option>小物類</option>
                                <option>其他</option>
                            </select>
                        </div>
                        <div class="form-description">
                            <p>詳細資訊</p>
                            <textarea name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                        <input class="form-sendout" type="submit" value="送出資料">
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('js')
<script src="{{ asset('js/index.js')}}"></script>
<script>
    //拿出月份數字並放入網頁
    const infMonth = document.querySelectorAll('.inf-date > span');
    const newInfs = {!! $infs !!}.map(inf => inf.infos[0].date_start);
    let monthFirstNumber = [];
    let monthLastNumber = [];
    newInfs.forEach(inf => {
        const infsDate = inf.split('-');
        monthFirstNumber = infsDate[1].split('0');
        monthFirstNumber.length === 1
         ?
         monthLastNumber.push(monthFirstNumber[0])
         :
         monthLastNumber.push(monthFirstNumber[1]);
    });
    infMonth.forEach( (month, i=0) => {
        month.textContent = monthData[monthLastNumber[i] - 1];
        i++;
    });

</script>
@endsection