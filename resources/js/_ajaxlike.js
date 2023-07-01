$(function () {
    let like = $('.like-toggle');
    let likeTimelineId;
    like.on('click', function () {
    
      let $this = $(this);
      likeTimelineId = $this.data('timeline-id');
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
        $this.next('.like-counter').html(data.timeline_likes_count);
        console.log(data.timeline_likes_count);
      })
      .fail(function () {
        console.log('fail'); 
      });
    });
});