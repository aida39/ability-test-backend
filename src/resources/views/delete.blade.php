<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/delete.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
</head>

<body>
    <main>
        <div class="delete__container">
            <div class="back-button">
                <a href="/admin">×</a>
            </div>
            <table class="delete__table">
                <tr class="delete__table__row">
                    <th class="delete__table__header">お名前</th>
                    <td>{{ $contact['last_name'] }} {{ $contact['first_name'] }}</td>
                </tr>
                <tr class="delete__table__row">
                    <th class="delete__table__header">性別</th>
                    <td>
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
                </tr>
                <tr class="delete__table__row">
                    <th class="delete__table__header">メールアドレス</th>
                    <td> {{ $contact['email'] }}</td>
                </tr>
                <tr class="delete__table__row">
                    <th class="delete__table__header">電話番号</th>
                    <td>{{ $contact['tell'] }}</td>
                </tr>
                <tr class="delete__table__row">
                    <th class="delete__table__header">住所</th>
                    <td>{{ $contact['address'] }}</td>
                </tr>
                <tr class="delete__table__row">
                    <th class="delete__table__header">建物名</th>
                    <td>{{ $contact['building'] }}</td>
                </tr>
                <tr class="delete__table__row">
                    <th class="delete__table__header">お問い合わせの種類</th>
                    <td> {{ $contact['category']['content'] }}</td>
                </tr>
                <tr class="delete__table__row">
                    <th class="delete__table__header">お問い合わせ内容</th>
                    <td>{{ $contact['detail'] }}</td>
                </tr>
            </table>
            <form action="/delete?id={{$contact->id}}" method="post">
                @csrf
                <div class="button__area">
                    <button class="delete-button">削除</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>