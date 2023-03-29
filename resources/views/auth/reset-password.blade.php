
<x-app-layout>
    <x-slot name="title">
        بازیابی رمز عبور-
    </x-slot>
    <main class="bg--white">
        <div class="container">
            <div class="sign-page">
                <h1 class="sign-page__title">بازیابی رمز عبور</h1>

                <form class="sign-page__form" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <input type="email" class="text text--left" name="email" value="{{$request->email}}">
                    @error('email')
                    <p>{{$message}}</p>
                    @enderror

                    <input type="password" class="text text--left" name="password" placeholder="رمز عبور جدید">
                    @error('password')
                    <p>{{$message}}</p>
                    @enderror
                    <input type="password" class="text text--left" name="password_confirmation" placeholder="تکرار رمز عبور جدید">
                    @error('password_confirmation')
                    <p>{{$message}}</p>
                    @enderror
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
