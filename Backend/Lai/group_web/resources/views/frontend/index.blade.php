@extends('layouts.template')

@section('css')

@endsection

@section('main')
<main id="fullpage">
    <section id="about-us" class="section">
        <div class="effect-area">
            <a href="/" class="logo-link" title="回到首頁">
                <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
                <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
            </a>
            <div class="about-us-container">
                <div class="about-us-title">
                    <h2>關於審計</h2>
                    <span>Shen Ji New Village</span>
                </div>
                <article>
                    <div class="about-us-swiper aboutUsSwiper">
                        <div class="swiper-wrapper">
                            @foreach ($sliders as $slider)
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
        <a href="/" class="logo-link" title="回到首頁">
            <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
            <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
        </a>
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
                        <input type="button" id="datepicker" class="phone-date-btn" name="setuptime" value="選擇日期">
                    </div>
                    <div class="content-infs"></div>
                </div>
            </article>
        </div>
    </section>
    <section id="map" class="map"></section>
    <section id="store" class="section">
        <a href="/" class="logo-link" title="回到首頁">
            <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
            <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
        </a>
        <div class="store-container">
            <div class="store-title">
                <h2>店家介紹</h2>
                <span>Shen Ji New Village</span>
            </div>
            <article>
                <div class="shop-window">
                    <img src="/img/shop-window.png" alt="窗戶的裝飾圖">
                    @foreach ($shops as $shop)
                    <ul data-list="{{$shop->id - 1}}" class="{{$shop->id == 1 ? '' : 'check-list-hide'}}">
                        <li>
                            <a href="{{$shop->shopImgs[0]->img??''}}" title="點我看大圖" class="check-btn photo-view"
                                data-lightbox="food-shop-{{$shop->id}}">看大圖</a>
                        </li>
                        <li>
                            <a href="/store" title="點我看介紹" class="check-btn shop-view">看介紹</a>
                        </li>
                    </ul>
                    <div class="window-title {{$shop->id == 1 ? '' : 'title-hide'}}" data-title="{{$shop->id - 1}}">
                        {{$shop->name}}</div>
                    @endforeach
                    <div class="hide-area">
                        <div class="figure-box">
                            <div class="tap-change" data-title="1">
                                @foreach ($foodShops as $shop)
                                <figure style="background-image: url({{$shop->shopImgs[0]->img??''}});"></figure>
                                @endforeach
                            </div>
                            <div class="tap-change" data-title="2">
                                @foreach ($trinketShops as $shop)
                                <figure style="background-image: url({{$shop->shopImgs[0]->img??''}});"></figure>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <nav>
                    <h3>商家介紹</h3>
                    <div class="nav-tap-list">
                        <div class="nav-tap tap-active" data-title="1" title="{{$newShopTypes[0]->name??''}}">
                            {{$newShopTypes[0]->name??''}}</div>
                        <div class="nav-tap" data-title="2" title="{{$newShopTypes[1]->name??''}}">
                            {{$newShopTypes[1]->name??''}}</div>
                    </div>
                    <div class="food-shop shop-list" data-title="1">
                        @foreach ($newShopTypes[0]->shops??[] as $shop)
                        <div>
                            <span class="{{$shop->id == 1 ? 'bottom-line' : ''}}" data-img="{{$shop->id - 1}}"
                                title="{{$shop->name}}">{{$shop->name}}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="trinket-shop shop-list list-active" data-title="2">
                        @foreach ($newShopTypes[1]->shops??[] as $shop)
                        <div>
                            <span class="{{$shop->id == 8 ? 'bottom-line' : ''}}" data-img="{{$shop->id - 1}}"
                                title="{{$shop->name}}">{{$shop->name}}</span>
                        </div>
                        @endforeach
                    </div>
                </nav>
            </article>
        </div>
    </section>
    <section id="view" class="section">
        <a href="/" class="logo-link" title="回到首頁">
            <img class="logo-img" src="./img/Logo-img.png" alt="">
            <img class="logo-text" src="./img/Logo-text.png" alt="">
        </a>
        <div class="view-container">
            <div class="view-title">
                <h2>周邊景點</h2>
                <span>Shen Ji New Village</span>
            </div>
            <div class="view-main">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($views as $view)
                        <div class="swiper-slide" data-id="{{$view->id}}">
                            <div class="view-card">
                                <p>{{$view->name}}</p>
                                <p class="fas fa-map"> {{$view->phone}}</p>
                                <a href="{{$view->viewImgs[0]->img??''}}" data-lightbox="roadtrip-{{$view->id}}">
                                    <span class="view-card-img"
                                        style="background-image: url('{{$view->viewImgs[0]->img??''}}');"></span>
                                </a>
                                <p>{{$view->content}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="traffic" class="section">
        <a href="/" class="logo-link" title="回到首頁">
            <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
            <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
        </a>
        <div class="traffic-container">
            <div class="traffic-title">
                <h2>交通資訊</h2>
                <span class="tra-title-icon">How To Get There</span>
                <p>如何到達審計?</p>
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
                        <p>步行兩分鐘</p>
                        <p>「英才郵局」 5路、51路</p>
                        <p>「向上國中」 11路、23路、71路、89路</p>
                    </div>
                </div>
                <div class="traffic-car">
                    <div class="traffic-logo">
                        <div class="traffic-icon">
                            <img src="{{asset('/img/traffic-car.svg')}}" alt="這是汽車圖案的標示">
                        </div>
                        <p>自行開車</p>
                    </div>
                    <div class="traffic-content">台灣大道二段 → 美村路一段 → 民生路
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
                        <div>附近YouBike 據點分布資訊</div>
                        <a href="/tra_map" title="點擊查看附近YouBike">點擊查看 ></a>
                    </div>
                </div>
            </div>
    </section>
    <section id="contact" class="section">
        <a href="/" class="logo-link" title="回到首頁">
            <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
            <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
        </a>
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
                        <div class="select-bcg">加入審計</div>
                        <div class="bcground">
                            <ul class="form-type">
                                <li value="join">加入審計</li>
                                <li value="opinion">顧客意見</li>
                            </ul>
                        </div>
                        <div class="form-storename">
                            <p>進駐店家</p>
                            <input type="text" name="store">
                        </div>
                        <div class="form-email">
                            <p>E-mail</p>
                            <input type="text" name="email">
                        </div>
                        <div class="form-producttype">
                            <p>商品種類</p>
                            <div class="form-optiontype"></div>
                            <div class="opground">
                                <ul name="optiontype" class="optiontype">
                                    <li value="美食點心類">美食點心類</li>
                                    <li value="小物禮品類">小物禮品類</li>
                                    <li value="其他類">其他類</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-description">
                            <p>詳細資訊</p>
                            <textarea name="description" id="" cols="30" rows="10"></textarea>
                        </div>
                        <input class="form-sendout" type="submit" value="送出資料" title="送出資料">
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('js')
<script src="{{ asset('js/index.js')}}"></script>
@endsection