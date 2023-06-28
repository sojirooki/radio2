$(function () {
    let like = $('.like-toggle');
    let likePostId;
    like.on('click', function () {
    
      let $this = $(this);
      likePostId = $this.data('timeline-id');
      $.ajax({
        headers: {
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        url: '/timelines/like',
        method: 'POST',
        data: {
          'timeline_id': likeTimelineId
        },
      })
      .done(function (data) {
        console.log('success');
        $this.toggleClass('liked');
        $this.next('.like-counter').html(data.post_likes_count);
      })
      .fail(function () {
        console.log('fail'); 
      });
    });
});