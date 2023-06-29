<x-app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
                @auth
                @if (!$timeline->isLikedBy(Auth::user()))
                    <span class="timeline_likes">
                        <i class="fas fa-heart like-toggle" data-timeline-id="{{ $timeline->id }}"></i>
                    <span class="like-counter">{{$timeline->likes_count}}</span>
                    </span><!-- /.likes -->
                @else
                    <span class="timeline_likes">
                        <i class="fas fa-heart heart like-toggle liked" data-timeline-id="{{ $timeline->id }}"></i>
                    <span class="like-counter">{{$timeline->likes_count}}</span>
                    </span><!-- /.likes -->
                @endif
                @endauth
            @endforeach
        </div>
        <div class='paginate'>
            {{ $timelines->links() }}
        <div>
    </body>
</x-app-layout>