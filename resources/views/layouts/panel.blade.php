
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    <title>پنل کاربری{{$title ?? ''}}</title>
    {{$styles ?? ''}}
    <link rel="stylesheet" href="{{asset('blog/panel/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('blog/panel/css/responsive_991.css')}}" media="(max-width:991px)">
    <link rel="stylesheet" href="{{asset('blog/panel/css/responsive_768.css')}}" media="(max-width:768px)">
    <link rel="stylesheet" href="{{asset('blog/panel/css/font.css')}}">

</head>
<body>
<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"></span>
    <a class=" " href=> </a>
    <div class="profile__info border cursor-pointer text-center">
        <div class="avatar__img"><img src="{{asset('blog/panel/img/pro.jpg')}}" class="avatar___img">
            <input type="file" accept="image/*" class="hidden avatar-img__input">
            <div class="v-dialog__container" style="display: block;"></div>
            <div class="box__camera default__avatar"></div>
        </div>
        <span class="profile__name">کاربر : {{auth()->user()->name}}</span>
        <span class="profile__name">  {{auth()->user()->getrolefarsi()}}</span>
    </div>

    <ul>


        <li class="item-li i-dashboard @if(request()->is('dashboard')) is-active @endif"><a href="{{route('dashboard.index')}}">پیشخوان</a></li>
        @if(auth()->user()->role ==='admin')
        <li class="item-li i-users @if(request()->is('dashboard/users') || request()->is('dashboard/users/*')) is-active @endif" ><a href="{{route('users.index')}}"> کاربران</a></li>
        @endif
        <li class="item-li i-categories @if(request()->is('dashboard/categories')) is-active @endif "><a href="{{route('categories.index')}}">دسته بندی ها</a></li>
        <li class="item-li i-articles @if(request()->is('dashboard/posts') || request()->is( 'dashboard/posts/*')) is-active @endif"><a href="{{route('posts.index')}}">مقالات</a></li>
        <li class="item-li i-comments @if(request()->is('dashboard/comments')) is-active @endif"><a href="{{route('comments.index')}}"> نظرات</a></li>
        <li class="item-li i-user__inforamtion"><a href="{{route('profile.edit')}}">اطلاعات کاربری</a></li>
    </ul>

</div>
<div class="content">
    <div class="header d-flex item-center bg-white width-100 border-bottom padding-12-30">
        <div class="header__right d-flex flex-grow-1 item-center">
            <span class="bars"></span>
            <a class="" href=><img src="{{asset('blog/panel/img/logo.jpg')}}" style="height: 80px ;width: 200px"></a>
        </div>
        <form action="{{route('logout')}}" method="POST">
            @csrf
        <div class="header__left d-flex flex-end item-center margin-top-2">
            <button  class="logout" title="خروج"></button>
        </div>
        </form>
    </div>
    <div class="breadcrumb">
        <ul>
            <li><a href="index.html" title="پیشخوان">پیشخوان</a></li>
        </ul>
    </div>
     {{$slot}}
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session()->has('status'))
    <script>
        swal.fire({title:"{{session('status')}}", icon:'success',confirmButtonText:'تایید' })
    </script>
@endif
<script src="{{asset('blog/panel/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('blog/panel/js/js.js')}}"></script>
{{$script ?? ''}}

</body>

</html>
