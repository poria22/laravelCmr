<?php
use App\Models\User;
?>
<x-panel-layout>
    <x-slot name="styles">
       <link rel="stylesheet" href="{{asset('blog/css/style.css')}}" >
    </x-slot>
    <div class="main-content font-size-13">
        <div class="tab__box">
            <div class="tab__items">
                <a class="tab__item is-active" href="{{route('users.index')}}">همه کاربران</a>
                <a class="tab__item" href="{{route('users.create')}}">ایجاد کاربر جدید</a>
            </div>
        </div>
        <div class="d-flex flex-space-between item-center flex-wrap padding-30 border-radius-3 bg-white">
        </div>
        <div class="table__box">
            <table class="table">
                <thead role="rowgroup">
                <tr role="row" class="title-row">
                    <th>شناسه</th>
                    <th>نام و نام خانوادگی</th>
                    <th>ایمیل</th>
                    <th>سطح کاربری</th>
                    <th>تاریخ عضویت</th>
                    <th>وضعیت حساب</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                <tr role="row" class="">
                    <td><a href="">{{$user->id}}</a></td>
                    <td><a href="">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->getrolefarsi()}} </td>
                    <td>{{$user->getCreatedJalali()}}</td>
                    <td class="text-success">تاییده شده</td>
                    <td>
                        @if(auth()->user()->id !== $user->id)
                        <form action="{{route('users.destroy',$user->id)}}" method="post" style="display: inline">
                        @csrf
                        @method('delete')
                        <button class="item-delete mlg-15" title="حذف" style="background: white"></button>
                        </form>
                        @endif
                      <!--  <a href="" class="item-confirm mlg-15" title="تایید"></a>
                        <a href="" class="item-reject mlg-15" title="رد"></a>
                        <a href="edit-user.html" target="_blank" class="item-eye mlg-15" title="مشاهده"></a>-->
                        <a href="{{route('users.edit',$user->id)}}" class="item-edit " title="ویرایش"></a>

                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
</x-panel-layout>
