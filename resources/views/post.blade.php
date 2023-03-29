<x-app-layout>
<main>
    <div class="container article">
        <article class="single-page">
            <div class="breadcrumb">
                <ul class="breadcrumb__ul">
                    <li class="breadcrumb__item"><a href="" class="breadcrumb__link" title="خانه">بخش مقالات</a></li>
                    <li class="breadcrumb__item"><a href="" class="breadcrumb__link" title="فریم ورک لاراول چیست ؟‌">فریم
                            ورک لاراول چیست ؟‌</a></li>
                </ul>
            </div>
            <div class="single-page__title">
                <h1 class="single-page__h1">{{$post->title}} </h1>
                <span class="single-page__like"></span>
            </div>
            <div class="single-page__details">
                <div class="single-page__author">نویسنده :  {{$post->user->name}}</div>
                <div class="single-page__date">تاریخ : {{$post->jalali()}}</div>
            </div>
            <div class="single-page__img">
                <img class="single-page__img-src" src="{{$post->getUrlBanner()}}" alt="" style="width: 400px; position: relative;right: 400px">
            </div>
            <div class="single-page__content">
                {!! $post->content !!}
            </div>
            <div class="single-page__tags">
                <ul class="single-page__tags-ul">
                    @foreach($post->categories as $category)
                    <li class="single-page__tags-li"><a href="" class="single-page__tags-link">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>

        </article>
    </div>
    <div class="container">
        <div class="comments" id="comments">

@auth()
            <div class="comments__send">

                <div class="comments__title">



                    <h3 class="comments__h3"> دیدگاه خود را بنویسید </h3>
                    <span class="comments__count">  نظرات (  {{$post->comments_count}}) </span>
                </div>
                <form action="{{route('comments.store')}}" method="post">
                    @csrf
                <input name="post_id" value="{{$post->id}}">

                <textarea type="text" name="matn" class="comments__textarea" placeholder="بنویسید"></textarea>
                    @error('text')
                    {{$message}}
                    @enderror
                <button class="btn btn--blue btn--shadow-blue">ارسال نظر</button>
                </form>
              <!--  <button class="btn btn--red btn--shadow-red">انصراف</button>-->
            </div>
            @else
            <p>برای ارسال نظر وارد سایت شوید!</p>
            @endauth
            <div class="comments__list">
                @foreach($post->comments as $comment)
                <div id="comment-2">
                    <div class="comments__box">
                        <div class="comments__inner">
                            <div class="comments__header">
                                <div class="comments__row">
                                    <div class="d-flex flex-grow-1">
                                        <div class="comments__avatar">
                                            <img src="img/profile.jpg" class="comments__img">
                                        </div>
                                        <div class="comments__details">
                                            <h5 class="comments__author"><span class="comments__author-name">{{$comment->user->name}}</span></h5>
                                            <span class="comments_date"> </span>
                                        </div>
                                    </div>
                                    <a href="#comments" class="btn btn--blue btn--shadow-blue btn--comments-reply">ارسال پاسخ</a>
                                </div>
                            </div>

                            <p class="comments__body">
                             {{$comment->content}}

                            </p>
                        </div>
                        @if($comment->replies->count() > 0)
                            @foreach($comment->replies as $reply)
                        <div class="comments__subset">
                            <div id="comment-3">
                                <div class="comments__box">
                                    <div class="comments__inner">
                                        <div class="comments__header">
                                            <div class="comments__row">
                                                <div class="d-flex flex-grow-1">
                                                    <div class="comments__avatar">
                                                        <img src="img/profile.jpg" class="comments__img">
                                                    </div>
                                                    <div class="comments__details">
                                                        <h5 class="comments__author"><span class="comments__author-name">{{$reply->user->name}}</span></h5>
                                                        <span class="comments_date"> 523 روز پیش </span>
                                                    </div>
                                                </div>
                                                <a href="#comments" class="btn btn--blue btn--shadow-blue btn--comments-reply">ارسال پاسخ</a>
                                            </div>
                                        </div>
                                        <p class="comments__body">
                                            {{$reply->content}}

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @endif
                @endforeach
                    </div>
                </div>
            </div>
    </div>
</main>
</x-app-layout>
