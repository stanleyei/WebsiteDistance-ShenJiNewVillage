<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/tra-map.css">
    <title>審計新村</title>
</head>

<body>
    <main class="traffic">
        <a href="/#sixthPage" class="logo-link" title="回到首頁">
            <img class="logo-img" src="./img/Logo-img.png" alt="審計新村LOGO插圖">
            <img class="logo-text" src="./img/Logo-text.png" alt="審計新村LOGO文字">
        </a>
        <div class="traffic-container">
            <div class="traffic-title">
                <h2>交通資訊</h2>
                <span class="tra-title-icon">How To Get There</span>
                <div class="tra-youbike">如何到達審計?</div>
                <div class="youbike-point">YouBike 據點分布</div>
            </div>
            <div class="traffic-bike">
                <!--Google map-->
                <div id="map-container-google-1" class="z-depth-1-half bike-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d7281.57181270075!2d120.66116660379524!3d24.144155712871452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z5a-p6KiIMzY4IHlvdWJpa2U!5e0!3m2!1szh-TW!2stw!4v1623687237883!5m2!1szh-TW!2stw"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>"
                    frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <!--Google Maps-->
            </div>
        </div>
    </main>

    <script>
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
    </script>
</body>