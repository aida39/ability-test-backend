@extends('layouts.auth')

@section('css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('header')
<div class="header__link">
    @if (Auth::check())
    <form action="/logout" method="post">
        @csrf
        <button class="header__button">Logout</button>
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
        <div class="admin__search">
            <form class="admin__form" action="/search" method="get">
                @csrf
                <div class="admin__form__item">
                    <input class="admin__form__item-keyword" type="search" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}">
                    <button class="admin__form__button" type="submit">
                        <img src="icon.png">
                    </button>
                    <select class="admin__form__item-gender" name="gender">
                        <option value="">性別</option>
                        <option value="">全て</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                        <option value="3">その他</option>
                    </select>
                    <select class="admin__form__item-category" name="category_id">
                        <option value="">お問い合わせの種類</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                    <input class="admin__form__item-date" type="date" name="created_at" />
                </div>
            </form>
        </div>
        <div class="admin__function">
            <div class="admin__function-export">
                <form action="/download" method="get">
                    @csrf
                    <button class="download-button">エクスポート</button>
                </form>
            </div>
            <div class="admin__function-pagination">
                {{ $contacts->appends(request()->query())->links('vendor.pagination.pagination')}}
            </div>
        </div>
        <div class="admin__table">
            <table class="admin__table__inner">
                <tr class="admin__table__row">
                    <th class="admin__table__header">お名前</th>
                    <th class="admin__table__header">性別</th>
                    <th class="admin__table__header">メールアドレス</th>
                    <th class="admin__table__header">お問い合わせの種類</th>
                    <th class="admin__table__header"></th>
                </tr>
                @foreach($contacts as $contact)
                <tr class="admin__table__row">
                    <td class="admin__table__text">
                        {{ $contact['last_name'] }} {{ $contact['first_name'] }}
                    </td>
                    <td class="admin__table__text">
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
                    <td class="admin__table__text admin__table__text-email">
                        {{ $contact['email'] }}
                    </td>
                    <td class="admin__table__text">
                        {{ $contact['category']['content'] }}
                    </td>
                    <td class="admin__table__text">
                        <button class="modal-button">
                            <a href="/delete?id={{$contact->id}}">詳細</a>
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<form action="/admin" method="get">
    @csrf
    <div class="button__area">
        <button class="common-button">リセット</button>
    </div>
</form>
@endif
@endsection