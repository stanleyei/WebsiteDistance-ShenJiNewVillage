@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{asset('/css/news.page.css')}}">
@endsection

@section('main')
<main>
    <a href="/index#secondPage" class="logo-link" title="回到首頁">
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
                        <i class="fas fa-chevron-left" data-month="prev" title="上個月"></i>
                        <h4></h4>
                        <div class="month"></div>
                        <div class="years"></div>
                        <i class="fas fa-chevron-right" data-month="next" title="下個月"></i>
                    </div>
                    <input type="button" id="datepicker" class="phone-date-btn" name="setuptime" title="選擇日期"
                        value="選擇日期">
                    <div class="custom-select-list">
                        <select name="market" class="nwes-select" title="選擇活動">
                            <option value="">全部照片</option>
                            <option value="{{$eventInfos[0]->id??''}}">0120 小蝸牛市集</option>
                            <option value="{{$eventInfos[1]->id??''}}">0210 暮暮市集</option>
                            <option value="{{$eventInfos[2]->id??''}}">0218 寧夏市集</option>
                            <option value="{{$eventInfos[3]->id??''}}">0410 散策市集</option>
                            <option value="{{$eventInfos[4]->id??''}}">0507 暮暮市集</option>
                            <option value="{{$eventInfos[5]->id??''}}">0513 微涼市集</option>
                            <option value="{{$eventInfos[6]->id??''}}">0517 小蝸牛市集</option>
                            <option value="{{$eventInfos[7]->id??''}}">0708 暮暮市集</option>
                            <option value="{{$eventInfos[8]->id??''}}">0908 草地市集</option>
                            <option value="{{$eventInfos[9]->id??''}}">1008 微風市集</option>
                        </select>
                    </div>
                </div>
                <div id="content-infs-none">
                    <div class="content-infs" id="content-infs-now">
                        @foreach ($infos as $info)
                        <div class="content-inf" data-toggle="collapse" data-target="#collapse{{$info->id}}"
                            aria-expanded="true" aria-controls="collapse{{$info->id}}" title="點我展開">
                            <div class="inf-date">
                                <div class="during">
                                    <div class="start-date"></div>
                                </div>
                                <span></span>
                            </div>
                            <h5>{{$info->name}}</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="inf-detail collapse" id="collapse{{$info->id}}"
                            aria-labelledby="heading{{$info->id}}" data-parent="#content-infs-now">
                            <span class="far fa-edit"> 活動詳情</span>
                            <div class="card-body">
                                <figure style="background-image: url({{asset($info->img)}});"></figure>
                                <p>{!!$info->content!!}</p>
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
                                    <span>{{$info->location}}</span>
                                </div>
                                <div class="event-organizer">
                                    <i class="fas fa-suitcase"></i>
                                    <span>主辦單位</span>
                                    <span class="ml-sm-1">{{$info->organizer}}</span>
                                </div>
                                <div class="event-calendar">
                                    <a target="_blank"
                                        href="http://www.google.com/calendar/event?action=TEMPLATE&text={{$info->name}}&dates=20210710T183000/20210711T235900&details=第一屆 pokemon go 會員大會，聚餐時間與注意事項%0A1.來吃飯%0A2.帶妹來%0A3.自備飲料&location=道館&trp=false"
                                        title="加入google日曆">
                                        <i class="far fa-calendar-minus"></i>
                                        <div>加入google日曆</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <h3>下月活動預告</h3>
                    <div class="content-title" id="next-month-title">
                        <h4></h4>
                        <div class="month"></div>
                        <div class="years m-0"></div>
                    </div>
                    <div class="content-infs" id="content-infs-next">
                        @foreach ($nextInfos as $info)
                        <div class="content-inf" data-toggle="collapse" data-target="#collapse{{$info->id}}"
                            aria-expanded="true" aria-controls="collapse{{$info->id}}" title="點我展開">
                            <div class="inf-date">
                                <div class="during">
                                    <div class="start-date">03</div>
                                </div>
                                <span>五月</span>
                            </div>
                            <h5>{{$info->name}}</h5>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="inf-detail collapse" id="collapse{{$info->id}}"
                            aria-labelledby="heading{{$info->id}}" data-parent="#content-infs-next">
                            <span class="far fa-edit"> 活動詳情</span>
                            <div class="card-body">
                                <div class="card-imgs">
                                    <figure style="background-image: url({{asset($info->img)}});"></figure>
                                </div>
                                <div class="card-content">{{$info->content}}</div>
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
                                    <span>{{$info->location}}</span>
                                </div>
                                <div class="event-organizer">
                                    <i class="fas fa-suitcase"></i>
                                    <span>主辦單位</span>
                                    <span class="ml-sm-1">{{$info->organizer}}</span>
                                </div>
                                <div class="event-calendar">
                                    <a target="_blank"
                                        href="http://www.google.com/calendar/event?action=TEMPLATE&text={{$info->name}}&dates=20210710T183000/20210711T235900&details=第一屆 pokemon go 會員大會，聚餐時間與注意事項%0A1.來吃飯%0A2.帶妹來%0A3.自備飲料&location=道館&trp=false"
                                        title="加入google日曆">
                                        <i class="far fa-calendar-minus"></i>
                                        <div>加入google日曆</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="feast-photo-wall">
                    @foreach ($eventInfos[0]->infoImgs??[] as $img)
                    <a href="{{asset($img->img)}}" data-lightbox="{{$img->info_id}}" data-title="{{$img->name}}">
                        <figure style="background-image: url({{asset($img->img)}});">
                            <div class="figure-hover-appear">{{$img->name}}</div>
                        </figure>
                    </a>
                    @endforeach
                    @foreach ($eventInfos[1]->infoImgs??[] as $img)
                    <a href="{{asset($img->img)}}" data-lightbox="{{$img->info_id}}" data-title="{{$img->name}}">
                        <figure style="background-image: url({{asset($img->img)}});">
                            <div class="figure-hover-appear">{{$img->name}}</div>
                        </figure>
                    </a>
                    @endforeach
                    @foreach ($eventInfos[2]->infoImgs??[] as $img)
                    <a href="{{asset($img->img)}}" data-lightbox="{{$img->info_id}}" data-title="{{$img->name}}">
                        <figure style="background-image: url({{asset($img->img)}});">
                            <div class="figure-hover-appear">{{$img->name}}</div>
                        </figure>
                    </a>
                    @endforeach
                    @foreach ($eventInfos[3]->infoImgs??[] as $img)
                    <a href="{{asset($img->img)}}" data-lightbox="{{$img->info_id}}" data-title="{{$img->name}}">
                        <figure style="background-image: url({{asset($img->img)}});">
                            <div class="figure-hover-appear">{{$img->name}}</div>
                        </figure>
                    </a>
                    @endforeach
                    @foreach ($eventInfos[4]->infoImgs??[] as $img)
                    <a href="{{asset($img->img)}}" data-lightbox="{{$img->info_id}}" data-title="{{$img->name}}">
                        <figure style="background-image: url({{asset($img->img)}});">
                            <div class="figure-hover-appear">{{$img->name}}</div>
                        </figure>
                    </a>
                    @endforeach
                    @foreach ($eventInfos[5]->infoImgs??[] as $img)
                    <a href="{{asset($img->img)}}" data-lightbox="{{$img->info_id}}" data-title="{{$img->name}}">
                        <figure style="background-image: url({{asset($img->img)}});">
                            <div class="figure-hover-appear">{{$img->name}}</div>
                        </figure>
                    </a>
                    @endforeach
                    @foreach ($eventInfos[6]->infoImgs??[] as $img)
                    <a href="{{asset($img->img)}}" data-lightbox="{{$img->info_id}}" data-title="{{$img->name}}">
                        <figure style="background-image: url({{asset($img->img)}});">
                            <div class="figure-hover-appear">{{$img->name}}</div>
                        </figure>
                    </a>
                    @endforeach
                    @foreach ($eventInfos[7]->infoImgs??[] as $img)
                    <a href="{{asset($img->img)}}" data-lightbox="{{$img->info_id}}" data-title="{{$img->name}}">
                        <figure style="background-image: url({{asset($img->img)}});">
                            <div class="figure-hover-appear">{{$img->name}}</div>
                        </figure>
                    </a>
                    @endforeach
                    @foreach ($eventInfos[8]->infoImgs??[] as $img)
                    <a href="{{asset($img->img)}}" data-lightbox="{{$img->info_id}}" data-title="{{$img->name}}">
                        <figure style="background-image: url({{asset($img->img)}});">
                            <div class="figure-hover-appear">{{$img->name}}</div>
                        </figure>
                    </a>
                    @endforeach
                    @foreach ($eventInfos[9]->infoImgs??[] as $img)
                    <a href="{{asset($img->img)}}" data-lightbox="{{$img->info_id}}" data-title="{{$img->name}}">
                        <figure style="background-image: url({{asset($img->img)}});">
                            <div class="figure-hover-appear">{{$img->name}}</div>
                        </figure>
                    </a>
                    @endforeach
                </div>
            </div>
        </article>
    </div>
</main>
@endsection

@section('js')
<script>
    const infos = {!! $infos !!};
    const nextInfos = {!! $nextInfos !!};
</script>
<script src="{{asset('/js/news.page.js')}}"></script>
@endsection