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
                            <div class="about-us-slide swiper-slide">
                                <div class="img" style="background-image: url({{asset('/img/swiper-text.png')}});"
                                    alt=""></div>
                            </div>
                            <div class="about-us-slide swiper-slide">
                                <div class="img" style="background-image: url({{asset('/img/nekoteacher01.jpg')}});"
                                    alt="">
                                </div>
                            </div>
                            <div class="about-us-slide swiper-slide">
                                <div class="img" style="background-image: url({{asset('/img/nekoteacher02.jpg')}});"
                                    alt="">
                                </div>
                            </div>
                            <div class="about-us-slide swiper-slide">
                                <div class="img" style="background-image: url({{asset('/img/nekoteacher03.jpg')}});"
                                    alt="">
                                </div>
                            </div>
                            <div class="about-us-slide swiper-slide">
                                <div class="img" style="background-image: url({{asset('/img/swiper-text.png')}});"
                                    alt=""></div>
                            </div>
                            <div class="about-us-slide swiper-slide">
                                <div class="img" style="background-image: url({{asset('/img/nekoteacher01.jpg')}});"
                                    alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button swiper-button-next" title="點擊切換上一張"></div>
                        <div class="swiper-button swiper-button-prev" title="點擊切換下一張"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <p class="about-us-content">審計新村原為臺灣省政府審計處（今審計部教育農林審計處）與臺灣省政府新聞處（今行政院新聞傳播處地方新聞科）的宿舍，1969年興建完成，是中部繼光復新村、長安新村之後的第三批台灣省政府宿舍群。
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
                        <a class="content-inf" href="/news" title="前往審計公告">
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
                        <a class="content-inf" href="/news" title="前往活動訊息">
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
                        <a class="content-inf" href="/news" title="前往活動花絮">
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
@endsection