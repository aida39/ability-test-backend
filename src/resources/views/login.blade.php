@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('header')
<div class="header__link">
    <button class="header__button" onclick="location.href='/register'">
        register
    </button>
</div>
@endsection

@section('content')
<div class="login__content">
    <div class="login__heading">
        <h1>Login</h1>
    </div>
    <div class="login__form">
        <form class="form" action="/login" method="post">
            @csrf
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
                <button class="common-button" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection