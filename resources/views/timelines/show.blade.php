<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>タイムラインの詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    </head>
    <body>
        <div class='timeline'>
            <h2 class='body'>
                {{ $timeline->body }}
            </h2>
            <p class='user_name'>{{ $timeline->user->name }}</p>
            <p class='program_name'>{{ $timeline->program->name }}</p>
            <p class='time'>{{ $timeline->created_at }}</p>
        </div>
        <div class="edit">
            <a href="/timelines/{{ $timeline->id }}/edit">編集</a>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>