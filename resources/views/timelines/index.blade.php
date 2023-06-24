<x-app-layout>
    <body>
        <h1>りあたい！</h1>
        <a href='/timelines/create'>投稿する</a>
        <div class='timelines'>
            @foreach ($timelines as $timeline)
                <div class='timeline'>
                    <h2 class='body'>
                        <a href="/timelines/{{ $timeline->id }}">{{ $timeline->body }}</a>
                        </h2>
                    <p class='user_name'>{{ $timeline->user->name }}</p>
                    <p class='program_name'>{{ $timeline->program->name }}</p>
                    <p class='time'>{{ $timeline->created_at }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $timelines->links() }}
        <div>
    </body>
</x-app-layout>