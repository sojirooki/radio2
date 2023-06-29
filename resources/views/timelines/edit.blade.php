<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>タイムラインの編集</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">編集</h1>
        <div class="content">
            <form action="/timelines/{{ $timeline->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__body'>
                    <h2>投稿内容</h2>
                    <input type='text' name='timeline[body]' value="{{ $timeline->body }}">
                </div>
                <div class="program">
                    <h2>番組名</h2>
                    <select name="timeline[program_id]">
                        @foreach($programs as $program)
                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
    </body>
</html>