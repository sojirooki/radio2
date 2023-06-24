<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>タイムラインの投稿</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <form action="/timelines" method="POST">
            @csrf
            <div class="body">
                <h2>投稿内容</h2>
                <textarea name="timeline[body]" placeholder="番組の感想">{{ old('timeline.body') }}</textarea>
            </div>
            <div class="program">
            <h2>番組名</h2>
            <select name="timeline[program_id]">
            @foreach($programs as $program)
                <option value="{{ $program->id }}">{{ $program->name }}</option>
            @endforeach
            </select>
            </div>
            <input type="submit" value="投稿">
        </form>
        <div class="back">
            <a href="/">戻る</a>
        </div>
    </body>
</html>