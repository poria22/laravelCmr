<x-app-layout>
<x-slot name="title">
    بازیابی رمز عبور-
</x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">بازیابی رمز عبور</h1>

                <form class="sign-page__form" action="{{route('password.email')}}" method="POST">
                       @csrf
                        <input type="text" class="text text--left" name="email" placeholder="شماره یا ایمیل">
                        @error('email')
                        <p>{{$message}}</p>
                        @enderror
                        @if(Session::has('status'))
                            <p>{{session::get('status')}}</p>
                        @endif

                        <button class="btn btn--blue btn--shadow-blue width-100 ">بازیابی</button>
                        <div class="sign-page__footer">
                            <span>کاربر جدید هستید؟</span>
                            <a href="register.html" class="color--46b2f0">صفحه ثبت نام</a>

                        </div>

                </form>
            </div>
        </div>
    </main>

</x-app-layout>
