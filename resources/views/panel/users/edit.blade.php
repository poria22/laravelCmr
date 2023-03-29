<x-panel-layout>
    <x-slot name="title">
        -ویرایش کاربر
    </x-slot>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ویرایش کاربر</p>
                <form action="{{route('users.update',$user->id)}}" class="padding-30" method="post">
                    @csrf
                    @method('put')
                    <input type="text" name="name" class="text" value="{{$user->name}}" placeholder="نام و نام خانوادگی">
                    @error('name')
                    {{$message}}
                    @endif
                    <input type="email" name="email" class="text" value="{{$user->email}}" placeholder="ایمیل">
                    @error('email')
                    {{$message}}
                    @endif
                    <input type="text" name="phone" class="text" value="{{$user->phone}}" placeholder="شماره موبایل">
                    @error('phone')
                    {{$message}}
                    @endif
                    <select class="select" name="role" id="">
                        <option value="user"@if($user->role ==='user') selected @endif>کاربر عادی</option>
                        <option value="author"@if($user->role ==='author') selected @endif>نویسنده</option>
                        <option value="admin"@if($user->role ==='admin') selected @endif>مدیر</option>
                    </select>
                    @error('role')
                    {{$message}}
                    @endif
                    <button class="btn btn-webamooz_net">ویرایش کاربر</button>
                </form>

            </div>
        </div>
    </div>
</x-panel-layout>
