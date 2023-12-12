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
            <div class="login__form__group">
                <input type="email" class="login__form__input" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
                <div class="error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <label for="">パスワード</label>
            <div class="login__form__group">
                <input type="password" class="login__form__input" name="password" placeholder="例:coachtech1106" />
                <div class="error-message">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="button__area">
                <button class="common-button" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection