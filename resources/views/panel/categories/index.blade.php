<x-panel-layout>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{asset('blog/css/style.css')}}">
    </x-slot>
    <div class="main-content padding-0 categories">
        <div class="row no-gutters  ">
            <div class="col-8 margin-left-10 margin-bottom-15 border-radius-3">
                <p class="box__title">دسته بندی ها</p>
                <div class="table__box">
                    <table class="table">
                        <thead role="rowgroup">
                        <tr role="row" class="title-row">
                            <th>شناسه</th>
                            <th>نام دسته بندی</th>
                            <th>نام انگلیسی دسته بندی</th>
                            <th>دسته پدر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr role="row" class="">
                            <td><a href="">{{$category->id}}</a></td>
                            <td><a href="">{{$category->name}}</a></td>
                            <td>{{$category->link}}</td>
                            <td>{{$category->parentname()}}</td>
                            <td>
                                <form action="{{route('categories.destroy',$category->id)}}" method="post" style="; display: inline-block">
                                    @csrf
                                    @method('delete')
                                    <button style="background-color: white" class="item-delete mlg-15" title="حذف"></button>
                                </form>
                                <a href="{{route('categories.edit' , $category->id)}}" class="item-edit " title="ویرایش"></a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>

                    </table>
                    {{$categories->links()}}
                </div>
            </div>
            <div class="col-4 bg-white">
                <p class="box__title">ایجاد دسته بندی جدید</p>
                <form action="{{route('categories.store')}}" method="post" class="padding-30">
                    @csrf
                    <input name="name" type="text" placeholder="نام دسته بندی" class="text">
                    @error('name')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                    <input name="link" type="text" placeholder="نام انگلیسی دسته بندی" class="text">
                    @error('link')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                    <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                    <select class="select" name="category_id" id="category_id">
                        <option value="">ندارد</option>
                        @foreach($parents as $parent)
                            <option value="{{$parent->id}}">{{$parent->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    {{$message}}
                    @enderror
                    <button class="btn btn-webamooz_net">اضافه کردن</button>
                </form>
            </div>
        </div>
    </div>


</x-panel-layout>
