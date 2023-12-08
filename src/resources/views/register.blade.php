@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('header')
<div class="header__link">
    <button class="header__button" onclick="location.href='/login'">
        ログイン
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
            <input type="text" name="name" value="{{ old('name') }}" />
            @error('name')
            {{ $message }}
            @enderror
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
                <button class="form__button-submit" type="submit">登録</button>
            </div>

        </form>
    </div>
</div>
@endsection