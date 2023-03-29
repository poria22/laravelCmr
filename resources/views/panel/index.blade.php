<x-panel-layout>
    <x-slot name="title">
        -داشبورد
    </x-slot>
    <div class="main-content">
        <div class="row no-gutters font-size-13 margin-bottom-10">
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p> تعداد کاربران </p>
                <p>{{$count_user}}</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>تعداد پست ها</p>
                <p>{{$count_post}}</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white margin-left-10 margin-bottom-10">
                <p>تعداد نظرات</p>
                <p> {{$count_comment}}</p>
            </div>
            <div class="col-3 padding-20 border-radius-3 bg-white  margin-bottom-10">
                <p>تعداد دسته بندی ها</p>
                <p> {{$count_category}}</p>
            </div>
        </div>

    </div>

</x-panel-layout>
