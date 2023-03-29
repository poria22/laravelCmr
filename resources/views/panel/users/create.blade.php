<x-panel-layout>
    <x-slot name="title">
        -ساخت کاربرجدید
    </x-slot>
    <div class="main-content font-size-13">
        <div class="row no-gutters  bg-white">
            <div class="col-12">
                <p class="box__title">ساخت کاربر</p>
                <form action="{{route('users.store')}}" class="padding-30" method="post">
                    @csrf
                    <input type="text" name="name" class="text" placeholder="نام و نام خانوادگی">
                    @error('name')
                    {{$message}}
                    @endif
                    <input type="email" name="email" class="text" placeholder="ایمیل">
                    @error('email')
                    {{$message}}
                    @endif
                    <input type="text" name="phone" class="text" placeholder="شماره موبایل">
                    @error('phone')
                    {{$message}}
                    @endif
                    <select class="select" name="role" id="">
                        <option value="user">کاربر عادی</option>
                        <option value="author">نویسنده</option>
                        <option value="admin">مدیر</option>
                    </select>
                    @error('role')
                    {{$message}}
                    @endif
                    <button class="btn btn-webamooz_net">ساخت کاربر</button>
                </form>

            </div>
        </div>
    </div>
</x-panel-layout>
