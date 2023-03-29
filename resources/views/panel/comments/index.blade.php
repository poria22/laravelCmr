
<x-panel-layout>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('comments.index')}}"> همه نظرات</a>
                <a class="tab__item " href="{{route('comments.index',['approved'=>0])}}">نظرات تاییده نشده</a>
                <a class="tab__item " href="{{route('comments.index', ['approved' =>1])}}">نظرات تاییده شده</a>
            </div>
        </div>


        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>ارسال کننده</th>
                    <th>برای</th>
                    <th>دیدگاه</th>
                    <th>تاریخ</th>
                    <th>تعداد پاسخ ها</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                <tr role="row" >
                    <td><a href="">{{$comment->id}}</a></td>
                    <td><a href="">{{$comment->user->name}}</a></td>
                    <td><a href="">{{$comment->post->id}}</a></td>
                    <td>{{$comment->content}}</td>
                    <td>{{$comment->jalali()}}</td>
                    <td>{{$comment->replies_count}}</td>
                    <td class="{{$comment->approved ?'text-success' :'text-error' }}">{{$comment->approvedfarsi()}}</td>
                    <td>
                        <form action="{{route('comments.destroy' ,$comment->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                        <button href="" class="item-delete mlg-15" title="حذف" style="background-color: white"></button>
                        </form>
                        <a href="show-comment.html" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                        <form action="{{route('comments.update',$comment->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('PUT')
                        @if($comment->approved ===1)


                        <button href="show-comment.html"  class="item-reject mlg-15" title="رد" style="background-color: white"></button>

                        @else

                        <button href="show-comment.html"  class="item-confirm mlg-15" title="تایید" style="background-color: white"></button>
                        @endif
                        </form>
                    </td>
                </tr>
                @endforeach


                </tbody>
            </table>
        </div>
    </div>
</x-panel-layout>
