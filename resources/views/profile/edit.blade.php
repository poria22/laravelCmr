<x-panel-layout>
    <div class="main-content  ">
        <div class="user-info bg-white padding-30 font-size-13">
            <form action="{{route('profile.update' ,$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
               @method('PATCH')
                <div class="profile__info border cursor-pointer text-center">
                    <div class="avatar__img"><img src="{{auth()->user()->getprofile()}}" class="avatar___img">
                        <input type="file" accept="image/*" class="hidden avatar-img__input" name="profile">
                        <div class="v-dialog__container" style="display: block;"></div>
                        <div class="box__camera default__avatar"></div>
                    </div>
                    <span class="profile__name">نام کاربر:{{$user->name}}</span>
                </div>
                <input name="name" class="text" placeholder="نام کاربری" value="{{$user->name}}">
                @error('name')
                {{$message}}
                @endif
                <input name="phone" class="text" placeholder="شماره موبایل" value="{{$user->phone}}">
                @error('phone')
                {{$message}}
                @endif
                <input name="email" class="text text-left" placeholder="ایمیل" value="{{$user->email}}">
                @error('email')
                {{$message}}
                @endif
                <input name="password" class="text text-left" placeholder="رمز عبور">
                @error('password')
                {{$message}}
                @endif
                <p class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای
                    غیر الفبا مانند <strong>!@#$%^&*()</strong> باشد.</p>
                <br>
                <br>
                <button class="btn btn-webamooz_net">ذخیره تغییرات</button>
            </form>
        </div>

    </div>
</x-panel-layout>
