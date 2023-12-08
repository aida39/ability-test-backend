@extends('layouts.auth')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('header')
<div class="header__link">
    @if (Auth::check())
    <form action="/logout" method="post">
        @csrf
        <button class="header__button">ログアウト</button>
    </form>
    @endif
</div>
@endsection

@section('content')
@if (Auth::check())
<div class="admin__container">
    <div class="admin__heading">
        <h1>Admin</h1>
    </div>
    <div class="admin__content">
        <div class="admin__form">
            <form class="search-form" action="/search" method="get">
                @csrf
                <div class="search-form__item">
                    <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">
                    <select class="search-form__item-select" name="gender">
                        <option value="">性別</option>
                        <option value="">全て</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                        <option value="3">その他</option>
                    </select>
                    <select class="search-form__item-select" name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                    <input type="date" name="created_at" />
                </div>
                <div class="search-form__button">
                    <button class="search-form__button-submit" type="submit">検索</button>
                </div>
            </form>
        </div>
        <div class="admin__function">

        </div>
        <div class="admin__table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <th class="confirm-table__header">性別</th>
                    <th class="confirm-table__header">メールアドレス</th>
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <th class="confirm-table__header">お問い合わせ内容</th>
                </tr>
                @foreach($contacts as $contact)
                <tr class="confirm-table__row">
                    <td class="confirm-table__text">
                        {{ $contact['last_name'] }} {{ $contact['first_name'] }}
                    </td>
                    <td class="confirm-table__text">
                        <?php
                        switch ($contact['gender']) {
                            case "1":
                                echo "男性";
                                break;
                            case "2":
                                echo "女性";
                                break;
                            case "3":
                                echo "その他";
                                break;
                        }
                        ?>
                    </td>
                    <td class="confirm-table__text">
                        {{ $contact['email'] }}
                    </td>
                    <td class="confirm-table__text">
                        {{ $contact['category']['content'] }}
                    </td>
                    <td class="confirm-table__text">
                        {{ $contact['detail'] }}
                    </td>
                    <td class="confirm-table__text">
                        詳細
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<form class="" action="/admin" method="get">
    @csrf
    <div class="button">
        <button>リセット</button>
    </div>
</form>
@endif
@endsection