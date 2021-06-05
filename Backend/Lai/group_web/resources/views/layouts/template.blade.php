<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>審計新村</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.0/fullpage.css"
        integrity="sha512-hGBKkjAVJUXoImyDezOKpzuY4LS1eTvJ4HTC/pbxn47x5zNzGA1vi3vFQhhOehWLTNHdn+2Yqh/IRNPw/8JF/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    @yield('css')
</head>

<body>
    <header>
        <nav>
            <ul class="ulbar">
                <li>
                    <a href="">
                        <span class="icon far fa-address-book"></span>
                        <span class="title">關於審計</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon fab fa-angellist"></span>
                        <span class="title">審計新訊</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon fas fa-map-marked-alt"></span>
                        <span class="title">園區地圖</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon fas fa-store"></span>
                        <span class="title">商家介紹</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon fas fa-map-marker-alt"></span>
                        <span class="title">周邊景點</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon fas fa-bus-alt"></span>
                        <span class="title">交通資訊</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon far fa-envelope"></span>
                        <span class="title">聯絡審計</span>
                    </a>
                </li>
            </ul>
            <div class="toggle"></div>
            <div class="nav-img"></div>
        </nav>
    </header>
    <main id="fullpage">
        @yield('main')
    </main>
    <footer>
        <img class="footer-logo-img" src="./img/footer-logo-img.png" alt="">
        <img class="footer-logo-text" src="./img/footer-logo-text.png" alt="">
        <div class="footer-container">
            <h2>審計新村 Shen Ji New Village</h2>
            <article>
                <div>
                    <h3>聯絡資訊</h3>
                    <div class="inf-detil">
                        <div>電話 04-23023138</div>
                        <div>04-23210630</div>
                        <p>地址 臺中市西區民生路368巷</p>
                    </div>
                </div>
                <div>
                    <h3>營業時間</h3>
                    <div class="open-detil">
                        <div class="date-box">
                            <div class="date-box">周一</div>
                            <span>至</span>
                            <div class="date-box">周日</div>
                        </div>
                        <time>10:00-19:00</time>
                    </div>
                </div>
                <div class="fb-page" data-href="https://www.facebook.com/shenji368/?ref=page_internal"
                    data-tabs="timeline" data-width="441" data-height="192" data-small-header="true"
                    data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="https://www.facebook.com/shenji368/?ref=page_internal"
                        class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/shenji368/?ref=page_internal">審計368新創聚落</a></blockquote>
                </div>
            </article>
            <p>Copyright © 審計新村走九遍 All reserved</p>
        </div>
    </footer>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v10.0"
        nonce="gw7gekne"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.0/vendors/scrolloverflow.min.js"
        integrity="sha512-pYyQWhzi2lV+RM4GmaUA56VPL48oLVvsHmP9tuQ8MaZMDHomVEDjXXnfSVKXayy+wLclKPte0KbsuVoFImtE7w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.0/fullpage.min.js"
        integrity="sha512-HqbDsHIJoZ36Csd7NMupWFxC7e7aX2qm213sX+hirN+yEx/eUNlZrTWPs1dUQDEW4fMVkerv1PfMohR1WdFFJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/index.js')}}"></script>
    @yield('js')
</body>

</html>