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
            <label for="name">お名前</label>
            <div class="register__form__group">
                <input type="text" class="register__form__input" name="name" placeholder="例:山田　太郎" value="{{ old('name') }}" />
                <div class="error-message">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <label for="email">メールアドレス</label>
            <div class="register__form__group">
                <input type="email" class="register__form__input" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
                <div class="error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <label for="password">パスワード</label>
            <div class="register__form__group">
                <input type="password" class="register__form__input" name="password" placeholder="例:coachtech1106" />
                <div class="error-message">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="button__area">
                <button class="common-button" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection