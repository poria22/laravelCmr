<x-panel-layout>
    <x-slot name="title">
        -ویرایش دسته بندی
    </x-slot>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ویرایش کاربر</p>
                <form action="{{route('categories.update',$category->id)}}" class="padding-30" method="post">
                    @csrf
                    @method('put')
                    <input type="text" name="name" class="text" value="{{$category->name}}" placeholder="نام و نام خانوادگی">
                    @error('name')
                    {{$message}}
                    @endif


                    <select class="select" name="category_id" id="">
                        <option value="">ندارد</option>
                        @foreach($parents as $parent)

                        <option value="{{$parent->id}}" @if($category->category_id === $parent->id)selected  @endif>{{$parent->name}}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                    {{$message}}
                    @endif
                    <button class="btn btn-webamooz_net">ویرایش دسته بندی</button>
                </form>

            </div>
        </div>
    </div>
</x-panel-layout>
