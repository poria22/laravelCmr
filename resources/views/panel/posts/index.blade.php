
<x-panel-layout>
    <div class="breadcrumb">
        <ul>
            <li><a href="index.html">پیشخوان</a></li>
            <li><a href="articles.html" class="is-active"> مقالات</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="articles.html">لیست مقالات</a>
                <a class="tab__item " href="{{route('posts.create')}}">ایجاد مقاله جدید</a>
            </div>
        </div>
        <div class="bg-white padding-20">
            <div class="t-header-search">
                <form action="{{route('posts.index')}}" >
                    <div class="t-header-searchbox font-size-13">
                        <div type="text" class="text search-input__box font-size-13">جستجوی مقاله
                            <div class="t-header-search-content ">
                                <input type="text" class="text" name="search" placeholder="نام مقاله">
                                <button class="btn btn-webamooz_net">جستجو</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table__box">
            <table class="table">

                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>عنوان</th>
                    <th>نویسنده</th>
                    <th>متن</th>
                    <th>تاریخ ایجاد</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr role="row" class="">
                    <td><a href="">{{$post->id}}</a></td>
                    <td><a href="">{{$post->title}}</a></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{\Illuminate\Support\Str::limit( $post->content , 20 )}}</td>
                    <td>{{$post->jalali()}}</td>
                    <td>
                        <form action="{{route('posts.destroy',$post->id)}}" method="post" style="display: inline-block ;">
                            @csrf()
                            @method('delete')
                        <button style=" background-color: white"  class="item-delete mlg-15" title="حذف"></button>
                        </form>
                        <a href="" class="item-reject mlg-15" title="رد"></a>
                        <a href="" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>
                        <a href="" class="item-confirm mlg-15" title="تایید"></a>
                        <a href="{{route('posts.edit',$post->id)}}" class="item-edit" title="ویرایش"></a>
                    </td>
                </tr>
                @endforeach


                </tbody>
            </table>
            {{$posts->links()}}
        </div>
    </div>
</x-panel-layout>
