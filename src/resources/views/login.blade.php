@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('header')
<div class="header__link">
    <button class="header__button" onclick="location.href='/register'">
        登録
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
            <input type="email" name="email" value="{{ old('email') }}" />
            @error('email')
            {{ $message }}
            @enderror
            <label for="">パスワード</label>
            <input type="password" name="password" />
            @error('password')
            {{ $message }}
            @enderror
            <div class="form__button">
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>

        </form>
    </div>
</div>
@endsection