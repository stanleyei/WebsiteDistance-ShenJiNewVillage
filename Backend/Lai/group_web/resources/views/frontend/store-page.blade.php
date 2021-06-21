@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{asset('/css/store.page.css')}}">
@endsection

@section('main')
<main>
    <a href="/?type={{$shops->type_id}}#thirdPage" class="logo-link" title="回到首頁">
        <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
        <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
    </a>
    <div class="store-title">
        <h2>店家資訊</h2>
        <span>Shen Ji New Village</span>
    </div>
    <div class="store-page-container">
        <article>
            <div>
                <h3>Two Day 日日鬆餅</h3>
                <p>日日鬆餅的可可使用的是法國weiss70%巧克力，整體口感偏苦，是我喜歡的那種，如果覺得舒芙蕾鬆餅比較甜，真心推薦點這法國可可鮮奶做搭配。</p>
            </div>
            <div class="photo-wall">
                <div class="main-photo">
                    <figure class="" style="background-image: url({{asset('/img/text-3.png')}});" data-photo="1">
                    </figure>
                    <figure class="" style="background-image: url({{asset('/img/text-2.png')}});" data-photo="2">
                    </figure>
                    <figure style="background-image: url({{asset('/img/TwoDay日日鬆餅.jpg')}});" data-photo="3"></figure>
                    <figure class="" style="background-image: url({{asset('/img/text-3.png')}});" data-photo="4">
                    </figure>
                    <figure class="" style="background-image: url({{asset('/img/text-2.png')}});" data-photo="5">
                    </figure>
                </div>
                <div class="nav-photo">
                    <figure class="white-mask" style="background-image: url({{asset('/img/text-3.png')}});"
                        data-photo="1"></figure>
                    <figure class="white-mask" style="background-image: url({{asset('/img/text-2.png')}});"
                        data-photo="2"></figure>
                    <figure style="background-image: url({{asset('/img/TwoDay日日鬆餅.jpg')}});" data-photo="3"></figure>
                    <figure class="white-mask" style="background-image: url({{asset('/img/text-3.png')}});"
                        data-photo="4"></figure>
                    <figure class="white-mask" style="background-image: url({{asset('/img/text-2.png')}});"
                        data-photo="5"></figure>
                </div>
            </div>
            <div class="down-content-photo" style="background-image: url({{asset('/img/text-3.png')}});"></div>
            <p>
                日日鬆餅的可可使用的是法國weiss70%巧克力，整體口感偏苦，是我喜歡的那種，如果覺得舒芙蕾鬆餅比較甜，真心推薦點這法國可可鮮奶做搭配。雖然想到“審計新村”，我就因為人潮跟難停車忍不住皺眉不過想到TWODAY日日鬆餅的舒芙蕾鬆餅，我心中又燃起了再訪的想法
            </p>
            <a href="/?type={{$shops->type_id}}#thirdPage" title="回到首頁" class="back-btn">回上一頁</a>
        </article>
    </div>
</main>
@endsection

@section('js')
<script src="{{asset('/js/store.page.js')}}"></script>
@endsection