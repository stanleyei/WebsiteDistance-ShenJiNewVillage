@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{asset('/css/news.page.css')}}">
@endsection

@section('main')
<main>
    <a href="/#secondPage" class="logo-link" title="回到首頁">
        <img class="logo-img" src="{{asset('/img/Logo-img.png')}}" alt="審計新村LOGO插圖">
        <img class="logo-text" src="{{asset('/img/Logo-text.png')}}" alt="審計新村LOGO文字">
    </a>
    <div class="news-page-container">
        <div class="news-title">
            <h2>審計新訊</h2>
            <span>Shen Ji New Village</span>
        </div>
        <div class="aside">
            <button class="aside-tab" id="announcement-news" data-tap="1" title="審計公告">審計公告</button>
            <button class="aside-tab" id="feast-news" data-tap="2" title="活動訊息">活動訊息</button>
            <button class="aside-tab" id="feast-photo" data-tap="3" title="活動花絮">活動花絮</button>
        </div>
        <article>
            <div class="news-date">
                <div class="date-title">月份選擇</div>
                <div class="date-btns" id="month-list"></div>
                <div class="date-btns" id="years-list"></div>
            </div>
            <div class="news-content">
                <div class="content-title" id="this-month-title">
                    <div class="date-title-control">
                        <i class="fas fa-chevron-left"></i>
                        <h4></h4>
                        <div class="month"></div>
                        <div class="years"></div>
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <input type="button" id="datepicker" class="phone-date-btn" name="setuptime" value="選擇日期">
                    <div class="custom-select-list">
                        <select name="" class="nwes-select">
                            <option value="">全部照片</option>
                            <option value="">0501 小蝸牛市集</option>
                            <option value="">0513 幕幕市集</option>
                            <option value="">0522 散策市集</option>
                            <option value="">0527 寧夏微涼市集</option>
                        </select>
                    </div>
                </div>
                <div id="content-infs-none">
                    <div class="content-infs" id="content-infs-now"></div>
                    <h3>下月活動預告</h3>
                    <div class="content-title" id="next-month-title">
                        <h4></h4>
                        <div></div>
                        <div class="m-0"></div>
                    </div>
                    <div class="content-infs" id="content-infs-next"></div>
                </div>
                <div class="feast-photo-wall"></div>
            </div>
        </article>
    </div>
</main>
@endsection

@section('js')
<script src="{{asset('/js/news.page.js')}}"></script>
@endsection