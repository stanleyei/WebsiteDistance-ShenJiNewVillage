@extends('layouts.template')

@section('css')

@endsection

@section('main')
<section id="about-us" class="section">
    <div class="effect-area">
        <img class="logo-img" src="/img/Logo-img.png" alt="">
        <img class="logo-text" src="/img/Logo-text.png" alt="">
        <div class="about-us-container">
            <div class="about-us-title">
                <h2>關於審計</h2>
                <span>Shen Ji New Village</span>
            </div>
            <article>
                <div class="about-us-swiper aboutUsSwiper">
                    <div class="swiper-wrapper">
                        <div class="about-us-slide swiper-slide">
                            <div class="img" style="background-image: url(/img/swiper-text.png);"></div>
                        </div>
                        <div class="about-us-slide swiper-slide">
                            <div class="img" style="background-image: url(/img/nekoteacher01.jpg);"></div>
                        </div>
                        <div class="about-us-slide swiper-slide">
                            <div class="img" style="background-image: url(/img/nekoteacher02.jpg);"></div>
                        </div>
                        <div class="about-us-slide swiper-slide">
                            <div class="img" style="background-image: url(/img/nekoteacher03.jpg);"></div>
                        </div>
                        <div class="about-us-slide swiper-slide">
                            <div class="img" style="background-image: url(/img/swiper-text.png);"></div>
                        </div>
                        <div class="about-us-slide swiper-slide">
                            <div class="img" style="background-image: url(/img/nekoteacher01.jpg);"></div>
                        </div>
                    </div>
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="about-us-content">
                    <h3>園區介紹</h3>
                    <p>審計新村原為臺灣省政府審計處（今審計部教育農林審計處）與臺灣省政府新聞處（今行政院新聞傳播處地方新聞科）的宿舍，1969年興建完成，是中部繼光復新村、長安新村之後的第三批台灣省政府宿舍群。
                    </p>
                </div>
            </article>
        </div>
    </div>
</section>
<section id="news" class="section">
    <img class="logo-img" src="./img/Logo-img.png" alt="">
    <img class="logo-text" src="./img/Logo-text.png" alt="">
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
                    <h3>六月</h3>
                    <div>June,2021</div>
                    <button class="fas fa-chevron-left"></button>
                    <button class="fas fa-chevron-right"></button>
                </div>
                <div class="content-infs">
                    <a class="content-inf" href="">
                        <div class="inf-date">
                            <div class="during">
                                <div class="start-date">03</div>
                                <div class="end-date">-14</div>
                            </div>
                            <span>五月</span>
                        </div>
                        <div class="inf-detail">
                            <div class="inf-tag">審計公告</div>
                            <h4>防疫重要通知 審計新村假日市集皆停辦</h4>
                        </div>
                        <span>more
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </a>
                    <a class="content-inf" href="">
                        <div class="inf-date">
                            <div class="during">
                                <div class="start-date">03</div>
                                <div class="end-date">-14</div>
                            </div>
                            <span>五月</span>
                        </div>
                        <div class="inf-detail">
                            <div class="inf-tag">活動訊息</div>
                            <h4>【審計368新創聚落】即日起開始徵件！</h4>
                        </div>
                        <span>more
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </a>
                    <a class="content-inf" href="">
                        <div class="inf-date">
                            <div class="during">
                                <div class="start-date">03</div>
                                <div class="end-date">-14</div>
                            </div>
                            <span>五月</span>
                        </div>
                        <div class="inf-detail">
                            <div class="inf-tag">活動花絮</div>
                            <h4>三月份暮暮市集活動剪影出爐！！</h4>
                        </div>
                        <span>more
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </article>
    </div>
</section>
<section id="map" class="map"></section>
<section id="store" class="store"></section>
<section id="view" class="view"></section>
<section id="traffic" class="traffic"></section>
<section id="contact" class="contact"></section>
@endsection

@section('js')

@endsection