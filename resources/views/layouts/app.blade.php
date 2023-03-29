<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? ''}} وبلاگ</title>
    <meta name="description"
          content="">
    <meta name="keywords"
          content="">
    <link rel="canonical" href="https://webamooz.net"/>
    <link rel="stylesheet" href="{{asset('/blog/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('/blog/css/style.css')}}">
    <link rel="stylesheet" href="/blog/css/responsive.css" media="(max-width:991px)">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">-->
</head>
<body>
<header class="c-header">
    <div class="container container--responsive container--white">
        <div class="c-header__row ">
            <div class="c-header__right">
                <div class="logo">
                    <a href="" class="logo__imggg"><img src="{{asset('blog/panel/img/logo.jpg')}}" style="height: 100px ;width: 250px"></a>
                </div>
                <div class="c-search width-100 ">
                    <form action="{{route('landing.search')}}" class="c-search__form position-relative">
                        <input name="search" type="text" class="c-search__input" placeholder="جستجو کنید">
                        <button class="c-search__button"></button>
                    </form>
                </div>

            </div>
            <div class="c-header__left">
                <div class="c-header__icons">
                    <div class="c-header__button-search "></div>
                    <div class="c-header__button-nav"></div>
                </div>
                @guest()
                <div class="c-button__login-regsiter">
                    <div><a class="c-button__link c-button--login" href="{{route('login')}}">ورود</a></div>
                    <div><a class="c-button__link c-button--register" href="{{route('register')}}">ثبت نام</a></div>
                </div>
                @else
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                            {{auth()->user()->name}}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('dashboard.index')}}">پروفایل</a></li>
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                            <li><button class="dropdown-item" >خروج</button></li>
                            </form>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    <nav class="nav" id="nav">
        <div class="c-button__login-regsiter d-none">
            <div><a class="c-button__link c-button--login" href="sign-in.html">ورود</a></div>
            <div><a class="c-button__link c-button--register" href="register.html">ثبت نام</a></div>
        </div>
        <div class="container container--nav">
            <ul class="nav__ul">
                <li class="nav__item"><a href="{{route('landing')}}" class="nav__link" style="text-decoration: none">صفحه اصلی</a></li>
                @foreach($categories as $category)
                <li class="nav__item nav__item--has-sub"><a href="#" class="nav__link" style="text-decoration: none">{{$category->name}}</a>
                    <div class="nav__sub">
                        <div class="container d-flex item-center flex-wrap container--nav">
                            @foreach($category->children as $child)
                            <a href="" class="nav__link">{{$child->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                @endforeach

                <li class="nav__item"><a href="#" class="nav__link" style="text-decoration: none">درباره ما</a></li>
                <li class="nav__item"><a href="#" class="nav__link" style="text-decoration: none">تماس باما</a></li>
            </ul>
        </div>
    </nav>
</header>
{{$slot}}
<footer class="footer">
    <a href="" class="scroll-top"></a>


    <div class="footer__webamooz">
        poria azami
        <a class="footer__copy" href=></a>
        © 1402
    </div>
    <!--    <div class="footer-info color-444">-->
    <!--        <a class="scrollToTop"></a>-->
    <!--        <div class="container">-->
    <!--            <div class="f-links">-->
    <!--                <div class="col-2"><a href="">خدمات هاستینگ بستلا</a></div>-->
    <!--                <div class="col-2"><a href="">لینک اول</a></div>-->
    <!--                <div class="col-2"><a href="">لینک اول</a></div>-->
    <!--                <div class="col-2"><a href="">لینک اول</a></div>-->
    <!--                <div class="col-2"><a href="">لینک اول</a></div>-->
    <!--                <div class="col-2"><a href="">لینک اول</a></div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="line"></div>-->
    <!--        <div class="container">-->
    <!--            <div class="f-about">-->
    <!--                <div class="col-8 margin-bottom-15">-->
    <!--                    <p>-->
    <!--                        وب اموز مرجعی تخصصی برای یادگیری طراحی و برنامه نویسی وب و موبایل است. ما در وب اموز با بهره-->
    <!--                        گیری از-->
    <!--                        نیروهای متخصص، باتجربه تمام تلاش خود را برای تهیه و تولید آموزش های با کیفیت و کامل و حرفه ای-->
    <!--                        انجام-->
    <!--                        می دهیم. باور ما اینست که کاربران ایرانی لایق بهترین ها هستند و باید بهترین و بروزترین فیلم های-->
    <!--                        آموزشی، در اختیار آنها قرار بگیرد تا بتوانند به سرعت پیشرفت کنند و جزء بهترین ها شوند. امید است-->
    <!--                        که-->
    <!--                        با همراهی هر چه بیشتر شما کاربران عزیز در این راه، ما را برای حرکتی قدرتمند در مسیر این هدف-->
    <!--                        باارزش-->
    <!--                        یاری دهید.-->
    <!--                    </p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="webamooz">-->
    <!--            طراحی و توسعه با لاراول توسط تیم-->
    <!--            <a href="https://webamooz.net">وب آموز</a>-->
    <!--            © 1399-->
    <!--        </div>-->
    <!--    </div>-->
</footer>
<div class="overlay"></div>
<script src="{{asset('/blog/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('/blog/js/js.js')}}"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>-->

</body>
</html>
