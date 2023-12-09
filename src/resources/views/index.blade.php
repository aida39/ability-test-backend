@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection
@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h1>Contact</h1>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--name">
                    <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
                    <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
                </div>
            </div>
        </div>
        <div class="error-message">
            @error('last_name')
            {{ $message }}
            @enderror
            @error('first_name')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <input type="radio" id="male" name="gender" value="1" checked />
                    <label for="male">男性</label>
                </div>
                <div class="form__input--radio">
                    <input type="radio" id="female" name="gender" value="2" />
                    <label for="female">女性</label>
                </div>
                <div class="form__input--radio">
                    <input type="radio" id="others" name="gender" value="3" />
                    <label for="others">その他</label>
                </div>
            </div>
        </div>
        <div class="error-message">
            @error('gender')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
                </div>
            </div>
        </div>
        <div class="error-message">
            @error('email')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--tel">
                    <input type="tel" name="tell-first" placeholder="080" value="{{ old('tell-first') }}" />
                    <span>-</span>
                    <input type="tel" name="tell-second" placeholder="1234" value="{{ old('tell-second') }}" />
                    <span>-</span>
                    <input type="tel" name="tell-third" placeholder="5678" value="{{ old('tell-third') }}" />
                </div>
            </div>
        </div>
        <div class="error-message">
            @error('tell-first')
            {{ $message }}
            @enderror
            @error('tell-second')
            {{ $message }}
            @enderror
            @error('tell-third')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                </div>
            </div>
        </div>
        <div class="error-message">
            @error('address')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <select name="category_id">
                        <option value="">選択してください</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}{{ old($category['content']) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="error-message">
            @error('category_id')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group form__group--textarea">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <textarea class="form__input--textarea" name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
            </div>
        </div>
        <div class="error-message">
            @error('detail')
            {{ $message }}
            @enderror
        </div>

        <div class="button__area">
            <button class="common-button" type="submit">確認画面</button>
        </div>
    </form>
    @endsection