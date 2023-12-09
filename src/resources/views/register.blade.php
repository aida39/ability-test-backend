@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('header')
<div class="header__link">
    <button class="header__button" onclick="location.href='/login'">
        Login
    </button>
</div>
@endsection

@section('content')
<div class="register__content">
    <div class="register__heading">
        <h1>Register</h1>
    </div>
    <div class="register__form">
        <form class="form" action="/register" method="post">
            @csrf
            <label for="">お名前</label>
            <input type="text" name="name" placeholder="例:山田　太郎" value="{{ old('name') }}" />
            @error('name')
            {{ $message }}
            @enderror
            <label for="">メールアドレス</label>
            <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
            @error('email')
            {{ $message }}
            @enderror
            <label for="">パスワード</label>
            <input type="password" name="password" placeholder="例:coachtech1106" />
            @error('password')
            {{ $message }}
            @enderror
            <div class="button__area">
                <button class="common-button" type="submit">登録</button>
            </div>

        </form>
    </div>
</div>
@endsection